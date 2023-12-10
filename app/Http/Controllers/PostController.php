<?php

namespace App\Http\Controllers;

//import Model "Post
use App\Models\Guestbook;

//return type View
use Illuminate\View\View;

use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * index
     *
     * @return View
     */
    public function index()
    {
        //get posts
        $posts = Guestbook::all();

        return view('posts.index', compact('posts'));
    }
}
