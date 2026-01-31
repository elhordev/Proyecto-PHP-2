<footer class="bg-[#E7E8EB] text-[#1A1C1E] py-10 mt-auto border-t border-[#74777A]/30">
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
            <div>
                <h5 class="text-2xl font-bold mb-4 text-[#006D77]">🛍️ Arráncalo</h5>
                <p class="text-[#1A1C1E]/80 leading-relaxed">
                    Recambios usados de calidad para tu vehículo. Confianza y ahorro en cada pieza.
                </p>
            </div>
            <div>
                <h6 class="font-semibold mb-4 text-[#1A1C1E]">Enlaces rápidos</h6>
                <ul class="space-y-3 text-[#1A1C1E]/80">
                    <li><a href="{{ route('welcome') }}" class="hover:text-[#006D77] transition">Inicio</a></li>
                    <li><a href="{{ route('products.index') }}" class="hover:text-[#006D77] transition">Productos</a></li>
                    <li><a href="{{ route('categories.index') }}" class="hover:text-[#006D77] transition">Categorías</a></li>
                    <li><a href="{{ route('contact') }}" class="hover:text-[#006D77] transition">Contacto</a></li>
                </ul>
            </div>
            <div>
                <h6 class="font-semibold mb-4 text-[#1A1C1E]">Contacto</h6>
                <ul class="space-y-3 text-[#1A1C1E]/80">
                    <li class="flex items-center gap-2"><i class="bi bi-telephone-fill text-[#006D77]"></i> 696 969 696</li>
                    <li class="flex items-center gap-2"><i class="bi bi-envelope-fill text-[#006D77]"></i> arrancalo@tratadearrancarlo.es</li>
                    <li class="flex items-center gap-2"><i class="bi bi-clock-fill text-[#006D77]"></i> 8:00 - 17:00</li>
                </ul>
            </div>
        </div>
        <div class="border-t border-[#74777A]/20 mt-10 pt-6 text-center text-[#1A1C1E]/60 text-sm">
            <p>© {{ date('Y') }} Arráncalo. Todos los derechos reservados.</p>
        </div>
    </div>
</footer>