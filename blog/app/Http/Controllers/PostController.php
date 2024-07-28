<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Pagination\Paginator;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(6);
        return view(
            "index",
            [
                "posts" => $posts
            ]
        );
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $output = "";
        if ($search && $search == "") {
            return $output;
        } else {
            $posts = Post::where("title", "like", "%" . $search . "%")->get();
            foreach ($posts as $post) {
                $output .= "<article class='w-full h-1/6  border border-zinc-400
    md:w-2/5 md:h-[25rem] 
    lg:w-[30%] lg:p-1
    xl:w-[27%]'>
        <div class='cards-post w-full h-1/2 bg-[url('{{asset('images/perfilGato.jpg')}}')]'>
        </div>
        <div class='cards w-full h-1/2  flex flex-col p-4'>
            <div class='w-full h-1/3 flex items-center gap-2'>
                <div class='w-12 h-[3rem] rounded-full bg-zinc-900'>
                    <img src='Images/" . User::find($post->user_id)->image . "' alt='' class='w-full h-full rounded-full'>
                </div>
                <div class='w-2/3 h-6/6'>
                    <p>
                        {{User::find($post->user_id)->name}}
                    </p>
                    <p>{{date('d/m/Y', strtotime($post->publicado))}}</p>
                </div>
            </div>
            <div class='w-full h-2/3 flex items-center border-b border-b-zinc-400'>
                <a href='' class='text-lg font-bold hover:text-purple-600'>{{$post->title}}</a>
            </div>
            <div class='w-full h-1/3 flex items-center justify-end pr-6'>
                <div class=''><i class='fa-regular fa-heart text-red-500 cursor-pointer'></i> 3</div>
            </div>
        </div>
    </article>";
            }
            return $output;
        }
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
