@extends('layouts.public')

@section('title', $offer->name . ' - Arráncalo')

@section('content')
    <div class="container mx-auto px-6 py-16 md:py-24 bg-[#FCFCFF]">
        <!-- Header de la Oferta – fondo sutil con acento naranja -->
        <div class="bg-[#FF6B35]/10 rounded-2xl shadow-md p-10 mb-12 border border-[#FF6B35]/20">
            <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-8">
                <div>
                    <h1 class="text-4xl md:text-5xl font-bold text-[#1A1C1E] mb-4 tracking-tight">
                        {{ $offer->name }}
                    </h1>
                    <p class="text-xl md:text-2xl text-[#1A1C1E]/80 leading-relaxed">
                        {{ $offer->description }}
                    </p>
                </div>
                <div class="bg-white rounded-2xl shadow-md w-32 h-32 md:w-40 md:h-40 flex items-center justify-center flex-shrink-0 border-4 border-[#FF6B35]/30">
                    <div class="text-center">
                        <div class="text-5xl md:text-6xl font-bold text-[#FF6B35]">
                            {{ $offer->discount_percentage }}%
                        </div>
                        <div class="text-lg md:text-xl font-medium text-[#FF6B35]/80">
                            OFF
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Productos con esta oferta -->
        <div class="mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-[#1A1C1E] mb-8 tracking-tight text-center md:text-left">
                Productos en esta oferta
            </h2>
            
            @if($offerProducts->isNotEmpty())
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($offerProducts as $product)
                        <x-product-card :product="$product" />
                    @endforeach
                </div>
            @else
                <div class="text-center py-20 bg-white rounded-2xl shadow-md border border-[#74777A]/20">
                    <p class="text-[#1A1C1E]/60 text-xl font-medium">
                        No hay productos con esta oferta actualmente.
                    </p>
                </div>
            @endif
        </div>

        <!-- Botón volver -->
        <div class="mt-12 text-center md:text-left">
            <a href="{{ route('offers.index') }}" 
               class="inline-block bg-[#006D77] text-white font-semibold px-10 py-4 rounded-xl shadow-md hover:shadow-lg hover:bg-[#005A63] transition duration-300 ease-in-out transform hover:scale-[1.02] focus:outline-none focus:ring-4 focus:ring-[#006D77]/30">
                ← Volver a Ofertas
            </a>
        </div>
    </div>
@endsection