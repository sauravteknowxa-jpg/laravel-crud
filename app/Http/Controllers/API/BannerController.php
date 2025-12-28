<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index(){
        $banners=Banner::get()->map(function($banner){
          return [
            'id'    => $banner->id,
            'image' => $banner->image
                ? asset('public/photo/' . $banner->image)
                : null,
        ];
        });
        return response()->json([
            'status'=>true,
            'data'=>$banners

        ],200);
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
        return response()->json([
            'status'=>true,
            'message'=>'category created successfully',
            'data'=>[
                'id'=>$banner->id,
                'image'=>$banner->image
                    ?asset('public/photo/'.$banner->image)
                    :null,
            ],
        ],200);

    }

    public function show($id){
        $banner=Banner::find($id);
        if(!$banner){
            return response()->json([
                'status'  => false,
                'message' => 'Category not found'
            ], 404);
        }

        return response()->json([
            'status'=>true,
            'data'=>[
                'id'=>$banner->id,
                'image'=>$banner->image
                    ?asset('public/photo/'.$banner->image)
                    :null,
                 'result'=>$banner->result,   
            ],
        ],200);

    }

    public function update(Request $request,$id){
        $banner=Banner::find($id);
        if(!$banner){
            return response()->json([
                'status'  => false,
                'message' => 'Category not found'
            ], 404);
        }
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
        return response()->json([
            'status'=>true,
            'message'=>'category updated successfully',
            'data'=>[
                'id'=>$banner->id,
                'image'=>$banner->image
                    ?asset('public/photo/'.$banner->image)
                    :null,
            ],
        ],200);

    }

    public function destroy($id){
        $banner=Banner::find($id);
        if(!$banner){
            return response()->json([
                'status'  => false,
                'message' => 'Category not found'
            ], 404);
        }
        if($banner->image && file_exists(public_path('photo/'.$banner->image))){
                unlink(public_path('photo/'.$banner->image));
        }

        $banner->delete();
        return response()->json([
            'status'=>true,
            'message'=>'user deleted successfully'
        ]);
    }
}
