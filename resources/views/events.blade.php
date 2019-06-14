@extends('layouts.app')

@section('content')
    <div class="container">
        {{--<div class="row justify-content-center">--}}
        {{--<div class="col-md-8">--}}
        {{--<div class="card">--}}
        {{--<div class="card-header">Dashboard</div>--}}

        {{--<div class="card-body">--}}
        {{--@if (session('status'))--}}
        {{--<div class="alert alert-success" role="alert">--}}
        {{--{{ session('status') }}--}}
        {{--</div>--}}
        {{--@endif--}}

        {{--You are logged in!--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}

        <div class="card">
            <div class="card-header">Events</div>

            <div class="card-body">

                <table class="table table-striped">
                    <thead class="thead-dark">
                    <tr>
                        <th>Source</th>
                        <th>Created</th>
                        <th>Payload</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($events as $event)
                        <tr>
                            <td><a href="/events/39?return=%2Fevents">Emergencia Twitter Stream</a></td>
                            <td title="2019-06-13 09:45:06 +0200">41m ago</td>
                            <td class="payload">{"filter":"emergencia españa","count":1,"time":1560411906}</td>
                            <td>
                                <div class="btn-group btn-group-xs">
                                    <a class="btn btn-default" href="/events/5997?return=%2Fevents">Show</a>
                                    <a data-confirm="Are you sure you want to duplicate this event and emit the new one now?" class="btn btn-default" rel="nofollow" data-method="post" href="/events/5997/reemit">Re-emit</a>
                                    <a data-confirm="Are you sure?" class="btn btn-default" rel="nofollow" data-method="delete" href="/events/5997">Delete</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
