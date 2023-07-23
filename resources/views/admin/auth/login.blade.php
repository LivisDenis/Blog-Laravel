@extends('layout.app')

@section('title', 'Авторизация')

@section('content')

    <div class="h-screen bg-white flex flex-col space-y-10 justify-center items-center">
        <div class="bg-white w-96 shadow-xl rounded p-5">
            <h1 class="text-3xl font-medium">Вход в админ панель</h1>

            <form method="POST" action="{{ route('admin.login_form') }}" class="space-y-5 mt-5">
                @csrf

                <input name="email" type="text" value="{{old('email') ?? 'test@example.com'}}" class="w-full h-12 border border-gray-800 rounded px-3"
                       placeholder="Email"/>
                @error('email')
                <p class="text-red-500">{{$message}}</p>
                @enderror

                <input name="password" type="password" value="123456" class="w-full h-12 border border-gray-800 rounded px-3"
                       placeholder="Пароль"/>
                @error('password')
                <p class="text-red-500">{{$message}}</p>
                @enderror

                <button type="submit" class="text-center w-full bg-blue-900 rounded-md text-white py-3 font-medium">
                    Войти
                </button>
            </form>
        </div>
    </div>

@endsection
