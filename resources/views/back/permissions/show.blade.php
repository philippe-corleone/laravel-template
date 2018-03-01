@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="h2 font-weight-light">@lang('permissions.show-permission')</h1>
            <a class="btn btn-primary btn-sm mt-3" href="{{ route('permissions.index') }}"><i class="icon ion-arrow-left-a"></i>@lang('menu.back')</a>
        </div>
    </div>
    <hr>
    <div class="px-4 pt-4 pb-1">

        <dl class="row">
            <dt class="col-sm-4 col-md-3">@lang('permissions.name'):</dt>
            <dd class="col-sm-8 col-md-9">{{ $permission->name }}</dd>

            <dt class="col-sm-4 col-md-3">@lang('permissions.display_name'):</dt>
            <dd class="col-sm-8 col-md-9">{{ $permission->display_name }}</dd>

            <dt class="col-sm-4 col-md-3">@lang('permissions.description'):</dt>
            <dd class="col-sm-8 col-md-9">{{ $permission->description }}</dd>
        </dl>

    </div>
@endsection