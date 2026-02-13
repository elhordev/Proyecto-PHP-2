@extends('layouts.public')

@section('title', 'Contacto - Arráncalo')

@section('content')
<div class="container mx-auto px-6 py-16 md:py-24 bg-[#FCFCFF]">
    <div class="max-w-2xl mx-auto">

        <!-- Título y descripción -->
        <div class="mb-12 text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-[#1A1C1E] mb-5 tracking-tight">
                Contacta con nosotros
            </h1>
            <p class="text-xl text-[#1A1C1E]/70 max-w-xl mx-auto leading-relaxed">
                ¿Tienes alguna duda sobre un recambio, un pedido o necesitas ayuda? Escríbenos y te responderemos lo antes posible.
            </p>
        </div>

        <!-- Tarjeta del formulario -->
        <div class="bg-white rounded-2xl shadow-md hover:shadow-lg transition-shadow duration-300 overflow-hidden">
            <div class="p-8 md:p-10">
                <form class="space-y-8">

                    <!-- Nombre -->
                    <div>
                        <label class="block text-sm font-medium text-[#1A1C1E] mb-2">
                            Nombre completo
                        </label>
                        <input 
                            type="text" 
                            placeholder="Tu nombre" 
                            required
                            class="w-full px-4 py-3 rounded-xl border border-[#74777A]/40 focus:border-[#006D77] focus:ring-4 focus:ring-[#006D77]/20 focus:outline-none transition duration-200 bg-[#FCFCFF] text-[#1A1C1E] placeholder:text-[#1A1C1E]/50"
                        >
                    </div>

                    <!-- Email -->
                    <div>
                        <label class="block text-sm font-medium text-[#1A1C1E] mb-2">
                            Correo electrónico
                        </label>
                        <input 
                            type="email" 
                            placeholder="tucorreo@email.com" 
                            required
                            class="w-full px-4 py-3 rounded-xl border border-[#74777A]/40 focus:border-[#006D77] focus:ring-4 focus:ring-[#006D77]/20 focus:outline-none transition duration-200 bg-[#FCFCFF] text-[#1A1C1E] placeholder:text-[#1A1C1E]/50"
                        >
                    </div>

                    <!-- Asunto -->
                    <div>
                        <label class="block text-sm font-medium text-[#1A1C1E] mb-2">
                            Asunto
                        </label>
                        <input 
                            type="text" 
                            placeholder="Consulta sobre un recambio, pedido, devolución..." 
                            required
                            class="w-full px-4 py-3 rounded-xl border border-[#74777A]/40 focus:border-[#006D77] focus:ring-4 focus:ring-[#006D77]/20 focus:outline-none transition duration-200 bg-[#FCFCFF] text-[#1A1C1E] placeholder:text-[#1A1C1E]/50"
                        >
                    </div>

                    <!-- Mensaje -->
                    <div>
                        <label class="block text-sm font-medium text-[#1A1C1E] mb-2">
                            Mensaje
                        </label>
                        <textarea 
                            rows="6" 
                            placeholder="Cuéntanos con detalle en qué podemos ayudarte..." 
                            required
                            class="w-full px-4 py-3 rounded-xl border border-[#74777A]/40 focus:border-[#006D77] focus:ring-4 focus:ring-[#006D77]/20 focus:outline-none transition duration-200 bg-[#FCFCFF] text-[#1A1C1E] placeholder:text-[#1A1C1E]/50 resize-y min-h-[140px]"
                        ></textarea>
                    </div>

                    <div class="text-center pt-4">
                        <button 
                            type="submit" 
                            class="px-10 py-4 bg-[#006D77] text-white font-semibold rounded-xl shadow-md hover:shadow-lg hover:bg-[#005A63] transition duration-300 ease-in-out transform hover:scale-[1.02] focus:outline-none focus:ring-4 focus:ring-[#006D77]/30"
                        >
                            Enviar mensaje
                        </button>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>
@endsection