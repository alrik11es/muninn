@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Create Open FaaS function</div>

            <div class="card-body">

                <form class="new_function" id="new_function" action="/functions" accept-charset="UTF-8" method="post">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="function_name">Name</label>
                        <input class="form-control" placeholder="Name your function" type="text" name="agent[name]"
                               id="function_name">
                    </div>

                    <div class="form-group">
                        <label for="function_name">Take from a git repository</label>
                        <input class="form-control" placeholder="git@github.com:alrik11es/muninn.git" type="text" name="agent[name]"
                               id="function_name">
                    </div>

                    <div class="form-group">
                        <label for="function_name">Private key</label>
                        <editor value="" @init="editorInit" lang="php" theme="chrome" width="100%" height="200"></editor>
                    </div>

                    <hr>

                    Or write your function (Handler.php)

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

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-actions">
                                <input type="submit" name="commit" value="Save Agent" class="btn btn-primary"
                                       data-disable-with="Save Function">
                            </div>
                        </div>
                    </div>
                </form>

                <hr>

                <div class="row">
                    <div class="col-md-12">
                        <a class="btn btn-default" href="/functions"><span
                                class="glyphicon glyphicon-chevron-left"></span> Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
