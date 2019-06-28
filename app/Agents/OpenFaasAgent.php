<?php
namespace App\Agents;

class OpenFaasAgent
{
    public function getName()
    {
        return 'Open FaaS function call Agent';
    }

    public function getDescription()
    {
        return 'This agent calls a **defined** Open FaaS function';
    }

    public function run($event)
    {
        
    }

    public function showForm()
    {
        $contents = view('agents/openfaas', ['openfaas_functions' => ['f1', 'f2']])->render();
        return $contents;
    }
}
