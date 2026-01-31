@extends('layouts.public')

@section('title', $product->name . ' - Arráncalo')

@section('content')
    <div class="container mx-auto px-6 py-12 md:py-16 bg-[#FCFCFF]">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-12">
            <!-- Imagen del Producto -->
            <div class="bg-white rounded-2xl shadow-md p-8">
                <div class="h-96 md:h-[500px] bg-[#F5F5F5] flex items-center justify-center rounded-xl overflow-hidden">
                    <img class="h-full w-full object-contain transition-transform duration-500 hover:scale-105" 
                         src="{{ $product->image }}" 
                         alt="{{ $product->name }}">
                </div>
            </div>

            <!-- Información del Producto -->
            <div class="bg-white rounded-2xl shadow-md p-8">
                <h1 class="text-4xl md:text-5xl font-bold text-[#1A1C1E] mb-6 tracking-tight">
                    {{ $product->name }}
                </h1>
                <p class="text-lg text-[#1A1C1E]/80 leading-relaxed mb-8">
                    {{ $product->description }}
                </p>
            
                <!-- Precio -->
                <div class="mb-8">
                    @if($product->offer)
                        <div class="flex items-baseline gap-4">
                            <span class="text-2xl md:text-3xl text-[#1A1C1E]/50 line-through">
                                €{{ number_format($product->price, 2) }}
                            </span>
                            <span class="text-5xl md:text-6xl font-bold text-[#006D77]">
                                €{{ number_format($product->final_price, 2) }}
                            </span>
                        </div>
                        <p class="text-lg font-medium text-[#FF6B35] mt-3">
                            ¡Ahorra €{{ number_format($product->price - $product->final_price, 2) }}!
                        </p>
                    @else
                        <span class="text-5xl md:text-6xl font-bold text-[#006D77]">
                            €{{ number_format($product->price, 2) }}
                        </span>
                    @endif
                </div>
            
                <!-- Categoría -->
                @if($product->category)
                    <div class="mb-8">
                        <span class="text-sm font-medium text-[#1A1C1E]/60 block mb-2">
                            Categoría
                        </span>
                        <a href="{{ route('categories.show', $product->category->id) }}" 
                           class="inline-block bg-[#E0F2F1] text-[#006D77] px-4 py-1.5 rounded-full text-sm font-medium hover:bg-[#CDE8EA] transition">
                            {{ $product->category->name }}
                        </a>
                    </div>
                @endif
            
                <!-- Oferta -->
                @if($product->offer)
                    <div class="mb-10">
                        <span class="text-sm font-medium text-[#1A1C1E]/60 block mb-2">
                            Oferta activa
                        </span>
                        <div class="inline-block bg-[#FF6B35]/10 text-[#FF6B35] px-4 py-1.5 rounded-full text-sm font-medium">
                            🏷️ {{ $product->offer->name }} (-{{ $product->offer->discount_percentage }}%)
                        </div>
                    </div>
                @endif

                <!-- Botones de Acción -->
                <div class="flex flex-wrap items-center gap-4">
                    <form action="{{ route('cart.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <button type="submit" 
                                class="bg-[#006D77] text-white px-8 py-4 rounded-xl font-semibold shadow-md hover:shadow-lg hover:bg-[#005A63] transition duration-300 ease-in-out transform hover:scale-[1.02] focus:outline-none focus:ring-4 focus:ring-[#006D77]/30">
                            🛒 Añadir al Carrito
                        </button>
                    </form>

                    @auth
                        <form action="{{ route('admin.wishlist.store', $product->id) }}" method="POST">
                            @csrf
                            <button type="submit" 
                                    class="border-2 border-[#B3261E] text-[#B3261E] px-8 py-4 rounded-xl font-semibold hover:bg-[#B3261E] hover:text-white transition duration-300 ease-in-out transform hover:scale-[1.02]">
                                ❤️ Guardar en Favoritos
                            </button>
                        </form>
                    @endauth

                    <a href="{{ route('products.index') }}" 
                       class="border-2 border-[#74777A]/40 text-[#1A1C1E] px-8 py-4 rounded-xl font-medium hover:bg-[#F5F5F5] hover:border-[#006D77]/40 transition duration-300 ease-in-out">
                        ← Volver a Productos
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection