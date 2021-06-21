<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Registrar personal') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Nombre -->
                        <div>
                            <x-label for="nombre" class="text-gray-600 font-light" :value="__('Nombre')" />

                            <x-input id="nombre" class="w-full mt-2 mb-4 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-50" type="text" name="nombre" :value="old('nombre')" required autofocus />
                        </div>

                        <!-- Apellidos -->
                        <div class="mt-4">
                            <x-label for="apellidos" class="text-gray-600 font-light" :value="__('Apellidos')" />

                            <x-input id="apellidos" class="w-full mt-2 mb-4 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-50" type="text" name="apellidos" :value="old('apellidos')" required autofocus />
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-label for="email" class="text-gray-600 font-light" :value="__('Email')" />

                            <x-input id="email" class="w-full mt-2 mb-4 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-50" type="email" name="email" :value="old('email')" required />
                        </div>

                        <!-- Tipo de Usuario -->
                        <div class="mt-4">
                            <x-label for="tipo_usuario" class="text-gray-600 font-light" :value="__('Tipo de Usuario')" />

                            {{-- <x-input id="tipo_usuario" class="w-full mt-2 mb-4 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-50" type="text" name="tipo_usuario" :value="old('tipo_usuario')" required /> --}}
                            <select id="tipo_usuario" class="w-full mt-2 mb-2 border bg-white rounded px-3 py-2 outline-none" name="tipo_usuario">
                                <option value="Docente">Docente</option>
                                <option value="Jefe Posgrado">Jefe Posgrado</option>
                                <option value="Coordinador">Coordinador</option>
                                <option value="Asistente Coordinador">Asistente Coordinador</option>
                                <option value="Secretaria">Secretaria</option>
                            </select>
                        </div>

                        {{-- <!-- Password -->
                        <div class="mt-4">
                            <x-label for="password" class="text-gray-600 font-light" :value="__('Password')" />

                            <x-input id="password" class="block mt-1 w-full"
                                            type="password"
                                            name="password"
                                            required autocomplete="new-password" />
                        </div>

                        <!-- Confirm Password -->
                        <div class="mt-4">
                            <x-label for="password_confirmation" class="text-gray-600 font-light" :value="__('Confirm Password')" />

                            <x-input id="password_confirmation" class="block mt-1 w-full"
                                            type="password"
                                            name="password_confirmation" required />
                        </div> --}}

                        <div class="flex items-center justify-end mt-4">
                            <x-button class="mb-1 w-full bg-blue-600 text-gray-200 rounded hover:bg-blue-500 px-4 py-2 focus:outline-none">
                                {{ __('Registrar') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>
