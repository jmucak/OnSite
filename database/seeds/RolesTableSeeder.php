<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleAdmin = new Role();
        $roleAdmin->role = 'admin';
        $roleAdmin->roleDescription = 'Admin user';
        $roleAdmin->save();

        $roleUser = new Role();
        $roleUser->role = 'user';
        $roleUser->roleDescription = 'Default user';
        $roleUser->save();
    }
}
