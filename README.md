# Projeto: Sistema de Gerenciamento de Veículos

Este projeto é um sistema básico de gerenciamento de veículos que permite o cadastro de usuários e carros. O sistema foi desenvolvido em PHP e utiliza um banco de dados MySQL.

## Configuração do Projeto

### Pré-requisitos

Antes de iniciar, certifique-se de ter as seguintes ferramentas instaladas:

- PHP 7.4 ou superior
- Composer
- MySQL

### Instalação

1. **Clone o repositório:**

   ```bash
   git clone https://github.com/seu-usuario/seu-repositorio.git
   cd seu-repositorio
   ```

2. **Instale as dependências do projeto:**

   ```bash
   composer install
   ```

3. **Crie o banco de dados:**

   No MySQL, crie o banco de dados e as tabelas necessárias executando o script abaixo:

   ```sql
   DELIMITER //

   CREATE TABLE loja.users (
     idusers INT NOT NULL AUTO_INCREMENT,
     nome VARCHAR(150) NOT NULL,
     email VARCHAR(250) NOT NULL,
     senha VARCHAR(250) NOT NULL,
     created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
     updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
     PRIMARY KEY (idusers)
   );

   CREATE TABLE loja.fabricante (
     idfabricante INT NOT NULL AUTO_INCREMENT,
     nome VARCHAR(150) NOT NULL,
     created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
     updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
     PRIMARY KEY (idfabricante)
   );

   CREATE TABLE loja.veiculo (
     idveiculo INT NOT NULL AUTO_INCREMENT,
     nome VARCHAR(150) NOT NULL,
     idfabricante INT NOT NULL,
     created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
     updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
     PRIMARY KEY (idveiculo)
   );

   CREATE TABLE loja.cars (
     idcars INT NOT NULL AUTO_INCREMENT,
     modelo VARCHAR(150) NOT NULL,
     idfabricante INT NOT NULL,
     idveiculo INT NOT NULL,
     anofabricacao INT NOT NULL,
     created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
     updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
     PRIMARY KEY (idcars)
   );

   INSERT INTO loja.fabricante (nome) VALUES 
   ('Toyota'),
   ('Ford'),
   ('Volkswagen'),
   ('Honda'),
   ('BMW');

   INSERT INTO loja.veiculo (nome, idfabricante) VALUES 
   ('Corolla', 1),
   ('Camry', 1),
   ('RAV4', 1),
   ('Mustang', 2),
   ('F-150', 2),
   ('Explorer', 2),
   ('Golf', 3),
   ('Passat', 3),
   ('Tiguan', 3),
   ('Civic', 4),
   ('Accord', 4),
   ('CR-V', 4),
   ('Série 3', 5),
   ('X5', 5),
   ('i8', 5);

   DELIMITER ;
   ```

4. **Configuração do arquivo `.env`:**

   Crie um arquivo `.env` na raiz do projeto com as seguintes configurações:

   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=loja
   DB_USERNAME=seu_usuario
   DB_PASSWORD=sua_senha
   ```

5. **Executar o projeto:**

   Agora você pode executar o servidor embutido do PHP:

   ```bash
   php -S localhost:8000 -t public
   ```

## Contribuições

Contribuições são bem-vindas! Sinta-se à vontade para abrir issues e pull requests.
