<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class AgentController extends Controller
{
    public function index()
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
            $a->description = $agent->getDescription();
            $data->list[] = $a;
            $i++;
        }

        return response()->json($data);
    }


    public function renderForm(Request $request)
    {
        foreach (Config::get('muninn.agents') as $classname) {
            if ($classname == $request->get('class')) {
                $a = new \stdClass();
                $agent = new $classname();
                return $agent->showForm();
            }
        }
    }
}
