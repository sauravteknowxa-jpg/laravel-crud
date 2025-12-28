<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $category=Category::get();
        return response()->json([
            'status'=>true,
            'data'=>$category
        ],200);
    }

    public function tryindex()
{
    $categories = Category::get()->map(function ($category) {
        return [
            'id'    => $category->id,
            'name'  => $category->name,
            'image' => $category->image
                ? asset('public/uploads/' . $category->image)
                : null,
        ];
    });

    return response()->json([
        'status' => true,
        'data'   => $categories
    ], 200);
}


    public function store(Request $request){
        $request->validate([
            'name'=>'required|string',
            'model'=>'required|string',
            'price'=>'required|string',
            'image'=>'nullable|image',
            'description'=>'nullable|string',
        ]);
        
        $category=new Category();
        $category->name=$request->name;
        $category->model=$request->model;
        $category->price=$request->price;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads'), $imageName);
            $category->image = $imageName;           
        }
        $category->description=$request->description;
        
        $category->save();
        return response()->json([
            'status'=>true,
            'message'=>'category created successfully',
            'data'=> [
                'id'     => $category->id,
                'name'   => $category->name,             
                'image'  => $category->image
                    ? asset('public/uploads/' . $category->image)
                    : null,
            ],
        ],200);   
    }

    public function show($id){
        $category=Category::find($id);

        if (!$category) {
            return response()->json([
                'status'  => false,
                'message' => 'Category not found'
            ], 404);
        }

        return response()->json([
            'status'=>true,
            
            'data'=> [
                'id'     => $category->id,
                'name'   => $category->name,
                'model'       => $category->model,
                'price'       => $category->price,
                'description' => $category->description,             
                'image'  => $category->image
                    ? asset('public/uploads/' . $category->image)
                    : null,
            ],
        ],200);
    }
    public function update(Request $request,$id){
        $category=Category::find($id);

        if (!$category) {
            return response()->json([
                'status'  => false,
                'message' => 'Category not found'
            ], 404);
        }

        $request->validate([
            'name'=>'required|string',
            'model'=>'required|string',
            'price'=>'required|string',
            'image'=>'nullable|image',
            'description'=>'nullable|string',
        ]);
        $category->name=$request->name;
        $category->model=$request->model;
        $category->price=$request->price;
        if ($request->hasFile('image')) {
            if ($category->image && file_exists(public_path('uploads/'.$category->image))) {
                    unlink(public_path('uploads/'.$category->image));
            }
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads'), $imageName);
            $category->image = $imageName;           
        }
        $category->description=$request->description;
        $category->save();

        return response()->json([
            'status'=>true,
            'message'=>'category updated successfully',
            'data'=> [
                'id'     => $category->id,
                'name'   => $category->name,             
                'image'  => $category->image
                    ? asset('public/uploads/' . $category->image)
                    : null,
            ],
        ],200);
    }

    public function destroy($id){
        $category=Category::find($id);

        if (!$category) {
            return response()->json([
                'status'  => false,
                'message' => 'Category not found'
            ], 404);
        }

        if ($category->image && file_exists(public_path('uploads/'.$category->image))) {
                unlink(public_path('uploads/'.$category->image));
        }
        
        $category->delete();

        return response()->json([
            'status'=>true,
            'message'=>'user deleted successfully'
        ]);
    }
}
