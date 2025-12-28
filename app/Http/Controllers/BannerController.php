<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index(){
        $banners=Banner::get();
        return view('banner.index',compact('banners'));
    }

    public function create(){
        return view('banner.create');
    }

    public function store(Request $request){
        $request->validate([
            'name'=>'required|string',
            'image'=>'nullable|image',
            'result'=>'required|string',
        ]);

        $banner=new Banner();
        $banner->name=$request->name;
        if($request->hasFile('image')){
            $imageName=time().'.'.$request->image->extension();
            $request->image->move(public_path('photo'),$imageName);
            $banner->image=$imageName;
        }
        $banner->result=$request->result;
        $banner->save();
        return redirect()->route('banner.index');

    }

    public function edit($id){
        $banner=Banner::find($id);
        return view('banner.edit',compact('banner'));
    }
    
    public function update(Request $request,$id){
        $banner=Banner::find($id);
        $request->validate([
            'name'=>'required|string',
            'image'=>'nullable|image',
            'result'=>'required|string',
        ]);
        $banner->name=$request->name;
        if($request->hasFile('image')){
            if($banner->image && file_exists(public_path('photo/'.$banner->image))){
                unlink(public_path('photo/'.$banner->image));
            }
            $imageName=time().'.'.$request->image->extension();
            $request->image->move(public_path('photo'),$imageName);
            $banner->image=$imageName;
        }
        $banner->result=$request->result;
        $banner->save();
        return redirect()->route('banner.index');
    }

    public function destroy($id){
        $banner=Banner::find($id);
        if($banner->image && file_exists(public_path('photo/'.$banner->image))){
            unlink(public_path('photo/'.$banner->image));
        }
        $banner->delete();
        return redirect()->back();
    }
}
