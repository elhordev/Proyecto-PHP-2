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

# 7. Instalar dependencias de Composer
RUN composer install --optimize-autoloader 

# 8. Generar APP_KEY
RUN php artisan key:generate

# 9. Expone el puerto que Railway usará
ENV PORT 80
EXPOSE 80

CMD ["bash", "-c", "\
    set -eux; \
    a2dismod mpm_event mpm_worker || true; \
    rm -f /etc/apache2/mods-enabled/mpm_*; \
    a2enmod mpm_prefork; \
    apache2ctl -t || echo 'Apache config test failed - check logs'; \
    exec apache2-foreground \
"]
