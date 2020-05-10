@extends('layouts.app')

@section('title')
    <title> Users | {{ config('app.name', 'Laravel') }}</title>
@stop
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h2>Users</h2>
                    </div>
                    <div class="pull-right btn-group">
                        <a href="{!! route('users.create') !!}" class="btn btn-success">Create User</a>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Roles</th>
                                <th>Actions</th>
                            </tr>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        @foreach($user->user_roles as $role)
                                            {{$role->role->name}},
                                        @endforeach
                                    </td>
                                    <td>
                                        <ul class="icon-list">
                                            <li><a href="{!! route('users.edit',encrypt($user->id)) !!}" ><i class="fal fa-edit"></i></a></li>
                                        </ul>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    {{$users->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')

@endsection
