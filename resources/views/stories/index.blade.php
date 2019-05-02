@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-10 offset-1">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('stories.create') }}" class="btn btn-success" role="button">Create New Story</a>
                    </div>

                    <div class="card-body">
                        @foreach($stories as $story)
                            <h2><a href="{{ route('stories.show', ['slug' => $story->slug]) }}">{{ $story->title }}</a></h2>
                            <p>{{ $story->description }}</p>
                            <a href="{{ route('chapter.create', $story->slug) }}" class="btn btn-sm btn-primary">Add Some chapters</a>
                            <hr>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection