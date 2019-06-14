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
            <div class="card-header">Your Agents</div>

            <div class="card-body">

                <table class="table table-striped">
                    <thead class="thead-dark">
                    <tr>
                        <th></th>
                        <th><a class="" href="/agents?sort=name.asc">Name</a></th>
                        <th><a class="selected desc" href="/agents?sort=created_at.asc">Age</a></th>
                        <th>Schedule</th>
                        <th><a class="" href="/agents?sort=last_check_at.desc">Last Check</a></th>
                        <th><a class="" href="/agents?sort=last_event_at.desc">Last Event Out</a></th>
                        <th><a class="" href="/agents?sort=last_receive_at.desc">Last Event In</a></th>
                        <th>Events Created</th>
                        <th>Working?</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($agents as $agent)
                        <tr>
                            <td class="">
                                <span class="glyphicon glyphicon-unchecked"></span>
                            </td>
                            <td class="">
                                <a href="/agents/43?return=%2Fagents">Numero motos controller</a>
                                <br>
                                <span class="text-muted">Website Agent</span>
                            </td>
                            <td class="">
                                ~11h
                            </td>
                            <td class="">
                                Every 12h
                            </td>
                            <td class="">
                                ~10h ago
                            </td>
                            <td class="">
                                ~10h ago
                            </td>
                            <td class="">
                                never
                            </td>
                            <td class="">
                                <a href="/agents/43/events?return=%2Fagents">1</a>
                            </td>
                            <td><span class="label label-success">Yes</span></td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                        <span class="glyphicon glyphicon-th-list"></span> Actions <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a tabindex="-1" rel="nofollow" data-method="post" href="/agents/43/run?return=%2Fagents"><span class="glyphicon glyphicon-refresh color-success"></span> Run</a>
                                        </li>

                                        <li>
                                            <a data-action-url="/agents/43/dry_runs" data-with-event-mode="maybe" tabindex="-1" onclick="Utils.handleDryRunButton(this)" href="#"><span class="glyphicon glyphicon-refresh"></span> Dry Run</a>
                                        </li>

                                        <li>
                                            <a href="/agents/43?return=%2Fagents"><span class="glyphicon glyphicon-eye-open"></span> Show</a>
                                        </li>

                                        <li class="divider"></li>

                                        <li>
                                            <a href="/agents/43/edit?return=%2Fagents"><span class="glyphicon glyphicon-pencil"></span> Edit agent</a>
                                        </li>

                                        <li>
                                            <a tabindex="-1" href="/agents/new?id=43"><i class="fa fa-copy"></i> Clone agent</a>
                                        </li>

                                        <li>
                                            <a data-toggle="modal" data-target="#confirm-agent43" href="#">
                                                <span class="glyphicon glyphicon-pause"></span> Disable agent
                                            </a>  </li>


                                        <li class="divider"></li>

                                        <li>
                                            <a data-confirm="Are you sure you want to delete ALL emitted events for this Agent?" tabindex="-1" rel="nofollow" data-method="delete" href="/agents/43/remove_events?return=%2Fagents"><span class="glyphicon glyphicon-trash color-danger"></span> Delete all events</a>
                                        </li>

                                        <li>
                                            <a data-confirm="Are you sure that you want to permanently delete this Agent?" tabindex="-1" rel="nofollow" data-method="delete" href="/agents/43?return=%2Fagents"><span class="glyphicon glyphicon-remove color-danger"></span> Delete agent</a>
                                        </li>
                                    </ul>

                                    <div id="confirm-agent43" class="confirm-agent modal fade" tabindex="-1" role="dialog" aria-labelledby="confirmAgentLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                                    <h4 class="modal-title">Confirm</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Disable "Numero motos controller"?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <form class="edit_agent" id="edit_agent" action="/agents/43?return=%2Fagents" accept-charset="UTF-8" method="post"><input name="utf8" type="hidden" value="✓"><input type="hidden" name="_method" value="put"><input type="hidden" name="authenticity_token" value="FQDSrX8eGnhp+YWITs/FHDekimxAZwi/mjacd6znYCs/fdBgdu9/JlYE0M6SNKOUxELNJ61MlCiGD1S16fLWlA==">
                                                        <input value="true" type="hidden" name="agent[disabled]" id="agent_disabled">
                                                        <button name="button" type="submit" class="btn btn-default" data-dismiss="modal">No</button>
                                                        <input type="submit" name="commit" value="Yes" class="btn btn-primary" data-disable-with="Yes">
                                                    </form>      </div>
                                            </div>
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
                    <a class="btn btn-default" href="/agents/new"><span class="glyphicon glyphicon-plus"></span> New Agent</a>
                    <a class="btn btn-default" href="/agents/agent_imports/new"><span class="glyphicon glyphicon-cloud-upload"></span> Import Agent</a>
                </div>

            </div>
        </div>

    </div>
@endsection
