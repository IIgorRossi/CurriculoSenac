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

CREATE TABLE mercado(
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nome VARCHAR(120) NOT NULL,
    cnpj VARCHAR(20) NOT NULL,
    email VARCHAR(120) NOT NULL,
    senha VARCHAR(120) NOT NULL,
    endereco VARCHAR(200) NOT NULL,
    telefone VARCHAR(20) NOT NULL,
    foto VARCHAR(255) NOT NULL,
    mapa VARCHAR(20)
);

INSERT INTO mercado(nome, cnpj, email, senha, endereco, telefone, foto, mapa) VALUES ("Gugão Atacado e Varejo","02.163.753/0006-58","gugao@gmail.com","123","Avenida Antônio Ormeneze, 70","(44) 9996-2547","1","1");

CREATE TABLE produto(
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nome VARCHAR(120) NOT NULL,
    preco DECIMAL(10,2),
    imagem VARCHAR(255) NOT NULL,
    disponibilidade VARCHAR(30) NOT NULL,
    mercado_id INT NOT NULL
    FOREIGN KEY mercado.id REFERENCES produto.mercado_id;
);

INSERT INTO produto(nome, preco, imagem, disponibilidade, mercado_id) VALUES ("Detergente YPE", 2,"imagem", "ativo",1)

ALTER TABLE mercado
  MODIFY foto VARCHAR(255) NULL,
  MODIFY mapa TEXT NULL,
  MODIFY senha VARCHAR(120) NOT NULL,
  MODIFY email VARCHAR(120) NOT NULL,
  MODIFY telefone VARCHAR(20) NOT NULL,
  MODIFY cnpj VARCHAR(20) NOT NULL;

ALTER TABLE produto
  MODIFY imagem VARCHAR(255) NULL,
  MODIFY preco DECIMAL(10,2) NULL;

CREATE TABLE IF NOT EXISTS receita (
  id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
  nome VARCHAR(120) NOT NULL,
  foto VARCHAR(255) NULL,
  descricao TEXT NOT NULL,
  criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS produto_receita (
  id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
  produto_id INT NOT NULL,
  receita_id INT NOT NULL,
  UNIQUE KEY uq_produto_receita (produto_id, receita_id),
  CONSTRAINT fk_produto_receita_produto FOREIGN KEY (produto_id) REFERENCES produto(id) ON DELETE CASCADE,
  CONSTRAINT fk_produto_receita_receita FOREIGN KEY (receita_id) REFERENCES receita(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS site_visita (
  id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
  pagina VARCHAR(80) NOT NULL UNIQUE,
  visualizacoes INT NOT NULL DEFAULT 0,
  atualizado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO site_visita(pagina, visualizacoes)
VALUES ('index', 0)
ON DUPLICATE KEY UPDATE pagina = pagina;