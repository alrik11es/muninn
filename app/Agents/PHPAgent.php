<?php
namespace App\Agents;

use App\Models\Agent;

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

    public function showForm($id = null)
    {
        if ($id) {
            $agent = Agent::find($id);
            $agent->agent_config = json_decode($agent->agent_config) ?? null;
        } else {
            $agent = [];
        }
        $contents = view('agents/php', ['agent' => $agent])->render();
        return $contents;
    }
}
