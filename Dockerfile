# 1. Imagen base de PHP con Apache
FROM php:8.5-apache

# 2. Instalar extensiones de PHP necesarias
RUN apt-get update && apt-get install -y \
    libzip-dev unzip git && \
    docker-php-ext-install pdo_mysql zip

# 3. Habilitar rewrite de Apache
RUN a2enmod rewrite

# 4. Copiar código
COPY . /var/www/html/

# 5. Ajustar permisos (si es necesario)
RUN chown -R www-data:www-data /var/www/html

# 6. Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

ENV COMPOSER_ALLOW_SUPERUSER=1

# 7. Instalar dependencias de Composer (sin dev para producción)
RUN composer install --optimize-autoloader 

# 8. Generar APP_KEY
RUN php artisan key:generate --force || true

# === FIX PRINCIPAL: Configurar Apache para que sirva desde /public ===
ENV APACHE_DOCUMENT_ROOT /var/www/html/public

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf \
    && sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Asegurar que busque index.php primero
RUN echo "DirectoryIndex index.php index.html" >> /etc/apache2/apache2.conf

# Asegurar permisos en build
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Limpiar y cachear configs (|| true para no fallar si .env no está completo)
RUN php artisan config:cache || true \
    && php artisan route:cache || true \
    && php artisan view:cache || true

# === FIX MPM (ya lo tenías, lo mantenemos tal cual) ===
CMD ["bash", "-c", "\
    set -eux; \
    a2dismod mpm_event mpm_worker || true; \
    rm -f /etc/apache2/mods-enabled/mpm_*; \
    a2enmod mpm_prefork; \
    exec apache2-foreground \
"]

# 9. Expone el puerto que Railway usará
ENV PORT 80
EXPOSE 80