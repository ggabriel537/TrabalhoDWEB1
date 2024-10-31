CREATE DATABASE BancoApp;

USE BancoApp;

CREATE TABLE Usuario (
    user TEXT PRIMARY KEY UNIQUE,
    senha TEXT NOT NULL
);

CREATE TABLE Tarefa (
    id SERIAL PRIMARY KEY,
    user_id TEXT FOREIGN KEY NOT NULL,
    nome TEXT NOT NULL,
    descricao TEXT,
    prazo DATE NOT NULL,
    notificar BOOLEAN NOT NULL
)