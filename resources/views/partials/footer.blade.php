    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8 mt-12">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <h5 class="text-xl font-bold mb-4">🛍️ Mi Tienda</h5>
                    <p class="text-gray-400">
                        Tu tienda de confianza para encontrar los mejores recambios usados para el automóvil.
                    </p>
                </div>
                <div>
                    <h6 class="font-bold mb-4">Enlaces Rápidos</h6>
                    <ul class="space-y-2 text-gray-400">
                    <li><a href="{{ route('welcome') }}" class="hover:text-white transition">Inicio</a></li>
                    <li><a href="{{ route('products.index') }}" class="hover:text-white transition">Productos</a></li>
                    <li><a href="{{ route('categories.index') }}" class="hover:text-white transition">Categorías</a></li>
                    <li><a href="#" class="hover:text-white transition">Contacto</a></li>
                    </ul>
                </div>
                <div>
                    <h6 class="font-bold mb-4">Contacto</h6>
                    <ul class="space-y-2 text-gray-400">
                        <li>📞 696969696</li>
                        <li>📧 arrancalo@tratadearrancarlo.es</li>
                        <li>🕒 8:00 - 17:00</li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; 2025 Arráncalo. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>
