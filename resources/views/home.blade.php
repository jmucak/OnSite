@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!

                    @if(auth()->user()->isAdmin())
                        <a href="{{ route('users.index') }}" class="btn btn-warning">Get me users</a>
                    @endif

                    <a href="{{ route('stories.index') }}" class="btn btn-success">Story</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
