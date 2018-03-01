@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="h2 font-weight-light">@lang('roles.show-role')</h1>
            <a class="btn btn-primary btn-sm mt-3" href="{{ route('roles.index') }}"><i class="icon ion-arrow-left-a"></i>@lang('menu.back')</a>
        </div>
    </div>

    <hr>

    <div class="px-4 pt-4 pb-1">

        <dl class="row">
            <dt class="col-sm-4 col-md-3">@lang('roles.name'):</dt>
            <dd class="col-sm-8 col-md-9">{{ $role->display_name }}</dd>

            <dt class="col-sm-4 col-md-3">@lang('roles.description'):</dt>
            <dd class="col-sm-8 col-md-9">{{ $role->description }}</dd>

            <dt class="col-sm-4 col-md-3">@lang('roles.permissions'):</dt>
            <dd class="col-sm-8 col-md-9">
                @if(!empty($rolePermissions))
                    @foreach($rolePermissions as $v)
                        <span class="badge badge-info">{{ $v->display_name }}</span>
                    @endforeach
                @endif
            </dd>
        </dl>

    </div>
@endsection