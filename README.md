# Estoque

#### Rodar os comandos abaixo

```docker-compose down && docker-compose up --build```

#### Após isso rodar o comando para instalar o npm e o build do node

`docker exec -it laravel_app npm install && npm run build`

#### OU

`docker-compose exec app npm install && npm run build`

#### Comando para rodar aplicação no modo desenvolvedor
docker exec -it laravel_app npm run dev


