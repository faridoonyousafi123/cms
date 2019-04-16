<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Post;
use \App\Category;
use \App\Tag;

class WelcomeController extends Controller
{
    public function index() {

        $search = request()->query('search');
        if($search) {
            $posts = Post::where('title', 'LIKE', "%" . $search . "%")->simplePaginate(2);
        }else {
            $posts = Post::simplePaginate(2);
        }
        return view('welcome')
        ->with('posts', $posts)
        ->with('categories', Category::all())
        ->with('tags', Tag::all());
    }
}
