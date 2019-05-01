@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-10 offset-1">
                <div class="card">
                    <div class="card-header">
                        <h2>{{ $story->title }}</h2>
                    </div>

                    <div class="card-body">
                        <p> {{ $story->description }} </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection