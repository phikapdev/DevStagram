@extends('layouts.app')

@section('titulo')
 
    Registrate en DevStagram

@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-10 md:items-center">
        <div class="md:w-6/12 p-5">
            <img src="{{ asset('img/registrar.jpg') }}" alt="Imagen registrar" />
        </div>
        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-lg">
            <form action="{{ route('register') }}" method="POST" novalidate>
                @csrf
                <div class="mb-5">
                    <label for="name" id="name" class="mb-2 block uppercase text-gray-500 font-bold">
                        Nombre
                    </label>

                    <input 
                        id="name"
                        name="name"
                        type="text"
                        placeholder="Tu nombre"
                        class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror"
                        value="{{old('name')}}"
                    />

                    @error('name')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="username" id="username" class="mb-2 block uppercase text-gray-500 font-bold">
                        Usuario
                    </label>

                    <input 
                        id="username"
                        name="username"
                        type="text"
                        placeholder="Tu Nombre de Usuarios"
                        class="border p-3 w-full rounded-lg @error('username') border-red-500 @enderror"
                        value="{{old('username')}}"
                    />

                    @error('username')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="email" id="email" class="mb-2 block uppercase text-gray-500 font-bold">
                        Email
                    </label>

                    <input 
                        id="email"
                        name="email"
                        type="email"
                        placeholder="Tu Email de Registro"
                        class="border p-3 w-full rounded-lg @error('email') border-red-500 @enderror"
                        value="{{old('email')}}"
                    />

                    @error('email')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="password" id="password" class="mb-2 block uppercase text-gray-500 font-bold">
                        Password
                    </label>

                    <input 
                        id="password"
                        name="password"
                        type="password"
                        placeholder="Tu Password de Registro"
                        class="border p-3 w-full rounded-lg @error('password') border-red-500 @enderror"
                        value="{{old('password')}}"
                    />

                    @error('password')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="password_confirmation" id="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">
                        Repetir Confirmacion
                    </label>

                    <input 
                        id="password_confirmation"
                        name="password_confirmation"
                        type="password"
                        placeholder="Tu Password de Registro"
                        class="border p-3 w-full rounded-lg"
                    />
                </div>

                <input 
                    type="submit"
                    value="Crear Cuenta"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer text-white uppercase font-bold w-full p-3"
                />

            </form>
        </div>
    </div>
@endsection