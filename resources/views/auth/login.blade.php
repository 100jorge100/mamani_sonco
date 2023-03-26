<x-guest-layout>
    <!--agregamos este pequeño codigo para que aparesca un boton de registrar  !-->
    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
        <a href="{{route('register')}}" class="ml-4 text-sm text-gray-700 underline">Register</a>
    </div>
    <!-- hasta aqui !-->
    <x-authentication-card>
        <div>
            <label class="mt-8 text-2xl font-medium text-bg-black text-center "><h3>Inicio de Seción</h3></label>
        </div>
        <x-slot name="logo">
            {{-- <x-authentication-card-logo /> --}}
            <p class="mt-8 text-2xl font-medium text-bg-black">BIEN BENIDOS AL SISTEMA DE MONITOREO DE PROYECTOS DEL GAMB</p>
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Correo Electrónico') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Contraseña') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            {{-- <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div> --}}

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class=" text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Olvidaste tu Contraseña?') }}
                    </a>
                @endif

                <x-button class="ml-4">
                    {{ __('Ingresar al Sistema') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
