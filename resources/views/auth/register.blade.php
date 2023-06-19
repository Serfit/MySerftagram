@extends('layouts.app')

@section('titulo')
Registrate en SerfStagram
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-10 md:items-center pd-5">
        <div class="md:w-6/12">
            <img src="{{ asset('img/registrar.jpg') }}" alt="Imagen registro usuario">

        </div>
        <div class="p-6 bg-white rounded-lg shadow-xl md:w-4/12">
            <form action="{{ route('register') }}" method="POST" novalidate>
                @csrf
                <div class="mb-5">
                    <label for="name" class="block mb-2 font-bold text-gray-500 uppercase">
                        Nombre
                    </label>
                    <input
                        id="name"
                        name="name"
                        type="text"
                        placeholder="Tu nombre"
                        class="w-full p-3 border rounded-lg @error('name') border-red-500
                        @enderror"
                        value="{{ old('name') }}"
                    />
                    @error('name')
                        <p class="p-2 my-2 text-sm text-center text-white bg-red-500 rounded-lg">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="username" class="block mb-2 font-bold text-gray-500 uppercase">
                        Username
                    </label>
                    <input
                        id="username"
                        name="username"
                        type="text"
                        placeholder="Tu nombre de usuario"
                        class="w-full p-3 border rounded-lg @error('username') border-red-500
                        @enderror"
                        value="{{ old('username') }}"
                    />
                    @error('username')
                        <p class="p-2 my-2 text-sm text-center text-white bg-red-500 rounded-lg @error('name') border-red-500
                        @enderror">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="email" class="block mb-2 font-bold text-gray-500 uppercase">
                        Email
                    </label>
                    <input
                        id="email"
                        name="email"
                        type="email"
                        placeholder="Tu Email de registro"
                        class="w-full p-3 border rounded-lg @error('email') border-red-500
                        @enderror"
                        value="{{ old('email') }}"
                    />
                    @error('email')
                        <p class="p-2 my-2 text-sm text-center text-white bg-red-500 rounded-lg">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="password" class="block mb-2 font-bold text-gray-500 uppercase">
                        Password
                    </label>
                    <input
                        id="password"
                        name="password"
                        type="password"
                        placeholder="Password de registro"
                        class="w-full p-3 border rounded-lg @error('password') border-red-500
                        @enderror"
                        value="{{ old('password') }}"
                    />
                    @error('password')
                        <p class="p-2 my-2 text-sm text-center text-white bg-red-500 rounded-lg">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="password_confimation" class="block mb-2 font-bold text-gray-500 uppercase">
                        Repetir Password
                    </label>
                    <input
                    id="password_confirmation"
                        name="password_confirmation"
                        type="password"
                        placeholder="Tu password"
                        class="w-full p-3 border rounded-lg "
                    />
                </div>
                <input
                    type="submit"
                    value="Crear cuenta"
                    class="w-full font-bold text-white uppercase rounded-lg bg-sky-600 hober:bg-sky-700 p3"
                />
         </div>
    </div>
@endsection
