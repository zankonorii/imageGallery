<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Like;

class ImageController extends Controller
{
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
        $image->delete();

        return redirect(route('user_gallery'));
    }
}
