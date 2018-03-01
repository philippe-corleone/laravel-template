<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {

        $permissions = Permission::orderBy('id','DESC')->paginate(10);
        return view(config('route.permissions') . '.index', compact('permissions'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(config('route.permissions') . '.create');
    }

    /**
     * Show the form for creating a new resource set.
     *
     * @return \Illuminate\Http\Response
     */
    public function createSet()
    {
        return view(config('route.permissions') . '.create-set');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:permissions,name',
            'display_name' => 'required',
            'description' => 'required',
        ]);

        $permission = new Permission();
        $permission->name = $request->input('name');
        $permission->display_name = $request->input('display_name');
        $permission->description = $request->input('description');
        $permission->save();

        return redirect()->route('permissions.index')
            ->with('success',__('permissions.permission-successfully-created'));
    }

    /**
     * Store a newly created resource set in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeSet(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:permissions,name',
        ]);

        $names = [
            $request->input('name') . '-list',
            $request->input('name') . '-create',
            $request->input('name') . '-edit',
            $request->input('name') . '-delete'
        ];

        $displayNames = [
            'Display ' . ucfirst($request->input('name')) . ' Listing',
            'Create ' . ucfirst($request->input('name')),
            'Edit ' . ucfirst($request->input('name')),
            'Delete ' . ucfirst($request->input('name'))
        ];

        $descriptions = [
            'See only Listing of ' . ucfirst($request->input('name')),
            'Create a new ' . ucfirst($request->input('name')),
            'Edit ' . ucfirst($request->input('name')),
            'Delete ' . ucfirst($request->input('name'))
        ];

        for($i = 0; $i < 4; $i++){
            $permission = new Permission();
            $permission->name = $names[$i];
            $permission->display_name = $displayNames[$i];
            $permission->description = $descriptions[$i];
            $permission->save();
        }

        return redirect()->route('permissions.index')
            ->with('success',__('permissions.permission-set-successfully-created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $permission = Permission::find($id);

        return view(config('route.permissions') . '.show',compact('permission'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permission = Permission::find($id);

        return view(config('route.permissions') . '.edit',compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'display_name' => 'required',
            'description' => 'required',
        ]);

        $permission = Permission::find($id);
        $permission->display_name = $request->input('name');
        $permission->display_name = $request->input('display_name');
        $permission->description = $request->input('description');
        $permission->save();

        return redirect()->route('permissions.index')
            ->with('success',__('permissions.permission-successfully-updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Permission::find($id)->delete();
        return redirect()->route('permissions.index')
            ->with('success',__('permissions.permission-successfully-deleted'));
    }
}
