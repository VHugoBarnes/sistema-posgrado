<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar docente') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="{{ route('editar-docente') }}">
                        @method('PUT')
                        @csrf

                        <!-- Nombre -->
                        <div>
                            <x-label for="nombre" class="text-gray-600 font-light" :value="__('Nombre')" />
                            <x-input id="nombre" class="w-full mt-2 mb-4 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-50" type="text" name="nombre" value="{{ Auth::user()->nombre }}"  autofocus />
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

                            <select id="genero" name="genero" class="block font-medium text-sm text-gray-700">
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

                        <!-- SNI -->
                        <div class="flex items-center mb-4 mt-2">
                            <input type="checkbox" class="h-6 w-6 text-gray-700 border rounded mr-2" name="sni" {{ $docente->sni == 'S' ? 'checked' : '' }}>
                            <x-label for="sni" class="text-gray-600 font-light" :value="__('SNI')" />
                        </div>

                        <!-- Catedras -->
                        <div class="flex items-center mb-4 mt-2">
                            <input type="checkbox" class="h-6 w-6 text-gray-700 border rounded mr-2" name="catedras" {{ $docente->catedras == 'S' ? 'checked' : '' }}>
                            <x-label for="catedras" class="text-gray-600 font-light" :value="__('Catedras')" />
                        </div>

                        <!-- Tipo Investigador -->
                        <div>
                            <x-label for="tipo_investigador" class="text-gray-600 font-light" :value="__('Tipo de Investigador')" />
                            <x-input id="tipo_investigador" class="w-full mt-2 mb-4 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-50" type="text" name="tipo_investigador" value="{{ $docente->tipo_investigador }}" />
                        </div>

                        <!-- Nivel Académico -->
                        <div>
                            <x-label for="nivel_academico" class="text-gray-600 font-light" :value="__('Nivel Académico')" />
                            <x-input id="nivel_academico" class="w-full mt-2 mb-4 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-50" type="text" name="nivel_academico" value="{{ $docente->nivel_academico }}" />
                        </div>

                        <!-- Puesto -->
                        <div>
                            <x-label for="puesto" class="text-gray-600 font-light" :value="__('Puesto')" />
                            <x-input id="puesto" class="w-full mt-2 mb-4 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-50" type="text" name="puesto" value="{{ $docente->puesto }}" />
                        </div>

                        <!-- Jornada -->
                        <div>
                            <x-label for="jornada" class="text-gray-600 font-light" :value="__('Jornada')" />
                            <x-input id="jornada" class="w-full mt-2 mb-4 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-50" type="text" name="jornada" value="{{ $docente->jornada }}" />
                        </div>

                        <!-- Publicaciones -->
                        <div>
                            <x-label for="publicaciones" class="text-gray-600 font-light" :value="__('Publicaciones')" />
                            <x-input id="publicaciones" class="w-full mt-2 mb-4 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-50" type="text" name="publicaciones" value="{{ $docente->publicaciones }}" />
                        </div>

                        <!-- Cursos -->
                        <div>
                            <x-label for="cursos" class="text-gray-600 font-light" :value="__('Cursos')" />
                            <x-input id="cursos" class="w-full mt-2 mb-4 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-50" type="text" name="cursos" value="{{ $docente->cursos }}" />
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
