@extends('layouts.app')
@section('title')
    <title> Create Role | {{ config('app.name', 'Laravel') }}</title>
@stop
@section('content')
    <form action="{{route('roles.store')}}" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="row">
            <div class="col-lg-12">
                <div class="panel">
                    <div class="panel-heading">
                        <h2>Create Role</h2>
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
                            <div class="{!! ($errors->has('description')) ?'form-group col-md-12 has-error':'form-group col-md-12' !!}">
                                <label>Description</label>
                                <textarea class="form-control" name="description">{{old('description')}}</textarea>
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
                                            <label><input type="checkbox" name="permission[]" value="{{ $permission->id }}">{{ $permission->name }}</label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>


                        <div class="pull-right">
                            <a href="{!! route('roles.index') !!}" class="btn btn-danger">Cancel</a>
                            <button type="submit" class="btn btn-success">Create</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
<script src="{{ url('/js/jquery.min.js') }}"></script>

<script>
    $(document).ready(function(){
        $(document).on('click', '.role-permission', function(){
            var roleName = $(this).attr('data-role');
            var page = $(this).attr('data-page');
            var key = $(this).attr('data-key');
            var val = 0;
            if($(this).is(':checked')){ val = 1; }
            $.ajax({
                type: "post",
                url: "{{ url('/permission') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    role: roleName,
                    page: page,
                    key: key,
                    value: val
                },
                success: function(){
                    console.log('Assigned - ' + key + ' = ' + val + ' - to ' + roleName);
                },
                error: function(err){
                    console.log(err);
                }
            });
        });
    });
</script>
