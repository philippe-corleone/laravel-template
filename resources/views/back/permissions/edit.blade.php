@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="h2 font-weight-light">@lang('permissions.edit-permission')</h1>
            <a class="btn btn-primary btn-sm mt-3" href="{{ route('permissions.index') }}"><i class="icon ion-arrow-left-a"></i>@lang('menu.back')</a>
        </div>
    </div>

    <hr>

    {!! Form::model($permission, ['method' => 'PATCH','route' => ['permissions.update', $permission->id], 'class' => 'form-horizontal']) !!}

        <div class="px-4 pt-4 pb-1">

            <div class="form-group row">
                <label class="col-12 col-sm-3 col-lg-2 col-form-label">@lang('permissions.name'):</label>
                <div class="col-sm-9 col-lg-5">{!! Form::text('name', null, ['class' => 'form-control' . (($errors->has('name') ? ' is-invalid' : ''))]) !!}</div>
            </div>

            <div class="form-group row">
                <label class="col-12 col-sm-3 col-lg-2 col-form-label">@lang('permissions.display_name'):</label>
                <div class="col-sm-9 col-lg-5 col-lg-3">{!! Form::text('display_name', null, ['class' => 'form-control' . (($errors->has('display_name') ? ' is-invalid' : ''))]) !!}</div>
            </div>

            <div class="form-group row">
                <label class="col-12 col-sm-3 col-lg-2 col-form-label">@lang('permissions.description'):</label>
                <div class="col-sm-9 col-lg-5 col-lg-3">{!! Form::textarea('description', null, ['class' => 'form-control' . (($errors->has('description') ? ' is-invalid' : '')), 'rows' => 3]) !!}</div>
            </div>
        </div>

        <hr>

        <div class="form-group row">
            <div class="col-12">
                <button type="submit" class="btn btn-primary btn-sm">@lang('permissions.edit-permission')</button>
            </div>
        </div>
    {!! Form::close() !!}
@endsection