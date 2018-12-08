
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
            <div class="card-header">Your Users</div>

            <div class="card-body">

                <table class="table table-striped">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">State</th>
                        <th scope="col">Active agents</th>
                        <th scope="col">Deactivated agents</th>
                        <th scope="col">Registered since</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <th scope="row">{{ $user->name }}</th>
                        <th scope="row">{{ $user->email }}</th>
                        <th scope="row">{{ $user->email_verified_at }}</th>
                        <td>X agents</td>
                        <td>X agents</td>
                        <td>{{ $user->created_at }}</td>
                        <td>
                            <div class="btn-group btn-group-xs" style="float: right">
                                <a class="btn btn-default" href="/users/{{$user->id}}">Show</a>
                                <a class="btn btn-default" href="/users/{{$user->id}}/edit">Edit</a>
                                <a data-toggle="modal" data-target="#confirm-user-deletion-{{$user->id}}" class="btn btn-default" href="#">Delete</a>
                                <div id="confirm-user-deletion-3" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form class="edit_user" id="edit_user_3" action="/users/3" accept-charset="UTF-8" method="post"><input name="utf8" type="hidden" value="✓"><input type="hidden" name="_method" value="delete"><input type="hidden" name="authenticity_token" value="zpcFcwJRE4qM5R4R8vcWXoq9pgdm0DK9RN08ow4Mi2Ga2L4F0NeDjgI2Ma0F3oICbWMmecqxlupAzxFrr/8ncQ==">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                                    <h4 class="modal-title">
                                                        How do you want to delete the Scenario 'Busqueda de clases (Mai)'?
                                                    </h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="mode" id="mode_" value="" checked="checked">
                                                            <h4><span class="label label-success">Scenario only</span></h4>
                                                            Only delete the Scenerio, keep the Agents.
                                                        </label>          </div>
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="mode" id="mode_unique_agents" value="unique_agents">
                                                            <h4><span class="label label-warning">Scenario and unique Agents</span></h4>
                                                            Also deletes Agents that are used in this Scenario only.
                                                        </label>          </div>
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="mode" id="mode_all_agents" value="all_agents">
                                                            <h4><span class="label label-danger">Scenario and all included Agents</span></h4>
                                                            Deletes Scenario and all included Agents, even if they are used in different Scenarios.
                                                        </label>          </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button name="button" type="submit" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                    <input type="submit" name="commit" value="Delete" class="btn btn-danger" data-disable-with="Delete">
                                                </div>
                                            </form>    </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                <br>
                <div class="btn-group">
                    <a class="btn btn-default" href="/users/new"><span class="glyphicon glyphicon-plus"></span> New User</a>
                </div>

            </div>
        </div>

    </div>
@endsection
