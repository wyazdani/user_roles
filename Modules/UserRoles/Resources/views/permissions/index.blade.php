@extends('layouts.app')

@section('title')
    <title> Permissions | {{ config('app.name', 'Laravel') }}</title>
@stop
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h2>Permissions</h2>
                    </div>
                    <div class="pull-right btn-group">
                        <a href="{!! route('permissions.create') !!}" class="btn btn-success">Create Permissions</a>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>Permission Name</th>
                                <th>Permission For</th>
                                <th>Action</th>
                            </tr>
                            @foreach($permissions as $permission)
                            <tr>
                                <td>{{$permission->name}}</td>
                                <td>{{$permission->for}}</td>
                                <td>
                                    <ul class="icon-list">
                                        <li><a href="{!! route('permissions.edit',encrypt($permission->id)) !!}" ><i class="fal fa-edit"></i></a></li>
                                    </ul>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                    {{$permissions->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')

@endsection
