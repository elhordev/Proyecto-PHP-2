@extends('layouts.public')

@section('title', 'Todos los Productos - Arráncalo')

@push('styles')
    <style>
        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 2rem;
        }
    </style>
@endpush

@section('content')
    <div class="container mx-auto px-6 py-16 md:py-24 bg-[#FCFCFF]">
        <div class="mb-12 text-center md:text-left">
            @if ($onSale)
                <div class="bg-[#FF6B35]/10 rounded-2xl shadow-md p-10 mb-12 border border-[#FF6B35]/20">
                    <h1 class="text-4xl md:text-5xl font-bold text-[#1A1C1E] tracking-tight">
                        Productos en Oferta
                    </h1>
                </div>
            @endif

            <h1 class="text-4xl md:text-5xl font-bold text-[#1A1C1E] mb-6 tracking-tight">
                @if ($onSale)
                    Todos los Productos en Oferta
                @else
                    Todos los Productos
                @endif
            </h1>

            <p class="text-xl text-[#1A1C1E]/70 mb-6 leading-relaxed">
                Descubre nuestra amplia gama de recambios usados de calidad.
            </p>

            @if ($onSale)
                <p class="text-lg font-medium text-[#FF6B35]">
                    Mostrando {{ count($products) }} productos con descuento especial.
                </p>
            @endif
        </div>

        <div class="product-grid">
            @forelse($products as $product)
                <x-product-card :product="$product" />
            @empty
                <div class="col-span-full text-center py-20">
                    <p class="text-[#1A1C1E]/60 text-xl font-medium">
                        No hay productos disponibles en este momento.
                    </p>
                </div>
            @endforelse
        </div>
    </div>
@endsection