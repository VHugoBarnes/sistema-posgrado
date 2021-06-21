<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar estudiante') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="{{ route('editar-estudiante') }}">
                        @method('PUT')
                        @csrf

                        <!-- Nombre -->
                        <div>
                            <x-label for="nombre" class="text-gray-600 font-light" :value="__('Nombre')" />
                            <x-input id="nombre" class="w-full mt-2 mb-4 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-50" type="text" name="nombre" value="{{ Auth::user()->nombre }}" required  autofocus />
                        </div>

                        <!-- Apellidos -->
                        <div>
                            <x-label for="apellidos" class="text-gray-600 font-light" :value="__('Apellidos')" />
                            <x-input id="apellidos" class="w-full mt-2 mb-4 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-50" type="text" name="apellidos" value="{{ Auth::user()->apellidos }}" required autofocus />
                        </div>

                        <!-- Email Address -->
                        <div>
                            <x-label for="email" class="text-gray-600 font-light" :value="__('Email')" />
                            <x-input id="email" class="w-full mt-2 mb-4 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-50" type="email" name="email" value="{{ Auth::user()->email }}" required />
                        </div>

                        <!-- Genero -->
                        <div>
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
                        <div>
                            <x-label for="direccion" class="text-gray-600 font-light" :value="__('Dirección')" />
                            <x-input id="direccion" class="w-full mt-2 mb-4 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-50" type="text" name="direccion" value="{{ Auth::user()->direccion }}" />
                        </div>

                        <!-- Teléfono -->
                        <div>
                            <x-label for="telefono" class="text-gray-600 font-light" :value="__('Teléfono')" />
                            <x-input id="telefono" class="w-full mt-2 mb-4 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-50" type="tel" name="telefono" value="{{ Auth::user()->telefono }}" placeholder="868-123-4567" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" />
                        </div>

                        <!-- Numero de control -->
                        <div>
                            <x-label for="numero_control" class="text-gray-600 font-light" :value="__('Número de Control')" />
                            <x-input id="numero_control" class="w-full mt-2 mb-4 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-50" type="text" name="numero_control" value="{{ $estudiante->numero_control }}" />
                        </div>

                        <!-- Generación -->
                        <div>
                            <x-label for="generacion" class="text-gray-600 font-light" :value="__('Generación')" />
                            <x-input id="generacion" class="w-full mt-2 mb-4 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-50" type="text" name="generacion" value="{{ $estudiante->generacion }}" />
                        </div>

                        <!-- Nivel de Estudios -->
                        <div>
                            <x-label for="nivel_estudios" class="text-gray-600 font-light" :value="__('Nivel de Estudios')" />
                            <x-input id="nivel_estudios" class="w-full mt-2 mb-4 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-50" type="text" name="nivel_estudios" value="{{ $estudiante->nivel_estudios }}" />
                        </div>

                        <!-- BECARIO -->
                        <div class="flex items-center mb-4 mt-2">
                            <input type="checkbox" class="h-6 w-6 text-gray-700 border rounded mr-2" name="becario" {{ $estudiante->becario == 'S' ? 'checked' : '' }}>
                            <x-label for="becario" class="text-gray-600 font-light" :value="__('Becario')" />
                            <!-- <input type="checkbox" name="becario" {{ $estudiante->becario == 'S' ? 'checked' : '' }}> -->
                        </div>

                        <!-- CVU -->
                        <div>
                            <x-label for="cvu" class="text-gray-600 font-light" :value="__('CVU')" />
                            <x-input id="cvu" class="w-full mt-2 mb-4 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-50" type="text" name="cvu" value="{{ $estudiante->cvu }}" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-button class="mb-1 w-full bg-blue-600 text-gray-200 rounded hover:bg-blue-500 px-4 py-2 focus:outline-none">
                                {{ __('Actualizar datos') }}
                            </x-button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>