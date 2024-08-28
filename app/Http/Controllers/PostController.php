<?php

namespace App\Http\Controllers;

//Importações
use App\Http\Controllers\Controller;
use App\Http\Requests\CadastraPostRequest;
use App\Http\Requests\FormPostRequest;
use App\Models\Like;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\Follow;


class PostController extends Controller
{
    public function index() //Função para mostrar a view index com paginação
    {
        $posts = Post::paginate(12);
        $users = User::all();
        $follows = Follow::all();
        return view(
            "index",
            [
                "posts" => $posts,
                "users" => $users,
                "follows" => $follows
            ]
        );
    }

    public function like($idPost) // Função para dar like
    {
        if (!Auth::check()) {
            return redirect()->back()->with(['error' => 'Você precisa estar logado para dar like.']);
        }

        $post = Post::findOrFail($idPost);
        $userId = Auth::id();
        $like = Like::where('post_id', $post->id)
            ->where('user_id', $userId)
            ->first();

        if ($like) {
            $like->delete();
        } else {
            Like::create([
                'post_id' => $post->id,
                'user_id' => $userId,
            ]);
        }

        return redirect()->back();
    }

    public function follow_user($idFollowed)
    {
        $userFollowed = User::findOrFail($idFollowed);
        $idFollower = Auth::id();
        $follows = Follow::where('id_followed', $userFollowed->id)
            ->where('id_follower', $idFollower)->first();

        if ($follows) {
            $follows->delete();
        } else {
            Follow::create([
                'id_followed' => $idFollowed,
                'id_follower' => $idFollower
            ]);
        }

        return redirect()->back();
    }

    public function vizualizar_post($id)  //Função para mostrar o post
    {
        $post = Post::findOrFail($id);
        $user = User::findOrFail($post->user_id);
        $mais_posts = Post::orderBy('created_at')->paginate(3);
        $follows = Follow::all();
        $users = User::all();
        if ($post) {
            return view("blog.vizualizar_post", [
                "post" => $post,
                "user" => $user,
                "mais_posts" => $mais_posts,
                "follows" => $follows,
                "users" => $users
            ]);
        } else {
            return redirect()->back()->with("error", "Erro ao vizualizar o post!");
        }
    }

    public function adicionar_post() //Função para mostrar a view de adicionar post
    {
        return view("blog.adicionar_post");
    }


    public function cadastro_post(CadastraPostRequest $request) //Função para cadastrar o post
    {
        $data = $request->except('_token', 'submit');

        if ($request->hasFile('image_post') && $request->file('image_post')->isValid()) {
            $requestImage = $request->file('image_post')->store("images/posts", "public");
            $data['image_post'] = $requestImage;
        }

        $insert = Post::create($data);

        if ($insert) {
            return redirect()->route('index')->with("success", "Post criado com sucesso!");
        } else {
            return redirect()->route('adicionar_post')->with("error", "Erro ao criar o post!");
        }
    }

    public function user_posts($id) //Função para mostrar pegar os posts de um usuario
    {
        $posts = Post::where("user_id", $id)->paginate(6);
        $user = User::findOrFail($id);
        $follows = Follow::all();
        $users = User::all();
        $followerUser = Follow::where('id_follower', Auth::user()->id)->get();
        $postsFollowed = Post::whereIn('user_id', $followerUser->pluck('id_followed'))->paginate(9);
        return view("blog.user_posts", ["posts" => $posts, 'user' => $user, 'follows' => $follows, 'users' => $users, 'postsFollowed' => $postsFollowed]);
    }

    public function deletar_post($id) //Função para deletar o post
    {
        $like = Like::where('post_id', $id)
            ->first();
        if ($like) {
            $like->delete();
        }
        $post = Post::findOrFail($id);
        $imgDelete = Storage::disk('public')->delete($post->getAttributes()['image_post']);
        $postDelete = $post->delete();
        if ($postDelete && $imgDelete) {
            return redirect()->back()->with("success", "Post deletado com sucesso!");
        } else {
            return redirect()->back()->with("error", "Erro ao deletar o post!");
        }
    }
    public function tela_editar_post($id) //Função para mostrar a view de editar o post
    {
        $post = Post::findOrFail($id);
        if ($post) {
            return view("blog.editar_post", ["post" => $post]);
        } else {
            return redirect()->back()->with("error", "Erro ao editar o post!");
        }
    }

    public function editar_post(CadastraPostRequest $request, $id) //Função para editar o post
    {
        $data = $request->except('_token', 'submit');
        $post = Post::findOrFail($id);

        if ($request->hasFile('image_post') && $request->file('image_post')->isValid()) {
            if ($post->getAttributes()['image_post'] != NULL) {
                $requestImage = $request->file('image_post')->store('imagens/posts', 'public');
                $data['image_post'] = $requestImage;
            } else {
                unset($data['image_post']);
            }
        }
        $update = $post->update($data);
        if ($update) {
            return redirect()->route('index')->with('success', 'Post atualizado com sucesso!');
        } else {
            return redirect()->route(back(), $id)->with(['erros' => 'Falha ao editar']);
        }
    }

    public function search_index(Request $request) //Função para buscar o post (index)
    {
        $search = $request->input('search');
        $posts = Post::where('title', 'like', "%" . "$search" . "%")->orderBy("created_at")->paginate(20);
        $follows = Follow::all();
        $users = User::all();
        if (count($posts) == 0) {
            return redirect()->back()->with("error", "Nenhum resultado encontrado");
        } else {
            return view('index', ['posts' => $posts, 'search' => $search, 'follows' => $follows, 'users' => $users]);
        }
    }
    public function search_user_posts(Request $request) //Função para buscar o post (user_posts)
    {
        $data = $request->except('_token', 'submit');
        $search = $data['search'];
        $posts = Post::where('user_id', Auth::user()->id)
            ->where('title', 'like', "%" . $search . "%")->orderBy("created_at")->paginate(20);
        $follows = Follow::all();
        $users = User::all();
        if (count($posts) == 0) {
            return redirect()->back()->with("error", "Nenhum resultado encontrado");
        } else {
            return view('blog.user_posts', ['posts' => $posts, 'search' => $search, 'follows' => $follows, 'users' => $users]);
        }
    }

    public function dash() //Função para mostrar a dashboard (ordem de data)
    {
        $posts = Post::orderBy("created_at")->paginate(6);
        $users = User::all();
        return view('blog.dashboard', ['posts' => $posts, 'users' => $users]);
    }

    public function perfil()
    {
        return view("blog.perfil");
    }

    public function atualizar_perfil(Request $request, $id)
    {
        $data = $request->except('_token', 'password', 'password_confirmation', 'submit');
        $perfil = User::findOrFail($id);

        $data['links'] = $request->links == 'on' ? 1 : 0;
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            if ($perfil->image != NULL && Storage::disk('public')->exists($perfil->image) && $perfil->image != 'images/fixed/guestUser.jpg') {
                Storage::disk('public')->delete($perfil->image);
            }
            $requestImage = $request->file('image')->store('images/users', 'public');
            $data['image'] = $requestImage;
        } else {
            unset($data['image']); 
        }

        $update = $perfil->update($data);
        if ($update) {
            return redirect()->route('index')->with('success', 'Perfil atualizado com sucesso!');
        } else {
            return redirect()->back()->with('errors', 'Falha ao editar');
        }
    }

    public function perfil_other_user($idUser)
    {
        $user = User::findOrFail($idUser);
        $posts = Post::where('user_id', $user->id)->orderBy("created_at")->paginate(9);
        $follows = Follow::all();
        return view('blog.perfil_other', ['posts' => $posts, 'user' => $user, 'follows' => $follows]);
    }
}
