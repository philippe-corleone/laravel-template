@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="h2 font-weight-light">@lang('permissions.management')</h1>
            @permission('permission-create')
            <a class="btn btn-primary btn-sm mt-3" href="{{ route('permissions.create') }}"><i class="icon ion-pricetag"></i>@lang('permissions.create-permission')</a>
                <a class="btn btn-primary btn-sm mt-3" href="{{ route('permissions.create-set') }}"><i class="icon ion-pricetags"></i>@lang('permissions.create-permission-set')</a>
            @endpermission
        </div>
    </div>

    <hr>

    <div class="px-4 pt-4 pb-1">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th scope="col" class="col-xs-2">@lang('permissions.id')</th>
                    <th scope="col" class="col-xs-3">@lang('permissions.name')</th>
                    <th scope="col" class="col-xs-3">@lang('permissions.description')</th>
                    <th scope="col" class="col-xs-4">@lang('menu.action')</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($permissions as $key => $permission)
                <tr>
                    <th scope="row">{{ ++$i }}</th>
                    <td>{{ $permission->display_name }}</td>
                    <td>{{ $permission->description }}</td>
                    <td>
                        @permission('permission-list')
                            <a class="btn btn-info btn-sm" href="{{ route('permissions.show',$permission->id) }}"><i class="icon ion-eye"></i>@lang('menu.show')</a>
                        @endpermission
                        @permission('permission-edit')
                            <a class="btn btn-primary btn-sm" href="{{ route('permissions.edit',$permission->id) }}"><i class="icon ion-edit"></i>@lang('menu.edit')</a>
                        @endpermission
                        @permission('permission-delete')
                            <button class="btn btn-danger btn-sm submit" data-form="delete-permission" data-title="@lang('permissions.delete-title')" data-message="@lang('permissions.delete-message')">
                                <i class="icon ion-trash-a"></i>@lang('menu.delete')
                            </button>
                            {!! Form::open(['method' => 'DELETE','route' => ['permissions.destroy', $permission->id],'style'=>'display:inline', 'id' => 'delete-permission']) !!}
                            {!! Form::close() !!}
                        @endpermission
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {!! $permissions->render() !!}
    </div>
@endsection