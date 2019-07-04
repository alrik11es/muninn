@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Create agent</div>

            <div class="card-body">

                <form class="new_scenario" id="new_scenario" action="/agents/store/{{ $agent->id ?? null }}" accept-charset="UTF-8" method="post">
                    {{ csrf_field() }}

                    <agent-selector agent-id="{{$agent->id ?? null}}"></agent-selector>


                </form>

                <hr>

                <div class="row">
                    <div class="col-md-12">
                        <a class="btn btn-default" href="/agents"><span class="glyphicon glyphicon-chevron-left"></span> Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
