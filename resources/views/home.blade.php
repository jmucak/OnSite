@extends('layouts.app')

@section('content')
    @if(auth()->user()->isAdmin())
        <a href="{{ route('users.index') }}" class="btn btn-warning">Get me users</a>

        This is admin dashboard

    @else
    <section class="py-4">
        <div class="row">
            <div class="col-sm-12 col-md-8 col-lg-8">
                <div class="col-12">
                    <h4>Welcome back {{ auth()->user()->name }} </h4>
                    @if(count($stories))
                    <div id="storyCarousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                        
                            @foreach ($stories as $key => $story)
                                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                    <div class="story">
                                        <div class="story__text">
                                            <h4> {{ $story->title }} </h4>
                                            <p>
                                                {{ $story->description }}
                                            </p>

                                            <div>
                                                <a href="{{ route('stories.show', $story->slug) }}" class="btn btn-success">Continue writing</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#storyCarousel" role="button" data-slide="prev">
                            <i class="fas fa-arrow-circle-left"></i>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#storyCarousel" role="button" data-slide="next">
                            <i class="fas fa-arrow-circle-right"></i>
                            <span class="sr-only">Next</span>
                        </a>
                    </div> <!-- Carousel div -->
                    @else

                    <span>You don't have any stories</span>
                    <a href="{{ route('stories.create') }}" class="btn btn-success" role="button">Create a Story</a>

                    @endif

                    <br>
                    <h2>News Feed</h2>
                    <br>
                    <feed></feed>
                </div> <!-- col-8 -->
            </div> <!-- col-9 -->
    
            <div class="col-md-4 col-lg-4 bookmark">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('stories.create') }}" class="btn btn-success" role="button">Create New Story</a>
                    </div>

                    <h4 class="text-center">Bookmarks</h4>
                    <ul class="list-group">
                        <li class="list-group-item">Cras justo odio</li>
                        <li class="list-group-item">Dapibus ac facilisis in</li>
                        <li class="list-group-item">Morbi leo risus</li>
                        <li class="list-group-item">Porta ac consectetur ac</li>
                        <li class="list-group-item">Vestibulum at eros</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    @endif
@endsection
