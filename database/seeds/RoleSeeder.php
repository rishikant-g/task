<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = ['superadmin','clerk','admin','inventory manager','order manager','customer'];
        foreach($roles as $role){
            App\Role::create([
                'role_name' => $role
            ]);
        }
    }
}
