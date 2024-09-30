create database crud_dupla_jose;

use crud_dupla_jose;

create table usuario (
	id int primary key auto_increment not null,
	nome varchar(100),
    email varchar (100)
);

create table nota (
	id int primary key auto_increment not null,
	descricao varchar (15000),
    titulo varchar (100)
);