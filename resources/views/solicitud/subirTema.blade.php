<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('enviar-modificacion-titulo') }}" enctype="multipart/form-data">
            @csrf

            <!-- Archivo firmado -->
            <div>
                <x-label for="archivo_solicitud" :value="__('Sube aquí tu archivo firmado')" />

                <x-input id="archivo_solicitud" class="block mt-1 w-full disabled:opacity-50" type="file" name="archivo_solicitud" :value="old('archivo')"  autofocus required/>
            </div>

            <!-- Protocolo -->
            <div>
                <x-label for="archivo_protocolo" :value="__('Sube aquí tu archivo firmado')" />

                <x-input id="archivo_protocolo" class="block mt-1 w-full disabled:opacity-50" type="file" name="archivo_protocolo" :value="old('archivo')"  autofocus required/>
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4">
                    {{ __('Solicitar cambio') }}
                </x-button>
            </div>

        </form>
    </x-auth-card>
</x-guest-layout>
