@extends('layouts.app')

@section('content')


<section class="set1 card">
    <article class="block1 card-header">
        <h1 class="text-center">Food Banks</h1>
    </article>
    <div id="blockapp" class="card-body">

        <form action="FoodBank" method="POST">
            <div class="row">
                <label class="col-1" for="name">Name</label> <input type="text" class="col-11" name='name'
                    value="{{old('name')}}"><br />
            </div>
            <div class="row">
                <label class="col-1" for="phone">Phone</label> <input type="text" class="col-5" name='phone'
                    value="{{old('phone')}}"><br />
            </div>
            <div class="row">
                <label class="col-1" for="address">Address</label> <input type="text" class="col-11" name='address'
                    value="{{old('address')}}"><br />
            </div>
            <div class="row">
                <label class="col-1" for="address2">Address2</label> <input type="text" class="col-11" name='address2'
                    value="{{old('address2')}}"><br />
            </div>
            <div class="row">
                <label class="col-1" for="days">Days</label> <input type="text" class="col-11" name='days'
                    value="{{old('days')}}"><br />
            </div>
            <div class="row">
                <label class="col-1" for="starttime">Start Time</label> <input type="text" class="col-5"
                    name='starttime' value="{{old('starttime')}}"><br />
            </div>
            <div class="row">
                <label class="col-1" for="endtime">End Time</label> <input type="text" class="col-5" name='endtime'
                    value="{{old('endtime')}}"><br />
            </div>
            <div class="row">
                <label class="col-1" for="notes">Notes</label> <input type="text" class="col-11" name='notes'
                    value="{{old('notes')}}"><br />
            </div>
            <div class="row">
                <label class="col-1" for="notes2">Notes2</label> <input type="text" class="col-11" name='notes2'
                    value="{{old('notes2')}}"><br />
            </div>
            <input type="submit" class="btn btn-primary" value="Add Food Bank">
            <div class="text-danger">
                {{ $errors -> first('name') }}
            </div>
            @csrf
        </form>


        @if(count($fbs)>0)
        <ul>
            @foreach($fbs as $fb)
            <li>{{$fb -> name}}</li>
            @endforeach
        </ul>
        @endif
    </div>
</section>


@endsection