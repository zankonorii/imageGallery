@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                {{-- <div class="card-header">{{ __('Dashboard') }}</div> --}}
                <div class="card-header">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <a class="navbar-brand" href="{{route('home')}}">Home</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                          <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                          <ul class="navbar-nav">
                              @foreach($categories as $category)
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{route('home', ['category' => $category->id])}}">{{$category->title}}</a>
                                </li>
                            @endforeach
                            
                          </ul>
                        </div>
                      </nav>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <div class="d-flex flex-column">
                        @foreach($images as $image)
                            <div class="card mx-auto" style="width: 36rem;">
                                <img class="card-img-top" src="{{$image->url}}" alt="{{$image->titme}}">
                                <div class="card-body">
                                <p class="card-text">
                                    Likes {{$image->likes->count()}}
                                    @if ($image->likeStatus())
                                        Liked
                                    @endif
                                </p>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
