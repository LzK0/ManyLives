<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view(
            "index",
            [
                "posts" => $posts
            ]
        );
    }

    public function perfil()
    {
        return view("blog.perfil");
    }

    public function upload(Request $request)
    {
    }
    public function teste_one()
    {
    }
}
