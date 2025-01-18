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

# Configurar diretório de trabalho
WORKDIR /var/www/html

# Instalar dependências do Laravel
RUN composer global require laravel/installer

# # Copiar o script de inicialização para dentro do container
# COPY docker/entrypoint.sh /usr/local/bin/entrypoint.sh

# # Tornar o script executável
# RUN chmod +x /usr/local/bin/entrypoint.sh

# # Configurar o script como ponto de entrada
# ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]


