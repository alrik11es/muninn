<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Scenario;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class AgentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getNewEntity()
    {
        return new Agent();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entity = $this->getNewEntity();
        return view('agents', ['agents' => $entity->all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function createEdit(Request $request, $id = null)
    {
        if($id) {
            $entity = $this->getNewEntity();
            $object = $entity->where('id', $request->get('id'));
            return view('createEditAgent', ['agent' => $object]);
        } else {
            return view('createEditAgent');
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


        return response()->json($object);
    }
}
