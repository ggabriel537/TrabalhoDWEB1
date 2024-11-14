CREATE DATABASE BancoDados;

USE BancoDados;

CREATE TABLE Usuario (
    user varchar(32) PRIMARY KEY UNIQUE,
    senha varchar(32) NOT NULL
);

CREATE TABLE Tarefa (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id VARCHAR(32),
    nome VARCHAR(32) NOT NULL,
    descricao VARCHAR(250),
    prazo DATE NOT NULL,
    notificar BOOLEAN NOT NULL,
    FOREIGN KEY (user_id) REFERENCES Usuario(user)
);