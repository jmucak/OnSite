@extends('layouts.app')
@section('content')
<section class="py-4">
    <div class="row">
        <div class="col-10 offset-1">
            <div class="card">
                <div class="card-header">
                    <h2>{{ $story->title }}</h2>
                </div>

                <div class="card-body">
                    <p> {{ $story->description }} </p>
                    <hr>
                    @if($story->user_id == Auth::user()->id)
                    <a href="{{ route('stories.edit', $story->slug) }}" class="btn btn-sm btn-warning">Edit Story details</a>
                    <a href="{{ route('chapter.create', $story->slug) }}" class="btn btn-sm btn-primary">Add Some chapters</a>
                    <publish :story_id="{{ $story->id }}"></publish>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-10 offset-1">
            <div class="card">
                <div class="card-block">
                    <form action="{{ route('stories.comment', $story->id) }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <textarea name="comment" id="comment" placeholder="Type your comment..." class="form-control"></textarea>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Add Comment</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @if (count($story->comments))
        <hr>
        <div class="row">
            <div class="col-10 offset-1">
                <div class="comments">
                    <h3>Comments: </h3>
                    <ul>
                        @foreach ($story->comments as $comment)
                            <li class="list-group-item">
                                <b> {{ $comment->user->name }} </b>
                                <i> {{ $comment->created_at->diffForHumans() }} </i>&nbsp;
                                {{ $comment->comment }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif
    <hr>
    <div class="row">
        <div class="col-10 offset-1">
            
            @if(count($story->chapters))
                <hr/>
                <div class="card">
                    @foreach ($story->chapters as $chapter)
                        <div class="card-header">
                            <h3> {{ $chapter->title }} </h3>
                        </div>
                        <div class="card-body">
                            <p> {{ $chapter->content }} </p>
                            <hr>
                            <div class="form-group">
                                <form action="{{ route('chapter.destroy', $chapter->id) }}" method="POST">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    <a href="{{ route('chapter.edit', $chapter->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</section>
@endsection