@extends('layouts.public')

@section('title', 'Categorías - Arráncalo')

@section('content')
    <div class="container mx-auto px-6 py-16 md:py-24 bg-[#FCFCFF]">
        <div class="mb-12 text-center md:text-left">
            <h1 class="text-4xl md:text-5xl font-bold text-[#1A1C1E] mb-6 tracking-tight">
                Nuestras Categorías
            </h1>
            <p class="text-xl text-[#1A1C1E]/70 leading-relaxed">
                Explora nuestros productos por categoría.
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @forelse($categories as $category)
                <x-category-card :category="$category" />
            @empty
                <div class="col-span-full text-center py-20">
                    <p class="text-[#1A1C1E]/60 text-xl font-medium">
                        No hay categorías disponibles en este momento.
                    </p>
                </div>
            @endforelse
        </div>
    </div>
@endsection