<div class=""> <!-- ESPACIO PARA QUE SE PUEDA VER EL TITULO -->
    <nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
        <!-- Primary Navigation Menu -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <!-- Logo -->
                    <div class="flex-shrink-0 flex items-center">
                        <a href="{{ route('dashboard') }}" >
                            <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
                        </a>
                    </div>

                    <!-- Navigation Links -->
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                            {{ __('Inicio') }}
                        </x-nav-link>
                    </div>

                    @if(getUserRole(Auth::user()) == "Estudiante")
                    <!-- Dropdown -->
                    <div class="hidden sm:flex space-x-8 sm:items-center sm:ml-10">
                        <x-dropdown align="center" width="48">
                            <x-slot name="trigger">
                                <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                    <div>Tesis</div>
                                    <div class="ml-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                    <x-dropdown-link :href="route('tesis')" :active="request()->routeIs('tesis')">
                                        {{ __('Temas de tesis') }}
                                    </x-dropdown-link>
                                    
                                    <x-dropdown-link :href="route('cambio-tema')" :active="request()->routeIs('cambio-tema')">
                                        {{ __('Cambio de tema') }}
                                    </x-dropdown-link>

                                    <x-dropdown-link :href="route('cambio-titulo')" :active="request()->routeIs('cambio-titulo')">
                                        {{ __('Cambio de titulo') }}
                                    </x-dropdown-link>

                                    <x-dropdown-link :href="route('alta-tesis')" :active="request()->routeIs('alta-tesis')">
                                        {{ __('Alta tesis') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                    <!-- Dropdown -->
                    <div class="hidden sm:flex space-x-8 sm:items-center sm:ml-10">
                        <x-dropdown align="center" width="48">
                            <x-slot name="trigger">
                                <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                    <div>Estadia Técnica</div>
                                    <div class="ml-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                    <x-dropdown-link :href="route('estadia-estudiante-solicitud')" :active="request()->routeIs('estadia-estudiante-solicitud')">
                                        {{ __('Solicitud estadia') }}
                                    </x-dropdown-link>

                                    <x-dropdown-link :href="route('estadia-estudiante-status')" :active="request()->routeIs('estadia-estudiante-status')">
                                        {{ __('Estatus estadia') }}
                                    </x-dropdown-link>

                                    <x-dropdown-link :href="route('estadia-estudiante-modificar')" :active="request()->routeIs('estadia-estudiante-modificar')">
                                        {{ __('Modificar estadia') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>

                    <!-- agregando presentacion de avance  -->
                    <div class="hidden sm:flex space-x-8 sm:items-center sm:ml-10">
                        <x-dropdown align="center" width="48">
                            <x-slot name="trigger">
                                <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                    <div>Presentación de avance</div>
                                    <div class="ml-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                    <x-dropdown-link :href="route('presentacion-avance')" :active="request()->routeIs('presentacion-avance')">
                                        {{ __('Procedimiento de la presentación') }}
                                    </x-dropdown-link>

                                    <x-dropdown-link :href="route('presentacion-avance.ver-fecha')" :active="request()->routeIs('presentacion-avance.programar-fecha')">
                                        {{ __('Ver horario de la presentación') }}
                                    </x-dropdown-link>

                                    <x-dropdown-link :href="route('presentacion-avance.enviar-reporte')" :active="request()->routeIs('presentacion-avance.enviar-reporte')">
                                        {{ __('Enviar presentación de avance') }}
                                    </x-dropdown-link>

                                    <x-dropdown-link :href="route('presentacion-avance.miembrosComite')" :active="request()->routeIs('presentacion-avance.miembrosComite')">
                                        {{ __('Miembros del comité') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                    <!-- termina presentacion avance -->

                    <!-- experimento -->
                    <div class="hidden sm:flex space-x-8 sm:items-center sm:ml-10">
                        <x-dropdown align="center" width="48">
                            <x-slot name="trigger">
                                <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                    <div>Egreso</div>
                                    <div class="ml-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                    <x-dropdown-link :href="route('egreso')" :active="request()->routeIs('egreso')">
                                        {{ __('Documentación') }}
                                    </x-dropdown-link>
                                    <x-dropdown-link :href="route('estadorevision')" :active="request()->routeIs('egreso')">
                                        {{ __('Estado de la Documentación') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                    <!-- final del experimento -->
                    @endif
                    

                    @if(getUserRole(Auth::user()) == "Docente")
                    <!-- Dropdown -->
                    <div class="hidden sm:flex space-x-8 sm:items-center sm:ml-10">
                        <x-dropdown align="center" width="48">
                            <x-slot name="trigger">
                                <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                    <div>Tesis</div>
                                    <div class="ml-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                    <x-dropdown-link :href="route('tesis')" :active="request()->routeIs('tesis')">
                                        {{ __('Tesis') }}
                                    </x-dropdown-link>
                                    
                                    <x-dropdown-link :href="route('cambio-tema')" :active="request()->routeIs('cambio-tema')">
                                        {{ __('Cambio de tema') }}
                                    </x-dropdown-link>

                                    <x-dropdown-link :href="route('cambio-titulo')" :active="request()->routeIs('cambio-titulo')">
                                        {{ __('Cambio de titulo') }}
                                    </x-dropdown-link>

                                    <x-dropdown-link :href="route('alta-tesis')" :active="request()->routeIs('alta-tesis')">
                                        {{ __('Alta tesis') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                    <!-- Dropdown -->
                    <div class="hidden sm:flex space-x-8 sm:items-center sm:ml-10">
                        <x-dropdown align="center" width="48">
                            <x-slot name="trigger">
                                <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                    <div>Estadia técnica</div>
                                    <div class="ml-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                    <x-dropdown-link :href="route('estadia-solicitudes')" :active="request()->routeIs('estadia-solicitudes')">
                                        {{ __('Solicitudes') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                    <!-- Presentacion de avance -->
                    <div class="hidden sm:flex space-x-8 sm:items-center sm:ml-10">
                        <x-dropdown align="center" width="48">
                            <x-slot name="trigger">
                                <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                    <div>Presentación de avance</div>
                                    <div class="ml-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">

                                    <x-dropdown-link :href="route('presentacion-avance.comite-ver-reportes')" :active="request()->routeIs('presentacion-avance.comite-ver-reportes')">
                                        {{ __('Ver reportes') }}
                                    </x-dropdown-link>
                                    
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                    <!-- presentacion avance -->
                    @endif

                    @if(getUserRole(Auth::user()) == "Administrador" || (getUserRole(Auth::user()) == "Coordinador"))
                    <!-- Dropdown -->
                    <div class="hidden sm:flex space-x-8 sm:items-center sm:ml-10">
                        <x-dropdown align="center" width="48">
                            <x-slot name="trigger">
                                <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                    <div>Registrar</div>
                                    <div class="ml-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                    <x-dropdown-link :href="route('register')" :active="request()->routeIs('register')">
                                        {{ __('Personal') }}
                                    </x-dropdown-link>

                                    <x-dropdown-link :href="route('registrar-estudiante')" :active="request()->routeIs('registrar-estudiante')">
                                        {{ __('Estudiante') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                    <!-- Dropdown -->
                    <div class="hidden sm:flex space-x-8 sm:items-center sm:ml-10">
                        <x-dropdown align="center" width="48">
                            <x-slot name="trigger">
                                <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                    <div>Tesis</div>
                                    <div class="ml-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                    <x-dropdown-link :href="route('tesis')" :active="request()->routeIs('tesis')">
                                        {{ __('Temas de tesis') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                    <!-- Dropdown -->
                    <div class="hidden sm:flex space-x-8 sm:items-center sm:ml-10">
                        <x-dropdown align="center" width="48">
                            <x-slot name="trigger">
                                <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                    <div>Crear</div>
                                    <div class="ml-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                    <x-dropdown-link :href="route('crear-programa')" :active="request()->routeIs('crear-programa')">
                                        {{ __('Programa') }}
                                    </x-dropdown-link>

                                    <x-dropdown-link :href="route('crear-linea')" :active="request()->routeIs('crear-linea')">
                                        {{ __('Linea') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                    <!-- Dropdown -->
                    <div class="hidden sm:flex space-x-8 sm:items-center sm:ml-10">
                        <x-dropdown align="center" width="48">
                            <x-slot name="trigger">
                                <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                    <div>Estadia técnica</div>
                                    <div class="ml-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                    <x-dropdown-link :href="route('estadia-solicitudes')" :active="request()->routeIs('estadia-solicitudes')">
                                        {{ __('Solicitudes') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>                    
                    <!-- Presentacion de avance -->
                    <div class="hidden sm:flex space-x-8 sm:items-center sm:ml-10">
                        <x-dropdown align="center" width="48">
                            <x-slot name="trigger">
                                <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                    <div>Presentación de avance</div>
                                    <div class="ml-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                    <x-dropdown-link :href="route('presentacion-avance.programar-fecha')" :active="request()->routeIs('presentacion-avance.programar-fecha')">
                                        {{ __('Programar fecha y hora') }}
                                    </x-dropdown-link>

                                    <x-dropdown-link :href="route('presentacion-avance.ver-reportes')" :active="request()->routeIs('presentacion-avance.enviar-reporte')">
                                        {{ __('Ver reportes') }}
                                    </x-dropdown-link>

                                    <x-dropdown-link :href="route('tesis')" :active="request()->routeIs('tesis')">
                                        {{ __('Miembros del comité') }}
                                    </x-dropdown-link> 
                                    
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                    <!-- presentacion avance -->
                    <div class="hidden sm:flex space-x-8 sm:items-center sm:ml-10">
                        <x-dropdown align="center" width="48">
                            <x-slot name="trigger">
                                <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                    <div>Egreso</div>
                                    <div class="ml-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                    <x-dropdown-link :href="route('egresorevisar')" :active="request()->routeIs('egresorevisar')">
                                        {{ __('Revision de Documentos') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                    @endif
                </div>

                

                <!-- Settings Dropdown -->
                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                <div>{{ Auth::user()->nombre }}</div>

                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('editar-usuario')" :active="request()->routeIs('editar-usuario')">
                                {{ __('Mi perfil') }}
                            </x-dropdown-link>
                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Cerrar sesión') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>

                <!-- Hamburger -->
                <div class="-mr-2 flex items-center sm:hidden">
                    <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Responsive Navigation Menu -->
        <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
            </div>

            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="flex items-center px-4">
                    <div class="flex-shrink-0">
                        <svg class="h-10 w-10 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>

                    <div class="ml-3">
                        <div class="font-medium text-base text-gray-800">{{ Auth::user()->nombre }}</div>
                        <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                    </div>
                </div>

                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('editar-usuario')" :active="request()->routeIs('editar-usuario')">
                        {{ __('Mi perfil') }}
                    </x-responsive-nav-link>
                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        </div>
    </nav>
</div>