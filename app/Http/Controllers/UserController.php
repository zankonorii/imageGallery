<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Image;

class UserController extends Controller
{
    public function profile()
    {
        $user = auth()->user();

        return view('profile', compact('user'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            "user_name" =>  "required",
            "email"     =>  "required"
        ]);

        $user = auth()->user();
        $user->update([
            "user_name" =>  $request->get("user_name"),
            "email"     =>  $request->get("email"),
        ]);

        return redirect(route('profile'));
    }

    public function gallery(Request $request)
    {
        $categories = Category::limit(5)->get();

        $images = Image::where(function($query)use($request){
            if ($request->get('category')) 
                $query->where('category_id',$request->get('category'));
        })->where('user_id', auth()->user()->id)->paginate(6);

        return view('userGallery', compact('images', 'categories'));
    }
}
