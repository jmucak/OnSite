@extends('layouts.app')
@section('content')
    <div class="col-10 offset-1">
        <div class="card">
            <div class="card-header">
                <h3>Update Story</h3>
            </div>

            <div class="card-body">
                <form action="{{ route('stories.update', $story->slug) }}" method="post">
                    {{ method_field('PATCH') }}
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" id="title" value="{{ $story->title }}">
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" cols="70" rows="10" class="form-control">{{ $story->description }}</textarea>
                    </div>

                    @isset($categories)
                        <div class="radio">
                            <label for="radio">Categories:</label>
                            <div class="radio">
                                @foreach ($categories as $category)
                                    <label>
                                        <input type="radio" name="category" value="{{ $category->id }}">
                                        {{ $category->name }}
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    @endisset

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        <a href="{{ route('stories.index') }}" class="btn btn-info" role="button">Get back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection