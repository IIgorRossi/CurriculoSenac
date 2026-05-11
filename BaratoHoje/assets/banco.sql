/* COMANDOS DDL - LINGUAGEM DE DEFINIÇÃO DE DADOS */
CREATE TABLE usuario(
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nome VARCHAR(45) NOT NULL,
    cpf VARCHAR(15) NOT NULL,
    email VARCHAR(45) NOT NULL,
    senha VARCHAR(45) NOT NULL;
) 

ALTER TABLE usuario ADD salario INT;

DROP TABLE usuario;

/* COMANDOS DML - LINGUAGEM DE MANIPULÇÃO DE DADOS */
INSERT INTO usuario(nome, cpf, email, senha) VALUES
('Igor', '123.456.789-45', 'igor@gmail.com','123123123'),
('Valentina', '321.321.321-32', 'valentina@gmail.com','123123123'),
('Admin', '111.111.111-11', 'admin@gmail.com','123');

UPDATE usuario SET salario = 3000;

UPDATE usuario SET salario = 5000 WHERE id=1 ;

DELETE FROM usuario WHERE id = 2;

SELECT * FROM usuario;
SELECT nome,salario FROM usuario WHERE salario > 4000

