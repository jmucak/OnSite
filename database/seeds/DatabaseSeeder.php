<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(FriendshipTableSeeder::class);
        $this->call(CategoryTableSeeder::class);

        factory('App\Story', 40)->create()->each(function($story) {
            $story->categories()->attach(mt_rand(1,11));
        });
    }
}
