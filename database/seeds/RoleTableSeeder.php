<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_data = [
            'name' => 'admin',
            'display_name' => 'admin',
            'description' => 'has all permissions'
        ];

        $role = Role::create($role_data);

        foreach(Permission::all() as $permission)
            $role->attachPermission($permission->id);
    }
}
