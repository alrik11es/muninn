<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Http\Request;

trait BasicResourceTrait
{
    /** @var Model */
    protected $entity;

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->entity = $this->getModelFromClassName(get_called_class());
        $entity = new $this->entity();
        return view('scenarios', ['scenarios' => $entity->all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function createEdit($id = null, Request $request)
    {
        if($id) {
            $entity = $this->getNewEntity();
            $object = $entity->where('id', $request->get('id'));
            return view('scenarios', ['scenario' => $object]);
        } else {
            return view('createEditScenario');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /** @var Model $object */
        $object = $this->getNewEntity();
        $this->recursiveMethod($object, $request->json());
        return response()->json($object, 201);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $entity = $this->getNewEntity();
        $object = $entity->where('id', $id);
        $this->applyRelations($request, $object);
        if ($this->getNewEntity()->getModel() instanceof TranslatableInterface) {
            $object->with('translations');
        }
        return response()->json($object->first());
    }

    public function applyRelations(Request $request, $entity)
    {
        $request_query = json_decode($request->get('q')) ?? [];
        foreach ($request_query->relations ?? [] as $relation) {
            $entity->with($relation);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $object = $this->getNewEntity()->find($id);
        $this->recursiveMethod($object, $request->json());
        return response()->json($object);
    }

    /**
     * @param $entity
     * @param $fields
     */
    public function recursiveMethod($entity, $fields)
    {
        if ($fields->has(0)) {
            foreach ($fields as $field) {
                $this->processSimpleEntity($entity, $field);
                $this->processRelations($entity, $fields);
            }
        } else {
            $this->processSimpleEntity($entity, $fields);
            $this->processRelations($entity, $fields);
        }
    }

    /**
     * @param $entity
     * @param $fields
     * @return mixed
     */
    private function processSimpleEntity($entity, $fields)
    {
        $columns = \Schema::getColumnListing($entity->getTable());
        foreach ($fields as $field => $value) {
            if (in_array($field, $columns)) {
                $entity->$field = $value;
            }
            if ($entity->field == 'id') {
                unset($entity->field);
            }
        }
        if (method_exists($this, 'preSaveDataTransformation')) {
            $this->preSaveDataTransformation($entity);
        }
        $entity->save();
    }

    /**
     * @param $entity
     * @param $fields
     * @return bool
     */
    private function processRelations($entity, $fields)
    {
        foreach ($fields as $field => $value) {
            if (method_exists($entity, $field)) {
                $relationEntity = $entity->$field()->getModel();
                if (array_key_exists(0, $value)) {
                    foreach ($value as $val) {
                        if ($this->processRelations($relationEntity, $fields)) {
                            $this->storeRecursiveRelation($entity, $relationEntity, $field, $val);
                        }
                    }
                } else {
                    if ($this->processRelations($relationEntity, $fields)) {
                        $this->storeRecursiveRelation($entity, $relationEntity, $field, $value);
                    }
                }
            }
        }
        return true;
    }

    /**
     * @param $entity
     * @param $relationEntity
     * @param $field
     * @param $value
     * @return bool
     */
    private function storeRecursiveRelation($entity, $relationEntity, $field, $value)
    {
        $columns = \Schema::getColumnListing($relationEntity->getTable());
        $relationEntity = new $relationEntity;
        if (array_key_exists('id', $value)) {
            $ifExist = $relationEntity->where('id', $value['id'])->first();
            if ($ifExist) {
                if ($entity->$field() instanceof BelongsToMany) {
                    $entity->$field()->syncWithoutDetaching($ifExist);
                } else {
                    $entity->$field()->associate($ifExist);
                }
                return true;
            }
        }
        $relationEntity = $this->setColumnsToStore($columns, $relationEntity, $value);
        $entity->$field()->save($relationEntity);
    }

    /**
     * @param $columns
     * @param $entity
     * @param $value
     * @return mixed
     * @throws FrontBadDevelopmentException
     */
    private function setColumnsToStore($columns, $entity, $value)
    {
        foreach ($columns as $property) {
            if ($property != 'id') {
                try {
                    if (array_key_exists($property, $value)) {
                        $entity->{$property} = $value[$property];
                    }
                } catch (\Exception $e) {
                    throw new FrontBadDevelopmentException(
                        'An object is required in the array when sending a relationship child.'
                    );
                }
            }
        }
        return $entity;
    }

    public function massiveUpdate(Request $request)
    {
        $request_query = $request->get('q');
        $queryFetcher = new QueryFetcher();
        $queryFetcher->setEntity(new $this->entity());
        $queryFetcher->setRequestQuery($request_query);
        $query = $queryFetcher->getQuery();
        $query->update($request->get('update'));
        $response = 'ok';
        return response()->json($response);
    }

    public function massiveDestroy(Request $request)
    {
        $request_query = $request->get('q');
        $queryFetcher = new QueryFetcher();
        $queryFetcher->setEntity(new $this->entity());
        $queryFetcher->setRequestQuery($request_query);
        $query = $queryFetcher->getQuery();
        $query->delete();
        $response = 'ok';
        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->getNewEntity()->find($id)->delete();
        return response(null, 204);
    }

    /**
     * @return mixed
     */
    private function getNewEntity()
    {
        $this->entity = $this->getModelFromClassName(get_called_class());
        return new $this->entity();
    }

    /**
     * @param Request $request
     * @return array|mixed
     */
    private function getRequestQuery(Request $request)
    {
        return json_decode($request->get('q')) ?? [];
    }

    private function getModelFromClassName($class)
    {
        $model = str_replace('App\Http\Controllers', '', $class);
        $model = 'App\\Models' . str_replace('Controller', '', $model);
        return $model;
    }
}
