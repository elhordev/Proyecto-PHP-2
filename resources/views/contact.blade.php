@extends('layouts.public')

@section('title', 'Contacto - Arráncalo')

@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="max-w-2xl mx-auto">
        <div class="mb-8 text-center">
            <h1 class="text-3xl font-bold text-gray-900 mb-4">Contacta con Nosotros</h1>
            <p class="text-gray-600">¿Tienes alguna duda o problema con un pedido? Escríbenos.</p>
        </div>

        <div class="bg-white rounded-lg shadow-lg p-8">
            <form class="space-y-6">
                <!-- Nombre -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Nombre
                    </label>
                    <input
                        type="text"
                        placeholder="Tu nombre"
                        class="w-full rounded-lg border-gray-300 focus:border-primary-600 focus:ring-primary-600"
                    >
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Correo electrónico
                    </label>
                    <input
                        type="email"
                        placeholder="tucorreo@email.com"
                        class="w-full rounded-lg border-gray-300 focus:border-primary-600 focus:ring-primary-600"
                    >
                </div>

                <!-- Asunto -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Asunto
                    </label>
                    <input
                        type="text"
                        placeholder="Consulta sobre un pedido, producto, etc."
                        class="w-full rounded-lg border-gray-300 focus:border-primary-600 focus:ring-primary-600"
                    >
                </div>

                <!-- Mensaje -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Mensaje
                    </label>
                    <textarea
                        rows="5"
                        placeholder="Escribe aquí tu mensaje..."
                        class="w-full rounded-lg border-gray-300 focus:border-primary-600 focus:ring-primary-600"
                    ></textarea>
                </div>

                <!-- Botón -->
                <div class="text-center">
                    <button
                        type="button"
                        class="px-6 py-3 bg-primary-600 text-white font-semibold rounded-lg hover:bg-primary-700 transition"
                    >
                        Enviar mensaje
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
