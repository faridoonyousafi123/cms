<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Post;
use \App\Category;
use \App\Tag;

class WelcomeController extends Controller
{
    public function index() {
        return view('welcome')
        ->with('posts', Post::simplePaginate(2))
        ->with('categories', Category::all())
        ->with('tags', Tag::all());
    }
}
