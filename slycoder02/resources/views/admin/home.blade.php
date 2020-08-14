@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    <h4>All Users</h4>
                    <ul>
                        <li><a href="/displayusers">Show Users</a></li>
                    </ul>
                    <br/>

                    <h3>WebApps Admin</h3>
                    <h4>Foodbanks</h4>
                    <ul>
                        <li><a href="/webapps/foodbank/showcities">Show/Add Cities</a></li>
                        <li><a href="/webapps/foodbank/showAdminList">Show/Add/Edit FoodBanks</a></li>
                    </ul>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection