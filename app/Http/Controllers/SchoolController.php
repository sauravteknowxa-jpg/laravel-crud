<?php

namespace App\Http\Controllers;

use App\Models\School;

use Illuminate\Http\Request;

class SchoolController extends Controller
{
    public function index(){
        $schools=School::get();
        return view('school.create',compact('schools'));
    }
    public function create(){
        return view('school.create');
    }

    public function store(Request $request){
        $request->validate([
            'classroom'=>'required|string',
            'student'=>'required|string',
            'teacher'=>'required|string',
            'image'=>'nullable|image'
        ]);
        $school=new School();
        $school->classroom=$request->classroom;
        $school->student=$request->student;
        $school->teacher=$request->teacher;
        if($request->hasFile('image')){
            $imageName=time().'.'.$request->image->extension();
            $request->image->move(public_path('photo'),$imageName);
            $school->image=$imageName;
        }
        $school->save();
        return redirect()->route('school.index');
    }
    public function edit($id){
        $school=School::find($id);
        return view('school.edit',compact('service'));
    }

    public function update(Request $request,$id){
        $school=School::find($id);
        $data=$request->validate([
            'classroom'=>'required|string',
            'student'=>'required|string',
            'teacher'=>'required|string',
            'image'=>'nullable|image'
        ]);
        $school->classroom=$request->classroom;
        $school->student=$request->student;
        $school->teacher=$request->teacher;
        if($request->hasFile('image')){
            if($school->image && file_exists(public_path('photo/'))){
                unlink(public_path('photo/'.$school->image));
            }
            $imageName=time().'.'.$request->image->extension();
            $request->image->move(public_path('photo'),$imageName);
            $school->image=$imageName;
        }
        $school->save();
        return redirect()->route('school.index');
    }
    public function destroy($id){
        $school=School::find($id);
        if($school->image && file_exists(public_path('photo/'))){
                unlink(public_path('photo/'.$school->image));
         }
         $school->delete();
         return redirect()->back();
    }
}
