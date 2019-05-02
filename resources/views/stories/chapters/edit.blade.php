@extends('layouts.app')
@section('content')
    <div class="col-10 offset-1">
        <div class="card">
            <div class="card-header">
                <h3>Update Chapter</h3>
            </div>

            <div class="card-body">
                <form action="{{ route('chapter.update', $chapter->id) }}" method="post">
                    {{ method_field('PATCH') }}
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="title">Chapter title</label>
                        <input type="text" class="form-control" name="title" id="title" value="{{ $chapter->title }}">
                    </div>

                    <div class="form-group">
                        <textarea name="content" cols="70" rows="10" class="form-control">{{ $chapter->content }}</textarea>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection