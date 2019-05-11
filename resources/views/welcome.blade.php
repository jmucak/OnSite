@extends('layouts.app')
@section('content')
    <section class="welcome">
        <div class="welcome__text-box">
            <h1 class="heading-primary">
                <span class="heading-primary--main">OnSite</span>
                <span class="heading-primary--sub">Story telling platform</span>
            </h1>

            <a href="{{ route('register') }}" class="btn btn-success">Start writting</a>
            <a href="{{ route('register') }}" class="btn btn-success">Start reading</a>
        </div>
    </section>
@endsection