@extends('layouts.app')

@section('content')
    <div class="row justify-content-md-center mt-5">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">@lang('auth.change-password')</div>

                <div class="card-body">
                    {!! Form::open(['method' => 'PATCH','route' => 'users.store-password', 'class' => 'form-horizontal']) !!}
                    {{ csrf_field() }}
                        <div class="form-group row{{ $errors->has('old-password') ? ' has-error' : '' }}">
                            <label for="password" class="col-lg-4 col-form-label text-lg-right">@lang('auth.old-password')</label>
                            <div class="col-lg-6">
                                {!! Form::password('old-password', ['class' => 'form-control']) !!}
                                @if ($errors->has('old-password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('old-password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-lg-4 col-form-label text-lg-right">@lang('auth.new-password')</label>
                            <div class="col-md-6">
                                {!! Form::password('password', ['class' => 'form-control']) !!}
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row{{ $errors->has('confirm-password') ? ' has-error' : '' }}">
                            <label for="password" class="col-lg-4 col-form-label text-lg-right">@lang('auth.confirm-password')</label>
                            <div class="col-md-6">
                                {!! Form::password('confirm-password', ['class' => 'form-control']) !!}
                                @if ($errors->has('confirm-password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('confirm-password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-8 offset-lg-4">
                                <button type="submit" class="btn btn-primary btn-sm">@lang('auth.change-password')</button>
                            </div>
                        </div>

                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>
@endsection