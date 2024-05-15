<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Setting::all();
        return view('dash.settings.all',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dash.settings.add');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $locals=LaravelLocalization::getSupportedLocales();
        $rules=[
        
            'logo'=>'required|image',
            'favicon'=>'required|image',
            'facebook'=>'required|string',
            'linkedin'=>'required|string',
            'phone'=>'required|string',
            'email'=>'required|string',

        ];
        foreach ($locals as $localecode => $properties) {
            $rules["{$localecode}.title"] = 'required|string';
            $rules["{$localecode}.content"] = 'required|string';

        }
        $request->validate($rules);
        $settingsWithoutImages=$request->except(['logo','favicon']);
        $setting=Setting::create($settingsWithoutImages);

        if($request->file('logo')){
            $uploadedLogo=$setting->addMediaFromRequest('logo')->toMediaCollection('webSetting');
            $setting->update([
                'logo' =>$uploadedLogo->getUrl(),
            ]);
        }

        if($request->file('favicon')){
            $uploadedIcon=$setting->addMediaFromRequest('favicon')->toMediaCollection('webSetting');
            $setting->update([
                'favicon' =>$uploadedIcon->getUrl(),
            ]);
        }
        return to_route('dashboard.settings.index');
    }

   

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Setting $setting)
    {

        return view('dash.settings.edit',compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Setting $setting)
    {
        
        $locals=LaravelLocalization::getSupportedLocales();
        $rules=[
        
            'logo'=>'image',
            'favicon'=>'image',
            'facebook'=>'required|string',
            'linkedin'=>'required|string',
            'phone'=>'required|string',
            'email'=>'required|string',

        ];
        foreach ($locals as $localecode => $properties) {
            $rules["{$localecode}.title"] = 'required|string';
            $rules["{$localecode}.content"] = 'required|string';

        }
        $request->validate($rules);
        $settingsWithoutImages=$request->except(['logo','favicon']);
        $setting->update($settingsWithoutImages);

        if($request->file('logo')){
           $oldLogo=$setting->media;
           if( $oldLogo[0] !=null){
           $oldLogo[0]->delete();
           }
            $uploadedLogo=$setting->addMediaFromRequest('logo')->toMediaCollection('logo');
            $setting->update([
                'logo' =>$uploadedLogo->getUrl(),
            ]);
        }

        if($request->file('favicon')){
            $oldicon=$setting->media;
            if($oldicon[0] != null){
           $oldicon[0]->delete();
            }
            $uploadedIcon=$setting->addMediaFromRequest('favicon')->toMediaCollection('favicon');
            $setting->update([
                'favicon' =>$uploadedIcon->getUrl(),
            ]);
        }
        return to_route('dashboard.settings.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Setting $setting)
    {
        $setting->clearMediaCollection('logo');
        $setting->clearMediaCollection('favicon');
        $setting->delete();
        return to_route('dashboard.settings.index');

    }
}
