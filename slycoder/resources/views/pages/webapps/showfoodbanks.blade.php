@extends('layouts.slycoder')

@section('content')


<section class="set1 card">
    <article class="block1 card-header">
        <h1 class="text-center">Food Banks</h1>
    </article>
    <div id="blockapp" class="card-body">


        @if(count($fbcs)>0)
        @php
        date_default_timezone_set("America/Denver");
        //echo date_default_timezone_get();
        $today = getdate();
        //print_r($today);

        $fbStatus = "*** CLOSED ***";

        function checkStatus($today, $fbStatus, $calcDay, $calcDayNum) {
        if ($fbStatus == "*** OPEN ***") return "*** OPEN ***";
        if ($calcDay !== 'undefined' && $calcDayNum !== 'undefined') {

        if ($calcDay == $today && ($calcDayNum == "0" || $calcDayNum == 1)) {
        return "*** OPEN ***";
        }

        }
        return "*** Closed ***";

        }


        function checkAllStatus($today,$fb) {
        $fbStatus = "*** CLOSED ***";

        for($icount = 1; $icount<=7; $icount++) {
             $fbStatus=checkStatus($today['weekday'], $fbStatus, $fb['calcDay'.$icount], $fb['calcDayNum'.$icount]); 
        } 
        return $fbStatus; 
        } 
        //echo($today['weekday']); 
        @endphp
        @foreach($fbcs as $fbc) 
        @php $fbc_nospace=str_replace(' ','',$fbc -> city);
        @endphp

        <section id='{{$fbc_nospace}}'>
            <div>
                <div class='container'>
                    <h2><button type='button' data-toggle='collapse' data-target='#collapse{{$fbc_nospace}}'
                            aria-expanded='true' aria-controls='collapse{{$fbc_nospace}}'>
                            {{$fbc -> city}}</button></h2>
                    <div id='collapse{{$fbc_nospace}}' class='card-deck collapse hide' aria-labelledby='headingOne'
                        data-parent='#{{$fbc_nospace}}' style='padding-bottom:40px;'>

                        @if(count($fbs)>0)

                        @foreach($fbs as $fb)
                        @if($fb['cityref']==$fbc['city'])
                        <div class='card' style='min-width: 12rem' ;>
                            <div class='card-body'>
                                <h5 class='card-title'>{{$fb -> name}}</h5><br>
                                {{$fb -> phone}}<br>
                                @php
                                echo("<a href='https://www.google.com/maps/place/");
                                    echo(urlencode($fb -> address));
                                    
                                    echo("' target='_new'>");
                                    $fbStatus= checkAllStatus($today, $fb);
                                    @endphp {{$fb -> address}}
                                    @if(isset($fb -> address2))</br>{{$fb -> address2}}
                                    @endif </a></br>

                                {{$fb -> days}}<br>
                                {{$fb -> starttime}} - {{$fb -> endtime}}<br>

                                @if($fbStatus=='*** OPEN ***')
                                <span class='alert-success'>
                                    @else
                                    <span class='text-danger'>
                                        @endif
                                        {{$fbStatus}}</span>



                            </div>
                        </div>
                        @endif
                        @endforeach

                        @endif
                    </div>

                </div>
            </div>
</section>
@endforeach
@endif


</div>
</section>


@endsection