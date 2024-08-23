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


class PostController extends Controller
{

    public function color_generator(): string
    {
        $colors = [
            'gray-200' => '#E5E7EB',
            'gray-300' => '#D1D5DB',
            'gray-400' => '#9CA3AF',
            'blue-200' => '#BFDBFE',
            'blue-300' => '#93C5FD',
            'green-200' => '#D1FAE5',
            'green-300' => '#A7F3D0',
            'rosa-claro' => '#F8E1E1',
            'rosa-pálido' => '#F9D5D5',
            'rosa-suave' => '#FBD9D9',
            'yellow-200' => '#FEF9C3',
            'yellow-300' => '#FDE68A',
        ];

        $randomColorKey = array_rand($colors);
        $randomColor = $colors[$randomColorKey];
        return $randomColor;
    }
    public function index() //Função para mostrar a view index com paginação
    {
        $posts = Post::paginate(12);
        return view(
            "index",
            [
                "posts" => $posts,
                'color' => $this->color_generator()
            ]
        );
    }

    public function like($idPost)
    {
        if (!Auth::check()) {
            return redirect()->back()->with("error", "Necessário estar logado para dar like!");
        }
        $post = Post::findOrFail($idPost);
        $like = Like::where('post_id', $post->id)
            ->where('user_id', Auth::id())
            ->first();

        if ($like) {
            $like->delete();
        } else {
            Like::create([
                'post_id' => $post->id,
                'user_id' => Auth::id(),
            ]);
        }

        return back();
    }

    public function vizualizar_post($id)
    {
        $post = Post::findOrFail($id);
        $user = User::findOrFail($post->user_id);
        $mais_posts = Post::orderBy('created_at')->paginate(3);
        if ($post) {
            return view("blog.vizualizar_post", [
                "post" => $post,
                "user" => $user,
                "mais_posts" => $mais_posts
            ]);
        } else {
            return redirect()->back()->with("error", "Erro ao vizualizar o post!");
        }
    }

    public function adicionar_post()
    {
        return view("blog.adicionar_post");
    }


    public function cadastro_post(CadastraPostRequest $request)
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
        return view("blog.user_posts", ["posts" => $posts, 'user' => $user, 'color' => $this->color_generator()]);
    }

    public function deletar_post($id)
    {
        // Likes_post::where("post_id", $id)->delete();
        $like = Like::where('post_id', $id)
        ->where('user_id', Auth::id())
        ->first();
        $like->delete();
        $post = Post::findOrFail($id)->delete();
        if ($post) {
            return redirect()->back()->with("success", "Post deletado com sucesso!");
        } else {
            return redirect()->back()->with("error", "Erro ao deletar o post!");
        }
    }

    public function tela_editar_post($id)
    {
        $post = Post::findOrFail($id);
        if ($post) {
            return view("blog.editar_post", ["post" => $post]);
        } else {
            return redirect()->back()->with("error", "Erro ao editar o post!");
        }
    }

    public function editar_post(CadastraPostRequest $request, $id)
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
            return redirect()->route('index')->with('success', 'Produto atualizado com sucesso!');
        } else {
            return redirect()->route(back(), $id)->with(['erros' => 'Falha ao editar']);
        }
    }

    // Teste
    public function search_index(Request $request)
    {
        $search = $request->input('search');
        $posts = Post::where('title', 'like', '%' . $search . '%')->paginate(12);
        if (count($posts) == 0) {
            return redirect()->back()->with("error", "Nenhum resultado encontrado");
        } else {
            return view('index', ['posts' => $posts, 'color' => $this->color_generator()]);
        }
    }
    public function search_user_posts(Request $request)
    {
        $search = $request->input('search');
        $posts = Post::where('user_id', Auth::user()->id)
            ->where('title', 'like', "%$search")->paginate(9);
        if (count($posts) == 0) {
            return redirect()->back()->with("error", "Nenhum resultado encontrado");
        } else {
            return view('blog.user_posts', ['posts' => $posts, 'color' => $this->color_generator()]);
        }
    }

    public function dash()
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
            if ($perfil->getAttributes()['image'] != NULL) {
                Storage::disk('public')->delete($perfil->getAttributes()['image']);
                $requestImage = $request->file('image')->store('images/users', 'public');
                $data['image'] = $requestImage;
            } else {
                unset($data['image']);
            }
        }
        $update = $perfil->update($data);
        if ($update) {
            return redirect()->route('index')->with('success', 'Perfil atualizado com sucesso!');
        } else {
            return redirect()->route(back(), $id)->with(['erros' => 'Falha ao editar']);
        }
    }

    // public function search_post(Request $request)
    // {
    //     $query = $request->input('query');
    //     $posts = Post::where('title', 'like', '%' . $query . '%')->paginate(12);
    //     return view('index', ['posts' => $posts]);
    // }

    public function upload(Request $request) {}
    public function teste_one() {}
}

        // Search for posts containing the query

        // Return the view with the posts
