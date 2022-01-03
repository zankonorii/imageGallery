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
                                    <a class="nav-link" href="{{route('add_image')}}">New</a>
                                </li>
                            
                          </ul>
                        </div>
                      </nav>
                </div>
                <div class="card-body">
                    <form action="{{route('user_update')}}" 
                    class="form-controller d-flex justify-content-center"
                    method="POST">
                        @csrf
                        <div class="col-6">
                            <input type="text" class="form-control text-center" placeholder="User Name"
                        value="{{$user->user_name}}" name="user_name">

                        <input type="text" class="form-control text-center my-5" placeholder="Email"
                        value="{{$user->email}}" name="email">

                        <button type="submit" class="form-control text-center btn-primary">update</button>
                        </div>
                    </form>                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
