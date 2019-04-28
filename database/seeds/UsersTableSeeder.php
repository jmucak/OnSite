<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
    }
}
