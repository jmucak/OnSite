@extends('layouts.app')
@section('content')
@if ($story->user_id == auth()->user()->id)
<div class="row">
    <div class="col-10 offset-1">
        <div class="card">
            <div class="card-header">
                Add Some Chapters
            </div>
            <div class="card-body">
                <form action="{{ route('chapter.store', ['slug' => $story->slug, 'id' => $story->id]) }}" method="POST">
                    {{ csrf_field() }}
        
                    <div class="form-group">
                        <label for="title">Write Chapter title</label>
                        <input type="text" class="form-control" id="title" name="title">
                    </div>
        
                    <div class="form-group">
                        <label for="content">Write some content</label>
                        <textarea name="content" id="content" cols="70" rows="10" class="form-control"></textarea>
                    </div>
        
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Add Chapter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endif
@endsection