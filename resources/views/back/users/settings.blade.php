@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="h2 font-weight-light">@lang('settings.update-setting')</h1>
        </div>
    </div>
    <hr>
    {!! Form::open(['method' => 'PATCH', 'route' => 'user-settings.update']) !!}
        <div class="px-4 pt-4 pb-1">
            <div class="form-group row">
                <label class="col-12 col-sm-4 col-lg-3 col-form-label">@lang('settings.lang'):</label>
                <div class="col-sm-9 col-lg-5">
                    {!! Form::select('lang', __('lang'), UserSettings::get('lang'), ['class' => 'form-control']) !!}
                    <small id="emailHelp" class="form-text text-muted">@lang('settings.note-lang')</small>
                </div>
            </div>
        </div>

        <hr>

        <div class="form-group row">
            <div class="col-12">
                <button type="submit" class="btn btn-primary btn-sm">@lang('settings.save-setting')</button>
            </div>
        </div>
    {!! Form::close() !!}
@endsection