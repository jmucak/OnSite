@extends('layouts.app')

@section('content')
<div class="onsite-profile">
    <div class="onsite-profile__banner">
        <img src="{{ $user->avatar }}" width="70px" height="70px" class="onsite-profile__img" alt="{{ $user->name }}">
    </div>
    
    <div class="onsite-profile__info">
        @if($user->profile->firstname && !$user->profile->lastname)
            <h4 class="card-title">{{ $user->profile->firstname }}</h4>
        @elseif($user->profile->firstname && $user->profile->lastname)
            <h4 class="card-title">{{ $user->profile->firstname }} {{ $user->profile->lastname }}</h4>
        @else
            <h4 class="card-title">{{ $user->name }}</h4>
        @endif
       
        @if(!empty($user->profile->about))
            <div class="onsite-profile__about">
                <br>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title text-center">About me</h3>
                        </div>
    
                        <div class="card-body">
                            {{ $user->profile->about }}
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <br><hr>
        @if(Auth::id() == $user->id)
            <a href="{{ route('profile.edit') }}" class="btn btn-large btn-success">Edit my profile</a>
        @endif
    </div>
</div>
@endsection