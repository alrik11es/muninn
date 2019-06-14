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
                        <input class="form-control" placeholder="Name your Agent" type="text" name="agent[name]" id="scenario_name" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;">
                    </div>



                    <agent-selector></agent-selector>

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
                        <a class="btn btn-default" href="/scenarios"><span class="glyphicon glyphicon-chevron-left"></span> Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
