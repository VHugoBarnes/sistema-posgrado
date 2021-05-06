<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('editar-usuario') }}">
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

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4">
                    {{ __('Actualizar datos') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
