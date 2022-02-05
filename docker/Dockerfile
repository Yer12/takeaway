FROM php:8-fpm

WORKDIR /var/www/app

RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libpq-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install pdo pdo_pgsql pgsql \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY --chown=www-data:www-data . /var/www/app

COPY .env.example .env

RUN composer install --no-cache && \
    find /var/www/app -path /var/www/app/vendor -prune -o -type f -exec chmod 644 {} \; && \
    find /var/www/app -path /var/www/app/vendor -prune -o -type d -exec chmod 755 {} \; && \
    chgrp -R www-data storage bootstrap/cache || true && \
    chmod -R ug+rwx storage bootstrap/cache || true && \
    chmod -R +x vendor/bin/* || true && \
    php artisan key:generate

USER www-data

ENTRYPOINT ["/bin/sh", "./docker/docker-entrypoint.sh"]
