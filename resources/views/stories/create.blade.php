@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-10 offset-1">
            <div class="card">
                <div class="card-header">
                    <h2>Create New Story</h2>
                </div>

                <div class="card-body">
                    <form action="{{ route('stories.store') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="title">Title of Story</label>
                            <input type="text" class="form-control" id="title" name="title">
                        </div>

                        <div class="form-group">
                            <label for="description">Write some description of the Story</label>
                            <textarea class="form-control" id="description" name="description" rows="10" cols="80"></textarea>
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

                        <label for="tags">Tags:</label><br/>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addTag" style="float: right">
                    Add New Tag
                    </button>
                    <div class="d-block my-3">
                         @foreach($tags as $tag)
                         <label class="overflow__checkbox">
                              <input type="checkbox" value="{{ $tag->id }}" name="tags[]" class="overflow-control-input">
                              <span class="overflow-control-indicator"></span>
                              <span class="overflow-control-description">{{ $tag->name }}</span>
                         </label>
                         @endforeach
                    </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @include('inc.modal')
    </div>
</div>
@endsection