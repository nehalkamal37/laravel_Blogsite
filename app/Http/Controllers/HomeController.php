<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $categories=Category::latest()->limit(3)->get();
        $posts=Post::latest()->limit(3)->get();
        return view('front.index',compact('categories','posts'));
    }
}
