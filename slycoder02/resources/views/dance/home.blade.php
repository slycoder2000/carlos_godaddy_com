@extends('layouts.app')

@section('content')
<section class="set1 card">
    <article class="block1 card-header row">
        <h3 class="col-xs-2">{{$title}}</h3>
        <div class="btn-group col-md-10 col-xs-12">
<!-- if parameter exists, check value -->
@php
if(isset($_GET['filter'])) {
    if($_GET['filter']==1) {
        $filter=0;
    } else {
        $filter=1;
    }
    } else {
        $filter=1;
    }

@endphp
        <a href="/webapps/dance?filter={{$filter}}" class="text-center btn-primary col-md-4 col-xs-4" role="button" class="">
@php
    if($filter==1) {
        echo "Showing [ALL] / Rose&nbsp;Favs";
    } else {
        echo "Showing All / [ROSE&nbsp;FAVS]";
    }

@endphp


        </a>
        <button type="button" class="btn-primary col-md-4 col-xs-2 text-center">Calendar</button>
        <button type="button" class="btn-primary col-md-4 col-xs-4">
        <form action="/webapps/dance/search", method="GET">
        <input placeholder="Search" name="search" style="width:100px">
        <img src="{{asset('images/magglass.png')}}" height="18px">
        </form>
        </button>
    </div>

    </article>


    <div id='accordion' style="padding:10px 10px 10px 10px">

        @if(count($dances)<1)
            <div class="col">No data in table
            </div>
        @else

        @foreach($dances as $dance)


        <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="heading{{$dance -> id}}">
            <h5 class="panel-title">
                <a href='{{$dance -> stepsheet}}' target="_blank">
                    <img src="{{asset( $dance -> stepsheet === '' ? 'images/nosteps.png' : 'images/steps.png' )}}" height="20px">
                </a>

                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#faq{{$dance -> id}}" aria-expanded='false' aria-controls="faq{{$dance -> id}}">
                    &nbsp;&nbsp;{{$dance -> dance}}
                </a>
            </h5>
        </div>
        <div id="faq{{$dance -> id}}" class="panel-collapse collapse in bg-secondary text-white" style='padding-left:5px' role="tabpanel" aria-labelledby="heading{{$dance -> id}}">
            <div class="panel-body">

            @php
        if($dance -> hlink <> "") {
            //$myfilename = public_path('storage') . "\\stepsheets\\" . $dance -> hlink; //local server
            $myfilename = "storage/stepsheets/" . $dance -> hlink; //godaddy server
            //  echo $myfilename;
            if (file_exists($myfilename)) {
                $myfile = fopen($myfilename, "r");

                // Output one line until end-of-file
                while(!feof($myfile)) {
                    echo fgets($myfile) . "<br>";
                }
                fclose($myfile);
            }
        }
        @endphp
        <hr><a href='{{$dance -> vid1}}' target='_blank' class='text-white bg-dark'>Video Tutorial</a>&nbsp;&nbsp;&nbsp; <a href='{{$dance -> stepsheet}}' target='_blank' class='text-white bg-dark'>View complete Stepsheet</a>
        <hr>
            </div>
        </div>
    </div>


        
        
        @endforeach
        {{$dances->appends(request()->input())->links()}}

        @endif
        </div>
    </div>

</section>
@endsection


