# Arráncalo - Tienda Online de Recambios Usados para Automóviles

[![Laravel](https://img.shields.io/badge/Laravel-10.x-red.svg)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.1+-blue.svg)](https://php.net)
[![Tailwind CSS](https://img.shields.io/badge/Tailwind%20CSS-3.x-38B2AC.svg)](https://tailwindcss.com)

**Arráncalo** es una plataforma de comercio electrónico desarrollada en Laravel para la venta de recambios usados de automóviles. Permite a los usuarios explorar categorías de piezas (motores, faros, puertas, carrocería, etc.), ver productos con imágenes y descripciones detalladas, aplicar ofertas, añadir al carrito y simular compras. Incluye un panel de administración básico y mejoras modernas como cupones de descuento gestionados en base de datos y contacto directo vía WhatsApp Web.

El proyecto se basa en un e-commerce sencillo orientado a desguaces virtuales, con énfasis en usabilidad y experiencia móvil.

## Características Principales

- Navegación por categorías y productos destacados en la home
- Página de ofertas especiales
- Carrito de compras persistente en sesión
- Sistema de cupones de descuento (validación en BD y aplicación en carrito)
- Contacto directo mediante WhatsApp Web
- Panel de administración protegido (CRUD de productos, categorías, ofertas y cupones)
- Autenticación con roles (usuario normal y administrador)
- Diseño responsivo con Tailwind CSS

## Tecnologías Utilizadas

- **Backend**: Laravel 10.x (PHP 8.1+)
- **Frontend**: Blade + Tailwind CSS 3.x + Vite
- **Base de datos**: MySQL (con migraciones y seeders)
- **Entorno Docker**: Laravel Sail
- **Autenticación**: Laravel Breeze
- **Gestión de imágenes**: Storage público de Laravel
- **Integración externa**: Enlaces a WhatsApp Web (wa.me)
- **Otras herramientas**: Composer, NPM, Docker

## Instalación y Despliegue

### Requisitos previos

- PHP ≥ 8.1
- Composer
- Node.js + NPM
- Docker + Docker Compose (para Sail)
- Git

### Pasos de instalación local (con Laravel Sail)

1. Clonar el repositorio

```bash
git clone https://github.com/elhordev/Proyecto-PHP-2.git arrancalo
cd arrancalo
```

2. Copiar archivo de entorno

```bash
cp .env.example .env
```

3. Instalar dependencias

```bash
composer install
npm install
```

4. Iniciar Sail

```bash
./vendor/bin/sail up -d
```

5. Generar clave de aplicación

```bash
sail artisan key:generate
```

6. Ejecutar migraciones y seeders

```bash
sail artisan migrate --seed
```

7. Compilar assets

```bash
npm run dev
# o para producción:
npm run build
```

8. Acceder a la aplicación

- Frontend: http://localhost
- Admin: http://localhost/admin (después de login)

### Despliegue en producción (VPS, Forge, etc.)

1. Subir el proyecto vía Git o FTP
2. Configurar `.env` con credenciales reales
3. Ejecutar:

```bash
composer install --optimize-autoloader --no-dev
php artisan key:generate
php artisan migrate --force
php artisan db:seed --force
php artisan storage:link
npm ci && npm run build
```

4. Configurar servidor web (Nginx/Apache) apuntando a `/public`

## Usuarios de Prueba

Los seeders crean los siguientes usuarios de prueba:

| Rol          | Email                  | Contraseña | Notas                              |
|--------------|------------------------|------------|------------------------------------|
| Administrador| diego.elhor@gmail.com    | password123  | Acceso completo al panel /admin   |
        |

**Recomendación**: Cambia las contraseñas en producción inmediatamente.

## Mejoras Implementadas

### 1. Sistema de Cupones de Descuento

Se añadió un sistema completo de cupones gestionado en base de datos:

- **Modelo**: `Cupon` (con campos: `codigo`, `tipo`, `valor`, `activo`, timestamps)
- **Migración**: `create_cupons_table`
- **Seeder/Mock**: Datos de prueba (SANFE10 10%, VERANO25 25%, etc.)
- **Controlador**: Métodos `applyCupon` y lógica en `CartController`
- **Vista**: Formulario en carrito + visualización de descuento y total ajustado
- **Lógica**: Validación del código contra BD → guardado en sesión → cálculo dinámico del descuento

### 2. Integración con WhatsApp Web

- Botón/enlace en la página de contacto que abre WhatsApp Web con mensaje predefinido.
- Implementación simple y efectiva vía `https://wa.me/+numero?text=Consulta%20desde%20Arr%C3%A1ncalo`.
- Ideal para móviles y mejora la conversión de consultas.



## Licencia

MIT License

¡Gracias por visitar Arráncalo! 🚗💨

Creado con ❤️ por elhordev (enero 2026)