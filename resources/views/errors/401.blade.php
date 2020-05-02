@extends('layouts.app')
@section('title')
    401 Forbidden
@stop
@section('banner')
    <div class="banner" style="background-image: url({{asset('images/banner01.jpg')}})">
    </div>
@endsection
@section('content')
    <section class="section">
        <div class="container">
            <h2 class="text-uppercase" data-title="OOPS!">Error 401</h2>
            <p class="text-center">Access Forbidden</p>
        </div>
    </section>
@stop
