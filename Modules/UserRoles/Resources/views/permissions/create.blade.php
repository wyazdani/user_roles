@extends('layouts.app')
@section('title')
    <title> Create Permissions | {{ config('app.name', 'Laravel') }}</title>
@stop
@section('content')
    <form action="{{route('permissions.store')}}" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="row">
            <div class="col-lg-12">
                <div class="panel">
                    <div class="panel-heading">
                        <h2>Create Permissions</h2>
                    </div>
                    <div class="panel-body">
                        <div class="form-row">
                            <div class="{!! ($errors->has('name')) ?'form-group col-md-12 has-error':'form-group col-md-12' !!}">

                                <label>Name</label>
                                <input type="text" class="form-control" name="name" value="{{old('name')}}">
                                @error('name')
                                <span class="text-danger small">
                                    {{ $message }}
                            </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="{!! ($errors->has('for')) ?'form-group col-md-12 has-error':'form-group col-md-12' !!}">
                                <div class="form-group">
                                    <label for="for">Select Permission for</label>
                                    <select name="for" id="for" class="form-control">
                                        <option value="user">User</option>
                                        <option value="post">Post</option>
                                        <option value="role">Role</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                            </div>
                            @error('for')
                            <span class="text-danger small">
                                    {{ $message }}
                            </span>
                            @enderror
                        </div>
                        <div class="pull-right">
                            <a href="{!! route('permissions.index') !!}" class="btn btn-danger">Cancel</a>
                            <button type="submit" class="btn btn-success">Create</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
