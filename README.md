-------------------------------------------------------------------------------------------
.
. CI4_API_JWT
. API RESTful com CodeIgniter 4 utilizando autenticação JWT e Endpoints de Users (CRUD).
.
-------------------------------------------------------------------------------------------

## Tecnologias

- PHP 8+
- CodeIgniter 4
- MySQL
- Composer
- JWT (Autenticação)
- RESTful API

## Estrutura

ci4_api_jwt/
├── app/
│ ├── Controllers/
│ │ └── Api/Users.php
│ ├── Models/
│ │ └── UserModel.php
├── public/
├── vendor/
├── writable/
├── .env
├── composer.json
├── spark

## Instalação

1. Clone o repositório:

[bash]
git clone https://github.com/rafapress/CI4_API_JWT.git
cd CI4_API_JWT

2. Instale as dependências:

[bash]
composer install

3. Configure o ambiente:

Renomeie o arquivo .env.example para .env:

[bash]
cp .env.example .env

Depois edite as configurações do banco (no arquivo .env):

CI_ENVIRONMENT = development

database.default.hostname = localhost
database.default.database = ci_api_db
database.default.username = root
database.default.password =
database.default.DBDriver = MySQLi
database.default.DBPrefix =

app.baseURL = http://localhost:8080/

JWT_SECRET = superPass!

4. Gere a chave do app (opcional):

[bash]
php spark key:generate

5. Crie o banco no MySQL com este comando SQL (pode ser pelo phpMyAdmin ou terminal):

CREATE DATABASE ci_api_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

5.1. Crie a tabela users (pode ser pelo phpMyAdmin ou MySQL Workbench):

-- Execute o script abaixo:

CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  email VARCHAR(150) NOT NULL,
  cpf VARCHAR(20),
  rg VARCHAR(20),
  phone VARCHAR(30),
  address VARCHAR(255),
  number VARCHAR(20),
  district VARCHAR(100),
  created_at TIMESTAMP NULL DEFAULT NULL,
  updated_at TIMESTAMP NULL DEFAULT NULL
);

6. Execute o Migrate, no terminal:

[bash]
php spark migrate

7. Inicie o servidor:

[bash]
php spark serve

Acesse: http://localhost:8080 (ou a porta que for gerada na URL)

Endpoints da API:

| Método | Rota            | Ação          |
| ------ | --------------- | ------------- |
| GET    | /api/users      | Listar todos  |
| GET    | /api/users/{id} | Buscar por ID |
| POST   | /api/users      | Criar novo    |
| PUT    | /api/users/{id} | Atualizar     |
| DELETE | /api/users/{id} | Remover       |










