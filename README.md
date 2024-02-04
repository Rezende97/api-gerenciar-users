Etapa para instalação e utlizar a aplicação

1º etapa: 
Instalar o xampp adquirindo o pacote do apache, php e mysql
link do site para download do xampp: https://www.apachefriends.org/pt_br/index.html

Obs: 
Após instalar o xampp, acesse a pasta htdocs e apague todos os arquivos e pastas 

2º etapa: 
Instalar o composer 
link do site para download do composer: https://getcomposer.org/download/

3º etapa:
Instalar o postman
link do site para download do postman: https://www.postman.com/

4º etapa: 
Clonar o repositório ao seu ambiente local
Acesse o repositorio https://github.com/Rezende97/api-gerenciar-users e faça a clonagem do repositorio por HTTPS
A clonagem da aplicação precisa ser dentro da pasta htdocs

Obs:
Comando para clonagem do repositorio por HTTPS: git clone https://github.com/Rezende97/api-gerenciar-users.git

Após a clonagem, criar a base de dados

5º etapa: 
Acesse o phpmyadmin (mysql) do xampp

Obs:
Crie o banco de dados com o nome: gerenciar_users

Comando para criar a base de dados:
create database gerenciar_users

Após criar a base de dados, crie a tabela: users

Comando para criar a tabela:
create table users (
	id_user int primary key auto_increment,
	name varchar(150) not null,
	email varchar(150) not null,
	cpf varchar(11) not null unique,
	age int unsigned not null,
	profession varchar(150) not null,
	created_dt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	updated_dt TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)

*Esses comando sql estão na aplicação na pasta migration

6º etapa: 
Abrir a ferramenta postman para testar os endpoints da api rest

Obs: 
identificar qual o endereço e porta do seu localhost
exemplo:
http://localhost/api-gerenciar-users/
ou
http://localhost:90/api-gerenciar-users/

---
---
---
-- endpoint visualizar todos os perfil
---
---
Listar todos os perfil de usuários
method:
GET

endpoint: 
http://colocar o endereço e porta do seu localhost/api-gerenciar-users/


---
---
---
-- endpoint visualizar perfil
---
---
Visualizar apenas um perfil de usuário
method:
GET

endpoint:
http://colocar o endereço e porta do seu localhost/api-gerenciar-users/showUser/id

json de request:
{
    "id_user": "1" 
}

explicação: 
chave do json: "id_user"  
valor: "numero do id do usuário"


---
---
---
-- endpoint cadastrar perfil
---
---
cadastrar perfil de usuário
method:
POST

endpoint:
http://colocar o endereço e porta do seu localhost/api-gerenciar-users/registerUser

json de request:
{
    "name": "exemplo",
    "email": "exemplo@gmail.com",
    "cpf": "111.111.111-11",
    "age": "18",
    "profession": "desenvolvedor"
}

explicação: 
chave do json: "name" - valor: "nome do usuário"
chave do json: "email" - valor: "email do usuário"
chave do json: "cpf" - valor: "cpf do usuário"
chave do json: "age" - valor: "idade do usuário"
chave do json: "profession" - valor: "profissão do usuário"

---
---
---
-- endpoint atualizar perfil
---
---
atualizar o perfil do usuário
method:
PUT

endpoint:
http://colocar o endereço e porta do seu localhost/api-gerenciar-users/updateRegisterUser/id

json de request:
{
    "id_user": "1",
    "name": "exemplo",
    "email": "exemplo@gmail.com",
    "cpf": "111.111.111-11",
    "age": "18",
    "profession": "desenvolvedor"
}

explicação: 
chave do json: "id_user" - valor: "id do usuário"
chave do json: "name" - valor: "nome do usuário"
chave do json: "email" - valor: "email do usuário"
chave do json: "cpf" - valor: "cpf do usuário"
chave do json: "age" - valor: "idade do usuário"
chave do json: "profession" - valor: "profissão do usuário"


---
---
---
-- endpoint excluir perfil
---
---
excluir perfil de usuário
method:
DELETE

endpoint:
http://colocar o endereço e porta do seu localhost/api-gerenciar-users/deleteRegisterUser/id

json de request:
{
    "id_user": "1" 
}

explicação: 
chave do json: "id_user" - valor: "numero do id do usuário"








