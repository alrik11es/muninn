<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class AgentController extends Controller
{
    public function index()
    {
        return response()->json(Agent::all());
    }

    public function types()
    {
        $data = new \stdClass();

        $data->list = [];
        $i = 0;
        foreach (Config::get('muninn.agents') as $classname) {
            $a = new \stdClass();
            $agent = new $classname();
            $a->index = $i;
            $a->classname = $classname;
            $a->name = $agent->getName();
            $a->text = $agent->getName();
            $a->description = $agent->getDescription();
            $a->form = $agent->showForm();
            $data->list[] = $a;
            $i++;
        }

        return response()->json($data);
    }
}
