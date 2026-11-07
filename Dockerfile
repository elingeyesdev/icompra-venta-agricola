# 1. Usar imagen con Apache integrado
FROM php:8.2-apache

# 2. Instalar dependencias del sistema requeridas
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libzip-dev

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# 3. Instalar extensiones PHP necesarias para Laravel
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# 4. Habilitar mod_rewrite de Apache para las URLs limpias de Laravel
RUN a2enmod rewrite

# 5. Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 6. Directorio de trabajo
WORKDIR /var/www/html

# 7. Copiar el código del proyecto
COPY . /var/www/html

# 8. Configurar Apache para apuntar a la carpeta /public de Laravel
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# 9. Instalar dependencias de Laravel
RUN composer install --no-dev --optimize-autoloader

# 10. Asignar permisos al usuario de Apache (www-data)
RUN chown -R www-data:www-data /var/www/html/storage \
    && chown -R www-data:www-data /var/www/html/bootstrap/cache \
    && chmod -R 775 /var/www/html/storage \
    && chmod -R 775 /var/www/html/bootstrap/cache

# 11. Configurar el puerto dinámico para plataformas en la nube
ENV PORT=8080
RUN sed -s -i -e "s/80/\${PORT}/" /etc/apache2/ports.conf
RUN sed -s -i -e "s/*:80/*:\${PORT}/" /etc/apache2/sites-available/*.conf

EXPOSE ${PORT}