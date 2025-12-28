<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index(){
        $subjects=Subject::get();
        return view('subject.index',compact('subjects'));
    }

    public function create(){
        return view('subject.create');
    }

    public function store(Request $request){
        $request->validate([
            'name'=>'required|string',
            'image'=>'nullable|image',
            'result'=>'required|string',
        ]);

        $subject=new Subject();
        $subject->name=$request->name;
        if($request->hasFile('image')){
            $imageName=time().'.'.$request->image->extension();
            $request->image->move(public_path('album'),$imageName);
            $subject->image=$imageName;
        }
        $subject->result=$request->result;
        $subject->save();
        return redirect()->route('subject.index');

    }

    public function edit($id){
        $subject=Subject::find($id);
        return view('subject.edit',compact('subject'));
    }
    
    public function update(Request $request,$id){
        $subject=Subject::find($id);
        $request->validate([
            'name'=>'required|string',
            'image'=>'nullable|image',
            'result'=>'required|string',
        ]);
        $subject->name=$request->name;
        if($request->hasFile('image')){
            if($subject->image && file_exists(public_path('album/'.$subject->image))){
                unlink(public_path('album/'.$subject->image));
            }
            $imageName=time().'.'.$request->image->extension();
            $request->image->move(public_path('album'),$imageName);
            $subject->image=$imageName;
        }
        $subject->result=$request->result;
        $subject->save();
        return redirect()->route('subject.index');
    }

    public function destroy($id){
        $subject=Subject::find($id);
        if($subject->image && file_exists(public_path('album/'.$subject->image))){
            unlink(public_path('album/'.$subject->image));
        }
        $subject->delete();
        return redirect()->back();
    } 
}
