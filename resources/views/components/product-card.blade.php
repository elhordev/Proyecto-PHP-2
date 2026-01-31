<div class="bg-white rounded-2xl shadow-md overflow-hidden product-card {{ $class ?? '' }} relative transition-shadow duration-300 hover:shadow-lg {{ $product->offer ? 'ring-2 ring-[#FF6B35]/30' : '' }}">
    <!-- Badge de oferta destacado (esquina superior derecha) -->
    @if($product->offer)
        <div class="absolute top-3 right-3 bg-[#FF6B35] text-white px-4 py-1.5 rounded-xl font-semibold shadow-md z-10 text-sm md:text-base">
            -{{ $product->offer->discount_percentage }}%
        </div>
    @endif

    <!-- Slot opcional para botón adicional en esquina superior izquierda (ej: eliminar de wishlist) -->
    @isset($topAction)
        <div class="absolute top-3 left-3 z-10">
            {{ $topAction }}
        </div>
    @endisset

    <!-- Imagen -->
    <div class="h-52 md:h-64 bg-[#F5F5F5] flex items-center justify-center overflow-hidden rounded-t-2xl">
        @if(!empty($product->image))
            @if(!str_starts_with($product->image, 'http'))
                <img src="{{ asset('storage/' . $product->image) }}" 
                     alt="{{ $product->name }}" 
                     class="w-full h-full object-cover transition-transform duration-500 hover:scale-105">
            @else
                <img src="{{ $product->image }}" 
                     alt="{{ $product->name }}" 
                     class="w-full h-full object-cover transition-transform duration-500 hover:scale-105">
            @endif
        @else
            <span class="text-6xl text-[#1A1C1E]/30">📦</span>
        @endif
    </div>

    <div class="p-6 md:p-7">
        <h4 class="text-xl md:text-2xl font-bold mb-3 text-[#1A1C1E] tracking-tight line-clamp-2">
            {{ $product->name }}
        </h4>
        <p class="text-base text-[#1A1C1E]/70 mb-5 line-clamp-3 leading-relaxed">
            {{ Str::limit($product->description, 100) }}
        </p>

        <!-- Badge de oferta adicional (nombre de la oferta) -->
        @if($product->offer)
            <div class="mb-5">
                <span class="inline-block bg-[#FF6B35]/10 text-[#FF6B35] text-sm px-4 py-1.5 rounded-xl font-medium border border-[#FF6B35]/20">
                    🏷️ {{ $product->offer->name }}
                </span>
            </div>
        @endif

        <!-- Precio -->
        <div class="mb-6">
            @if($product->offer)
                <div class="flex items-baseline gap-3">
                    <span class="text-base text-[#1A1C1E]/50 line-through">
                        €{{ number_format($product->price, 2) }}
                    </span>
                    <span class="text-3xl md:text-4xl font-bold text-[#006D77]">
                        €{{ number_format($product->final_price, 2) }}
                    </span>
                </div>
            @else
                <span class="text-3xl md:text-4xl font-bold text-[#006D77]">
                    €{{ number_format($product->final_price ?? $product->price, 2) }}
                </span>
            @endif
        </div>

        <!-- Acciones personalizables mediante slot -->
        @isset($actions)
            <div class="mt-6">
                {{ $actions }}
            </div>
        @else
            <!-- Acción por defecto: Ver Detalles -->
            <a href="{{ route('products.show', $product->id) }}" 
               class="block text-center bg-[#006D77] text-white font-semibold px-6 py-3.5 rounded-xl shadow-md hover:shadow-lg hover:bg-[#005A63] transition duration-300 ease-in-out transform hover:scale-[1.02] focus:outline-none focus:ring-4 focus:ring-[#006D77]/30">
                Ver Detalles
            </a>
        @endisset
    </div>
</div>