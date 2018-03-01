<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_data = [
            'name' => 'admin',
            'email' => 'admin@secret.com',
            'password' => Hash::make('secret')
        ];

        $user = User::create($user_data);

        foreach(Role::all() as $role)
            $user->attachRole($role->id);
    }
}
