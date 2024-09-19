CREATE DATABASE lojaCamisa;
USE lojaCamisa;

CREATE TABLE tamanho (
    idTamanho INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    sigla CHAR(7) NOT NULL
);


CREATE TABLE produto (
    idProduto INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    modelo VARCHAR(30) NOT NULL,
    cor VARCHAR(10), 
    nome VARCHAR(30), 
    tecido VARCHAR(15), 
    marca VARCHAR(15), 
    CONSTRAINT repeticao UNIQUE (marca, tecido, modelo, cor, nome)
);

CREATE TABLE tamanhoProduto (
    idTamanho INT NOT NULL,
    idProduto INT NOT NULL,
    CONSTRAINT pktamanhoProduto PRIMARY KEY (idTamanho, idProduto),
    CONSTRAINT fkidProduto FOREIGN KEY (idProduto) REFERENCES produto(idProduto),
    CONSTRAINT fkidTamanho FOREIGN KEY (idTamanho) REFERENCES tamanho(idTamanho)
);

CREATE TABLE estoque (
    idEstoque INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    lote CHAR(10),  
    dat CHAR(10), 
    idProduto INT NOT NULL,
    quantidade INT NOT NULL,
    precoVenda DECIMAL(9,2) NOT NULL,
    precoCusto DECIMAL(9,2) NOT NULL,
    CONSTRAINT fkProdutoEstoque FOREIGN KEY (idProduto) REFERENCES produto(idProduto)
);

CREATE TABLE cliente (
    idCliente INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    nome VARCHAR(40) NOT NULL,
    cpf CHAR(11) NOT NULL UNIQUE,
    telefone CHAR(11) NOT NULL,
    email VARCHAR(50)
);

CREATE TABLE venda (
    notaFiscal CHAR(15) NOT NULL PRIMARY KEY,
    dat CHAR(10) NOT NULL,
    idCliente INT NOT NULL,
    CONSTRAINT fkVendaCliente FOREIGN KEY (idCliente) REFERENCES cliente (idCliente)
);

CREATE TABLE vendaItem (
    idVendaItem INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    precoUnitario DECIMAL(9,2) NOT NULL,
    quantidade INT NOT NULL,
    idProduto INT NOT NULL, 
    notaFiscal CHAR(15) NOT NULL,
    idEstoque INT NOT NULL,
    CONSTRAINT fkVendaItemEstoque FOREIGN KEY (idEstoque) REFERENCES estoque(idEstoque),
    CONSTRAINT fkVendaItemVenda FOREIGN KEY (notaFiscal) REFERENCES venda(notaFiscal)
);


CREATE TABLE endereco (
    idEndereco INT AUTO_INCREMENT PRIMARY KEY,
    uf VARCHAR(2) NOT NULL,
    cidade VARCHAR(255) NOT NULL,
    bairro VARCHAR(255) NOT NULL,
    rua VARCHAR(255) NOT NULL,
    cep VARCHAR(9) NOT NULL,
    tipo VARCHAR(50) NOT NULL,
    observacao TEXT,
    numeroReside VARCHAR(10),
    complemento VARCHAR(255)
);


CREATE TABLE clienteEndereco (
    idCliente INT NOT NULL,
    idEndereco INT NOT NULL,
    CONSTRAINT pkclienteEndereco PRIMARY KEY (idCliente, idEndereco),
    CONSTRAINT fkidc FOREIGN KEY (idCliente) REFERENCES cliente(idCliente),
    CONSTRAINT fkide FOREIGN KEY (idEndereco) REFERENCES endereco(idEndereco)
);

select * from cliente;
select * from endereco;
select * from produto;



-- ESTRUTURA CRUD
-- C - CRIAR/INSERIR DADOS NA TABELA
insert into tamanho (sigla)
values ('P'),
	   ('PP'),
       ('M'),
       ('G');
insert into tamanho (sigla)
values (40);

-- R - READ/SELECT - CONSULTA DADOS - GERAR RELATÓRIO
select sigla from tamanho;
select * from tamanho;

-- CONSULTAR UM UNICO REGISTRO - A CLAUSULA DE CONDIÇÃO WHERE
select idTamanho, sigla from tamanho where sigla = ('PP');

-- consultar em ordem alfabetica
select idTamanho,sigla from tamanho order by sigla desc;

-- colsultar somente as linhas m e g em ordem alfabetica sigla
select idTamanho,sigla from tamanho 
where sigla in ("G", "M") order by sigla; 

select idTamanho,sigla from tamanho 
where sigla = "M" or sigla = "G" order by sigla; 

-- consultar idTamanho 2 ao 4
select idTamanho from tamanho 
where idTamanho between 2 and 4;

-- U - update - ATUALIZAÇÃO
update tamanho set sigla = 40 where idTamanho = 1;

-- D - delete - apagar ou seja excluir um registro
delete from tamanho where idTamanho = 5;