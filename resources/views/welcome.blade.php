@extends('layout.app')

@section('title', 'Главная страница')

@section('content')

    <div class="grid grid-cols-2 md:grid-cols-4 gap-[20px]">
        @foreach($posts as $post)
            @include('posts.partials.item', ['post' => $post])
        @endforeach
    </div>
@endsection
