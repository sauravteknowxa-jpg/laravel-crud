<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(){
        $services=Service::get();
        return view('service.index',compact('services'));
    }

    public function create(){
        return view('service.create');
    }

    public function store(Request $request){
            $request->validate([
                'name'=>'required|string',
                'image'=>'nullable|image',
                'detail'=>'required|string',
                'description'=>'required|string'
            ]);
            $service=new Service();
            $service->name=$request->name;
            if($request->hasFile('image')){
                $imageName=time().'.'.$request->image->extension();
                $request->image->move(public_path('file'),$imageName);
                $service->image=$imageName;
            }
            $service->detail=$request->detail;
            $service->description=$request->description;
            $service->save();
            return redirect()->route('service.index');
    }

    public function edit($id){
        $service=Service::find($id);
        return view('service.edit',compact('service'));
    }

    public function update(Request $request,$id){
        $service=Service::find($id);
        $data= $request->validate([
                'name'=>'required|string',
                'image'=>'nullable|image',
                'detail'=>'required|string',
                'description'=>'required|string'
            ]);
           $service->name=$request->name;
            if($request->hasFile('image')){
                if($service->image && file_exists(public_path('file/'.$service->image))){
                    unlink(public_path('file/'.$service->image));
                }
                $imageName=time().'.'.$request->image->extension();
                $request->image->move(public_path('file'),$imageName);
                $service->image=$imageName;
            }
            $service->detail=$request->detail;
            $service->description=$request->description;
            $service->save();
            return redirect()->route('service.index');    
    }

    public function destroy($id){
        $service=Service::find($id);
        if($service->image && file_exists(public_path('file/'.$service->image))){
                    unlink(public_path('file/'.$service->image));
        }
        $service->delete();
        return redirect()->back();
    }
}
