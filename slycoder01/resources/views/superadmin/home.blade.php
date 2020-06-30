@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">
            Super Admin Dashboard

                <div>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div>
                    This is Admin Dashboard. You must be super privileged to be here !
                    </div>

                    <div class="card">
                        <h4 class="card-header">All Users</h4>
                        <div class="card-body">
                        <ul>
                            <li><a href="/displayusers">Show Users</a></li>
                        </ul>
                        </div>
                    </div>

                </div>
        </div>
    </div>
</div>
@endsection