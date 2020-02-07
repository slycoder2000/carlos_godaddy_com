@extends('layouts.slycoder')

@section('content')

<section id="showcase">
    <div id="banner">
        <h1>Welcome to <br />
            Slycoder.com</h1>
    </div>

    <div id="desc">
        Services

        @if(count($services)>0)
        <ul>
            @foreach($services as $service)
            <li>{{$service}}</li>
            @endforeach
        </ul>
        @endif


    </div>
</section>

@endsection