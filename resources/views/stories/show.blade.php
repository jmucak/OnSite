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
    </div>
@endsection