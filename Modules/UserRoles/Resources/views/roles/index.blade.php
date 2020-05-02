@extends('layouts.app')

@section('title')
    <title> Roles | {{ config('app.name', 'Laravel') }}</title>
@stop
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h2>Roles</h2>
                    </div>
                    <div class="pull-right btn-group">
                        <a href="{!! route('roles.create') !!}" class="btn btn-success">Create Role</a>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                            @foreach($roles as $role)
                            <tr>
                                <td>{{$role->name}}</td>
                                <td>{{$role->description}}</td>
                                <td>
                                    <ul class="icon-list">
                                        <li><a href="{!! route('roles.edit',$role->id) !!}" ><i class="fal fa-edit"></i></a></li>
                                    </ul>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                    {{$roles->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')

@endsection
