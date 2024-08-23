@foreach($posts as $post)
<article class="border border-gray-300 bg-white rounded-lg shadow-md transition-transform duration-300 ease-in-out transform hover:scale-105 hover:shadow-xl flex flex-col">
    @if($post->image_post && $post->image_post !== 'error')
    <div class="w-full h-36 overflow-hidden rounded-t-lg">
        <img src="{{ asset('storage/'.$post->image_post) }}" alt="Post Image" class="w-full h-full object-cover">
    </div>
    @else
    <div class="w-full h-36 overflow-hidden rounded-t-lg" id="random-color"></div>
    @endif
    <div class="flex flex-col flex-1 p-3">
        <div class="flex items-center gap-3 mb-2">
            <div class="w-10 h-10 rounded-full bg-gray-300 overflow-hidden">
                <img src="{{ asset('storage/'. User::find($post->user_id)->image) }}" alt="User Image" class="w-full h-full object-cover rounded-full">
            </div>
            <div class="flex flex-col justify-center">
                <p class="text-xs font-semibold">{{ User::find($post->user_id)->name }}</p>
                <p class="text-xs text-gray-500">{{ date('d/m/Y', strtotime($post->published_at)) }}</p>
            </div>
        </div>
        <div class="flex-1 mb-2">
            <a href="{{ route('vizualizar_post', $post->id) }}" class="whitespace-normal text-sm font-semibold text-gray-800 hover:text-yellow-600 break-words">{{ $post->title }}</a>
        </div>
        <div class="w-full p-2 break-words flex-1">
            <p class="text-sm text-gray-700">{{ $post->description }}</p>
        </div>
        <div class="flex justify-between items-center mt-2">
            <div class="flex items-center gap-1 text-sm text-gray-600">
                <i class="fa-regular fa-heart text-red-500 cursor-pointer"></i>
                <p class="text-xs">2</p>
            </div>
            @if(Auth::check() && Auth::user()->id == $post->user_id)
            <div class="flex items-center gap-2 text-sm text-gray-600">
                <a href="{{ route('tela_editar_post', $post->id) }}" class="text-yellow-500 hover:text-yellow-600 transition duration-200">
                    <i class="fa-solid fa-pencil"></i>
                </a>
                <form action="{{ route('deletar_post', $post->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500 hover:text-red-600 transition duration-200">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </form>
            </div>
            @endif
        </div>
    </div>
</article>
@endforeach
