@extends('layout.app')

@section('title', 'Статьи')

@section('content')
    @include('partials.post_filter', ['postRoute' => 'post.index'])

    <div class="grid grid-cols-2 md:grid-cols-4 gap-[20px] mt-10 mb-20">
        @foreach($posts as $post)
            @include('posts.partials.item', ['post' => $post])
        @endforeach
    </div>
    {{$posts->withQueryString()->links()}}
@endsection

@vite('resources/js/filter.js')
