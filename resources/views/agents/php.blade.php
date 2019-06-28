
@php
    $var = '<?php

namespace App;

/**
* Class Handler
* @package App
*/
class Handler
{
/**
* @param $data
* @return
*/
public function handle($data) {
return "Hello world";
}
}';
@endphp

<editor value="{{ $var }}" @init="editorInit" lang="php" theme="chrome" width="100%" height="400"></editor>
