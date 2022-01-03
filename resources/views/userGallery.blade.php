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
                        <a class="navbar-brand" href="{{route('profile')}}">Profile</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                          <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                          <ul class="navbar-nav">
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{route('user_gallery')}}">Gallery</a>
                                </li>
                                <li class="nav-item active">
                                    <a class="nav-link" href="#">New</a>
                                </li>
                            
                          </ul>
                        </div>
                      </nav>
                </div>
                <div class="card-body">
                    @foreach($images as $image)
                        <div class="card mx-auto my-5" style="width: 36rem;">
                            <a href="{{route('show_image', $image)}}">
                                <img class="card-img-top" src="{{$image->url}}" alt="{{$image->titme}}">
                            </a>
                            <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <p class="card-text ">
                                    Likes {{$image->likes->count()}}
                                </p>
                                <a style="text-decoration:none"  
                                        class="fa fa-trash fa-2x text-danger"
                                        href="{{route('image_delete', $image)}}"></a>
                            </div>
                            </div>
                        </div>
                    @endforeach               
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
