DROP DATABASE ProjetoWebServidor;
CREATE DATABASE ProjetoWebServidor;
USE ProjetoWebServidor;

CREATE TABLE SMIOSA (
ID int NOT NULL AUTO_INCREMENT,
OS_CODIGO VARCHAR(8),
OS_DATA DATE,
OS_AP_FIM TIME,
OS_AP_INI TIME,
TA_CODIGO VARCHAR(10),
FN_CODIGO VARCHAR(10),
PRIMARY KEY (ID)
);

CREATE TABLE SMIOS (
OS_CODIGO VARCHAR(8) PRIMARY KEY,
OS_OBS VARCHAR(105),
OS_DATA_P DATETIME,
OS_NOME_RESP VARCHAR(32),
OS_TIPO VARCHAR(3),
OS_TITULO VARCHAR(105),
OS_UO_EQUIPE VARCHAR(10),
OS_STATUS VARCHAR(15),
LOC_CODIGO CHAR(12),
FN_CODIGO VARCHAR(32),
EEM_CODIGO CHAR(12)
);

CREATE TABLE SMICL (
LOC_CODIGO CHAR(12) PRIMARY KEY,
LOC_TITULO CHAR(32),
LOC_EQUIPE VARCHAR(12),
FN_CODIGO VARCHAR(10)
);

CREATE TABLE SMIFN (
FN_CODIGO VARCHAR(10) PRIMARY KEY,
FN_NOME VARCHAR(25),
SENHA VARCHAR(10),
ADMIN BOOLEAN
);

ALTER TABLE SMIOSA ADD FOREIGN KEY(OS_CODIGO) REFERENCES SMIOS (OS_CODIGO) ON UPDATE CASCADE;
ALTER TABLE SMIOSA ADD FOREIGN KEY(OS_CODIGO) REFERENCES SMIOS (OS_CODIGO);
ALTER TABLE SMIOS ADD FOREIGN KEY(LOC_CODIGO) REFERENCES SMICL (LOC_CODIGO);
ALTER TABLE SMIOS ADD FOREIGN KEY(FN_CODIGO) REFERENCES SMIFN (FN_CODIGO);
ALTER TABLE SMICL ADD FOREIGN KEY(FN_CODIGO) REFERENCES SMIFN (FN_CODIGO);


INSERT INTO SMIFN(FN_CODIGO, FN_NOME, SENHA, ADMIN) VALUES ('KLEBER', 'Kleber dos Santos', '123', 1);
INSERT INTO SMIFN(FN_CODIGO, FN_NOME, SENHA, ADMIN) VALUES ('FELIPE', 'Felipe Barcelos', '123', 1);
INSERT INTO SMIFN(FN_CODIGO, FN_NOME, SENHA, ADMIN) VALUES ('THIAGO', 'Thiago Henrique', '123', 1);
INSERT INTO SMIFN(FN_CODIGO, FN_NOME, SENHA, ADMIN) VALUES ('TESTE', 'TESTE', '123', 0);
INSERT INTO SMIFN(FN_CODIGO, FN_NOME, SENHA, ADMIN) VALUES ('nick', 'nick', '123', 0);

INSERT INTO SMICL(LOC_CODIGO, LOC_TITULO, LOC_EQUIPE, FN_CODIGO) VALUES ('AB', 'Estante-A', 'EQUIPE-01', 'KLEBER');
INSERT INTO SMICL(LOC_CODIGO, LOC_TITULO, LOC_EQUIPE, FN_CODIGO) VALUES ('AC', 'Prateleira do cima', 'EQUIPE-01', 'KLEBER');
INSERT INTO SMICL(LOC_CODIGO, LOC_TITULO, LOC_EQUIPE, FN_CODIGO) VALUES ('AX', 'Prateleira de baixo', 'EQUIPE-01', 'KLEBER');
INSERT INTO SMICL(LOC_CODIGO, LOC_TITULO, LOC_EQUIPE, FN_CODIGO) VALUES ('AF', 'Estante-B', 'EQUIPE-01', 'KLEBER');


INSERT INTO SMIOS(OS_CODIGO, OS_OBS, OS_DATA_P, OS_NOME_RESP, OS_TIPO, OS_TITULO, OS_STATUS, LOC_CODIGO, FN_CODIGO) VALUES ('AX:18', 'QUALQUER OBS', NOW(), 'KLEBER', 'CEG', 'Substituir Equipamento', 'PENDENTE', 'AX', 'KLEBER');
INSERT INTO SMIOS(OS_CODIGO, OS_OBS, OS_DATA_P, OS_NOME_RESP, OS_TIPO, OS_TITULO, OS_STATUS, LOC_CODIGO, FN_CODIGO) VALUES ('AX:27', 'QUALQUER OBS', NOW(), 'KLEBER', 'PNS', 'Preventiva em painel', 'PENDENTE', 'AX', 'KLEBER');
INSERT INTO SMIOS(OS_CODIGO, OS_OBS, OS_DATA_P, OS_NOME_RESP, OS_TIPO, OS_TITULO, OS_STATUS, LOC_CODIGO, FN_CODIGO) VALUES ('AX:36', 'QUALQUER OBS', NOW(), 'KLEBER', 'MEM', 'Melhoria em painel', 'PENDENTE', 'AX', 'KLEBER');
INSERT INTO SMIOS(OS_CODIGO, OS_OBS, OS_DATA_P, OS_NOME_RESP, OS_TIPO, OS_TITULO, OS_STATUS, LOC_CODIGO, FN_CODIGO) VALUES ('AX:45', 'QUALQUER OBS', NOW(), 'KLEBER', 'SIG', 'Organizando o carro', 'PENDENTE', 'AX', 'KLEBER');
INSERT INTO SMIOS(OS_CODIGO, OS_OBS, OS_DATA_P, OS_NOME_RESP, OS_TIPO, OS_TITULO, OS_STATUS, LOC_CODIGO, FN_CODIGO) VALUES ('AX:54', 'QUALQUER OBS', NOW(), 'KLEBER', 'CNE', 'Trocar rolamentos', 'PENDENTE', 'AX', 'KLEBER');
INSERT INTO SMIOS(OS_CODIGO, OS_OBS, OS_DATA_P, OS_NOME_RESP, OS_TIPO, OS_TITULO, OS_STATUS, LOC_CODIGO, FN_CODIGO) VALUES ('AX:63', 'QUALQUER OBS', NOW(), 'KLEBER', 'CNE', 'Falta de energia', 'PENDENTE', 'AX', 'KLEBER');

INSERT INTO SMIOS(OS_CODIGO, OS_OBS, OS_DATA_P, OS_NOME_RESP, OS_TIPO, OS_TITULO, OS_STATUS, LOC_CODIGO, FN_CODIGO) VALUES ('AF:18', 'QUALQUER OBS', NOW(), 'KLEBER', 'CNE', 'Falta de energia', 'EXECUTADO', 'AX', 'KLEBER');
INSERT INTO SMIOS(OS_CODIGO, OS_OBS, OS_DATA_P, OS_NOME_RESP, OS_TIPO, OS_TITULO, OS_STATUS, LOC_CODIGO, FN_CODIGO) VALUES ('AF:27', 'QUALQUER OBS', NOW(), 'KLEBER', 'CEG', 'Falta de energia', 'EXECUTADO', 'AX', 'KLEBER');
INSERT INTO SMIOS(OS_CODIGO, OS_OBS, OS_DATA_P, OS_NOME_RESP, OS_TIPO, OS_TITULO, OS_STATUS, LOC_CODIGO, FN_CODIGO) VALUES ('AF:36', 'QUALQUER OBS', NOW(), 'KLEBER', 'CNE', 'Falta de energia', 'EXECUTADO', 'AX', 'KLEBER');
INSERT INTO SMIOS(OS_CODIGO, OS_OBS, OS_DATA_P, OS_NOME_RESP, OS_TIPO, OS_TITULO, OS_STATUS, LOC_CODIGO, FN_CODIGO) VALUES ('AF:45', 'QUALQUER OBS', NOW(), 'KLEBER', 'PNS', 'Falta de energia', 'EXECUTADO', 'AX', 'KLEBER');