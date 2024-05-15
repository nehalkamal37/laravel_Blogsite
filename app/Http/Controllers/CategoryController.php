<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Category::withTrashed()->get();
        return view('dash.categories.all',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::all();
        return view('dash.categories.add',compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $locals=LaravelLocalization::getSupportedLocales();
        $rules=[
        
            'cat_image'=>'required|image',
            'parent_id'=>'nullable',
          
        ];
        foreach ($locals as $localecode => $properties) {
            $rules["{$localecode}.title"] = 'required|string';
            $rules["{$localecode}.content"] = 'required|string';

        }
        $request->validate($rules);
        $categoriesWithoutImages=$request->except(['cat_image']);
        $category=Category::create($categoriesWithoutImages);

        if($request->file('cat_image')){
            $uploadedcat_image=$category->addMediaFromRequest('cat_image')
            ->toMediaCollection('category_image');
            $category->update([
                'cat_image' =>$uploadedcat_image->getUrl(),
            ]);
        }

        return to_route('dashboard.categories.index');
    

    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $categories=Category::all();

        return view('dash.categories.edit',compact('category','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        
        $locals=LaravelLocalization::getSupportedLocales();
        $rules=[
        
            'cat_image'=>'nullable|image',
            'parent_id'=>'nullable',

            

        ];
        foreach ($locals as $localecode => $properties) {
            $rules["{$localecode}.title"] = 'required|string';
            $rules["{$localecode}.content"] = 'required|string';

        }
        $request->validate($rules);
        $categoriesWithoutImages=$request->except(['cat_image']);
        $category->update($categoriesWithoutImages);

        if($request->file('cat_image')){
           $oldcat_image=$category->media;
           if( $oldcat_image[0]){
           $oldcat_image[0]->delete();
           }
            $uploadedcat_image=$category->addMediaFromRequest('cat_image')->toMediaCollection('cat_image');
            $category->update([
                'cat_image' =>$uploadedcat_image->getUrl(),
            ]);
        }

       
          
        return to_route('dashboard.categories.index');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return to_route('dashboard.categories.index');

    }
   
public function restore(category $category){
$category->restore();
return to_route('dashboard.categories.index');

}

public function erase(category $category){
$category->forceDelete();
return to_route('dashboard.categories.index');

}

}