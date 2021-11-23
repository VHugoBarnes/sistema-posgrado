<x-app-layout>
  <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ver fechas asignadas') }}
        </h2>
  </x-slot>

  <div class="py-12">
  @if (session('status'))
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-{{ session('color') }}-300 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-{{ session('color') }}-300 border-b border-gray-200">
                        <p id="session" class="text-{{ session('color') }}-700">{{ session('status') }}</p>
                    </div>
                </div>
            </div>
        </div>
        @endif
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">


        
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
