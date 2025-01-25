FROM php:8.2-fpm

# Instalar extensões necessárias
RUN apt-get update && apt-get install -y \
    nodejs \
    npm \
    libonig-dev \
    libzip-dev \
    zip \
    unzip \
    git \
    curl \
    && docker-php-ext-install pdo_mysql mbstring zip

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Adicionar a variável de ambiente para o Composer
ENV COMPOSER_ALLOW_SUPERUSER=1

# Configurar o diretório de trabalho no container
WORKDIR /var/www/html

# Copiar todos os arquivos do projeto para o container
COPY ../../app/composer.json /var/www/html/composer.json

# Copiar todos os arquivos do projeto para o container
COPY ../../app/package.json /var/www/html/package.json

# Instalar dependências do Laravel
RUN composer global require laravel/installer

RUN composer install --no-dev --optimize-autoloader --no-scripts

# Instalar dependências do NPM
RUN npm install


# # Copiar o script de inicialização para dentro do container
# COPY docker/entrypoint.sh /usr/local/bin/entrypoint.sh

# # Tornar o script executável
# RUN chmod +x /usr/local/bin/entrypoint.sh

# # Configurar o script como ponto de entrada
# ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]


