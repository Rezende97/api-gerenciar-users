Etapa para instalação e utlizar a aplicação

1º etapa: Instalar o xampp adquirindo o pacote do apache, php e mysql
link do site para download do xampp: https://www.apachefriends.org/pt_br/index.html

Obs: 
Após instalar o xampp, acesse a pasta htdocs e apague todos os arquivos e pastas 
Após apagar os arquivos e pasta, continue dentro da pasta htdocs e faça a clonagem do repositório
Após o passo a passo, verificar a porta do apache;

2º etapa: acesse o repositorio https://github.com/Rezende97/api-gerenciar-users e faça a clonagem do repositorio por HTTPS

Obs:
Comando para clonar o repositorio dentro da pasta htdocs por HTTPS: git clone https://github.com/Rezende97/api-gerenciar-users.git

3º etapa: 
Acesse o phpmyadmin (mysql) do localhost incluido no pacote do xampp

Obs:
Crie o banco de dados com o nome: gerenciar_users

Comando para criar a base de dados:
create database gerenciar_users

Após criar a base de dados, crie a tabela: users
Comando para criar a tabela:
create table users (
	id_users int primary key auto_increment,
	name varchar(150) not null,
	email varchar(150) not null,
	cpf varchar(11) not null unique,
	age int unsigned not null,
	profession varchar(150) not null,
	created_dt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	updated_dt TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)

*Esses comando sql estão na aplicação na pasta migration

4º etapa: 
