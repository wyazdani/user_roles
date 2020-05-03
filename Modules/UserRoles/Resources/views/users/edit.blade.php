@extends('layouts.app')
@section('title')
    <title> Update User | {{ config('app.name', 'Laravel') }}</title>
@stop
@section('content')
    <form action="{{route('users.update',$user->id)}}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PATCH')
        <div class="row">
            <div class="col-lg-12">
                <div class="panel">
                    <div class="panel-heading">
                        <h2>Update User</h2>
                    </div>
                    <div class="panel-body">
                        <div class="form-row">
                            <div class="{!! ($errors->has('name')) ?'form-group col-md-6 has-error':'form-group col-md-6' !!}">

                                <label>Name</label>
                                <input type="text" class="form-control" name="name" value="{{$user->name}}">
                                @error('name')
                                <span class="text-danger small">
                                    {{ $message }}
                            </span>
                                @enderror
                            </div>
                            <div class="{!! ($errors->has('email')) ?'form-group col-md-6 has-error':'form-group col-md-6' !!}">

                                <label>Email</label>
                                <input type="email" class="form-control" name="email" value="{{$user->email}}">
                                @error('email')
                                <span class="text-danger small">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="{!! ($errors->has('password')) ?'form-group col-md-6 has-error':'form-group col-md-6' !!}">

                                <label>Password</label>
                                <input type="password" class="form-control" name="password" value="{{old('password')}}">
                                @error('password')
                                <span class="text-danger small">
                                    {{ $message }}
                            </span>
                                @enderror
                            </div>
                            <div class="{!! ($errors->has('password_confirmation')) ?'form-group col-md-6 has-error':'form-group col-md-6' !!}">

                                <label>Confirm Password</label>
                                <input type="password" class="form-control" name="password_confirmation" value="{{old('password_confirmation')}}">
                                @error('password_confirmation')
                                <span class="text-danger small">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="{!! ($errors->has('roles')) ?'form-group col-md-12 has-error':'form-group col-md-12' !!}">
                                <label>Select Roles</label>
                                <select class="form-control" id="select-roles" multiple="multiple" name="roles[]">
                                    @foreach($roles as $role)
                                        <option value="{{$role->id}}" >{{$role->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('roles')
                            <span class="text-danger small">
                                    {{ $message }}
                            </span>
                            @enderror
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
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#select-roles').multiselect();
            @foreach($user->user_roles as $role)
            $("#select-roles").multiselect('select', {{$role->role_id}});
            @endforeach
        });
    </script>
@endsection
