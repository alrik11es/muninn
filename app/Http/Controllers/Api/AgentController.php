<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;

class AgentController extends Controller
{
    public function index()
    {
        $data = new \stdClass();

        $data->list = [];
        foreach (Config::get('muninn.agents') as $classname) {
            $a = new \stdClass();
            $agent = new $classname();
            $a->classname = $classname;
            $a->name = $agent->getName();
            $a->description = $agent->getDescription();
            $data->list[] = $a;
        }

        return response()->json($data);
    }
}
