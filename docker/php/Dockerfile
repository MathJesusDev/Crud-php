FROM php:8.2-apache
RUN docker-php-ext-install pdo pdo_mysql
COPY ./apache-php.ini /usr/local/etc/php/conf.d/custom.ini
