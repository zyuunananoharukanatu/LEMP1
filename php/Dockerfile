FROM php:8.2-fpm

RUN bash

COPY ./php.ini /usr/local/etc/php/

# extension
 RUN apt-get update \
   && apt-get install -y libfreetype6-dev libjpeg62-turbo-dev libpng-dev libonig-dev \
   && docker-php-ext-install pdo_mysql mysqli gd iconv exif

# composer
RUN curl -S https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer \
    && composer self-update

# node
RUN curl -o- https://raw.githubusercontent.com/creationix/nvm/v0.33.11/install.sh | bash \
    && export NVM_DIR="$HOME/.nvm" \
    && . $NVM_DIR/nvm.sh \
    && nvm install v14.16.0 \
    && nvm use v14.16.0 \
    && nvm alias default v14.16.0 \
    && npm install -g npm
