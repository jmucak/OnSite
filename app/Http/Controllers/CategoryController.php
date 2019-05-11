<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category)
    {
        $all_stories = $category->stories;

        foreach ($all_stories as $story) {
            if($story['published']){
                $stories[] = $story;
            }
        }

        return view('stories.index', compact('stories'));
    }
}
