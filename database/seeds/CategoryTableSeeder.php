<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = array('Thriller', 'Crime', 'Drama', 'Action', 'Comedy', 'Sci-Fi', 'Romance', 'Adventure', 'Fantasy', 'Mystery', 'Horror');

        foreach ($categories as $key => $category) {
            ${"category$key"} = new Category;
            ${"category$key"}->name = $category;
            ${"category$key"}->save();
        }
    }
}
