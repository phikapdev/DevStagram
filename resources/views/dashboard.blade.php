@extends('layouts.app')

@section('titulo')
    Perfil: {{ $user->username }}
@endsection

@section('contenido')
    <div class="flex justify-center">
        <div class="w-full md:w-8/12 lg:w6/12 flex items-center md:flex-row">
            <div class="w-8/12 lg:w-6/12 px-5">
                <img src="{{ 
                    $user->imagen 
                    ? asset('perfiles').'/'. $user->imagen 
                    : asset('img/usuario.png') 
                    }}" alt="imagen usuario" />
            </div>
            <div class="sm:w-8/12 lg:w-6/12 px-5 flex flex-col items-center
             md:justify-center md:items-start py-10 md:py-10">
                
            <div class="flex items-center gap-2">
                 <p class="text-gray-700 text-2xl">{{ $user->username }}</p>
                 @auth
                 @if ($user->id == auth()->user()->id)
                 <a href="{{ route('perfil.index') }}"
                    class="text-gray-500 hover:text-gray-600 cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                        <path d="M2.695 14.763l-1.262 3.154a.5.5 0 00.65.65l3.155-1.262a4 4 0 001.343-.885L17.5 5.5a2.121 2.121 0 00-3-3L3.58 13.42a4 4 0 00-.885 1.343z" />
                    </svg>
                                             
                </a>
                @endif
                @endauth
            </div>

                <p class="text-gray-800 text-sm mb-3 font-bold">
                   {{ $user-> followers->count() }}
                    <span class="font-normal">
                        @choice('Seguidor|Seguidores', $user->followers->count())
                    </span>
                </p>
                <p class="text-gray-800 text-sm mb-3 font-bold">
                        {{ $user->followings->count() }}
                        <span class="font-normal">
                           Siguiendo
                        </span>
                    </span>
                </p>
                <p class="text-gray-800 text-sm mb-3 font-bold">
                    {{ $user->posts->count() }}
                    <span class="font-normal">
                        Posts
                    </span>
                </p>

                @auth
                    @if ($user->id !== auth()->user()->id)

                        @if (!$user->siguiendo(auth()->user()))
                            
                        
                        <form action="{{ route('users.follow', $user) }}" method="POST">
                            
                            @csrf 
                            
                            <input type="text" type="submit" class="bg-blue-600 text-white uppercase 
                            rounded-lg px-3 py-1 text-xs font-bold cursor-pointer" 
                            value="Seguir"
                            />
                            
                        </form>
                        @else
                        
                        <form action="{{ route('users.unfollow', $user) }}" method="POST">
                            
                            @csrf 
                            @method('DELETE')
                            
                            <input type="text" type="submit" class="bg-red-600 text-white uppercase 
                            rounded-lg px-3 py-1 text-xs font-bold cursor-pointer" 
                            value="Dejar de Seguir"
                            />
                            
                        </form>
                        @endif
                    @endif
                @endauth
            </div>
        </div>
    </div>

    <section class="container mx-auto mt-10">
        <h2 class="text-4xl text-center font-black my-10">Publicaciones</h2>

        @if ($posts->count())

        <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach ($posts as $post)
                <div>
                    <a href="{{ route('posts.show', ['post' => $post, 'user' => $user ]) }}">
                        <img src="{{ asset('uploads') . '/' . $post->imagen }}"  alt="Imagen del post {{ $post->titulo }}" />
                    </a>

                </div>
            @endforeach
        </div>

        <div class="mt-10">
            {{ $posts->links('pagination::tailwind') }}
        </div>
        @else

        <p class="text-gray-600 uppercase text-sm text-center font-bold">No hay Post</p>

        @endif
    </section>

@endsection