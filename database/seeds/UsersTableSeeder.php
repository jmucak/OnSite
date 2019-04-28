<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $admin = new User();
        $admin->gender = rand(0,1);

        if($admin->gender) {
            $avatar = 'public/defaults/avatars/male.png';
        } else {
            $avatar = 'public/defaults/avatars/female.png';
        }
        $admin->name = 'Admin';
        $admin->email = 'admin@onsite.com';
        $admin->password = bcrypt('admin');
        $admin->avatar = $avatar;
        $admin->slug = str_slug($admin->name);
        
        $admin->save();
        $admin->roles()->attach(1);

        $user1 = new User();
        $user1->gender = rand(0,1);

        if($user1->gender) {
            $avatar = 'public/defaults/avatars/male.png';
        } else {
            $avatar = 'public/defaults/avatars/female.png';
        }

        $user1->name = 'user1';
        $user1->email = 'user1@onsite.com';
        $user1->password = bcrypt('password');
        $user1->avatar = $avatar;
        $user1->slug = str_slug($user1->name);

        $user1->save();
        $user1->roles()->attach(2);

        $user2 = new User();
        $user2->gender = rand(0,1);

        if($user2->gender) {
            $avatar = 'public/defaults/avatars/male.png';
        } else {
            $avatar = 'public/defaults/avatars/female.png';
        }

        $user2->name = 'user2';
        $user2->email = 'user2@onsite.com';
        $user2->password = bcrypt('password');
        $user2->avatar = $avatar;
        $user2->slug = str_slug($user2->name);

        $user2->save();
        $user2->roles()->attach(2);
    }
}
