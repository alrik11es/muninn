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
            $object = Agent::find($id);
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
    public function store(Request $request, $id = null)
    {
        if ($id) {
            $agent = Agent::find($id);
        } else {
            /** @var Model $object */
            $agent = $this->getNewEntity();
        }

        $options = new \stdClass();
        $options->code = $request->get('code');

        $agent->agent_config = json_encode($options);
        $agent->name = $request->get('name');
        $agent->agent_class = $request->get('classname');
        $agent->user_id = \Auth::user()->id;
        $agent->hours_keep_events = $request->get('hours_keep_events');
        $agent->schedule = $request->get('schedule');
        $agent->propagate_immediately = false;
        $agent->working = false;
        $agent->save();

        return response()->redirectTo('/agents');
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
