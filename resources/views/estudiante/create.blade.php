<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Registrar estudiante') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="{{ route('registrar-estudiante') }}">
                        @csrf

                        <!-- Nombre -->
                        <div>
                            <x-label for="nombre" :value="__('Nombre')" />

                            <x-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" required  autofocus />
                        </div>

                        <!-- Apellidos -->
                        <div class="mt-4">
                            <x-label for="apellidos" :value="__('Apellidos')" />

                            <x-input id="apellidos" class="block mt-1 w-full" type="text" name="apellidos" :value="old('apellidos')" required autofocus />
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-label for="email" :value="__('Email')" />

                            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                        </div>

                        <!-- Numero de control -->
                        <div class="mt-4">
                            <x-label for="numero_control" :value="__('Número de Control')" />

                            <x-input id="numero_control" class="block mt-1 w-full" type="text" name="numero_control" :value="old('numero_control')" />
                        </div>

                        <!-- Generación -->
                        <div class="mt-4">
                            <x-label for="generacion" :value="__('Generación')" />

                            <x-input id="generacion" class="block mt-1 w-full" type="text" name="generacion" :value="old('generacion')" />
                        </div>

                        <!-- CVU -->
                        <div class="mt-4">
                            <x-label for="cvu" :value="__('CVU')" />

                            <x-input id="cvu" class="block mt-1 w-full" type="text" name="cvu" :value="old('cvu')" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-4">
                                {{ __('Registrar') }}
                            </x-button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>
