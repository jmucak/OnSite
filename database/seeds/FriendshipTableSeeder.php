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
        

        for($i=1; $i<10; $i++){
            // Create 10 Friendships
            ${"friendship$i"} = new Friendship();
           
            ${"friendship$i"}->user_requester = $i;        
            ${"friendship$i"}->user_requested = $i+2;
       
            ${"friendship$i"}->status = 1;

            ${"friendship$i"}->save();
        }
    }
}
