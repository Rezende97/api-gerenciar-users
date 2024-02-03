-- create table usuario

create table users (
	id_users int primary key auto_increment,
	id_sexes int not null,
	name varchar(150) not null,
	cpf varchar(11) not null unique,
	age int unsigned not null,
	profession varchar(150) not null,
	created_dt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	updated_dt TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	foreign key(id_sexes) references sexes(id_sexes)
)