<?php

namespace App\Models\DAO;

use App\Models\Entidades\Servico;

class ServicoDAO extends BaseDAO
{

    //salva os dados do formulário da View/usuario/cadastro
    public  function salvar(Servico $servico) {
        try {
            $servico->setOsTipo('2');
            $servico->setOsCodigo('QD00002');//CRIAR UMA FUNÇÃO PARA GERAR ESSE CÓDIGO
           // $nome      = $usuario->getNome();
            //$email     = $usuario->getEmail();
            return $this->insert(
                'SMIOS',
                ":OS_CODIGO, :OS_OBS, :OS_NOME_RESP, :OS_TIPO, :OS_TITULO",
                [
                    ':OS_CODIGO'=>$servico->getOsCodigo(),
                    ':OS_OBS'=>$servico->getOsObs(),
                    ':OS_NOME_RESP'=>$servico->getOsResponsavel(),
                    ':OS_TIPO'=>$servico->getOsTipo(),
                    ':OS_TITULO'=>$servico->getOsTitulo()

                ]
            );

        }catch (\Exception $e){
            throw new \Exception("Erro na gravação de dados dentro do Dao Servico.", 500);
        }
    }
    /*
     * Para criar um código para a OSE
     */
    public function geraCodOse($cod)
    {
        try {

            $query = $this->select(
                "SELECT * FROM SMICL WHERE LOC_CODIGO = '$cod' "
            );

            return $query->fetch();

        }catch (Exception $e){
            throw new \Exception("Erro no acesso aos dados.", 500);
        }
    }
}

/*CREATE TABLE SMIOS (
OS_CODIGO VARCHAR(8) PRIMARY KEY,
OS_OBS VARCHAR(60),
OS_DATA_P DATETIME,
OS_NOME_RESP VARCHAR(20),
OS_TIPO VARCHAR(3),
OS_TITULO VARCHAR(120),
OS_DATA_R DATETIME,
OS_UO_EQUIPE VARCHAR(7),
OS_STATUS VARCHAR(15),
ADIC_DATA VARCHAR(10),
LOC_CODIGO CHAR(12),
FN_CODIGO VARCHAR(10),
EEM_CODIGO CHAR(12),
ADIC_OPER VARCHAR(10)
);*/