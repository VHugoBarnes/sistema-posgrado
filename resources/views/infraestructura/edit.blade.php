<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('actualizar-infraestructura') }}">
            @method('PUT')
            @csrf

            {{-- <input type="hidden" name="id" value="{{ $infraestructura }}"> --}}

            <!-- Nombre -->
            <div>
                <x-label for="nombre" :value="__('Nombre')" />

                <x-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" value="{{ $infraestructura->nombre }}" required autofocus />
            </div>

            <!-- Tipo -->
            <div>
                <x-label for="tipo" :value="__('Tipo')" />

                <x-input id="tipo" class="block mt-1 w-full" type="text" name="tipo" value="{{ $infraestructura->tipo }}"  autofocus />
            </div>

            <!-- Caracteristicas -->
            <div>
                <x-label for="caracteristicas" :value="__('Caracteristicas')" />

                <x-input id="caracteristicas" class="block mt-1 w-full" type="text" name="caracteristicas" value="{{ $infraestructura->caracteristicas }}"  autofocus />
            </div>

            <!-- Observaciones -->
            <div>
                <x-label for="observaciones" :value="__('Observaciones')" />

                <x-input id="observaciones" class="block mt-1 w-full" type="text" name="observaciones" value="{{ $infraestructura->observaciones }}"  autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4">
                    {{ __('Crear Infraestructura') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
