@can('users.dashboard',Auth::user())
<li class="nav-item @if(is_active('dashboard.index')) {{ ' active' }} @endif">
    <a class="nav-link" href="{!! route('dashboard.index') !!}">
        <i class="fal fa-tachometer"></i>
        Dashboard <span class="sr-only">(current)</span>
    </a>
</li>
@endcan
<li class="nav-item @if(is_active('users.index')) {{ ' active' }} @endif">
    <a class="nav-link" href="{!! route('users.index') !!}">
        <i class="fal fa-users"></i>
        Users
    </a>
</li>
<li class="nav-item @if(is_active('roles.index')) {{ ' active' }} @endif">
    <a class="nav-link" href="{!! route('roles.index') !!}">
        <i class="fal fa-user-tag"></i>
        Roles
    </a>
</li>
<li class="nav-item @if(is_active('permissions.index')) {{ ' active' }} @endif">
    <a class="nav-link" href="{!! route('permissions.index') !!}">
        <i class="fal fa-user-tag"></i>
        permissions
    </a>
</li>
