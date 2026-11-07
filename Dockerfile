# Usar la imagen oficial de PHP con Apache (PHP 8.3)
FROM php:8.3-apache

# Instalar dependencias del sistema, INCLUYENDO libzip-dev
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    zip \
    unzip \
    git \
    curl \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Habilitar mod_rewrite de Apache para las rutas amigables de Laravel
RUN a2enmod rewrite

# Cambiar el DocumentRoot de Apache a la carpeta "public" de Laravel
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Instalar Composer copiándolo desde su imagen oficial
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Establecer el directorio de trabajo
WORKDIR /var/www/html

# Copiar los archivos de tu proyecto al contenedor (incluyendo composer.json)
COPY . .

# Dar memoria ilimitada a Composer para evitar que el proceso muera por falta de RAM
ENV COMPOSER_MEMORY_LIMIT=-1

# Instalar las dependencias de PHP para producción
RUN composer install --no-interaction --optimize-autoloader --no-dev

# Asignar los permisos correctos a las carpetas que Laravel necesita escribir
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Exponer el puerto 80
EXPOSE 80