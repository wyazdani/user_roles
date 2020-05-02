<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('title')
    <link rel="icon" type="image/png" href="{!! asset('images/favicon.png') !!}"/>
    <link rel="stylesheet" href="{!! asset('css/datatable.css') !!}">
    <link media="all" rel="stylesheet" type="text/css" href="{!! asset('css/admin.css') !!}" />
</head>
<body>
<div id="wrapper" class="{!! empty(auth()->user())?'login':'' !!}">
    @if (!empty(auth()->user()))
        <header id="header">
            <div class="logo">
                {{--<a href="{!! route('admin.index') !!}">--}}
                    <?php /*$logo =   \App\Helpers\Settings::get_logo();*/?>
                    <img src="" alt="UserRoles" style="width: 100%">
                {{--</a>--}}
            </div>
            <div class="topbar">
                <ul class="header-list-right">
                    <li class="user-account dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle"  id="useraccount" data-toggle="dropdown"><i class="fal fa-user-circle"></i>  </a>
                        <ul class="dropdown-menu" aria-labelledby="useraccount">
                            {{--<li><a href="javascript:void(0);"><i class="fal fa-user-plus"></i> <span>My profile</span></a></li>--}}
                            <li class="divider"></li>
                            {{--<li><a href="#"><i class="fal fa-cogs"></i> <span>Account settings</span></a></li>--}}
                            <li><a  href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fal fa-sign-out-alt"></i>
                                    <span>Logout</span>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                    {{--<li>
                        <a href="javascript:void(0);"><i class="fal fa-bell"></i> </a>
                    </li>--}}
                </ul>
            </div>
            <nav class="sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        @if(hasrole('admin') )
                            @include('sidebar.admin-sidebar')
                        @elseif(hasrole('manager'))
                            @include('sidebar.user-sidebar')
                        @endif
                    </ul>
                </div>
            </nav>

        </header>
    @endif

    <main id="main">
        <div class="container-fluid">
            @yield('content')
        </div>
    </main>
    <div data-backdrop="static" id="secondary_modal" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">

        </div>
    </div>

    <div data-backdrop="static" id="default_modal" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">

        </div>
    </div>
</div>
<script src="{{ url('js/jquery.js') }}"></script>
<script src="{{ url('js/admin.js') }}"></script>
@yield('scripts')
</body>
</html>
