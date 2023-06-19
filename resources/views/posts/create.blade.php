@extends('layouts.app')

@section('titulo')
    Crear una nueva publcación
@endsection

@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('contenido')
    <div class="md:flex md:items-center">
        <div class="px-10 md:w-1/2">
            <form action="{{ route('imagenes.store') }}" method="POST" enctype="multipart/form-data"
            id="dropzone" class="dropzone
            border-dashed border-2 w-full h-96 rounded flex flex-col
            justify-center items-center">
                @csrf
            </form>
        </div>
        <div class="p-10 mt-10 bg-white rounded-lg shadow-xl md:w-1/2 md:mt-0">
            <form action="{{ route('posts.store') }}" method="POST" novalidate>
                @csrf
                <div class="mb-5">
                    <label for="titulo" class="block mb-2 font-bold text-gray-500 uppercase">
                        Titulo
                    </label>
                    <input
                        id="titulo"
                        name="titulo"
                        type="text"
                        placeholder="Titulo de la Publicación"
                        class="w-full p-3 border rounded-lg @error('titulo') border-red-500
                        @enderror"
                        value="{{ old('titulo') }}"
                    />
                    @error('titulo')
                        <p class="p-2 my-2 text-sm text-center text-white bg-red-500 rounded-lg">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="descripcion" class="block mb-2 font-bold text-gray-500 uppercase">
                        Descripción
                    </label>
                    <textarea
                        id="descripcion"
                        name="descripcion"
                        placeholder="Descripción de la Publicación"
                        class="w-full p-3 border rounded-lg @error('descricion') border-red-500
                        @enderror"
                    >{{ old('descripcion') }}</textarea>
                    @error('descripcion')
                        <p class="p-2 my-2 text-sm text-center text-white bg-red-500 rounded-lg">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="mb-5">
                    <input name="imagen"
                    type="hidden"
                    value="{{ old('imagen') }}"
                    />
                    @error('imagen')
                        <p class="p-2 my-2 text-sm text-center text-white bg-red-500 rounded-lg">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <input
                    type="submit"
                    value="Crear Publicación"
                    class="w-full font-bold text-white uppercase rounded-lg bg-sky-600 hober:bg-sky-700 p3"
                />
            </form>
        </div>
    </div>
@endsection
