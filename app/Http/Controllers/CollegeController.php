<?php

namespace App\Http\Controllers;

use App\Models\College;
use Illuminate\Http\Request;

class CollegeController extends Controller
{
    public function index(){
        $colleges=College::get();
        return view('college.index',compact('colleges'));
    }

    public function create(){
        return view('college.create');
    }

    public function store(Request $request){
        $request->validate([
            'name'=>'required|string',
            'department'=>'required|string',
            'image'=>'nullable|image'
        ]);
        $college=new College();
        $college->name=$request->name;
        $college->department=$request->department;
        if($request->hasFile('image')){
            $imageName=time().'.'.$request->image->extension();
            $request->image->move(public_path('gallery'),$imageName);
            $college->image=$imageName;
        }
        $college->save();
        return redirect()->route('college.index');
    }
    public function edit($id){
        $college=College::find($id);
        return view('college.edit',compact('college'));
    }

    public function update(Request $request,$id){
        $college=College::find($id);
        $data=$request->validate([
            'name'=>'required|string',
            'department'=>'required|string',
            'image'=>'nullable|image'
        ]);
        $college->name=$request->name;
        $college->department=$request->department;
        if($request->hasFile('image')){
            if($college->image && file_exists(public_path('gallery/'.$college->image))){
                    unlink(public_path('gallery/'.$college->image));
            }
            $imageName=time().'.'.$request->image->extension();
            $request->image->move(public_path('gallery'),$imageName);
            $college->image=$imageName;
        }
        $college->save();
        return redirect()->route('college.index');
    }

    public function destroy($id){
        $college=College::find($id);
        if($college->image && file_exists(public_path('gallery/'.$college->image))){
                 unlink(public_path('gallery/'.$college->image));
        }
        $college->delete();
        return redirect()->back();
    }
}

