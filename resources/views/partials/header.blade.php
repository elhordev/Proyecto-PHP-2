<header class="bg-[#FCFCFF] shadow-md">  <!-- surface limpio + elevation sutil -->
    <div class="container mx-auto px-6 py-5">  <!-- más padding vertical al estilo M3 -->
        <div class="flex items-center justify-between">
            <!-- Logo -->
            <div class="flex items-center space-x-4">
                <a href="{{ route('welcome') }}" 
                   class="text-3xl font-bold text-[#006D77] tracking-tight">
                    🛍️ Arráncalo
                </a>
            </div>
            
            <!-- Navegación -->
            @include('partials.navigation')
                
            <!-- Acciones -->
            @php
                $cart = session('cart', []);
                $totalQuantity = array_sum(array_column($cart, 'quantity'));
                $whatsappNumber = '34634472011';
                $mensaje = urlencode("¡Hola! Estoy viendo Arráncalo y necesito info sobre un producto.");
            @endphp
            
            <div class="flex items-center gap-6">
                <!-- WhatsApp – secondary morado suave -->
                <a href="https://wa.me/{{ $whatsappNumber }}?text={{ $mensaje }}"
                   target="_blank" rel="noopener noreferrer"
                   class="text-[#6750A4] hover:text-[#006D77] transition text-xl flex items-center gap-2 font-medium">
                    <i class="bi bi-whatsapp"></i>
                    WhatsApp
                </a>

                <!-- Carrito – primary teal -->
                <a href="{{ route('cart.index') }}" 
                   class="text-[#006D77] hover:text-[#005A63] transition flex items-center gap-2 font-medium">
                    <span class="text-2xl">🛒</span>
                    Carrito 
                    <span class="bg-[#006D77] text-white text-xs font-bold px-2.5 py-1 rounded-full">
                        {{ $totalQuantity }}
                    </span>
                </a>
            </div>
        </div>
    </div>
</header>