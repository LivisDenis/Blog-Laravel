<div class="max-w-[300px] flex flex-col bg-white shadow-2xl">
    <div>
        <a href="{{route('post.show', $post->id)}}">
            <img class="w-full max-h-[150px] object-cover" src="{{$post->thumbnail}}">
        </a>
    </div>
    <div class="px-2 py-2 flex-1">
        <h2 class="font-bold text-[20px] text-gray-800">{{$post->title}}</h2>
        <p class="sm:text-sm text-xs text-gray-700 mt-1">
            {!! $post->preview !!}
        </p>
    </div>
</div>
