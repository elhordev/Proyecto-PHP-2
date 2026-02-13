@extends('layouts.public')

@section('title', 'Carrito de Compras - Arráncalo')

@section('content')
    <div class="container mx-auto px-6 py-16 md:py-24 bg-[#FCFCFF]">
        <h1 class="text-4xl md:text-5xl font-bold text-[#1A1C1E] mb-12 tracking-tight text-center md:text-left">
            🛒 Carrito de Compras
        </h1>

        @if($cartProducts->isEmpty())
            <div class="bg-white rounded-2xl shadow-md p-10 md:p-12 text-center">
                <div class="text-7xl md:text-8xl mb-6 text-[#1A1C1E]/30">🛒</div>
                <h2 class="text-3xl font-bold text-[#1A1C1E] mb-4">Tu carrito está vacío</h2>
                <p class="text-xl text-[#1A1C1E]/70 mb-8 leading-relaxed">
                    ¡Añade productos para comenzar tu compra!
                </p>
                <a href="{{ route('products.index') }}" 
                   class="inline-block bg-[#006D77] text-white font-semibold px-10 py-4 rounded-xl shadow-md hover:shadow-lg hover:bg-[#005A63] transition duration-300 ease-in-out transform hover:scale-[1.02] focus:outline-none focus:ring-4 focus:ring-[#006D77]/30">
                    Ver Productos
                </a>
            </div>
        @else
            <div class="bg-white rounded-2xl shadow-md overflow-hidden border border-[#74777A]/20">
                <table class="w-full">
                    <thead class="bg-[#F5F5F5]">
                        <tr>
                            <th class="px-6 py-5 text-left text-sm font-semibold text-[#1A1C1E]">Producto</th>
                            <th class="px-6 py-5 text-left text-sm font-semibold text-[#1A1C1E]">Precio</th>
                            <th class="px-6 py-5 text-center text-sm font-semibold text-[#1A1C1E]">Cantidad</th>
                            <th class="px-6 py-5 text-left text-sm font-semibold text-[#1A1C1E]">Subtotal</th>
                            <th class="px-6 py-5 text-center text-sm font-semibold text-[#1A1C1E]">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-[#74777A]/20">
                        @php $total = 0; @endphp
                        
                        @foreach($cartProducts as $product)
                            @php
                                $subtotal = $product->final_price * $product->quantity;
                                $total += $subtotal;
                            @endphp
                            
                            <tr class="hover:bg-[#F5F5F5] transition-colors duration-200">
                                <td class="px-6 py-6">
                                    <div class="flex items-center">
                                        @if(!empty($product->image))
                                            @if(!str_starts_with($product->image, 'http'))
                                                <img src="{{ asset('storage/' . $product->image) }}" 
                                                     alt="{{ $product->name }}" 
                                                     class="h-20 w-20 object-cover rounded-xl mr-6 shadow-sm">
                                            @else
                                                <img src="{{ $product->image }}" 
                                                     alt="{{ $product->name }}" 
                                                     class="h-20 w-20 object-cover rounded-xl mr-6 shadow-sm">
                                            @endif
                                        @else
                                            <span class="text-5xl text-[#1A1C1E]/30 mr-6">📦</span>
                                        @endif
                                        <div>
                                            <div class="font-semibold text-[#1A1C1E] text-lg">{{ $product->name }}</div>
                                            <div class="text-sm text-[#1A1C1E]/70 mt-1">{{ $product->category->name }}</div>
                                            @if($product->offer)
                                                <span class="inline-block bg-[#FF6B35]/10 text-[#FF6B35] text-xs px-3 py-1 rounded-full mt-2 font-medium border border-[#FF6B35]/20">
                                                    🏷️ -{{ $product->offer->discount_percentage }}%
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-6">
                                    @if($product->offer)
                                        <div>
                                            <span class="text-sm text-[#1A1C1E]/50 line-through block">
                                                €{{ number_format($product->price, 2) }}
                                            </span>
                                            <div class="font-semibold text-[#006D77] text-xl">
                                                €{{ number_format($product->final_price, 2) }}
                                            </div>
                                        </div>
                                    @else
                                        <div class="font-semibold text-[#006D77] text-xl">
                                            €{{ number_format($product->final_price, 2) }}
                                        </div>
                                    @endif
                                </td>
                                <td class="px-6 py-6 text-center">
                                    <form action="{{ route('cart.update', $product->id) }}" method="POST" class="flex items-center justify-center">
                                        @csrf
                                        @method('PUT')
                                        <input type="number" name="quantity" value="{{ $product->quantity }}" min="1" 
                                               class="w-20 text-center border border-[#74777A]/40 rounded-xl shadow-sm focus:border-[#006D77] focus:ring-2 focus:ring-[#006D77]/20">
                                        <button type="submit" class="ml-3 p-2 text-[#006D77] hover:text-[#005A63] transition" title="Actualizar cantidad">
                                            🔄
                                        </button>
                                    </form>
                                </td>
                                <td class="px-6 py-6 font-semibold text-[#1A1C1E] text-lg">
                                    €{{ number_format($subtotal, 2) }}
                                </td>
                                <td class="px-6 py-6 text-center">
                                    <form action="{{ route('cart.destroy', $product->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-[#B3261E] hover:text-[#9B2226] transition text-lg" title="Eliminar producto">
                                            🗑️ Eliminar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot class="bg-[#F5F5F5]">
                        @php
                            $descuento = 0;
                            $cupon = session('cupon');
                            if ($cupon) {
                                $porcentaje = $cupon['descuento'] ?? 0;
                                $descuento = $total * ($porcentaje / 100);
                            }
                        @endphp

                        @if ($descuento)
                            <tr>
                                <td colspan="4" class="px-6 py-5 text-right font-semibold text-[#006D77]">
                                    Descuento ({{ $cupon['codigo'] ?? 'cupón' }}):
                                </td>
                                <td class="px-6 py-5 font-bold text-[#006D77] text-lg">
                                    -€{{ number_format($descuento, 2) }}
                                </td>
                            </tr>
                        @endif

                        <tr>
                            <td colspan="4" class="px-6 py-5 text-right font-semibold text-[#1A1C1E] text-lg">
                                Total:
                            </td>
                            <td class="px-6 py-5 font-bold text-[#006D77] text-2xl">
                                €{{ number_format($total - $descuento, 2) }}
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <div class="mt-10 flex flex-col md:flex-row justify-between items-center gap-6">
                <a href="{{ route('products.index') }}" 
                   class="bg-[#F5F5F5] text-[#1A1C1E] font-medium px-10 py-4 rounded-xl hover:bg-[#E0E0E0] transition duration-200 shadow-sm w-full md:w-auto text-center">
                    ← Seguir Comprando
                </a>

                <form action="{{ route('cart.checkout') }}" method="POST" class="w-full md:w-auto">
                    @csrf
                    <button type="submit" 
                            class="bg-[#006D77] text-white font-semibold px-12 py-4 rounded-xl shadow-md hover:shadow-lg hover:bg-[#005A63] transition duration-300 ease-in-out transform hover:scale-[1.02] focus:outline-none focus:ring-4 focus:ring-[#006D77]/30 w-full md:w-auto">
                        Realizar Pedido →
                    </button>
                </form>

                <form action="{{ route('cart.applyCupon') }}" method="POST" class="flex items-center space-x-3 w-full md:w-auto">
                    @csrf
                    <input type="text" name="code" placeholder="Código de cupón" 
                           class="border border-[#74777A]/40 rounded-xl shadow-sm px-5 py-3 focus:border-[#006D77] focus:ring-2 focus:ring-[#006D77]/20 w-full md:w-64">
                    <button type="submit" 
                            class="bg-[#006D77] text-white px-6 py-3 rounded-xl hover:bg-[#005A63] transition duration-200 shadow-sm">
                        Aplicar
                    </button>
                
                </form>
                @if(session('cupon'))
                    <form action="{{ route('cart.removeCupon') }}" method="POST" class="w-full md:w-auto">
                        @csrf
                        <button type="submit" 
                                class="bg-[#B3261E] text-white px-6 py-3 rounded-xl hover:bg-[#9B2226] transition duration-200 shadow-sm w-full md:w-auto">
                            Eliminar Cupón
                        </button>
                    </form>
                    @endif
            </div>
                @endif
    </div>
@endsection