<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- bootstrap -->
    <link rel="stylesheet" href="{{ elixir('css/app.min.css') }}">
    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"--}}
          {{--integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">--}}
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
</head>
<body>
<div id="app">
    <div id="app-modal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success btn-sm submit-form">{{ __('menu.yes') }}</button>
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">{{ __('menu.no') }}</button>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    @if(Auth::check())
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/home') }}"><i class="icon ion-home"></i>@lang('menu.home')</a>
                        </li>
                        @permission('user-*')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('users.index') }}"><i class="icon ion-person-stalker"></i>@lang('menu.users')</a>
                        </li>
                        @endpermission
                        @permission('role-*')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('roles.index') }}"><i class="icon ion-clipboard"></i>@lang('menu.roles')</a>
                        </li>
                        @endpermission
                        @permission('permission-*')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('permissions.index') }}"><i class="icon ion-unlocked"></i>@lang('menu.permissions')</a>
                        </li>
                        @endpermission
                    @endif
                </ul>
                <ul class="navbar-nav">
                    @if(!Auth::check() || (Auth::check() && UserSettings::get('lang') === 'default'))
                        <li class="nav-item">
                            <a class="nav-link dropdown-toggle" style="cursor: pointer" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="icon ion-earth"></i>{{ __('lang.' . App::getLocale()) }}
                            </a>
                            <div class="dropdown mt-1 mr-2">
                                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                    @foreach(config('lang') as $lang)
                                        @if($lang !== App::getLocale())
                                            <a class="dropdown-item" href="{{ url('/lang/switch/' . $lang) }}">{{ config('lang-names.' . $lang) }}</a>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </li>
                    @endif
                    @if (Auth::guest())
                        <li class="nav-item"><a href="{{ route('login') }}" class="nav-link"><i class="icon ion-log-in"></i>@lang('auth.login')</a></li>
                        <li class="nav-item"><a href="{{ route('register') }}" class="nav-link"><i class="icon ion-forward"></i>@lang('auth.register')</a></li>
                    @else
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink"
                               data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                                <i class="icon ion-person"></i>{{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="{{ route('users.change-password') }}"><i class="icon ion-key"></i>@lang('menu.change-password')</a>
                                <a class="dropdown-item" href="{{ route('user-settings.edit') }}"><i class="icon ion-gear-b"></i>@lang('menu.user-settings')</a>
                                <div class="dropdown-divider"></div>
                                <a href="{{ route('logout') }}" class="dropdown-item"
                                   onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    <i class="icon ion-log-out"></i>Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </li>
                    @endif
                </ul>
            </div>

        </div>
    </nav>
    <div class="container pt-4">
        @if (count($errors) > 0)
            <div class="alert alert-danger alert-dismissible fade show">
                <strong>@lang('validation.whops')</strong> @lang('validation.was-problem')<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ $message }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @yield('content')
    </div>
</div>

<!-- JQuery, Popper and Bootstrap -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

<script type="text/javascript">

    $(document).ready(function(){

        $('.submit').click(function(){

            var appModal = $('#app-modal');
            var submitButton = $(this);

            appModal.find('.modal-title').html($(this).data('title'));
            appModal.find('.modal-body p').html($(this).data('message'));
            appModal.modal('show');

            appModal.find('.submit-form').click(function(){
                $('#' + submitButton.data('form')).submit();
            });
        });

    });
</script>
</body>
</html>
