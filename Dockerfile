
# ==========================================
# ETAPA 1: DEPENDENCIAS PHP
# ==========================================
FROM php:8.3-cli AS vendor_build

WORKDIR /var/www/html

# Instalar extensiones PHP necesarias
RUN apt-get update && apt-get install -y \
    git unzip libicu-dev libzip-dev \
    libpng-dev libjpeg62-turbo-dev libfreetype6-dev \
    && docker-php-ext-configure gd \
       --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) \
       pdo_mysql mbstring exif pcntl bcmath gd zip intl opcache \
    && rm -rf /var/lib/apt/lists/*

# Instalar Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copiar dependencias
COPY composer.json composer.lock ./

RUN composer install \
    --no-dev \
    --no-interaction \
    --prefer-dist \
    --optimize-autoloader \
    --no-scripts

# Copiar aplicación
COPY . .

# Generar autoload y descubrir paquetes Laravel
RUN composer dump-autoload --no-dev --optimize --no-scripts \
    && php artisan package:discover --ansi


# ==========================================
# ETAPA 2: COMPILAR FRONTEND
# ==========================================
FROM node:22-alpine AS frontend_build

WORKDIR /var/www/html

COPY package.json package-lock.json ./

RUN npm ci

COPY . .

RUN npm run build


# ==========================================
# ETAPA 3: SERVIDOR DE PRODUCCION
# ==========================================
FROM php:8.3-apache AS production

WORKDIR /var/www/html

# Instalar extensiones PHP
RUN apt-get update && apt-get install -y \
    libicu-dev libzip-dev \
    libpng-dev libjpeg62-turbo-dev libfreetype6-dev \
    && docker-php-ext-configure gd \
       --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) \
       pdo_mysql mbstring exif pcntl bcmath gd zip intl opcache \
    && a2enmod rewrite headers \
    && rm -rf /var/lib/apt/lists/*

# Configurar PHP para produccion
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

# Configurar Apache en puerto 10000
RUN sed -i 's/Listen 80/Listen 10000/' /etc/apache2/ports.conf \
    && sed -i 's/<VirtualHost \*:80>/<VirtualHost *:10000>/' \
       /etc/apache2/sites-available/000-default.conf \
    && sed -i 's#DocumentRoot /var/www/html#DocumentRoot /var/www/html/public#' \
       /etc/apache2/sites-available/000-default.conf \
    && printf '\n<Directory /var/www/html/public>\nAllowOverride All\nRequire all granted\n</Directory>\n' \
       >> /etc/apache2/apache2.conf

# Copiar aplicacion con dependencias PHP
COPY --from=vendor_build /var/www/html /var/www/html

# Copiar frontend compilado
COPY --from=frontend_build /var/www/html/public/build /var/www/html/public/build

# Preparar directorios de Laravel
RUN mkdir -p \
    storage/framework/cache \
    storage/framework/sessions \
    storage/framework/views \
    storage/logs \
    bootstrap/cache \
    && chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

# Configurar PHP OPcache
RUN printf 'opcache.enable=1\nopcache.enable_cli=0\nopcache.validate_timestamps=0\nopcache.memory_consumption=128\nopcache.max_accelerated_files=10000\n' \
    > "$PHP_INI_DIR/conf.d/opcache-production.ini"

# Puerto del servicio
EXPOSE 10000

# Iniciar Apache
CMD ["apache2-foreground"]
