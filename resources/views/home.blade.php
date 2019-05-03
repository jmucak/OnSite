@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-8 offset-1">
            <div class="card">
                <div class="card-header">Welcome {{ auth()->user()->name }} </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(auth()->user()->isAdmin())
                        <a href="{{ route('users.index') }}" class="btn btn-warning">Get me users</a>
                    @endif
                    
                    <a href="{{ route('stories.create') }}" class="btn btn-success" role="button">Create a Story</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-8 offset-1">
            <br>
            <h2>News Feed</h2>
            <br>
            <feed></feed>
        </div>
        <div class="col-2">
            Somethign
        </div>
    </div>
@endsection
