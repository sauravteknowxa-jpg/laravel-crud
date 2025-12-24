<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function article(){
        return view('articles');
    }

    public function store(Request $request){
        $request->validate([
            'name'=>'required',
            'model'=>'required',
            'price'=>'required',
            'description'=>'required',
        ]);

        $article = new Article();
        $article->name = $request->name;
        $article-> model = $request->model;
        $article->price=$request->price;
        $article->description=$request->description;
        $article ->save();

       return  redirect()->back();
    }
    
}
