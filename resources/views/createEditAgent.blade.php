@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Create agent</div>

            <div class="card-body">

                <form class="new_scenario" id="new_scenario" action="/scenarios" accept-charset="UTF-8" method="post">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="scenario_name">Name</label>
                        <input class="form-control" placeholder="Name your Scenario" type="text" name="scenario[name]" id="scenario_name" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;">
                    </div>


{{--                    <div class="row">--}}
{{--                        <div class="col-md-4">--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="scenario_name">Name</label>--}}
{{--                                <input class="form-control" placeholder="Name your Scenario" type="text" name="scenario[name]" id="scenario_name" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-2">--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="scenario_tag_bg_color">O</label>--}}
{{--                                <input class="form-control" value="#5BC0DE" type="color" name="scenario[tag_bg_color]" id="scenario_tag_bg_color">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-2">--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="scenario_tag_fg_color">Tag Foreground Color</label>--}}
{{--                                <input class="form-control" value="#FFFFFF" type="color" name="scenario[tag_fg_color]" id="scenario_tag_fg_color">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="row">--}}
{{--                        <div class="col-md-8">--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="scenario_description">Optional Description</label>--}}
{{--                                <textarea rows="10" class="form-control" placeholder="Optionally describe what this Scenario will do.  If this will be public, you should also include some contact information." name="scenario[description]" id="scenario_description"></textarea>--}}
{{--                            </div>--}}

{{--                            <div class="checkbox">--}}
{{--                                <label for="scenario_public">--}}
{{--                                    <input name="scenario[public]" type="hidden" value="0"><input type="checkbox" value="1" name="scenario[public]" id="scenario_public"> Share this Scenario publicly--}}
{{--                                </label>        <span class="glyphicon glyphicon-question-sign hover-help" data-content="When selected, this Scenario and all Agents in it will be made public.  An export URL will be available to share with other Huginn users.  Be very careful that you do not have secret credentials stored in these Agents' options.  Instead, use Credentials by reference." data-original-title="" title=""></span>--}}
{{--                            </div>--}}

{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="row">--}}
{{--                        <div class="col-md-4">--}}
{{--                            <div class="form-group">--}}
{{--                                <div>--}}
{{--                                    <label for="scenario_agents">Agents</label>--}}
{{--                                    <tags></tags>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-actions" style="clear: both">
                                <input type="submit" name="commit" value="Save Scenario" class="btn btn-primary" data-disable-with="Save Scenario">
                            </div>
                        </div>
                    </div>
                </form>

                <hr>

                <div class="row">
                    <div class="col-md-12">
                        <a class="btn btn-default" href="/scenarios"><span class="glyphicon glyphicon-chevron-left"></span> Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
