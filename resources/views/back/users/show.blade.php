@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="h2 font-weight-light">@lang('users.show-user')</h1>
            <a class="btn btn-primary btn-sm mt-3" href="{{ route('users.index') }}"><i class="icon ion-arrow-left-a"></i>@lang('menu.back')</a>
        </div>
    </div>
    <hr>
    <div class="px-4 pt-4 pb-1">

        <dl class="row">
            <dt class="col-sm-4 col-md-3">@lang('users.name'):</dt>
            <dd class="col-sm-8 col-md-9">{{ $user->name }}</dd>

            <dt class="col-sm-4 col-md-3">@lang('users.email'):</dt>
            <dd class="col-sm-8 col-md-9">{{ $user->email }}</dd>

            <dt class="col-sm-4 col-md-3">@lang('users.roles'):</dt>
            <dd class="col-sm-8 col-md-9">
                @if(!empty($user->roles))
                    @foreach($user->roles as $v)
                        <label class="badge badge-info">{{ $v->display_name }}</label>
                    @endforeach
                @endif
            </dd>
        </dl>
    </div>
@endsection