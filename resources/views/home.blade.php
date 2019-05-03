@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-10">
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

                    <a href="{{ route('stories.index') }}" class="btn btn-success">Create a story</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-10">
            <feed></feed>
        </div>
        <div class="col-lg-2">
            Somethign
        </div>
    </div>
</div>
@endsection
