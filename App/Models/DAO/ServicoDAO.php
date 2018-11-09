<?php

namespace App\Models\DAO;

use App\Models\Entidades\Servico;

class ServicoDAO extends BaseDAO
{
    private $codigosOse;

    //para ser usado na funcão geraCodOse, Ex: QD:023
    private $codLetra; //QD
    private $codNumero;//023

    //private $vr;//verificador para depurar


    //salva os dados do formulário da View/usuario/cadastro
    public  function salvar(Servico $servico)
    {
        try {
            $servico->setOsCodigo($this->geraCodOse($servico->getOsLocalizacao()));//para gerar o cod da Ordem de serviçõ padrão Ex:QD:023
            
            //Função Insert da BaseDAO
            return $this->insert(
                'SMIOS',
                ":OS_CODIGO, :OS_OBS, :OS_NOME_RESP, :OS_TIPO, :OS_TITULO, :LOC_CODIGO, :OS_STATUS, :OS_DATA_P, :FN_CODIGO",
                [
                    ':OS_CODIGO'=>$servico->getOsCodigo(), //PRIMARY KEY: deve ser única e não repetida
                    ':OS_OBS'=>$servico->getOsObs(),
                    ':OS_NOME_RESP'=>$servico->getOsResponsavel(),
                    ':OS_TIPO'=>$servico->getOsTipo(),
                    ':OS_TITULO'=>$servico->getOsTitulo(),
                    ':LOC_CODIGO'=>$servico->getOsLocalizacao(), //CHAVE ESTRANGEIRA: deve pré-existir na tabela SMICL
                    ':OS_STATUS'=>'PENDENTE',
                    ':OS_DATA_P'=>$servico->getDataPrevista(),
                    ':FN_CODIGO'=>$_SESSION['usuario']
                ]
            );

        }catch (\Exception $e){
            throw new \Exception("Erro na gravação de dados dentro do ServicoDAO.", 500);
        }
    }


    /*
     * Para criar um código para a OSE no padrão Ex: QD:026
     */
    public function geraCodOse($loc)
    {
        $this->vr = str_split($loc,2);
        
        $this->vr2 = $this->vr[0];
       
        try {
            $query = $this->select(
                "SELECT OS_CODIGO FROM SMIOS WHERE OS_CODIGO like '$this->vr2%' order by OS_CODIGO DESC LIMIT 1"
            );

            //se retornar uma linha no select ele pega esse resultado e aumenta mais 9 para gerar o código da OSE Ex:qd:045
           
            if($query->execute()){
                $this->codigosOse = $query->fetch();
                 $this->vr = explode(":",$this->codigosOse['OS_CODIGO']);
                // echo  '</br> dentro do if';
                 //var_dump($this->vr['1']);
                $this->codNumero = intval($this->vr['1']+9);
                //echo 'dentro do if';
                //$this->codLetra = $this->vr[0];
            } else {//caso nao retorne resultado é pq nao existe ordem de servico para aquele localizador então ele cria um com numero 01, ex. OQ:01
               // $this->vr = str_split($loc,2);
               // $this->codLetra = $this->vr[0];
                $this->codNumero = 01;
            }
             return  ($this->vr2.':'.$this->codNumero);//Retornando no padrão Ex QD:023

        }catch (Exception $e){
            throw new \Exception("Erro no acesso aos dados.", 500);
        }
    }


    //busca as informações do Serviço pelo codigo informado na View buscaServico.php para a View ServicoTela
    public function buscaOrdemServico($cod)
    {
        $servico = new Servico();

        try {
            $query = $this->select(
                "SELECT OS_CODIGO, OS_TITULO, LOC_CODIGO, OS_NOME_RESP, OS_OBS, OS_STATUS FROM SMIOS WHERE OS_CODIGO = '$cod'"
            );

            $retorno = ($query->fetchObject());

            $servico->setOsCodigo($retorno->OS_CODIGO);
            $servico->setOsTitulo($retorno->OS_TITULO);
            $servico->setOsLocalizacao($retorno->LOC_CODIGO);
            $servico->setOsResponsavel($retorno->OS_NOME_RESP);
            $servico->setOsObs($retorno->OS_OBS);
            $servico->setOsStatus($retorno->OS_STATUS);

            return  $servico;//Retornando o objeto servico

        }catch (Exception $e){
            throw new \Exception("Erro no acesso aos dados.", 500);
        }
    }

    public  function salvarApropriacao(Servico $servico)
    {
       var_dump($servico->getOsCodigo());
        try {
           
            //Função Insert da baseDAO
            return $this->insert(
                'SMIOSA',
                ":OS_CODIGO, :OS_DATA, :OS_AP_INI, :OS_AP_FIM, :TA_CODIGO, :FN_CODIGO",
                [
                    ':OS_CODIGO'=>$servico->getOsCodigo(), //PRIMARY KEY: deve ser única e não repetida
                    ':OS_DATA'=>'NOW()',
                    ':OS_AP_INI'=>12,
                    ':OS_AP_FIM'=>17,
                    ':TA_CODIGO'=>'HN',
                    ':FN_CODIGO'=>$servico->getOsResponsavel()
                    
                ]
            );

        }catch (\Exception $e){
            throw new \Exception("Erro na gravação de dados dentro do ServicoDAO.", 500);
        }
    }

    
}

/*
CREATE TABLE SMIOSA (
OS_CODIGO VARCHAR(8) PRIMARY KEY,
OS_DATA DATETIME,
OS_AP_FIM NUMERIC(5),
OS_AP_INI NUMERIC(5),
TA_CODIGO VARCHAR(10),
FN_CODIGO VARCHAR(10)
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