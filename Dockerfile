FROM php:7.4.1-fpm

COPY install-composer.sh /
RUN apt-get update \
  && apt-get install -y wget git unzip libpq-dev \
  && : 'Install Node.js' \
  &&  curl -sL https://deb.nodesource.com/setup_12.x | bash - \
  && apt-get install -y nodejs \
  && : 'Install PHP Extensions' \
  && docker-php-ext-install -j$(nproc) pdo_pgsql\
  && : 'Install Composer' \
  && chmod 755 /install-composer.sh \
  && /install-composer.sh \
  && mv composer.phar /usr/local/bin/composer
RUN docker-php-ext-install pdo_mysql

WORKDIR /var/www/html/relief_market

RUN composer global require "laravel/installer"