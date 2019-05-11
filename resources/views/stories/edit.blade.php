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
                        <div class="category">
                            <h4>Categories</h4>
                            @foreach ($categories as $key => $category)
                            <div class="form__radio-group">
                                <input type="radio" name="category" id="category{{$key}}" value="{{ $category->id }}" class="form__radio-input">
                                <label for="category{{$key}}" class="form__radio-label">
                                    <span class="form__radio-button"></span>
                                    {{ $category->name }}
                                </label>
                            </div>
                            @endforeach
                        </div>
                    @endisset

                    <label for="tags">Tags:</label>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addTag" style="float: right">
                    Add New Tag
                    </button>
                    <br/>
                    <div class="d-block my-3">
                            @foreach($tags as $tag)
                            <label class="overflow__checkbox">
                                <input type="checkbox" value="{{ $tag->id }}" name="tags[]" class="overflow-control-input" {{ $tag->stories->contains($story->id) ? 'checked=checked' : ''}}>
                                <span class="overflow-control-indicator"></span>
                                <span class="overflow-control-description">{{ $tag->name }}</span>
                            </label>
                            @endforeach
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        <a href="{{ route('stories.index') }}" class="btn btn-info" role="button">Get back</a>
                    </div>
                </form>
            </div>
            @include('inc.modal')
        </div>
    </div>
@endsection