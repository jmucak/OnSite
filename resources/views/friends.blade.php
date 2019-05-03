@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-10 offset-1">
            <div class="card">
                <div class="card-header">
                    My friends
                </div>

                <div class="card-body">
                    @if(!empty($friends))
                        <ul class="list-group">
                            @foreach($friends as $friend)
                                <li class="list-group-item">
                                    <img src="{{ $friend->avatar }}" alt="avatar" width="30px" height="30px">
                                    <a href="{{ route('profile', $friend->slug) }}">{{$friend->name}}</a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection