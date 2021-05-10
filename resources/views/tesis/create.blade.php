<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('guardar-tesis') }}">
            @csrf

            <!-- Título de la tesis -->
            <div>
                <x-label for="titulo" :value="__('Título de la tesis')" />

                <x-input id="titulo" class="block mt-1 w-full" type="text" name="titulo" :value="old('titulo')"  autofocus required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4">
                    {{ __('Actualizar datos') }}
                </x-button>
            </div>

        </form>
    </x-auth-card>
</x-guest-layout>
