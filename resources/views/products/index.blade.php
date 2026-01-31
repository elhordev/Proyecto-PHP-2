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
    <div class="container mx-auto px-6 py-8">
    <div class="mb-8">
        @if ($onSale)
        <div class="bg-gradient-to-r from-orange-500 to-red-500 rounded-lg shadow-lg p-8 mb-8 text-white"><h1 class="text-3xl font-bold text-white-900 flex items-center justify-center">Todos los Productos en Oferta</h1>
        </div>

        @endif
        <h1 class="text-3xl font-bold text-gray-900 mb-4">Todos los Productos</h1>
        <p class="text-gray-600">Descubre nuestra amplia gama de productos de calidad.</p>
        @if ($onSale)
        <h3 class="text-1xl text-gray-900 mb-4">Mostrando {{count($products)}} productos en oferta.</h3>
        @endif
    </div>

        <div class="product-grid">
        @forelse($products as $product)
                <x-product-card :product="$product" />
        @empty
            <div class="col-span-full text-center py-12">
                    <p class="text-gray-500 text-lg">No hay productos disponibles.</p>
            </div>
        @endforelse
    </div>
    </div>
@endsection
