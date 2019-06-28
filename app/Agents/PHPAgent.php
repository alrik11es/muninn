<?php
namespace App\Agents;

class PHPAgent
{
    public function getName()
    {
        return 'PHP Agent';
    }

    public function getDescription()
    {
        return 'This agent calls PHP code';
    }

    public function run($event)
    {

    }

    public function showForm()
    {
        $contents = view('agents/php.blade.php', ['openfaas_functions' => ['f1', 'f2']])->render();
        return $contents;
    }
}
