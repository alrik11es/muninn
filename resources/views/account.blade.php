@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col">

                <form class="new_scenario" id="new_scenario" action="/scenarios" accept-charset="UTF-8" method="post">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="scenario_name">OpenFaaS URL:</label>
                        <input class="form-control" placeholder="eg: http://127.0.0.1:8080" type="text" name="agent[name]" id="scenario_name">
                    </div>

                    <div class="form-group">
                        <label for="openfaas_user">OpenFaaS user:</label>
                        <input class="form-control" type="text" name="agent[name]" id="openfaas_user">
                    </div>
                    <div class="form-group">
                        <label for="openfaas_token">OpenFaaS token:</label>
                        <input class="form-control" type="text" name="agent[name]" id="openfaas_token">
                    </div>


                </form>
            </div>
            <div class="col">
                <passport-clients></passport-clients>
                <passport-authorized-clients></passport-authorized-clients>
                <passport-personal-access-tokens></passport-personal-access-tokens>
            </div>
        </div>


    </div>
@endsection
