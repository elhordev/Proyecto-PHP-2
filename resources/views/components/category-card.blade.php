<div class="bg-white rounded-2xl shadow-md p-8 hover:shadow-lg transition-shadow duration-300 {{ $class }}">
    <div class="text-5xl text-[#006D77] mb-6">{{$category->image ?? '📦'}}</div>
    <h4 class="text-2xl font-bold mb-4 text-[#1A1C1E] tracking-tight">{{ $category->name }}</h4>
    <p class="text-base text-[#1A1C1E]/70 mb-6 leading-relaxed">{{ $category->description }}</p>
    <a href="{{ route('categories.show', $category->id) }}" 
       class="text-[#006D77] font-semibold hover:text-[#005A63] transition duration-200">
        Ver Productos →
    </a>
</div>