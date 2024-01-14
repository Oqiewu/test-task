FROM php:8.2-fpm-alpine

ARG PUID=1000
ARG PGID=1000
RUN apk --no-cache add shadow && \
    groupmod -o -g ${PGID} www-data && \
    usermod -o -u ${PUID} -g www-data www-data

USER root

RUN apk add --no-cache \
        autoconf \
        g++ \
        make \
        icu-dev \
        postgresql-dev \
        zlib-dev \
        libzip-dev \
        bash \
        git \
    && docker-php-ext-configure intl \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install \
        intl \
        opcache \
        pdo \
        pdo_pgsql \
        zip

RUN curl -Ss getcomposer.org/installer | php

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

USER www-data

WORKDIR /var/www/html