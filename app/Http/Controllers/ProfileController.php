<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;


class ProfileController extends Controller
{
    public function profiles(){
        $profiles=Profile::get();
        return view('profiles',compact('profiles'));
    }

    public function store(Request $request){
    
        $request->validate([
            'name'=>'required|string|max:255',
            'image'=>'nullable|image',
        ]);

        $profile = new Profile();
        $profile->name=$request->name;
        // $profile->image=$request->image;

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('profiles'), $imageName);
            $profile->image = $imageName;
            
        }
        $profile->save();

        return redirect()->back()->with('success','profile added successfully');
    }

    public function editprofile($id){
        $profile = Profile::find($id);
        return view('editprofile',compact('profile'));
    }

    public function update(Request $request,$id){
        $profile = Profile::find($id);

        $data=$request->validate([
            'name'=>'required|string|max:255',
            'image'=>'nullable|image',
        ]);

        $profile->name=$request->name;
        // $profile->image=$request->image;

        if ($request->hasFile('image')) {
            if ($profile->image && file_exists(public_path('profiles/'.$profile->image))) {
                unlink(public_path('profiles/'.$profile->image));
            }
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('profiles'), $imageName);
            $profile->image = $imageName;
        }

        $profile->update();
        
        return redirect()->route('profiles')->with('success','profile updated successfully');

    }

    public function destroy($id){
        $profile = Profile::find($id);
        if ($profile->image && file_exists(public_path('profiles/'.$profile->image))) {
                unlink(public_path('profiles/'.$profile->image));
        }
        $profile->delete();
        return redirect()->back()->with('success','profile deleted successfully');

    }
}
