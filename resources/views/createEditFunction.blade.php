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
                        <input class="form-control" placeholder="Name your Agent" type="text" name="agent[name]" id="function_name">
                    </div>


                    <editor v-model="content" @init="editorInit" lang="html" theme="chrome" width="500" height="100"></editor>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-actions" style="clear: both">
                                <input type="submit" name="commit" value="Save Agent" class="btn btn-primary" data-disable-with="Save Scenario">
                            </div>
                        </div>
                    </div>
                </form>

                <hr>

                <div class="row">
                    <div class="col-md-12">
                        <a class="btn btn-default" href="/functions"><span class="glyphicon glyphicon-chevron-left"></span> Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
