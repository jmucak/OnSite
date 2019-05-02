@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-10 offset-1">
                <div class="card">
                    <div class="card-header">
                        <h2>{{ $story->title }}</h2>
                    </div>

                    <div class="card-body">
                        <p> {{ $story->description }} </p>
                        <hr>
                        
                        <form action="{{ route('stories.destroy', $story->slug) }}" method="POST">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <div class="form-group">
                                <a href="{{ route('stories.edit', $story->slug) }}" class="btn btn-sm btn-warning">Edit Story</a>
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
                <div class="col-10 offset-1">
                    
                    @if(count($story->chapters))
                        <hr/>
                        <div class="card">
                            @foreach ($story->chapters as $chapter)
                                <div class="card-header">
                                    <h3> {{ $chapter->title }} </h3>
                                    <div class="form-group">
                                        <form action="{{ route('chapter.destroy', $chapter->id) }}" method="POST">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                            <a href="{{ route('chapter.edit', $chapter->id) }}" class="btn btn-sm btn-info">Edit</a>
                                        </form>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <p> {{ $chapter->content }} </p>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
    </div>
@endsection