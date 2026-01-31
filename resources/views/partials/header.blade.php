<!-- Carrito de Compras -->
<header class="bg-white shadow-lg relative">
    <div class="container mx-auto px-6 py-4">
        <div class="flex items-center justify-between">
            <!-- Logo -->
            <div class="flex items-center space-x-4">
            <a href="{{ route('welcome') }}" class="text-2xl font-bold text-primary-600">
                    🛍️ Arráncalo
                </a>
            </div>
            
        <!-- Navegación usando partial -->
            @include('partials.navigation')
                
            <!-- Carrito y WhatsApp -->
            @php
                $cart = session('cart', []);
                $totalQuantity = array_sum(array_column($cart, 'quantity'));
                
                
                $whatsappNumber = '34634472011';          
                $mensaje = urlencode("Hola! He visto un producto y necesito información.");
            @endphp
            
            <div class="flex items-center space-x-6">
                <!-- WhatsApp -->
                <a href="https://wa.me/{{ $whatsappNumber }}?text={{ $mensaje }}"
                target="_blank"   
                class="text-green-500 hover:text-green-600 transition text-xl font-medium flex items-center gap-1"
                   title="Chatea con nosotros por WhatsApp">
                    <i class="bi bi-whatsapp"></i>
                    WhatsApp
                </a>

                <!-- Carrito -->
                <a href="{{ route('cart.index') }}" 
                   class="text-gray-700 hover:text-primary-600 transition flex items-center gap-1">
                    🛒 Carrito ({{ $totalQuantity }})
                </a>
            </div>
        </div>
    </div>
</header>