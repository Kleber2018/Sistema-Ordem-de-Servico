<?php

namespace App\Models\DAO;

use App\Models\Entidades\Servico;
use App\Models\Entidades\Dados;

class ServicoDAO extends BaseDAO
{
    private $codigosOse;

    //para ser usado na funcão geraCodOse, Ex: QD:023
    private $codLetra; //QD
    private $codNumero;//023

    //private $vr;//verificador para depurar

    public  function deletando($cod){

        try {
            return $this->delete('SMIOS',"OS_CODIGO = '$cod'");

       }catch (Exception $e){

           throw new \Exception("Erro ao deletar $e", 500);
       }

    }


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
                "SELECT OS_CODIGO, OS_TITULO, LOC_CODIGO, OS_NOME_RESP, OS_TIPO, OS_OBS, OS_STATUS, OS_DATA_P, FN_CODIGO FROM SMIOS WHERE OS_CODIGO = '$cod'"
            );

            $retorno = ($query->fetchObject());

            $servico->setOsCodigo($retorno->OS_CODIGO);
            $servico->setOsTitulo($retorno->OS_TITULO);
            $servico->setOsLocalizacao($retorno->LOC_CODIGO);
            $servico->setOsResponsavel($retorno->OS_NOME_RESP);
            $servico->setOsTipo($retorno->OS_TIPO);
            $servico->setOsObs($retorno->OS_OBS);
            $servico->setOsStatus($retorno->OS_STATUS);
            $servico->setDataPrevista($retorno->OS_DATA_P);
            $servico->setfnCodigo($retorno->FN_CODIGO);
            
            // echo "<pre>";
            // var_dump ($servico);
            // echo "</pre>";

            return  $servico;//Retornando o objeto servico

        }catch (Exception $e){
            throw new \Exception("Erro no acesso aos dados.", 500);
        }
    }

    public  function salvarApropriacao(Servico $servico)
    {
       
        try {
           
            //Função Insert da baseDAO
            return $this->insert(
                'SMIOSA',
                ":OS_CODIGO, :FN_CODIGO, :OS_DATA, :OS_AP_FIM, :OS_AP_INI, :TA_CODIGO",
                [
                    ':OS_CODIGO'=>$servico->getOsCodigo(), //PRIMARY KEY: deve ser única e não repetida
                    ':FN_CODIGO'=>$servico->getOsResponsavel(),
                    ':OS_DATA'=>$servico->getOsaData(),
                    ':OS_AP_FIM'=>$servico->getOsaHoraInicial(),
                    ':OS_AP_INI'=>$servico->getOsaHoraFinal(),
                    ':TA_CODIGO'=>$servico->getOsaTipoApropriacao()
                ]
            );//INSERT INTO SMIOSA(OS_CODIGO, OS_DATA, OS_AP_FIM, TA_CODIGO, FN_CODIGO) VALUES ('AX:9', '2018-11-10', '14:01:16', 'HN', 'KLEBER');


        }catch (\Exception $e){
            throw new \Exception("Erro na gravação de dados dentro do ServicoDAO da Apropriação.", 500);
        }
    }



    //para listar as apropriações já cadastradas na view servicoTela
    public function listarApropriacao($cod)
    {
        $apropriacoes = array();

        $query = $this->select(
            "SELECT ID, OS_CODIGO, OS_DATA, OS_AP_FIM, OS_AP_INI, TA_CODIGO, FN_CODIGO FROM SMIOSA WHERE OS_CODIGO = '$cod'"
        );

        while ($retorno = $query -> fetchObject()) {
            $servico = new Servico();

            $servico->setId($retorno->ID);
            $servico->setOsCodigo($retorno->OS_CODIGO);
            $servico->setOsaData($retorno->OS_DATA);
            $servico->setOsaHoraFinal($retorno->OS_AP_FIM);
            $servico->setOsaHoraInicial($retorno->OS_AP_INI);
            if($retorno->TA_CODIGO = 'HN'){
                $servico->setOsaTipoApropriacao('HN - Hora Normal');
            } elseif ($retorno->TA_CODIGO = 'HE'){
                $servico->setOsaTipoApropriacao('HE - Hora Extra');
            }
            $servico->setOsaFuncionario($retorno->FN_CODIGO);
            $apropriacoes[] = $servico;
        }
        return $apropriacoes;
    }

    //Lista as Ordens de serviços para serem utilizadas na tela home
    public function listaServicosPendentes()
    {
        $servicos = array();

        try {
            $query = $this->select(
                "SELECT OS_CODIGO, OS_TITULO, LOC_CODIGO, OS_NOME_RESP, OS_TIPO, OS_OBS, OS_STATUS, OS_DATA_P FROM SMIOS WHERE OS_STATUS  = 'PENDENTE'"
            );

            while ($retorno = $query -> fetchObject()) {
                $servico = new Servico();

                $servico->setOsCodigo($retorno->OS_CODIGO);
                $servico->setOsTitulo($retorno->OS_TITULO);
                $servico->setOsLocalizacao($retorno->LOC_CODIGO);
                $servico->setOsResponsavel($retorno->OS_NOME_RESP);
                $servico->setOsTipo($retorno->OS_TIPO);
                $servico->setOsObs($retorno->OS_OBS);
                $servico->setOsStatus($retorno->OS_STATUS);
                $servico->setOsaData($retorno->OS_DATA_P);

                $servicos[] = $servico;
            }
            return $servicos;
        }catch (\Exception $e){
            throw new \Exception("Erro na gravação de dados dentro do ServicoDAO lista serviços pendentes.", 500);
        }
    }




    public function listaServicosExecutados()
    {
        $servicos = array();

        try {
            $query = $this->select(
                "SELECT OS_CODIGO, OS_TITULO, LOC_CODIGO, OS_NOME_RESP, OS_TIPO, OS_OBS, OS_STATUS, OS_DATA_P FROM SMIOS WHERE OS_STATUS  LIKE '%EXECUTADO%'"
            );

            while ($retorno = $query -> fetchObject()) {
                $servico = new Servico();

                $servico->setOsCodigo($retorno->OS_CODIGO);
                $servico->setOsTitulo($retorno->OS_TITULO);
                $servico->setOsLocalizacao($retorno->LOC_CODIGO);
                $servico->setOsResponsavel($retorno->OS_NOME_RESP);
                $servico->setOsTipo($retorno->OS_TIPO);
                $servico->setOsObs($retorno->OS_OBS);
                $servico->setOsStatus($retorno->OS_STATUS);
                $servico->setOsaData($retorno->OS_DATA_P);

                $servicos[] = $servico;
            }
            return $servicos;
        }catch (\Exception $e){
            throw new \Exception("Erro na gravação de dados dentro do ServicoDAO lista serviços pendentes.", 500);
        }
    }




    public function retornaDadosGrafProdut($s)
    {
        $dado = new Dados();

        try {
            $query = $this->select(
                "SELECT COUNT(OS_CODIGO), OS_TIPO FROM SMIOS WHERE OS_STATUS  LIKE '%$s%' GROUP BY OS_TIPO"
            );
            $vr = 'COUNT(OS_CODIGO)';
            $dado->setOspns(0);
            $dado->setOsceg(0);
            $dado->setOscne(0);
            $dado->setOsmem(0);
            $dado->setOssig(0);
            while ($retorno = $query -> fetchObject()) {
                                
                $dado->setOsTipo($retorno->OS_TIPO);

               

                switch($retorno->OS_TIPO){
                    case 'PNS':
                        $dado->setOspns($retorno->$vr);
                        break;
                    case 'CEG':
                        $dado->setOsceg($retorno->$vr);
                        break;
                    case 'CNE':
                        $dado->setOscne($retorno->$vr);
                        break;
                    case 'MEM':
                        $dado->setOsmem($retorno->$vr);
                        break;
                    case 'SIG':
                        $dado->setOssig($retorno->$vr);
                        break;
                    default:
                    $dado->setOsvalor($retorno->$vr);
                }

            }

            $d = array(
                'pns' => $dado->getOspns(),
                'ceg' => $dado->getOsceg(),
                'cne' => $dado->getOscne(),
                'sig' => $dado->getOssig(),
                'mem' => $dado->getOsmem()
            );


            return $d;
        }catch (\Exception $e){
            throw new \Exception("Erro na gravação de dados dentro do ServicoDAO lista serviços pendentes.", 500);
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