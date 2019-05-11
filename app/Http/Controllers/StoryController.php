<?php

namespace App\Http\Controllers;

use App\Story;
use App\Helpers\Slug;
use Illuminate\Http\Request;
use App\Category;
use App\Tag;

class StoryController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stories = Story::where('user_id', auth()->id())->get();
        
        //dd($stories);

        return view('stories.index', compact('stories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('stories.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'title' => 'required|min:3|max:100',
            'description' => 'required|min:3',
            'category' => 'required'
        ]);

        $slug = new Slug();

        $story = Story::create([
            'title' => request('title'),
            'description' => request('description'),
            'slug' => $slug->createSlug(request('title')),
            'user_id' => auth()->id()
        ]);

        $story->categories()->attach(request('category'));

        $tags = request('tags');
        $story->tags()->attach($tags);

        return redirect()->route('stories.index')->with('success', 'Story has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {

        $story = Story::where([
            'slug' => $slug
        ])->get()->first();


        return view('stories.show', compact('slug', 'story'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        
        $story = Story::where('slug', $slug)->get()->first();
        $categories = Category::all();
        $tags = Tag::all();
   
        return view('stories.edit', compact('story', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {

        $story = Story::where('slug', $slug)->get()->first();
        
        $story->title = $request->title;
        $story->description = $request->description;
        $story->slug = str_slug($request->title);
        $story->user_id = auth()->id();

        $story->save();

        $story->categories()->sync(request('category'));
        $story->tags()->sync(request('tags'));

        return redirect()->route('stories.index')->with('succss', 'Story has been updated');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $story = Story::where('slug', $slug)->get()->first();

        foreach ($story->chapters as $chapter) {
            $chapter->delete();
        }
        $story->delete();

        return redirect()->route('stories.index')->with('success', 'Story successfully deleted!');
    }

    public function check($id) {
        $story = Story::find($id);

        if($story->published == 1){
            return ['published' => true];
        } 

        return ['published' => false];
    }

    public function publish($id){
        $story = Story::find($id);
        
        if($story->published == 1) {
            $story->published = 0;
        } else {
            $story->published = 1;
        }

        $story->save();

        return redirect()->route('stories.index');
    }

    public function all(Category $category) {
        
        $stories = Story::all();
        $categories = Category::all();

        return view('explore', compact('categories', 'stories'));
    }
}
