#!/bin/bash

# Instalar dependências do Node.js
if [ -f package.json ]; then
  echo "Instalando dependências do Node.js..."
  npm install
fi

# Executar migrations e seeders
echo "Executando migrations..."
php artisan migrate --force

# Iniciar o servidor PHP-FPM
exec "$@"