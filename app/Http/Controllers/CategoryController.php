<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $category=Category::get();
        return view('category.index',compact('category'));
    }
    public function create(){
        return view('category.create');
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
        return redirect()->route('category.index');
    }

    public function edit($id){
        $category=Category::find($id);
        return view('category.edit',compact('category'));
    }

    public function update(Request $request,$id){
        $category=Category::find($id);

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
        return redirect()->route('category.index');

    }

    public function destroy($id){
        $category=Category::find($id);
        if ($category->image && file_exists(public_path('uploads/'.$category->image))) {
                unlink(public_path('uploads/'.$category->image));
        }
        $category->delete();
        return redirect()->back();
    }
}
