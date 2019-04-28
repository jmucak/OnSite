<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Profile;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Admin user
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

        $profile = new Profile();
        $profile->user_id = 1;
        $profile->firstname = $admin->name;
        $profile->lastname = $admin->name;
        $profile->save();

        // User1
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

        $profile1 = new Profile();
        $profile1->user_id = 2;
        $profile1->firstname = $user1->name;
        $profile1->lastname = $user1->name;

        $profile1->save();

        // User 2
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

        $profile2 = new Profile();
        $profile2->user_id = 3;
        $profile2->firstname = $user2->name;
        $profile2->lastname = $user2->name;

        $profile2->save();
    }
}
