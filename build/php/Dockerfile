FROM php:7.1-alpine
MAINTAINER Manel López  <malotor@gmail.com>
ARG remote_host

RUN apk update \
    && apk add  --no-cache git mysql-client curl libmcrypt libmcrypt-dev \
    libxml2-dev freetype-dev libpng-dev libjpeg-turbo-dev g++ make autoconf \
    && docker-php-source extract \
    && pecl install xdebug redis \
    && docker-php-ext-enable xdebug redis \
    && docker-php-source delete \
    && docker-php-ext-install mcrypt pdo_mysql soap bcmath \
    && echo "xdebug.remote_enable=on" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.remote_autostart=off" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.remote_port=9000" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.remote_handler=dbgp" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.remote_connect_back=0" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.idekey=PHPSTORM" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.remote_host=$remote_host" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && rm -rf /tmp/*

RUN echo "date.timezone = Europe/Madrid" >> /usr/local/etc/php/conf.d/php.ini \
    && echo "error_log = /dev/stdout" >> /usr/local/etc/php/conf.d/php.ini \
    && echo "error_reporting = E_ALL" >> /usr/local/etc/php/conf.d/php.ini \
    && echo "display_errors = on" >> /usr/local/etc/php/conf.d/php.ini \
    && echo "log_errors = yes" >> /usr/local/etc/php/conf.d/php.ini

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer

WORKDIR /code

EXPOSE 9000