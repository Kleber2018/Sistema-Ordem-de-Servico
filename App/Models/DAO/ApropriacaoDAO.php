<?php

namespace App\Models\DAO;

use App\Models\Entidades\Servico;

class ApropriacaoDAO extends BaseDAO
{



   //Para excluir as apropriações
    public function excluir($id)
    {
        echo '</br>';
        var_dump($id);
        try {
             return $this->delete('SMIOSA',"ID = $id");

        }catch (Exception $e){

            throw new \Exception("Erro ao deletar $e", 500);
        }
    }



}


/*
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
OS_OBS VARCHAR(60),
OS_DATA_P DATETIME,
OS_NOME_RESP VARCHAR(20),
OS_TIPO VARCHAR(3),
OS_TITULO VARCHAR(120),
OS_DATA_R DATETIME,
OS_UO_EQUIPE VARCHAR(7),
OS_STATUS VARCHAR(15),
ADIC_DATA DATE,
LOC_CODIGO CHAR(12),
FN_CODIGO VARCHAR(10),
EEM_CODIGO CHAR(12),
ADIC_OPER VARCHAR(10)
);*/