<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Image;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $categories = Category::limit(5)->get();

        $images = Image::where(function($query)use($request){
            if ($request->get('category')) 
                $query->where('category_id',$request->get('category'));
        })->paginate(6);

        return view('home', compact('categories', 'images'));
    }
}
