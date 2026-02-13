<nav x-data="{ open:false }">

    {{-- BOTÓN HAMBURGUESA (solo móvil) --}}
    <button @click="open=!open" class="md:hidden p-2">
        ☰
    </button>

    {{-- MENÚ --}}
    <div :class="open ? 'block' : 'hidden'" class="md:flex space-x-8">

        <a href="{{ route('welcome') }}" 
           class="text-[#1A1C1E] hover:text-[#006D77] transition font-medium
           {{ request()->routeIs('welcome') ? 'text-[#006D77] font-semibold' : '' }}">
            Inicio
        </a>

        <a href="{{ route('products.index') }}" 
           class="text-[#1A1C1E] hover:text-[#006D77] transition font-medium
           {{ request()->routeIs('products.*') ? 'text-[#006D77] font-semibold' : '' }}">
            Productos
        </a>

        <a href="{{ route('categories.index') }}" 
           class="text-[#1A1C1E] hover:text-[#006D77] transition font-medium
           {{ request()->routeIs('categories.*') ? 'text-[#006D77] font-semibold' : '' }}">
            Categorías
        </a>

        <a href="{{ route('offers.index') }}" 
           class="text-[#1A1C1E] hover:text-[#006D77] transition font-medium
           {{ request()->routeIs('offers.*') ? 'text-[#006D77] font-semibold' : '' }}">
            Ofertas
        </a>

        <a href="{{ route('contact') }}" 
           class="text-[#1A1C1E] hover:text-[#006D77] transition font-medium
           {{ request()->routeIs('contact') ? 'text-[#006D77] font-semibold' : '' }}">
            Contacto
        </a>

        @auth
            <a href="{{ route('dashboard') }}" 
               class="text-[#747373] hover:text-[#006D77] transition font-medium">
                Dashboard de: {{ Auth::user()->name }}
            </a>

            <form method="POST" action="{{ route('logout') }}" class="inline">
                @csrf
                <button type="submit" 
                        class="text-[#ff0000] hover:text-[#B3261E] transition font-medium">
                    Cerrar sesión
                </button>
            </form>
        @endauth

        @guest
            <a href="{{ route('login') }}" 
               class="text-[#1A1C1E] hover:text-[#006D77] transition font-medium
               {{ request()->routeIs('login') ? 'text-[#006D77] font-semibold' : '' }}">
                Iniciar sesión
            </a>
        @endguest

    </div>
</nav>


<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
