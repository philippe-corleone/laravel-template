<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['web']], function () {
    Route::get('/lang/switch/{lang}', ['as'=>'lang.switch','uses'=>'LanguageController@switch']);
});

Auth::routes();

Route::group(['middleware' => ['auth']], function() {

    Route::get('home',['as'=>'app.home','uses'=>'HomeController@index']);

    Route::get('users',['as'=>'users.index','uses'=>'UserController@index','middleware' => ['permission:user-list|user-create|user-edit|user-delete']]);
    Route::get('users/create',['as'=>'users.create','uses'=>'UserController@create','middleware' => ['permission:user-create']]);
    Route::post('users/create',['as'=>'users.store','uses'=>'UserController@store','middleware' => ['permission:user-create']]);
    Route::get('users/change-password',['as'=>'users.change-password','uses'=>'UserController@changePassword']);
    Route::patch('users/store-password',['as'=>'users.store-password','uses'=>'UserController@storePassword']);
    Route::get('users/{id}',['as'=>'users.show','uses'=>'UserController@show']);
    Route::get('users/{id}/edit',['as'=>'users.edit','uses'=>'UserController@edit','middleware' => ['permission:user-edit']]);
    Route::patch('users/{id}',['as'=>'users.update','uses'=>'UserController@update','middleware' => ['permission:user-edit']]);
    Route::delete('users/{id}',['as'=>'users.destroy','uses'=>'UserController@destroy','middleware' => ['permission:user-delete']]);


    Route::get('roles',['as'=>'roles.index','uses'=>'RoleController@index','middleware' => ['permission:role-list|role-create|role-edit|role-delete']]);
    Route::get('roles/create',['as'=>'roles.create','uses'=>'RoleController@create','middleware' => ['permission:role-create']]);
    Route::post('roles/create',['as'=>'roles.store','uses'=>'RoleController@store','middleware' => ['permission:role-create']]);
    Route::get('roles/{id}',['as'=>'roles.show','uses'=>'RoleController@show']);
    Route::get('roles/{id}/edit',['as'=>'roles.edit','uses'=>'RoleController@edit','middleware' => ['permission:role-edit']]);
    Route::patch('roles/{id}',['as'=>'roles.update','uses'=>'RoleController@update','middleware' => ['permission:role-edit']]);
    Route::delete('roles/{id}',['as'=>'roles.destroy','uses'=>'RoleController@destroy','middleware' => ['permission:role-delete']]);

    Route::get('permissions',['as'=>'permissions.index','uses'=>'PermissionController@index','middleware' => ['permission:permission-list|permission-create|permission-edit|permission-delete']]);
    Route::get('permissions/create',['as'=>'permissions.create','uses'=>'PermissionController@create','middleware' => ['permission:permission-create']]);
    Route::post('permissions/create',['as'=>'permissions.store','uses'=>'PermissionController@store','middleware' => ['permission:permission-create']]);
    Route::get('permissions/create/set',['as'=>'permissions.create-set','uses'=>'PermissionController@createSet','middleware' => ['permission:permission-create']]);
    Route::post('permissions/create/set',['as'=>'permissions.store-set','uses'=>'PermissionController@storeSet','middleware' => ['permission:permission-create']]);
    Route::get('permissions/{id}',['as'=>'permissions.show','uses'=>'PermissionController@show']);
    Route::get('permissions/{id}/edit',['as'=>'permissions.edit','uses'=>'PermissionController@edit','middleware' => ['permission:permission-edit']]);
    Route::patch('permissions/{id}',['as'=>'permissions.update','uses'=>'PermissionController@update','middleware' => ['permission:permission-edit']]);
    Route::delete('permissions/{id}',['as'=>'permissions.destroy','uses'=>'PermissionController@destroy','middleware' => ['permission:permission-delete']]);

    Route::get('settings',['as'=>'user-settings.edit','uses'=>'UserSettingController@edit']);
    Route::patch('settings',['as'=>'user-settings.update','uses'=>'UserSettingController@update']);

});
