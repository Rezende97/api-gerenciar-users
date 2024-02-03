-- create table sexo

create table sexes (
	id_sexes int primary key auto_increment,
	sex varchar(10) not null,
	created_dt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	updated_dt TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)

