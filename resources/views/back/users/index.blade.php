@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="h2 font-weight-light">@lang('users.management')</h1>
            <a class="btn btn-primary btn-sm mt-3" href="{{ route('users.create') }}"><i class="icon ion-person-add"></i>@lang('users.create-user')</a>
        </div>
    </div>

    <hr>

    <div class="px-4 pt-4 pb-1">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th scope="col" class="col-xs-1">@lang('users.id')</th>
                    <th scope="col" class="col-xs-2">@lang('users.name')</th>
                    <th scope="col" class="col-xs-3">@lang('users.email')</th>
                    <th scope="col" class="col-xs-2">@lang('users.roles')</th>
                    <th scope="col" class="col-xs-4">@lang('menu.action')</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $key => $user)
                    <tr>
                        <th scope="row">{{ ++$i }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if(!empty($user->roles))
                                @foreach($user->roles as $v)
                                    <label class="label label-success">{{ $v->display_name }}</label>
                                @endforeach
                            @endif
                        </td>
                        <td>
                            @permission('user-list')
                                <a class="btn btn-info btn-sm" href="{{ route('users.show',$user->id) }}"><i class="icon ion-eye"></i>@lang('menu.show')</a>
                            @endpermission
                            @permission('user-edit')
                                <a class="btn btn-primary btn-sm" href="{{ route('users.edit',$user->id) }}"><i class="icon ion-edit"></i>@lang('menu.edit')</a>
                            @endpermission
                            @permission('user-delete')
                                <button class="btn btn-danger btn-sm submit" data-form="delete-user" data-title="@lang('users.delete-title')" data-message="@lang('users.delete-message')">
                                    <i class="icon ion-trash-a"></i>@lang('menu.delete')
                                </button>
                                {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline', 'id' => 'delete-user']) !!}
                                {!! Form::close() !!}
                            @endpermission
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {!! $users->render() !!}
    </div>
@endsection