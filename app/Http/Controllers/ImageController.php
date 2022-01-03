<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Image;
use App\Models\Like;
use App\Models\Category;

class ImageController extends Controller
{

    public function create()
    {
        $categories = Category::all();

        return view('createImage', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title'         =>  'required',
            'category_id'   =>  'required',
            'image'         =>  'required'
        ]);

        $file = $request->file('image');
        if ($file) {
            $path = 'images/';
            $originalFile = $file->getClientOriginalName();
            $filename=strtotime(date('Y-m-d-H:isa')).$originalFile;
            $T = $file->move($path, $filename);

            Image::create([
                'title'         =>  $request->get('title'),
                'category_id'   =>  $request->get('category_id'),
                'url'           =>  $filename,
                'user_id'       =>  auth()->user()->id
            ]);
        }

        return redirect(route('user_gallery'));
    }

    public function like(Image $image)
    {
        $like = $image->likes()->where('user_id', auth()->user()->id)->first();
        if ($like) {
            $like->delete();
        }else {
            Like::create([
                'user_id'   =>  auth()->user()->id,
                'image_id'  =>  $image->id,
            ]);
        }

        return redirect(route('home'));
    }

    public function show(Image $image)
    {
        return view('image', compact('image'));
    }

    public function delete(Image $image)
    {
        Storage::delete(asset('images/'.$image->url));
        $image->delete();

        return redirect(route('user_gallery'));
    }
}
