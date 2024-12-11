# Use uma imagem oficial do PHP com Apache
FROM php:8.1-apache

# Instalar dependências
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql

# Habilitar o mod-rewrite do Apache
RUN a2enmod rewrite

# Instalar o Composer
RUN curl -sS https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer

# Copiar os arquivos do projeto
COPY . /var/www/html/

# Definir o diretório de trabalho
WORKDIR /var/www/html/

# Rodar o composer install
RUN composer install --ignore-platform-req=ext-pcntl

# Expor a porta 80
EXPOSE 80

# Iniciar o servidor Apache
CMD ["apache2-foreground"]
