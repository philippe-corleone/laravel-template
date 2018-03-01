@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="h2 font-weight-light">@lang('roles.management')</h1>
            @permission('role-create')
                <a class="btn btn-primary btn-sm mt-3" href="{{ route('roles.create') }}"><i class="icon ion-compose"></i>@lang('roles.create-role')</a>
            @endpermission
        </div>
    </div>

    <hr>

    <div class="px-4 pt-4 pb-1">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th scope="col" class="col-xs-2">@lang('roles.id')</th>
                    <th scope="col" class="col-xs-3">@lang('roles.name')</th>
                    <th scope="col" class="col-xs-3">@lang('roles.description')</th>
                    <th scope="col" class="col-xs-4">@lang('menu.action')</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $key => $role)
                    <tr>
                        <th scope="row">{{ ++$i }}</th>
                        <td>{{ $role->display_name }}</td>
                        <td>{{ $role->description }}</td>
                        <td>
                            @permission('role-list')
                                <a class="btn btn-info btn-sm" href="{{ route('roles.show',$role->id) }}"><i class="icon ion-eye"></i>@lang('menu.show')</a>
                            @endpermission
                            @permission('role-edit')
                                <a class="btn btn-primary btn-sm" href="{{ route('roles.edit',$role->id) }}"><i class="icon ion-edit"></i>@lang('menu.edit')</a>
                            @endpermission
                            @permission('role-delete')
                                <button class="btn btn-danger btn-sm submit" data-form="delete-role" data-title="@lang('roles.delete-title')" data-message="@lang('roles.delete-message')">
                                    <i class="icon ion-trash-a"></i>@lang('menu.delete')
                                </button>
                                {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline', 'id' => 'delete-role']) !!}
                                {!! Form::close() !!}
                            @endpermission
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {!! $roles->render() !!}
    </div>
@endsection