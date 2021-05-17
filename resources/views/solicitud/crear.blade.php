<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('modificar-tesis') }}">
            @csrf

            <!-- Título de la tesis -->
            <div>
                <x-label for="titulo" :value="__('Título de la tesis')" />

                <x-input id="titulo" class="block mt-1 w-full disabled:opacity-50" type="text" name="titulo" value="{{ $tesis->titulo }}"  autofocus required disabled/>
            </div>
            <!-- Título NUEVO de la tesis -->
            <div class="pt-2">
                <x-label for="titulo" :value="__('Título nuevo de la tesis')" />

                <x-input id="titulo" class="block mt-1 w-full" type="text" name="titulo_nuevo" :value="old('titulo')"  autofocus required />
            </div>

            <!-- Objetivo General -->
            <div class="pt-8">
                <x-label for="titulo" :value="__('Objetivo general')" />

                <x-input id="titulo" class="block mt-1 w-full disabled:opacity-50" type="text" name="objetivo_general" value="{{ $tesis->objetivo_general }}"  autofocus required disabled/>
            </div>
            <!-- Objetivo General -->
            <div class="pt-2">
                <x-label for="titulo" :value="__('Objetivo general nuevo')" />

                <x-input id="titulo" class="block mt-1 w-full" type="text" name="objetivo_general" :value="old('objetivo_general')"  autofocus required />
            </div>

            <!-- Objetivo Especifico -->
            <div class="pt-8">
                <x-label for="titulo" :value="__('Objetivo específico')" />

                <x-input id="titulo" class="block mt-1 w-full disabled:opacity-50" type="text" name="objetivo_especifico" value="{{ $tesis->objetivo_especifico }}"  autofocus required disabled/>
            </div>
            <!-- Objetivo Especifico -->
            <div class="pt-2">
                <x-label for="titulo" :value="__('Objetivo específico nuevo')" />

                <x-input id="titulo" class="block mt-1 w-full" type="text" name="objetivo_especifico" :value="old('objetivo_especifico')"  autofocus required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4">
                    {{ __('Solicitar cambio') }}
                </x-button>
            </div>

        </form>
    </x-auth-card>
</x-guest-layout>
