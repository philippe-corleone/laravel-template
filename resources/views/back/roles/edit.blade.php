@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="h2 font-weight-light">@lang('roles.edit-role')</h1>
            <a class="btn btn-primary btn-sm mt-3" href="{{ route('roles.index') }}"><i class="icon ion-arrow-left-a"></i>@lang('menu.back')</a>
        </div>
    </div>

    <hr>

    {!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}
        <div class="px-4 pt-4 pb-1">

            <div class="form-group row">
                <label class="col-12 col-sm-3 col-lg-2 col-form-label">@lang('roles.display_name'):</label>
                <div class="col-sm-9 col-lg-5">{!! Form::text('display_name', null, ['class' => 'form-control' . (($errors->has('display_name') ? ' is-invalid' : ''))]) !!}</div>
            </div>

            <div class="form-group row">
                <label class="col-12 col-sm-3 col-lg-2 col-form-label">@lang('roles.description'):</label>
                <div class="col-sm-9 col-lg-5">{!! Form::textarea('description', null, ['class' => 'form-control' . (($errors->has('description') ? ' is-invalid' : '')), 'rows' => 3]) !!}</div>
            </div>

            <div class="form-group row">
                <label class="col-12 col-sm-3 col-lg-2 col-form-label">@lang('roles.permissions'):</label>
                <div class="col-sm-9 col-lg-5">
                @foreach($permission as $value)
                    <div class="input-group my-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                {{ Form::checkbox("permissions[]", $value->id, in_array($value->id, $rolePermissions) ? true : false, ['class' => 'form-input-check']) }}
                            </div>
                        </div>
                        <div class="input-group-append">
                            <label class="input-group-text">{{ $value->display_name }}</label>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>

            <hr>

            <div class="form-group">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary btn-sm">@lang('roles.edit-role')</button>
                </div>
            </div>
        </div>
    {!! Form::close() !!}
@endsection