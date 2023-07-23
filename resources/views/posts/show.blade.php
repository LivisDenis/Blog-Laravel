@extends('layout.app')

@section('title', $post->title)

@section('content')

    <div>
        <div class="m-auto px-4 py-8 max-w-xl">
            <div class="bg-white shadow-2xl">
                <div>
                    <img
                        src="{{$post->thumbnail}}">
                </div>
                <div class="px-4 py-2 mt-2 bg-white">
                    <h2 class="font-bold text-2xl text-gray-800">{{$post->title}}</h2>
                    <p class="sm:text-sm text-xs text-gray-700 px-2 mr-1 my-3">
                        {{$post->description}}
                    </p>
                </div>
            </div>


            <div>
                <section class="rounded-b-lg mt-4">
                    <form method="POST" action="{{ route('comment', $post->id) }}">
                    @csrf

                    <textarea name="text" class="w-full shadow-inner p-4 border-0 mb-4 rounded-lg focus:shadow-outline text-2xl"
                              placeholder="Ваш комментарий..." spellcheck="false"></textarea>
                    @error('text')
                        <p class="text-red-500">{{$message}}</p>
                    @enderror

                        <button type="submit"
                                class="font-bold py-2 px-4 w-full bg-purple-400 text-lg text-white shadow-md rounded-lg ">
                            Написать
                        </button>
                    </form>

                    <div id="task-comments" class="pt-4">
                        @foreach($post->comments as $comment)
                            @include('posts.partials.comment', ['comment' => $comment])
                        @endforeach
                    </div>
                </section>

            </div>
        </div>
    </div>
@endsection
