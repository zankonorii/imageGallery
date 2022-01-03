@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                    <div class="d-flex flex-column">
                        @foreach($images as $image)
                            <div class="card mx-auto mt-5" style="width: 36rem;">
                                <a href="{{route('show_image', $image)}}">
                                    <img class="card-img-top" src="{{asset('images/'.$image->url)}}" alt="{{$image->titme}}">
                                </a>
                                <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <p class="card-text ">
                                        Likes {{$image->likes->count()}}
                                    </p>
                                    @if ($image->likeStatus())
                                        <a style="text-decoration:none"  
                                            class="fa fa-heart fa-2x text-danger"
                                            href="{{route('like_image', $image)}}"></a>
                                    @else
                                        <a style="text-decoration:none"  
                                            class="fa fa-heart-o fa-2x text-danger"
                                            href="{{route('like_image', $image)}}"></a>
                                    @endif
                                </div>
                                </div>
                            </div>
                        @endforeach
                        
                        <div class="d-flex justify-content-center mt-5">
                            {{$images->links("pagination::bootstrap-4")}}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
