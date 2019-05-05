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
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection