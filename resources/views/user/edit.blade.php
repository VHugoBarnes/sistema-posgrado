<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar perfil') }}
        </h2>
    </x-slot>

    <div class="py-12">
        @if (session('status'))
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-{{ session('color') }}-300 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-{{ session('color') }}-300 border-b border-gray-200">
                        <p id="session" class="text-{{ session('color') }}-700">{{ session('status') }}</p>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="{{ route('editar-usuario') }}">
                        @method('PUT')
                        @csrf

                        <!-- Nombre -->
                        <div>
                            <x-label for="nombre" class="text-gray-600 font-light" :value="__('Nombre')" />

                            <x-input id="nombre" class="w-full mt-2 mb-4 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-50" type="text" name="nombre" value="{{ Auth::user()->nombre }}"  autofocus />
                        </div>

                        <!-- Apellidos -->
                        <div class="mt-4">
                            <x-label for="apellidos" class="text-gray-600 font-light" :value="__('Apellidos')" />

                            <x-input id="apellidos" class="w-full mt-2 mb-4 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-50" type="text" name="apellidos" value="{{ Auth::user()->apellidos }}" required autofocus />
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-label for="email" class="text-gray-600 font-light" :value="__('Email')" />

                            <x-input id="email" class="w-full mt-2 mb-4 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-50" type="email" name="email" value="{{ Auth::user()->email }}" required />
                        </div>

                        <!-- Genero -->
                        <div class="mt-4">
                            <x-label for="genero" class="text-gray-600 font-light" :value="__('Genero')" />

                            <select id="genero" name="genero" class="w-full mt-2 mb-2 border bg-white rounded px-3 py-2 outline-none">
                                @foreach ($generos as $key => $genero)
                                    <option value="{{ $key }}" 
                                    {{ Auth::user()->genero == $key ? 'selected="selected"' : '' }} >
                                        {{ $genero }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Direccion -->
                        <div class="mt-4">
                            <x-label for="direccion" class="text-gray-600 font-light" :value="__('Dirección')" />

                            <x-input id="direccion" class="w-full mt-2 mb-4 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-50" type="text" name="direccion" value="{{ Auth::user()->direccion }}" />
                        </div>

                        <!-- Teléfono -->
                        <div class="mt-4">
                            <x-label for="telefono" class="text-gray-600 font-light" :value="__('Teléfono')" />

                            <x-input id="telefono" class="w-full mt-2 mb-4 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-50" type="tel" name="telefono" value="{{ Auth::user()->telefono }}" placeholder="868-123-4567" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-button class="mb-1 w-full bg-blue-600 text-gray-200 rounded hover:bg-blue-500 px-4 py-2 focus:outline-none">
                                {{ __('Actualizar datos') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 mt-6">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Cambiar contraseña
                </h2>
                <x-auth-validation-errors class="mb-4" :errors="$errors" />

                <form method="POST" action="{{ route('cambiar-pwd') }}">
                    @csrf
                    <!-- Contraseña actual -->
                    <div class="mt-4">
                        <x-label for="old_pwd" class="text-gray-600 font-light" :value="__('Contraseña actual')" />

                        <x-input id="old_pwd" class="w-full mt-2 mb-4 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-50" type="password" name="old_pwd"  autofocus />
                    </div>

                    <!-- Nueva contraseña -->
                    <div class="mt-4">
                        <x-label for="new_pwd" class="text-gray-600 font-light" :value="__('Contraseña nueva')" />

                        <x-input id="new_pwd" class="w-full mt-2 mb-4 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-50" type="password" name="new_pwd" required />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-button class="mb-1 w-full bg-blue-600 text-gray-200 rounded hover:bg-blue-500 px-4 py-2 focus:outline-none">
                            {{ __('Actualizar contraseña') }}
                        </x-button>
                    </div>
                </form>
            </div>

        </div>
    </div>
    
</x-app-layout>
