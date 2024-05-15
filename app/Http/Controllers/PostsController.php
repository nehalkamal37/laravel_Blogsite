<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $data=Post::withTrashed()->get();
        $user=User::all();
        $category=Category::all();
        return view('dash.posts.all',compact('data','user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users=User::all();
        $categories=Category::all();
        $posts=Post::all();
        return view('dash.posts.add',compact('posts','users','categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $locals=LaravelLocalization::getSupportedLocales();
        $rules=[
        
            'image'=>'required|image',
            'category_id'=>'required',
          
        ];
        foreach ($locals as $localecode => $properties) {
            $rules["{$localecode}.title"] = 'required|string';
            $rules["{$localecode}.content"] = 'required|string';
            $rules["{$localecode}.small_description"] = 'required|string';
            $rules["{$localecode}.tags"] = 'required|string';
        }
        $request->validate($rules);
        $postsWithoutImages=$request->except(['image']);
        $post=Post::create($postsWithoutImages);

        if($request->file('image')){
            $uploadedimage=$post->addMediaFromRequest('image')
            ->toMediaCollection('post_image');

            $post->update([
                'image' =>$uploadedimage->getUrl(),
            ]);
        }
        $post->update([
            'user_id' =>Auth::user()->id,
        ]);

        return to_route('dashboard.posts.index');
    

    
    }
     
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        
        $users=User::all();
        $categories=Category::all();
        return view('dash.posts.edit',compact('post','users','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        
        $locals=LaravelLocalization::getSupportedLocales();
        $rules=[
        
            'image'=>'nullable|image',
            'category_id'=>'required',
          
        ];
        foreach ($locals as $localecode => $properties) {
            $rules["{$localecode}.title"] = 'required|string';
            $rules["{$localecode}.content"] = 'required|string';
            $rules["{$localecode}.small_description"] = 'required|string';
            $rules["{$localecode}.tags"] = 'required|string';
        }
        $request->validate($rules);
        $postsWithoutImages=$request->except(['image']);
        $post->update($postsWithoutImages);

        if($request->file('image')){
                $old_image=$post->media;
                if( $old_image[0]){
                $old_image[0]->delete();
                }

            $uploadedimage=$post->addMediaFromRequest('image')
            ->toMediaCollection('post_image');

            $post->update([
                'image' =>$uploadedimage->getUrl(),
            ]);
        }
        $post->update([
            'user_id' =>Auth::user()->id,
        ]);

        return to_route('dashboard.posts.index');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return to_route('dashboard.posts.index');

    }
   
public function restore(Post $post){
$post->restore();
return to_route('dashboard.posts.index');

}

public function erase(Post $post){
$post->forceDelete();
return to_route('dashboard.posts.index');

}

}
