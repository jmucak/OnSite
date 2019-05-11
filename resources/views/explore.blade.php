@extends('layouts.app')
@section('content')
    <section class="section-explore">
        <div class="container">
            <h4>Explore By Categories</h4>
            <div class="row">
                @foreach ($categories as $category)
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 col-lg-3 py-4">
                        <div class="category-box">
                            <a href="{{ route('categories', $category) }}"><h4> {{ $category->name }} </h4></a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection