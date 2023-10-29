# Desafio para a vaga de Fullstack Developer (PHP/Laravel e VueJS)

O projeto consiste de uma aplicação CRUD de cadastro de pacientes.

## Configuração do projeto

### Backend

- Copie o arquivo `.env.example` para o arquivo `.env`.
- Abra um terminal na pasta 'php-laravel' e rode o comando `./vendor/bin/sail up`.
- Abra um terminal na pasta 'php-laravel' e rode as migrations com o comando `bash vendor/bin/sail artisan migrate`.
- Opcional: rode `bash vendor/bin/sail artisan db:seed` para popular o banco de dados.
- Backend deverá estar rodando no endereço http://localhost:8081.

### Frontend

- Copie o arquivo `.env.example` para o arquivo `.env`.
- Abra um terminal na pasta 'front-vuejs' e rode o comando `npm install` (node version: v17.9.1).
- Rode o comando `npm run dev`.
- Frontend deverá estar rodando no endereço http://localhost:5173.

## Utilização

- Para utilização dos endpoints apenas no backend utilize o arquivo com os endpoints configurados numa collection do postman na raíz do projeto.
- Para utilização dos endpoints no frontend, siga o fluxo definido nas imagens da pasta 'images'.
