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


        for($i=1; $i<11; $i++){
            // Create 10 users
            ${"user$i"} = new User();
            ${"user$i"}->gender = rand(0,1);

            if(${"user$i"}->gender) {
                $avatar = 'public/defaults/avatars/male.png';
            } else {
                $avatar = 'public/defaults/avatars/female.png';
            }

            ${"user$i"}->name = "user$i";
            ${"user$i"}->email = "user$i@onsite.com";
            ${"user$i"}->password = bcrypt('password');
            ${"user$i"}->avatar = $avatar;
            ${"user$i"}->slug = str_slug(${"user$i"}->name);

            ${"user$i"}->save();
            ${"user$i"}->roles()->attach(2);

            ${"profile$i"} = new Profile();
            ${"profile$i"}->user_id = $i+1;
            ${"profile$i"}->firstname = ${"user$i"}->name;
            ${"profile$i"}->lastname = ${"user$i"}->name;

            ${"profile$i"}->save();
        }
    }
}
