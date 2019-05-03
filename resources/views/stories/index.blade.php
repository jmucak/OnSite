@extends('layouts.app')
@section('content')
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
                            <form action="{{ route('stories.destroy', $story->slug) }}" method="POST">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <a href="{{ route('chapter.create', $story->slug) }}" class="btn btn-sm btn-primary">Add Some chapters</a>
                                    <a href="{{ route('stories.edit', $story->slug) }}" class="btn btn-sm btn-warning">Edit Story</a>
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </div>
                            </form>
                            <hr>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

@endsection