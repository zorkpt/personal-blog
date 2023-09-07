FROM php:8.1-fpm
WORKDIR /var/www/html
# Instalar dependências e extensões necessárias
RUN apt-get update && apt-get install -y libpng-dev zip unzip
RUN docker-php-ext-install pdo pdo_mysql gd


# Instalar Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Definir diretório de trabalho
WORKDIR /var/www/html

# Copiar o resto dos arquivos
COPY . .
