FROM php:8.4-apache

LABEL maintainer="Nice <kanyarut@wecraft.co.th>" \
      version="1.0"

# Add a non-root user 'sail'
RUN groupadd --gid 1000 sail \
    && useradd -ms /bin/bash --uid 1000 --gid 1000 sail

ADD docker/supervisor/supervisord.conf /etc

RUN docker-php-ext-install pdo_mysql bcmath \
    && apt-get update \
    && apt-get install -y --no-install-recommends supervisor \
    && rm -rf /var/lib/apt/lists/*

RUN pecl install redis && docker-php-ext-enable redis

COPY docker/supervisor/php.ini /usr/local/etc/php

CMD ["supervisord", "-c", "/etc/supervisord.conf"]