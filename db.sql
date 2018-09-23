CREATE DATABASE eventos_fccr;
use eventos_fccr;

CREATE TABLE usuarios(
	id int primary key auto_increment,
    nome varchar(80) not null,
    sobrenome varchar(80) not null,
    email varchar(128) not null,
    senha varchar(80) not null,
    admin_site boolean default 0
);