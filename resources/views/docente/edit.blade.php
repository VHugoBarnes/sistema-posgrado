<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('editar-docente') }}">
            @method('PUT')
            @csrf

            <!-- Nombre -->
            <div>
                <x-label for="nombre" :value="__('Nombre')" />

                <x-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" value="{{ Auth::user()->nombre }}"  autofocus />
            </div>

            <!-- Apellidos -->
            <div class="mt-4">
                <x-label for="apellidos" :value="__('Apellidos')" />

                <x-input id="apellidos" class="block mt-1 w-full" type="text" name="apellidos" value="{{ Auth::user()->apellidos }}" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ Auth::user()->email }}" required />
            </div>

            <!-- Genero -->
            <div class="mt-4">
                <x-label for="genero" :value="__('Genero')" />

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
            <div class="mt-4">
                <x-label for="direccion" :value="__('Dirección')" />

                <x-input id="direccion" class="block mt-1 w-full" type="text" name="direccion" value="{{ Auth::user()->direccion }}" />
            </div>

            <!-- Teléfono -->
            <div class="mt-4">
                <x-label for="telefono" :value="__('Teléfono')" />

                <x-input id="telefono" class="block mt-1 w-full" type="tel" name="telefono" value="{{ Auth::user()->telefono }}" placeholder="868-123-4567" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" />
            </div>

            <!-- SNI -->
            <div class="mt-4">
                <x-label for="sni" :value="__('SNI')" />

                <input type="checkbox" name="sni">
            </div>

            <!-- Catedras -->
            <div class="mt-4">
                <x-label for="catedras" :value="__('Catedras')" />

                <input type="checkbox" name="catedras">
            </div>

            <!-- Tipo Investigador -->
            <div class="mt-4">
                <x-label for="tipo_investigador" :value="__('Tipo de Investigador')" />

                <x-input id="tipo_investigador" class="block mt-1 w-full" type="text" name="tipo_investigador" value="{{ $docente->tipo_investigador }}" />
            </div>

            <!-- Nivel Académico -->
            <div class="mt-4">
                <x-label for="nivel_academico" :value="__('Nivel Académico')" />

                <x-input id="nivel_academico" class="block mt-1 w-full" type="text" name="nivel_academico" value="{{ $docente->nivel_academico }}" />
            </div>

            <!-- Puesto -->
            <div class="mt-4">
                <x-label for="puesto" :value="__('Puesto')" />

                <x-input id="puesto" class="block mt-1 w-full" type="text" name="puesto" value="{{ $docente->puesto }}" />
            </div>

            <!-- Jornada -->
            <div class="mt-4">
                <x-label for="jornada" :value="__('Jornada')" />

                <x-input id="jornada" class="block mt-1 w-full" type="text" name="jornada" value="{{ $docente->jornada }}" />
            </div>

            <!-- Publicaciones -->
            <div class="mt-4">
                <x-label for="publicaciones" :value="__('Publicaciones')" />

                <x-input id="publicaciones" class="block mt-1 w-full" type="text" name="publicaciones" value="{{ $docente->publicaciones }}" />
            </div>

            <!-- Cursos -->
            <div class="mt-4">
                <x-label for="cursos" :value="__('Cursos')" />

                <x-input id="cursos" class="block mt-1 w-full" type="text" name="cursos" value="{{ $docente->cursos }}" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4">
                    {{ __('Actualizar datos') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
