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
        return 'This is a **new** agent';
    }

    public function run($event)
    {

    }
}
