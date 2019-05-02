<?php

use Illuminate\Database\Seeder;
use App\Friendship;

class FriendshipTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $friendship = new Friendship();

        $friendship->user_requester = 2;
        $friendship->user_requested = 3;
        $friendship->status = 1;

        $friendship->save();

        $friendship2 = new Friendship();

        $friendship2->user_requester = 5;
        $friendship2->user_requested = 7;
        $friendship2->status = 1;

        $friendship2->save();

        $friendship3 = new Friendship();

        $friendship3->user_requester = 8;
        $friendship3->user_requested = 5;
        $friendship3->status = 1;

        $friendship3->save();
    }
}
