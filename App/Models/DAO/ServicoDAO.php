<?php

namespace App\Models\DAO;

use App\Models\Entidades\Servico;

class ServicoDAO extends BaseDAO
{
    private $codigosOse;

    //codigo da ose é Ex: QD:023
    private $codLetra; //QD
    private $codNumero;//023

    private $vr;//verificador para depurar

    //salva os dados do formulário da View/usuario/cadastro
    public  function salvar(Servico $servico) {
        try {

            $servico->setOsCodigo($this->geraCodOse($servico->getOsLocalizacao()));//para gerar o cod da Ordem de serviçõ padrão Ex:QD:023
            
            echo "<br/> getOsCodigo: " . $servico->getOsCodigo() . "         -------  PRIMARY KEY: deve ser única e não repetida"; //PRIMARY KEY: deve ser única e não repetida
            echo "<br/> getOsObs: " . $servico->getOsObs();
            echo "<br/> getOsResponsavel: " . $servico->getOsResponsavel();
            echo "<br/> getOsTipo: " . $servico->getOsTipo();
            echo "<br/> getOsTitulo: " . $servico->getOsTitulo();
            echo "<br/> getOsLocalizacao: " . $servico->getOsLocalizacao() . "         ------- CHAVE ESTRANGEIRA: deve pré-existir na tabela SMICL"; //CHAVE ESTRANGEIRA: deve pré-existir na tabela SMICL
            echo "<br/>";
            echo "<br/>";
            echo "<br/>";
            
            return $this->insert(
                'SMIOS',
                ":OS_CODIGO, :OS_OBS, :OS_NOME_RESP, :OS_TIPO, :OS_TITULO, :LOC_CODIGO, :OS_DATA_R",
                [
                    ':OS_CODIGO'=>$servico->getOsCodigo(), //PRIMARY KEY: deve ser única e não repetida
                    ':OS_OBS'=>$servico->getOsObs(),
                    ':OS_NOME_RESP'=>$servico->getOsResponsavel(),
                    ':OS_TIPO'=>$servico->getOsTipo(),
                    ':OS_TITULO'=>$servico->getOsTitulo(),
                    ':LOC_CODIGO'=>$servico->getOsLocalizacao(), //CHAVE ESTRANGEIRA: deve pré-existir na tabela SMICL
                    ':OS_DATA_R'=>'NOW()'
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
        try {
            $query = $this->select(
                "SELECT OS_CODIGO FROM SMIOS WHERE OS_CODIGO like '$loc%' order by os_codigo DESC LIMIT 1"
            );

            //se retornar uma linha no select ele pega esse resultado e aumenta mais 9 para gerar o código da OSE Ex:qd:045
           if($query->execute()){
                $this->codigosOse = $query->fetch();
                 $this->vr = explode(":",$this->codigosOse['0']);
                $this->codNumero = intval($this->vr['1']+9);
                $this->codLetra = $this->vr[0];
            } else {//caso nao retorne resultado é pq nao existe ordem de servico para akele localizador entaõ ele cria um com numero 01, ex. OQ:01
                $this->vr = str_split($loc,2);
                $this->codLetra = $this->vr[0];
                $this->codNumero = 01;
            }

             return  $this->codLetra.':0'.$this->codNumero;//Retornando no padrão Ex QD:023

        }catch (Exception $e){
            throw new \Exception("Erro no acesso aos dados.", 500);
        }
    }

    //AINDA NÃO TERMINADO
    //busca as informações do Serviço pelo codigo informado na View buscaServico.php
    public function buscaOrdemServico($cod){

        $servico = new Servico();

        try {
            $query = $this->select(
                "SELECT OS_CODIGO, OS_TITULO, LOC_CODIGO, OS_NOME_RESP, OS_OBS FROM SMIOS WHERE OS_CODIGO = '$cod'"
            );

            $retorno = ($query->fetchObject());

            print_r($retorno);
            $servico->setOsCodigo($retorno->OS_CODIGO);
            $servico->setOsTitulo($retorno->OS_TITULO);
            $servico->setOsLocalizacao($retorno->LOC_CODIGO);
            $servico->setOsResponsavel($retorno->OS_NOME_RESP);
            $servico->setOsObs($retorno->OS_OBS);
            
            //ARRUMAR - O RETORNO DO SELECT PRECISA POPULAR O OBJ SERVICO ABAIXO
           // $servico->setOsCodigo('qd:002 PRECISA ARRUMAR O MÉTODO buscaOrdemServico DENTRO DO ServicoDAO');//precisa receber os parametros do select;
            // $servico->setOsTitulo('qualquer PRECISA ARRUMAR O MÉTODO buscaOrdemServico DENTRO DO ServicoDAO');
            // $servico->setOsLocalizacao('qd');
            // $servico->setOsResponsavel('kleber');
            // $servico->setOsObs('observacao qualquer');

            return  $servico;//Retornando o objeto servico

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
ADIC_DATA DATE,
LOC_CODIGO CHAR(12),
FN_CODIGO VARCHAR(10),
EEM_CODIGO CHAR(12),
ADIC_OPER VARCHAR(10)
);*/