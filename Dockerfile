FROM serversideup/php:7.4-fpm-nginx-alpine

ENV PHP_OPCACHE_ENABLE=1
ENV NGINX_WEBROOT=/var/www/html/web

USER root

WORKDIR /var/www/html

RUN mkdir -p runtime/log \
    web/assets \
    web/uploads

COPY composer.json composer.lock* ./
RUN composer install --no-dev --prefer-dist --no-interaction --no-progress

COPY . .

RUN chown -R www-data:www-data runtime web/assets web/uploads && \
    chmod -R 755 runtime web/assets web/uploads

USER www-data
