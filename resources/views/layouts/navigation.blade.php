<nav x-data="{ open: false }" class="bg-green-900 border-b border-green-800">

    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            <div class="flex">

                <!-- Logo -->
                <div class="shrink-0 flex items-center">
    <a href="{{ route('dashboard') }}" class="flex items-center gap-2.5">
        <div class="w-8 h-8 rounded-full bg-white/15 border border-white/25 flex items-center justify-center text-base leading-none">

            <img src="{{ asset('logo_fondo_oscuro.png') }}" 
                 class="w-7 h-7 rounded-full object-cover">

        </div>

        <span class="text-white font-bold text-lg tracking-tight hidden sm:block"
              style="font-family: 'Playfair Display', serif;">
            AgroDirecto
        </span>
    </a>
</div>

                <!-- Navigation Links -->
                <div class="hidden space-x-1 sm:-my-px sm:ms-8 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')"
                        class="text-green-200 hover:text-white border-b-2 border-transparent
                               data-[active]:text-white data-[active]:border-yellow-400
                               px-3 inline-flex items-center text-sm font-medium transition-colors duration-150">
                        {{ __('Panel') }}
                    </x-nav-link>
                </div>

            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg
                                       text-sm font-medium text-green-100 bg-white/10 border border-white/20
                                       hover:bg-white/20 focus:outline-none transition duration-150 ease-in-out">

                            <!-- Avatar initials -->
                            <div class="w-6 h-6 rounded-full bg-green-600 border border-green-500 flex items-center justify-center text-xs font-bold text-white">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>

                            <span>{{ Auth::user()->name }}</span>

                            <svg class="fill-current h-4 w-4 text-green-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- User info header -->
                        <div class="px-4 py-3 border-b border-gray-100">
                            <p class="text-xs text-gray-500">Signed in as</p>
                            <p class="text-sm font-semibold text-green-900 truncate">{{ Auth::user()->email }}</p>
                        </div>

                        <x-dropdown-link :href="route('profile.edit')">
                            <span class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                                {{ __('Perfil') }}
                            </span>
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                <span class="flex items-center gap-2 text-red-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                    </svg>
                                    {{ __('Cerrar Sesion') }}
                                </span>
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                        class="inline-flex items-center justify-center p-2 rounded-md
                               text-green-300 hover:text-white hover:bg-green-800
                               focus:outline-none focus:bg-green-800 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open}" class="inline-flex"
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open}" class="hidden"
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden border-t border-green-800">

        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')"
                class="text-green-200 hover:text-white hover:bg-green-800">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-green-800">

            <!-- User info -->
            <div class="px-4 py-2 flex items-center gap-3">
                <div class="w-9 h-9 rounded-full bg-green-600 border border-green-500 flex items-center justify-center text-sm font-bold text-white">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>
                <div>
                    <div class="font-semibold text-sm text-white">{{ Auth::user()->name }}</div>
                    <div class="text-xs text-green-300">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')"
                    class="text-green-200 hover:text-white hover:bg-green-800">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();"
                        class="text-red-400 hover:text-red-300 hover:bg-green-800">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>

        </div>
    </div>

</nav>