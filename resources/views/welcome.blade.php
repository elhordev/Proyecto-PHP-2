@extends('layouts.public')

@section('title', 'Bienvenido a Arráncalo')

@push('styles')
    <style>
        /* Hero con fondo más Material: surface + overlay sutil teal (sin gradiente fuerte) */
        .hero-bg {
            background: linear-gradient(to bottom, rgba(0, 109, 119, 0.08) 0%, rgba(252, 252, 255, 0) 100%), #FCFCFF;
        }
        /* Opcional: si quieres un toque más vibrante, usa este gradiente suave */
        /* .hero-gradient { background: linear-gradient(135deg, #E0F2F1 0%, #FCFCFF 100%); } */
    </style>
@endpush

@section('content')
    <!-- Hero Section – Material 3: fondo limpio, tipografía bold, botones elevados con rounded-xl -->
    <section class="hero-bg text-[#1A1C1E] py-20 md:py-32">  <!-- más padding vertical para respiro -->
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-5xl md:text-7xl font-extrabold leading-tight mb-6 tracking-tight">
                Bienvenido a Arráncalo
            </h2>
            <p class="text-xl md:text-2xl mb-10 max-w-3xl mx-auto leading-relaxed text-[#1A1C1E]/80">
                Descubre una amplia variedad de recambios usados para el automóvil.<br>
                Encuentra exactamente lo que necesitas al mejor precio posible.
            </p>
            <div class="flex flex-wrap justify-center gap-6">
                <!-- Botón principal: elevated, rounded-xl, primary teal -->
                <a href="{{ route('products.index') }}" 
                   class="bg-[#006D77] text-white font-semibold py-4 px-10 rounded-xl shadow-md hover:shadow-lg hover:bg-[#005A63] transition duration-300 ease-in-out transform hover:scale-[1.03] focus:outline-none focus:ring-4 focus:ring-[#006D77]/30">
                    Ver Productos
                </a>
                
                <!-- Botón secundario: outlined, rounded-xl -->
                <a href="{{ route('products.on-sale') }}" 
                   class="border-2 border-[#006D77] text-[#006D77] font-semibold py-4 px-10 rounded-xl hover:bg-[#006D77] hover:text-white transition duration-300 ease-in-out transform hover:scale-[1.03] focus:outline-none focus:ring-4 focus:ring-[#006D77]/20">
                    🏷️ Ofertas Especiales
                </a>
            </div>
        </div>
    </section>

    <!-- Categorías Destacadas – cards con elevation y rounded -->
    <section class="py-20 bg-[#FCFCFF]">
        <div class="container mx-auto px-6">
            <h3 class="text-4xl font-bold mb-16 text-center text-[#1A1C1E] tracking-tight">
                Nuestras Categorías
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                @forelse($featuredCategories as $category)
                    <x-category-card :category="$category" />
                @empty
                    <div class="col-span-full text-center py-16">
                        <p class="text-[#1A1C1E]/60 text-xl">No hay categorías disponibles en este momento.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Productos Destacados – fondo surface variant sutil -->
    <section class="py-20 bg-[#F5F5F5]">  <!-- gris muy claro para separación visual -->
        <div class="container mx-auto px-6">
            <h3 class="text-4xl font-bold mb-16 text-center text-[#1A1C1E] tracking-tight">
                Productos Destacados
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                @forelse($featuredProducts as $product)
                    <x-product-card :product="$product" />
                @empty
                    <div class="col-span-full text-center py-16">
                        <p class="text-[#1A1C1E]/60 text-xl">No hay productos destacados por ahora.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection