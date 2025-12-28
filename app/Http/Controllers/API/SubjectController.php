<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index(){
        $subjects=Subject::get()->map(function($subject){
          return [
            'id'    => $subject->id,
            'image' => $subject->image
                ? asset('public/album/' . $subject->image)
                : null,
        ];
        });
        return response()->json([
            'status'=>true,
            'data'=>$subjects

        ],200);
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
        return response()->json([
            'status'=>true,
            'message'=>'category created successfully',
            'data'=>[
                'id'=>$subject->id,
                'image'=>$subject->image
                    ?asset('public/album/'.$subject->image)
                    :null,
            ],
        ],200);

    }

    public function show($id){
        $subject=Subject::find($id);
        if(!$subject){
            return response()->json([
                'status'  => false,
                'message' => 'Category not found'
            ], 404);
        }

        return response()->json([
            'status'=>true,
            'data'=>[
                'id'=>$subject->id,
                'image'=>$subject->image
                    ?asset('public/album/'.$subject->image)
                    :null,
                 'result'=>$subject->result,   
            ],
        ],200);

    }

    public function update(Request $request,$id){
        $subject=Subject::find($id);
        if(!$subject){
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
        return response()->json([
            'status'=>true,
            'message'=>'category updated successfully',
            'data'=>[
                'id'=>$subject->id,
                'image'=>$subject->image
                    ?asset('public/album/'.$subject->image)
                    :null,
            ],
        ],200);

    }

    public function destroy($id){
        $subject=Subject::find($id);
        if(!$subject){
            return response()->json([
                'status'  => false,
                'message' => 'Category not found'
            ], 404);
        }
        if($subject->image && file_exists(public_path('album/'.$subject->image))){
                unlink(public_path('album/'.$subject->image));
        }

        $subject->delete();
        return response()->json([
            'status'=>true,
            'message'=>'user deleted successfully'
        ]);
    }
}
