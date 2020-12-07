FROM php:7.3.18-fpm

RUN cp "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"
COPY ./docker/php/xdebug.ini /usr/local/etc/php/conf.d

# Pobranie listy pakietów.
RUN apt-get update

# Instalacja rozszerzenia Xdebug.
RUN pecl install xdebug
RUN docker-php-ext-enable xdebug

# Instalacja pakietu Node.js.
RUN curl -sL https://deb.nodesource.com/setup_13.x | bash -
RUN apt-get install -y nodejs

RUN apt-get install -y libssl-dev

# Instalacja biblioteki PDO MySQL.
RUN docker-php-ext-install pdo_mysql

# Instalacja rozszerzenia PHP Zip.
RUN apt-get install -y zip libzip-dev
RUN docker-php-ext-install zip

# Instalacja composera globalnie.
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php -r "if (hash_file('sha384', 'composer-setup.php') === '756890a4488ce9024fc62c56153228907f1545c228516cbf63f885e036d37e9a59d27d63f46af1d4d07ee0f76181c7d3') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" \
    && php composer-setup.php \
    && php -r "unlink('composer-setup.php');"
RUN mv composer.phar /usr/local/bin/composer

# Utworzenie grupy i użytkownika dla aplikacji laravel.
RUN groupadd -g 1000 www
RUN useradd -u 1000 -g www -ms /bin/bash www

# Kopiowanie plików projektu.
COPY . /var/www

# Ustawienie uprawnień do katalogu "storage".
RUN chmod -R 775 /var/www/storage

# Zmiana użytkownika na "www".
USER www
