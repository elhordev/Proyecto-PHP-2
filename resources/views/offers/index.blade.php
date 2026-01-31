@extends('layouts.public')

@section('title', 'Ofertas - Arráncalo')

@section('content')
    <div class="container mx-auto px-6 py-16 md:py-24 bg-[#FCFCFF]">
        <div class="mb-12 text-center md:text-left">
            <h1 class="text-4xl md:text-5xl font-bold text-[#1A1C1E] mb-6 tracking-tight">
                Ofertas Especiales
            </h1>
            <p class="text-xl text-[#1A1C1E]/70 leading-relaxed">
                Descubre nuestras mejores ofertas y descuentos en recambios de calidad.
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($offers as $offer)
                <div class="bg-white rounded-2xl shadow-md p-8 hover:shadow-lg transition-shadow duration-300 border-t-4 border-[#FF6B35]">
                    <h3 class="text-2xl font-bold text-[#1A1C1E] mb-4 tracking-tight">
                        {{ $offer->name }}
                    </h3>
                    <p class="text-lg text-[#1A1C1E]/80 leading-relaxed mb-6">
                        {{ $offer->description }}
                    </p>
                    <div class="text-3xl font-bold text-[#FF6B35] mb-6">
                        {{ $offer->discount_percentage }}% de descuento
                    </div>
                    <a href="{{ route('offers.show', $offer->id) }}" 
                       class="inline-block bg-[#006D77] text-white font-semibold px-8 py-4 rounded-xl shadow-md hover:shadow-lg hover:bg-[#005A63] transition duration-300 ease-in-out transform hover:scale-[1.02] focus:outline-none focus:ring-4 focus:ring-[#006D77]/30">
                        Ver Productos
                    </a>
                </div>
            @empty
                <div class="col-span-full text-center py-20">
                    <p class="text-[#1A1C1E]/60 text-xl font-medium">
                        No hay ofertas disponibles en este momento.
                    </p>
                </div>
            @endforelse
        </div>
    </div>
@endsection