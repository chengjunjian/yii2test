FROM serversideup/php:7.4-fpm-nginx-alpine

ENV PHP_OPCACHE_ENABLE=1
ENV NGINX_WEBROOT=/var/www/html/web

WORKDIR /var/www/html

COPY composer.json composer.lock* ./
RUN composer install --no-dev --prefer-dist --no-interaction --no-progress

COPY . .
