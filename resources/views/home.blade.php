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
        <div class="card-header">Welcome to Muninn!</div>

        <div class="card-body">
    <div class='row'>
        <div class='col-md-6'>
            <p>
                You have created <span class="text-success">{{ $agents_count }} agents</span>.
            </p>
            <p>
                <a class="btn btn-primary" href="/agents">View <i class="icon-chevron-right"></i></a>
            </p>
        </div>
        <div class='col-md-6'>
            <p>
                Your agents have recorded
                <span class="text-success">{{ $recent_events_count }} events recently</span> and
                <span class="">{{ $events_count }} events in total</span>.
            </p>
            <p>
                <a class="btn btn-primary" href="/events">View <i class="icon-chevron-right"></i></a>
            </p>
        </div>
    </div>

    <div class='row' style='min-height: 250px'></div>

    <div class='row'>
        <div class='col-md-10'>
            <blockquote>
                <p>...two ravens named Huginn and Muninn sit on Odin's shoulders. The ravens tell Odin everything they see and
                    hear. Odin sends Huginn and Muninn out at dawn, and the birds fly all over the world before returning at
                    dinner-time. As a result, Odin is kept informed of many events.</p>
                <small><a href="http://en.wikipedia.org/wiki/Huginn_and_Muninn">Wikipedia</a>, in reference to
                    <em>Gylfaginning</em></small>
            </blockquote>
        </div>
        <div class='col-md-2'>
            <img class="img-responsive img-rounded" title="Wägner, Wilhelm. 1882. Nordisch-germanische Götter und Helden. Otto Spamer, Leipzig &amp; Berlin. Page 7."
                 width="150" src="/img/odin.jpg" />
        </div>
    </div>

</div>
</div>
</div>



</div>
@endsection
