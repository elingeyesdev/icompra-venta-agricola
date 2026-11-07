# Usar la imagen oficial de PHP con FPM (FastCGI Process Manager)
FROM php:8.2-fpm

# Argumentos definidos en docker-compose.yml (opcional para permisos)
ARG user=myuser
ARG uid=1000

# Instalar dependencias del sistema requeridas por Laravel
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libzip-dev

# Limpiar caché de apt para reducir el tamaño de la imagen
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Instalar extensiones de PHP necesarias para Laravel y Bases de Datos
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Obtener la última versión de Composer (Gestor de dependencias de PHP)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Crear un usuario del sistema para ejecutar comandos de Composer y Artisan
RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

# Establecer el directorio de trabajo dentro del contenedor
WORKDIR /var/www

# Copiar los archivos de la aplicación al contenedor
COPY . /var/www

# Cambiar los permisos de los directorios de caché y almacenamiento de Laravel
RUN chown -R $user:www-data /var/www/storage \
    && chown -R $user:www-data /var/www/bootstrap/cache \
    && chmod -R 775 /var/www/storage \
    && chmod -R 775 /var/www/bootstrap/cache

# Cambiar al usuario no root creado
USER $user

# Exponer el puerto 9000 para PHP-FPM
EXPOSE 9000

# Comando por defecto al iniciar el contenedor
CMD ["php-fpm"]