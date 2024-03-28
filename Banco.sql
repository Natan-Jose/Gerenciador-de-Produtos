CREATE DATABASE bd;

USE bd;

CREATE TABLE cadastro(
Nome_Produto VARCHAR(100) NOT NULL,
Descricao_Produto TEXT NOT NULL, 
 Valor_Produto DECIMAL(10, 2) NOT NULL,
Disponivel_Para_Venda CHAR (1) NOT NULL,
PRIMARY KEY (Nome_Produto)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

SELECT * FROM cadastro;

TRUNCATE cadastro;

DESCRIBE cadastro;

