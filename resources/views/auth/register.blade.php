@extends('plantilla')

@section('seccion')    
<x-guest-layout  class="pb-4">

    <div class="d-flex justify-content-between align-items-center mt-2">
        <h1 class="text-4xl">Bienvenido Usuario</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('tablaU') }}">Usuarios</a></li>
            </ol>
          </nav>
    </div>

    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
            </a>
        </x-slot>
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

            

        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf
            <!-- Nombre -->
            <div class="mt-2">
                <x-label for="name" :value="__('Nombre')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Apellido -->
            <div class="mt-2">
                <x-label for="apellido" :value="__('Apellido')" />

                <x-input id="apellido" class="block mt-1 w-full" type="text" name="apellido" :value="old('apellido')" required autofocus />
            </div>

            <!-- Nombre usuario -->
            <div class="mt-4">
                <x-label for="nom_usuario" :value="__('Nombre de Usuario')" />

                <x-input id="nom_usuario" class="block mt-1 w-full" type="text" name="nom_usuario" :value="old('nom_usuario')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Image Address -->
            <div class="mt-4">
                <x-label for="image" :value="__('Imagen')" />

                <x-input id="image" class="block mt-1 w-full" type="file" name="image" :value="old('image')" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Contraseña')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirmar Contraseña')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">                
                <x-button class="ml-4">
                    {{ __('Registrar') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
@endsection