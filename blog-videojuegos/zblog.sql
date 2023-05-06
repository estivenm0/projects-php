CREATE DATABASE IF NOT EXISTS blog;

USE DATABASE blog;

CREATE TABLE usuarios(
    id int(255) auto_increment not null,
    nombre varchar(100) not null,
    apellidos varchar(100) not null,
    email varchar(100) not null,
    password varchar(100) not null,
    fecha date not null,
    CONSTRAINT pk_usuarios PRIMARY KEY(id)
    );

CREATE TABLE categorias(
    id int(255) auto_increment not null,
    nombre varchar(100)  not null,
    CONSTRAINT pk_cateogrias PRIMARY KEY(id)
);

CREATE TABLE posts(
    id int(255) PRIMARY KEY auto_increment not null,
    usuario_id int(255)  not null,
    categoria_id int(255)  not null,
    titulo varchar(255)  not null,
    descripcion text(100)  not null,
    fecha date not null,
    CONSTRAINT pk_posts PRIMARY KEY(id),
    CONSTRAINT fk_posts_usuario FOREIGN KEY(usuario_id) REFERENCES usuarios(id),
    CONSTRAINT fk_posts_categoria FOREIGN KEY(categoria_id) REFERENCES categorias(id)
);