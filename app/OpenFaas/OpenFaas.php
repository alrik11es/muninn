<?php
namespace App\OpenFaas;

class OpenFaas
{
    public function existsOnSystem()
    {
        return $this->commandExist('faas');
    }

    public function commandExist($cmd) {
        $return = shell_exec(sprintf("which %s", escapeshellarg($cmd)));
        return !empty($return);
    }
}
