FROM php:8.0-fpm

LABEL authors="fabrizzio"

# Instala las dependencias y extensiones PHP
RUN apt-get update && apt-get install -y \
    libpng-dev \
    zip \
    libzip-dev \
    unzip \
    && docker-php-ext-install pdo pdo_mysql gd zip

# Instala Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Establece el directorio de trabajo en el contenedor
WORKDIR /var/www

# Copia los archivos existentes al contenedor
COPY . .

# Instala las dependencias con Composer
RUN composer install

# Exponer el puerto 9000
EXPOSE 9000

CMD ["php-fpm"]
