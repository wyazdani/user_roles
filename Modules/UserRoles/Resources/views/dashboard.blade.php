@extends('layouts.app')
@section('title')
    <title> Dashboard | {{ config('app.name', 'Laravel') }}</title>
@stop
@section('content')
    <div class="banner banner-content">
        <div class="row">
            <div class="col-md-12">
                <h1 style="text-transform: capitalize">{{auth()->user()->role->name}} dashboard</h1>
            </div>
        </div>
    </div>
    @if(hasrole('admin'))
    <div class="row">
        <div class="col-lg-12">
            <div class="panel">
                <div class="panel-heading">
                    <div class="row m-0">
                        <div class="pull-left">
                            <h2>User Statistics</h2>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="row referral text-center">
                        <div class="col">
                            <a href="{!! route('users.index') !!}">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title"><b>35</b></h5>
                                        <p class="card-text">Total Users</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title"><b>25</b></h5>
                                    <p class="card-text">Verified Users</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title"><b>10</b></h5>
                                        <p class="card-text">UnVerified Users</p>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
@endsection

@section('scripts')

@endsection
