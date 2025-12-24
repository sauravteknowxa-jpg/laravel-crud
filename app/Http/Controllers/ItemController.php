<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    //

    public function items(){
        $items = Item::get();
        return view ('items',compact('items'));
    }

    public function store(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required',
        ]);
         
        $item = new Item(); 
        $item->name = $request->name;
        $item->email = $request->email;
        $item ->save();
 return redirect()->back()->with('success', 'Product added successfully!');
    }

   public function edititems($id){
      $item = Item::find($id);  
        return view ('edititems',compact('item'));
    }
     public function update(Request $request ,$id){
        // dd($request->all());
        $item = Item::find($id);
        //    dd($item);
     $data =   $request->validate([
            'name'=>'required',
            'email'=>'required',
        ]);
        // dd($data);
        
        $item->name = $request->name;
        $item->email = $request->email;
        $item ->update();
       return redirect()->back()->with('success', 'Product added successfully!');
    }
     
    public function destroy($id){
         $item = Item::find($id);
          $item ->delete();
      return redirect()->back()->with('success', 'Product added successfully!');
    
    }
}
