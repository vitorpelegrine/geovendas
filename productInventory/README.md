# Processamento de Produtos Geovendas
Atualização e criação de produtos de acordo com JSON enviado

## Requerimentos

- PHP >= 7.3
- MySQL >= 5.7
- Composer

## Instalação

Clonar o repositório:

git clone https://github.com/username/repository.git

Foi Utilizado Laragon para o desenvolvimento

Após a clonagem installar as dependencias do composer:
composer install

Arrumar o arquivo .envexample para .env para configurar a conexão com o banco de dados

Após a configuração do .env rodar as migrations para o banco de dados 
php artisan migrate

e para rodar local utilizar o comando 
php artisan serve


