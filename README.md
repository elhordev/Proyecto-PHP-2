# Documentación Proyecto PHP 2ª Evaluación

**Nombre del proyecto:** Arráncalo

**Descripción**  
Arráncalo es una aplicación e-commerce desarrollada en Laravel que simula una tienda online de recambios usados para automóviles (desguace virtual). Permite a cualquier visitante navegar por categorías y productos, ver ofertas especiales, añadir artículos al carrito y simular una compra. Los usuarios autenticados pueden acceder a un panel básico y marcar productos como favoritos (aunque en esta versión la wishlist está simplificada).  

El proyecto destaca por su diseño limpio y responsivo, uso de Laravel Sail para desarrollo en contenedores y la incorporación de dos mejoras significativas respecto a la estructura base.

El diseño está inspirado el las primeras versiones de Material Design de Google en las anteriores versiones de Android AOKP.
**Tecnologías utilizadas**  
- PHP 8.1+  
- Laravel 10.x  
- MySQL  
- Laravel Sail (Docker)  
- Tailwind CSS + Vite + Alpine.js  
- Laravel Breeze (autenticación)  
- Dependencias de desarrollo: Telescope, Pint, PHPStan, PHP_CodeSniffer  

Librerías y facades destacadas:  
- `Illuminate\Support\Facades\Auth`  
- `Illuminate\Database\Eloquent\Model`  
- `Illuminate\Support\Facades\Session` (para carrito y cupones)

**Mejoras implementadas**  

1. **Sistema de cupones de descuento gestionado en base de datos**  
   - Se creó modelo, migración, seeder y lógica completa para cupones.  
   - Los cupones se almacenan en la tabla `cupons` con campos: `codigo` (único), `descuento` (porcentaje/fijo), y sus timestamps.  
   - En el carrito se valida el código contra la BD, se guarda en sesión y se calcula el descuento dinámicamente.  
   - Se muestra el subtotal, descuento aplicado y total final en la vista del carrito.  
   - Mock/seeder con varios cupones de prueba (SANFE10 10%, VERANO25 25%, etc.).
   -Faltaría, para hacerlo redondo, poder desde el panel de administración, editar esos descuentos. (Perdón, falta de tiempo).

2. **Integración con WhatsApp Web para contacto rápido**  
   - En header se añadió un botón que abre directamente WhatsApp Web con un mensaje predefinido.  
   - Uso de enlace `https://wa.me/...` (no requiere API oficial, solo cliente).  
   - Mejora la conversión de consultas y facilita el contacto móvil sin formularios complejos.

**Estructura principal del proyecto** (carpetas y archivos más relevantes)

```
root
├── app
│   ├── Http
│   │   ├── Controllers (CartController, ProductController, WelcomeController...)
│   │   ├── Middleware
│   │   └── Requests
│   ├── Models (Product, Category, Offer, Cupon...)
│   └── Providers
├── bootstrap
├── config
├── database
│   ├── factories
│   ├── migrations (create_cupons_table, etc.)
│   └── seeders (CuponSeeder, ProductSeeder...)
├── public
├── resources
│   ├── css
│   ├── js
│   └── views (welcome.blade.php, cart/index.blade.php, products/show.blade.php...)
├── routes
│   └── web.php
├── storage
├── tests
├── vendor
└── archivos raíz importantes:
    ├── .env
    ├── artisan
    ├── composer.json
    ├── package.json
    ├── tailwind.config.js
    ├── vite.config.js
```

**Instrucciones de instalación**

1. Clonar el repositorio  
   ```bash
   git clone https://github.com/elhordev/Proyecto-PHP-2.git arrancalo
   cd arrancalo
   ```

2. Instalar Sail y preparar entorno  
   ```bash
   php artisan sail:install --with=mysql,redis
   cp .env.example .env
   php artisan key:generate
   ```



3. Configurar `.env` (base de datos)  
   ```env
   DB_CONNECTION=mysql
   DB_HOST=myshop
   DB_PORT=3306
   DB_DATABASE=myshop
   DB_USERNAME=sail
   DB_PASSWORD=password
   ```

4. Levantar contenedores  
   ```bash
   sail up -d --build
   ```

5. Crear y dar permisos a la base de datos (si es necesario)  
   ```bash
   sail mysql -u root -ppassword
   ```
   Dentro de MySQL:
   ```sql
   CREATE DATABASE IF NOT EXISTS arrancalo;
   GRANT ALL PRIVILEGES ON arrancalo.* TO 'sail'@'%';
   FLUSH PRIVILEGES;
   exit
   ```

6. Migrar y poblar la base de datos  
   ```bash
   sail artisan migrate --seed
   ```

7. Instalar dependencias frontend  
   ```bash
   sail npm install
   sail npm run dev   # o npm run build para producción
   ```

8. Acceder a la aplicación  
   - Frontend: http://localhost  
   - Admin: http://localhost/admin (tras login)

**Uso básico**

- **Inicio**: categorías y productos destacados + acceso rápido a ofertas  
- **Productos**: listado general y página detalle con productos del mismo color  
- **Ofertas**: página dedicada con descuentos y productos afectados  
- **Carrito**: añadir, modificar cantidades, aplicar cupón, ver total con descuento  
- **Contacto**: botón directo a WhatsApp Web  
- **Autenticación**: login/register vía Breeze  
- **Administración**: /admin/products (gestionar productos, categorías, ofertas y cupones)

**Usuarios de prueba** (creados por seeder)

| Rol          | Email                   | Contraseña | Acceso principal                  |
|--------------|-------------------------|------------|-----------------------------------|
| Administrador| admin@arrancalo.com     | password   | Panel completo (/admin)           |

**Requisitos previos**

- Docker + Docker Compose  
- Composer  
- PHP 8.1+  
- Node.js + npm  
- Puertos 80, 3306 y 6379 libres

**Autor**  
elhordev  
GitHub: https://github.com/elhordev/Proyecto-PHP-2

**Licencia**  
Uso educativo – no comercial.