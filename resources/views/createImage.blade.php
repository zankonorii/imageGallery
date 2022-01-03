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
                    <form action="{{route('store_image')}}" 
                    class="form-controller d-flex justify-content-center"
                    method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-6">
                            <input type="text" class="form-control text-center" 
                        placeholder="title" name="title" required>

                        <select name="category_id" class="form-control mt-5" required>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->title}}</option>    
                            @endforeach
                        </select>

                        <input type="file" class="form-control text-center mt-5" 
                        placeholder="image" name="image" required>

                        <button type="submit" class="form-control text-center btn-primary mt-5">ADD</button>
                        </div>
                    </form>                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
