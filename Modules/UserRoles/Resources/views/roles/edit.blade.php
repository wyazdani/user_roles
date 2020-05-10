@extends('layouts.app')
@section('title')
    <title> Update Role | {{ config('app.name', 'Laravel') }}</title>
@stop
@section('content')
    <form action="{{route('roles.update',$role->id)}}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PATCH')
        <div class="row">
            <div class="col-lg-12">
                <div class="panel">
                    <div class="panel-heading">
                        <h2>Update Role</h2>
                    </div>
                    <div class="panel-body">
                        <div class="form-row">
                            <div class="{!! ($errors->has('name')) ?'form-group col-md-12 has-error':'form-group col-md-12' !!}">

                                <label>Name</label>
                                <input type="text" class="form-control" name="name" value="{{$role->name}}">
                                @error('name')
                                <span class="text-danger small">
                                    {{ $message }}
                            </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="{!! ($errors->has('description')) ?'form-group col-md-12 has-error':'form-group col-md-12' !!}">
                                <label>Description</label>
                                <textarea class="form-control" name="description">{{$role->description}}</textarea>
                            </div>
                            @error('description')
                            <span class="text-danger small">
                                    {{ $message }}
                            </span>
                            @enderror
                        </div>
                        <div class="row">
                                @foreach ($permissions as $permission)
                                    <div class="col-lg-3">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="permission[]" value="{{ $permission->id }}"
                                                          @foreach ($role->permissions as $role_permit)
                                                          @if ($role_permit->id == $permission->id)
                                                          checked
                                                    @endif
                                                    @endforeach
                                                >{{ $permission->name }}
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="pull-right">
                            <a href="{!! route('roles.index') !!}" class="btn btn-danger">Cancel</a>
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
