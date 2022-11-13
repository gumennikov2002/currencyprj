FROM php:8.1-fpm

RUN apt-get update \
    && docker-php-ext-install pdo pdo_mysql

RUN apt-get install -y \
    zlib1g-dev \
    libzip-dev \
    unzip

RUN docker-php-ext-install zip

COPY --from=composer /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/currencyprj