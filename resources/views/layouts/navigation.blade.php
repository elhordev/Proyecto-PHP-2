<nav x-data="{ open: false }" class="bg-white border-b border-[#74777A]/20 shadow-sm">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-[#006D77]" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-10 sm:-my-px sm:ms-12 sm:flex">
                    <x-nav-link :href="route('welcome')" :active="request()->routeIs('welcome')">
                        <span class="text-[#1A1C1E] font-medium hover:text-[#006D77] transition duration-200 {{ request()->routeIs('welcome') ? 'text-[#006D77] font-semibold' : '' }}">
                            {{ __('Tienda') }}
                        </span>
                    </x-nav-link>
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        <span class="text-[#1A1C1E] font-medium hover:text-[#006D77] transition duration-200 {{ request()->routeIs('dashboard') ? 'text-[#006D77] font-semibold' : '' }}">
                            {{ __('Dashboard') }}
                        </span>
                    </x-nav-link>
                    {{-- Enlaces de Administración --}}
                    <x-nav-link :href="route('admin.products.index')" :active="request()->routeIs('admin.products.*')">
                        <span class="text-[#1A1C1E] font-medium hover:text-[#006D77] transition duration-200 {{ request()->routeIs('admin.products.*') ? 'text-[#006D77] font-semibold' : '' }}">
                            {{ __('Productos') }}
                        </span>
                    </x-nav-link>
                    <x-nav-link :href="route('admin.wishlist.index')" :active="request()->routeIs('admin.wishlist.*')">
                        <span class="text-[#1A1C1E] font-medium hover:text-[#006D77] transition duration-200 {{ request()->routeIs('admin.wishlist.*') ? 'text-[#006D77] font-semibold' : '' }}">
                            {{ __('❤️ Lista de Deseos') }}
                        </span>
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-4 py-2 border border-[#74777A]/30 text-sm leading-5 font-medium rounded-xl text-[#1A1C1E] bg-white hover:bg-[#F5F5F5] hover:text-[#006D77] focus:outline-none focus:ring-2 focus:ring-[#006D77]/30 transition ease-in-out duration-150">
                            <div class="font-medium">{{ Auth::user()->name }}</div>

                            <div class="ml-2">
                                <svg class="fill-current h-4 w-4 text-[#1A1C1E]/70" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Perfil') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Cerrar sesión') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-3 rounded-xl text-[#1A1C1E]/70 hover:text-[#006D77] hover:bg-[#F5F5F5] focus:outline-none focus:bg-[#F5F5F5] focus:text-[#006D77] transition duration-150 ease-in-out">
                    <svg class="h-7 w-7" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-white border-t border-[#74777A]/20 shadow-md">
        <div class="pt-4 pb-4 space-y-2 px-4">
            <x-responsive-nav-link :href="route('welcome')" :active="request()->routeIs('welcome')">
                <span class="block px-4 py-3 rounded-xl text-[#1A1C1E] font-medium hover:bg-[#F5F5F5] hover:text-[#006D77] transition {{ request()->routeIs('welcome') ? 'bg-[#E0F2F1] text-[#006D77]' : '' }}">
                    {{ __('Tienda') }}
                </span>
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                <span class="block px-4 py-3 rounded-xl text-[#1A1C1E] font-medium hover:bg-[#F5F5F5] hover:text-[#006D77] transition {{ request()->routeIs('dashboard') ? 'bg-[#E0F2F1] text-[#006D77]' : '' }}">
                    {{ __('Dashboard') }}
                </span>
            </x-responsive-nav-link>
            {{-- Enlaces de Administración --}}
            <x-responsive-nav-link :href="route('admin.products.index')" :active="request()->routeIs('admin.products.*')">
                <span class="block px-4 py-3 rounded-xl text-[#1A1C1E] font-medium hover:bg-[#F5F5F5] hover:text-[#006D77] transition {{ request()->routeIs('admin.products.*') ? 'bg-[#E0F2F1] text-[#006D77]' : '' }}">
                    {{ __('Productos') }}
                </span>
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('admin.wishlist.index')" :active="request()->routeIs('admin.wishlist.*')">
                <span class="block px-4 py-3 rounded-xl text-[#1A1C1E] font-medium hover:bg-[#F5F5F5] hover:text-[#006D77] transition {{ request()->routeIs('admin.wishlist.*') ? 'bg-[#E0F2F1] text-[#006D77]' : '' }}">
                    {{ __('❤️ Lista de Deseos') }}
                </span>
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-6 border-t border-[#74777A]/20 px-4">
            <div class="px-4 mb-4">
                <div class="font-semibold text-base text-[#1A1C1E]">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-[#1A1C1E]/60">{{ Auth::user()->email }}</div>
            </div>

            <div class="space-y-2">
                <x-responsive-nav-link :href="route('profile.edit')">
                    <span class="block px-4 py-3 rounded-xl text-[#1A1C1E] font-medium hover:bg-[#F5F5F5] hover:text-[#006D77] transition">
                        {{ __('Perfil') }}
                    </span>
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                        <span class="block px-4 py-3 rounded-xl text-[#1A1C1E] font-medium hover:bg-[#F5F5F5] hover:text-[#B3261E] transition">
                            {{ __('Cerrar sesión') }}
                        </span>
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>