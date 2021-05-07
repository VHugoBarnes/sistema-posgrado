<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('actualizar-linea') }}">
            @method('PUT')
            @csrf

            <x-input type="hidden" name="id" value="{{ $linea->id }}"/>

            <!-- Nombre -->
            <div>
                <x-label for="nombre" :value="__('Nombre')" />

                <x-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" value="{{ $linea->nombre }}" required autofocus />
            </div>

            <!-- Descripción -->
            <div>
                <x-label for="descripcion" :value="__('Descripción')" />

                <x-input id="descripcion" class="block mt-1 w-full" type="text" name="descripcion" value="{{ $linea->descripcion }}" autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4">
                    {{ __('Crear Infraestructura') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
