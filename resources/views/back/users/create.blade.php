@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="h2 font-weight-light">@lang('users.create-user')</h1>
            <a class="btn btn-primary btn-sm mt-3" href="{{ route('users.index') }}"><i class="icon ion-arrow-left-a"></i>@lang('menu.back')</a>
        </div>
    </div>
    <hr>
    {!! Form::open(['route' => 'users.store','method'=>'POST']) !!}
        <div class="px-4 pt-4 pb-1">

            <div class="form-group row">
                <label class="col-12 col-sm-4 col-lg-3 col-form-label">@lang('users.name'):</label>
                <div class="col-sm-9 col-lg-5">{!! Form::text('name', null, ['class' => 'form-control' . (($errors->has('name') ? ' is-invalid' : ''))]) !!}</div>
            </div>

            <div class="form-group row">
                <label class="col-12 col-sm-4 col-lg-3 col-form-label">@lang('users.email'):</label>
                <div class="col-sm-9 col-lg-5">{!! Form::text('email', null, ['class' => 'form-control' . (($errors->has('email') ? ' is-invalid' : ''))]) !!}</div>
            </div>

            <div class="form-group row">
                <label class="col-12 col-sm-4 col-lg-3 col-form-label">@lang('users.password'):</label>
                <div class="col-sm-9 col-lg-5">{!! Form::password('password', ['class' => 'form-control' . (($errors->has('password') ? ' is-invalid' : ''))]) !!}</div>
            </div>

            <div class="form-group row">
                <label class="col-12 col-sm-4 col-lg-3 col-form-label">@lang('users.confirm-password'):</label>
                <div class="col-sm-9 col-lg-5">{!! Form::password('confirm-password', ['class' => 'form-control' . (($errors->has('confirm-password') ? ' is-invalid' : ''))]) !!}</div>
            </div>

            <div class="form-group row">
                <label class="col-12 col-sm-4 col-lg-3 col-form-label">@lang('users.roles'):</label>
                <div class="col-sm-9 col-lg-5">
                    @foreach($roles as $role)
                        <div class="input-group my-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    {{ Form::checkbox("roles[]", $role->id, null, ['class' => 'form-input-check']) }}
                                </div>
                            </div>
                            <div class="input-group-append">
                                <label class="input-group-text">{{ $role->display_name }}</label>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <hr>

        <div class="form-group row">
            <div class="col-12">
                <button type="submit" class="btn btn-primary btn-sm">@lang('users.create-user')</button>
            </div>
        </div>
    {!! Form::close() !!}
@endsection