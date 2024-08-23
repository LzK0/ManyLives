<?php

namespace App\Http\Controllers;

//Importações
use App\Http\Controllers\Controller;
use App\Http\Requests\CadastraPostRequest;
use App\Http\Requests\FormPostRequest;
use App\Models\Likes_post;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index() //Função para mostrar a view index com paginação
    {
        $posts = Post::paginate(12);
        return view(
            "index",
            [
                "posts" => $posts
            ]
        );
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
        $data = $request->except('_token');
        $post = new Post();

        if ($request->hasFile('image_post') && $request->file('image_post')->isValid()) {
            $requestImage = $request->file('image_post')->store("images/posts", "public");
            $data['image_post'] = $requestImage;
        }

        $insert = $post->create($data);

        if ($insert) {
            return redirect()->route('index')->with("success", "Post criado com sucesso!");
        } else {
            return redirect()->route('adicionar_post')->with("error", "Erro ao criar o post!");
        }
    }

    public function user_posts($id) //Função para mostrar pegar os posts de um usuario
    {
        $posts = Post::where("user_id", $id)->paginate(6);
        return view("blog.user_posts", ["posts" => $posts]);
    }

    public function deletar_post($id)
    {
        // Likes_post::where("post_id", $id)->delete();
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
                Storage::disk('public')->delete($post->getAttributes()['image_post']);
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
    public function search(Request $request)
    {
        $search = $request->search;
        $output = "";
        if (empty($search)) {
            $output = "teste";
            return $output;
        } else {
            $posts = Post::where("title", "like", "%" . $search . "%")->paginate(6);
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
                            " . User::find($post->user_id)->name . "
                        </p>
                        <p>" . date('d/m/Y', strtotime($post->published_at)) . "</p>
                    </div>
                </div>
                <div class='w-full h-2/3 flex items-center border-b border-b-zinc-400'>
                    <a href='' class='text-lg font-bold hover:text-purple-600'>$post->title</a>
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

    public function dash()
    {
        $posts = Post::orderBy("created_at")->paginate(6);
        return view('blog.dashboard', ['posts' => $posts]);
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

    public function upload(Request $request) {}
    public function teste_one() {}
}
