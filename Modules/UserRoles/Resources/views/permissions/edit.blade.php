@extends('layouts.app')
@section('title')
    <title> Update Permissions | {{ config('app.name', 'Laravel') }}</title>
@stop
@section('content')
    <form action="{{route('permissions.update',$permission->id)}}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PATCH')
        <div class="row">
            <div class="col-lg-12">
                <div class="panel">
                    <div class="panel-heading">
                        <h2>Update Permissions</h2>
                    </div>
                    <div class="panel-body">
                        <div class="form-row">
                            <div class="{!! ($errors->has('name')) ?'form-group col-md-12 has-error':'form-group col-md-12' !!}">

                                <label>Name</label>
                                <input type="text" class="form-control" name="name" value="{{$permission->name}}">
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
                                    <label for="for">Permission for</label>
                                    <select name="for" id="for" class="form-control">
                                        <option selected disable>Select Permission for</option>
                                        <option value="user" {{$permission->for == 'user' ?'selected':''}}>User</option>
                                        <option value="post" {{$permission->for == 'post' ?'selected':''}}>Post</option>
                                        <option value="role" {{$permission->for == 'role' ?'selected':''}}>Role</option>
                                        <option value="other" {{$permission->for == 'other' ?'selected':''}}>Other</option>
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
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
