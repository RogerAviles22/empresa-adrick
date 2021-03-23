<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <img src="{{ asset('img/logo.png') }} " alt="logo" class="img-fluid" width="200">
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="nom_usuario" :value="__('Ingresa tu nombre de usuario')" />

                <x-input id="nom_usuario" class="block mt-1 w-full" type="text" name="nom_usuario" :value="old('nom_usuario')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Ingresa tu contraseña')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            
            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-3">
                    {{ __('Iniciar sesión') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
