@extends('layouts.slycoder')

@section('content')

<section id="showcase">
    
    <div id="banner"  class="animated slideInLeft">
        <h1 class="animated flipInX delay-1s">Welcome to <br />
            Slycoder.com</h1>
 <!--
https://github.com/daneden/animate.css     
 https://github.com/michalsnik/aos    
 
 <h1 class="animated infinite bounce delay-2s">Example</h1>
            <div
    data-aos="fade-up"
    data-aos-offset="200"
    data-aos-delay="50"
    data-aos-duration="1000"
    data-aos-easing="ease-in-out"
    data-aos-mirror="true"
    data-aos-once="false"
    data-aos-anchor-placement="top-center"
  >
<p>  This will use aos.</p>
  </div> -->
    </div>

    
    <div id="desc" class="animated slideInRight">
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