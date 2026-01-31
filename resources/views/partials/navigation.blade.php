<nav class="hidden md:flex space-x-8">
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
           class="text-[#1A1C1E] hover:text-[#006D77] transition font-medium
                  {{ request()->routeIs('dashboard') ? 'text-[#006D77] font-semibold' : '' }}">
            Dashboard
        </a>
    @endauth
    @guest
        <a href="{{ route('login') }}" 
           class="text-[#1A1C1E] hover:text-[#006D77] transition font-medium
                  {{ request()->routeIs('login') ? 'text-[#006D77] font-semibold' : '' }}">
            Iniciar sesión
        </a>
    @endguest
</nav>