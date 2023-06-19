
@extends('layouts.app')

@section('titulo')
    {{ $post->titulo }}
@endsection

@section('contenido')
    <div class="container mx-auto md:flex">
        <div class="md:w-1/2">
            <img src="{{ asset('uploads') . '/' . $post->imagen }}" alt="Imagen del Post {{ $post->titulo }}">

            <div class="flex items-center gap-4 p-3">
                @auth

              {{--  @php
                    $mensaje = "Hola mundo desde una variable"
                @endphp
                    <livewire:like-post :mensaje="$mensaje" /> --}}
                    <livewire:like-post :post="$post" />

                    {{-- @if ($post->checkLike(auth()->user()))
                    <form method="POST" action="{{ route('posts.likes.destroy', $post) }}">
                        @method('DELETE')
                        @csrf
                        <div class="my-4">

                        </div>
                    </form>
                    @else
                    <form method="POST" action="{{ route('posts.likes.store', $post) }}">
                        @csrf
                        <div class="my-4">
                            <button type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.633 10.5c.806 0 1.533-.446 2.031-1.08a9.041 9.041 0 012.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 00.322-1.672V3a.75.75 0 01.75-.75A2.25 2.25 0 0116.5 4.5c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 01-2.649 7.521c-.388.482-.987.729-1.605.729H13.48c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 00-1.423-.23H5.904M14.25 9h2.25M5.904 18.75c.083.205.173.405.27.602.197.4-.078.898-.523.898h-.908c-.889 0-1.713-.518-1.972-1.368a12 12 0 01-.521-3.507c0-1.553.295-3.036.831-4.398C3.387 10.203 4.167 9.75 5 9.75h1.053c.472 0 .745.556.5.96a8.958 8.958 0 00-1.302 4.665c0 1.194.232 2.333.654 3.375z" />
                                </svg>
                            </button>
                        </div>
                    </form>
                    @endif --}}
                @endauth

            </div>

            <div>
                <p class="font-bold">{{ $post->user->username }} </p>
                <p class="text-sm text-gray-500">
                    {{ $post->created_at->diffForHumans() }}
                </p>
                <p class="mt-5">
                    {{ $post->descripcion }}
                </p>
             </div>

             @auth
                @if ($post->user_id === auth()->user()->id)     <!--La persona autenticada es la misma que creo el post -->
                <form method="POST" action="{{ route('posts.destroy', $post) }}">
                    @method('DELETE') {{-- Metodo spoofing --}}
                    @csrf
                    <input
                    type="submit"
                    value="Eliminar publicación"
                    class="p-2 mt-4 font-bold text-white bg-red-500 rounded cursor-pointer hober:bg-red-600"
                    />
                </form>
                @endif
             @endauth

        </div>
        <div class="p-5 md:w-1/2">
            <div class="p-5 mb-5 bg-white shadow">
                @auth
            <p class="mb-4 font-bold text-center text-x">Agrega un nuevo Comentario</p>

            @if (session('mensaje'))
                <div class="p-2 mb-6 font-bold text-center text-white uppercase bg-green-500 rounded-lg">
                    {{ session('mensaje') }}
                </div>
            @endif

            <form action="{{ route('comentarios.store', ['post' => $post, 'user' => $user])}}" method="POST">
                @csrf
                <div class="mb-5">
                    <label for="comentario" class="block mb-2 font-bold text-gray-500 uppercase">
                        Añade un comentario
                    </label>
                    <textarea
                        id="comentario"
                        name="comentario"
                        placeholder="Agrega un comentario"
                        class="w-full p-3 border rounded-lg @error('comentario') border-red-500
                        @enderror"
                    ></textarea>
                    @error('comentario')
                        <p class="p-2 my-2 text-sm text-center text-white bg-red-500 rounded-lg">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <input
                    type="submit"
                    value="Comentar este Post"
                    class="w-full font-bold text-white uppercase rounded-lg bg-sky-600 hober:bg-sky-700 p3"
                />
            </form>
            @endauth
            <div class="mt-10 mb-5 overflow-y-scroll bg-white shadow max-h-96"></div>
            @if ($post->comentarios->count())
                @foreach ($post->comentarios as $comentario)
                    <div class="p-5 border-b border-gray-300">
                        <a href="{{ route('posts.index', $comentario->user) }}" class="font-bold">


                            {{ $comentario->user->username }}
                        </a>
                        <p>{{ $comentario->comentario }}
                            <p class="text-sm text-gray-500">{{ $comentario->created_at->diffForHumans() }}
                    </div>
                @endforeach
            @else
                <p class="p-10 -text-center">No hay comentarios Aún</p>
            @endif
            </div>
        </div>
    </div>
@endsection
