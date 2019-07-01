
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

<editor>{{ $var }}</editor>
