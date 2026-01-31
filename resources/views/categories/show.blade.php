@extends('layouts.public')

@section('title', $category->name . ' - Arráncalo')

@section('content')
    <div class="container mx-auto px-6 py-16 md:py-24 bg-[#FCFCFF]">
        <div class="mb-12">
            <h1 class="text-4xl md:text-5xl font-bold text-[#1A1C1E] mb-6 tracking-tight">
                {{ $category->name }}
            </h1>
            <p class="text-xl text-[#1A1C1E]/70 mb-6 leading-relaxed">
                {{ $category->description }}
            </p>
            <a href="{{ route('categories.index') }}" 
               class="inline-block text-[#006D77] font-medium hover:text-[#005A63] transition duration-200 text-lg">
                ← Volver a Categorías
            </a>
        </div>

        @if($categoryProducts->isNotEmpty())
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($categoryProducts as $product)
                    <x-product-card :product="$product" />
                @endforeach
            </div>
        @else
            <div class="text-center py-20">
                <p class="text-[#1A1C1E]/60 text-xl font-medium">
                    No hay productos en esta categoría.
                </p>
            </div>
        @endif
    </div>
@endsection