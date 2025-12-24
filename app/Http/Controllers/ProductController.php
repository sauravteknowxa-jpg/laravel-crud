<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $product=Product::all();
        return view('index',['product'=>$product]);
    }

    public function create(){
        return view('create');
    }
    public function store(Request $request){
        $data=$request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|email|max:255',
            'address'=>'required|string|max:500',
            
        ]);
        $newData=Product::create($data);
        return redirect()->route('index');
    }

        public function edit($id){
            $product = Product::find($id);
            return view('edit', compact('product'));
        }

        public function update(Request $request, $id){
            $product = Product::find($id);
            $data = $request->validate([
                'name'=>'required|string|max:255',
                'email'=>'required|email|max:255',
                'address'=>'required|string|max:500',
            ]);
            $product->update($data);
            return redirect()->route('index');
        }

        public function destroy($id){
            $product = Product::find($id);
            $product->delete();
            return redirect()->route('index');
        }
        
}
