<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tu tesis') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-2xl text-gray-800">
                    {{ $tesis_titulo }}
                    </h1>
                    <h2 class="text-xl text-gray-900 mt-4" >
                        <span class="text-gray-600">Estudiante:</span> {{ $nombre_estudiante }}
                    </h2>
                    <div class="space-y-2 mt-8">
                    <p class="text-lg text-gray-800"><span class="text-blue-600">Director:</span> {{ $director }}</p>
                    <p class="text-lg text-gray-800"><span class="text-blue-600">Codirector:</span> {{ $codirector }}</p>
                    <p class="text-lg text-gray-800"><span class="text-blue-600">Secretario:</span> {{ $secretario }}</p>
                    <p class="text-lg text-gray-800"><span class="text-blue-600">Vocal:</span> {{ $vocal }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>