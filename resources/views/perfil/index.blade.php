@extends('layouts.app')
@section('titulo')
    Editar Perfil: {{ auth()->user()->username }}
@endsection

@section('contenido')
    <div class="md:flex md:justify-center">
        <form method="POST" action="{{ route('perfil.store') }}" enctype="multipart/form-data" class="mt-10 md:mt-0">
            @csrf
            <div class="mb-5">
                <label for="username" class="block mb-2 font-bold text-gray-500 uppercase">
                    Username
                </label>
                <input
                    id="username"
                    name="username"
                    type="text"
                    placeholder="Tu usuario"
                    class="w-full p-3 border rounded-lg @error('username') border-red-500
                    @enderror"
                    value="{{ auth()->user()->username }}"
                />
                @error('username')
                    <p class="p-2 my-2 text-sm text-center text-white bg-red-500 rounded-lg">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="mb-5">
                <label for="imagen" class="block mb-2 font-bold text-gray-500 uppercase">
                    Imagen Perfil
                </label>
                <input
                    id="imagen"
                    name="imagen"
                    type="file"
                    class="w-full p-3 border rounded-lg"
                    value=""
                    accept=".jpg, .jpeg, .png"
                />
            </div>

            <div class="mb-5">
                <label for="oldpassword" class="block mb-2 font-bold text-gray-500 uppercase">
                    Password actual
                </label>
                <input
                    id="oldpassword"
                    name="oldpassword"
                    type="password"
                    placeholder="Password"
                    class="w-full p-3 border rounded-lg @error('oldpassword') border-red-500
                    @enderror"
                />
                @error('oldpassword')
                    <p class="p-2 my-2 text-sm text-center text-white bg-red-500 rounded-lg">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            @if (session('mensaje'))
            <p class="p-2 my-2 text-sm text-center text-white bg-red-500 rounded-lg">
                {{ session('mensaje') }}
            </p>
            @endif

            <div class="mb-5">
                <label for="oldpassword" class="block mb-2 font-bold text-gray-500 uppercase">
                    ingresa nuevo password
                </label>
                <input
                    id="password"
                    name="password"
                    type="password"
                    placeholder="Nuevo Password"
                    class="w-full p-3 border rounded-lg @error('password') border-red-500
                    @enderror"
                    value=""
                />
                @error('password')
                    <p class="p-2 my-2 text-sm text-center text-white bg-red-500 rounded-lg">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="mb-5">
                <label for="password_confirmation" class="block mb-2 font-bold text-gray-500 uppercase">
                    Repetir Nueva Password
                </label>
                <input id="password_confirmation" name="password_confirmation" type="password" placeholder="Tu Password" class="w-full p-3 border rounded-lg">
            </div>

            <input
                    type="submit"
                    value="Guardar Cambios"
                    class="w-full font-bold text-white uppercase transition-colors rounded-lg cursor-pointer bg-sky-600 hober:bg-sky-700 p3"
                />

        </form>
    </div>

@endsection
