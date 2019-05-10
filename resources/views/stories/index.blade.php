@extends('layouts.app')
@section('content')
        <div class="row">
            <div class="col-10 offset-1">
                <a href="{{ route('stories.create') }}" class="btn btn-success" role="button">Create New Story</a>

                @foreach ($stories as $story)
                <div class="stories">
                        <div class="stories__title">
                            <h2 class="text-left"><a href="{{ route('stories.show', ['slug' => $story->slug]) }}">{{ $story->title }}</a></h2>
                            @foreach ($story->categories as $story_category)
                                <span class="text-right">{{ $story_category->name }}</span>
                            @endforeach
                        </div>
                        <hr>
                        
                        @if (count($story->tags)>0)
                                <p>
                                <i class="fa fa-tags"></i>Tags:
                                @foreach ($story->tags as $tag)
                                    <span class="badge badge-success">{{ $tag->name }}</span>
                                @endforeach
                            </p>
                        @endif

                        <p>{{ $story->description }}</p>
                            <form action="{{ route('stories.destroy', $story->slug) }}" method="POST">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </div>
                            </form>
                </div>
                @endforeach
            </div>
        </div>

@endsection