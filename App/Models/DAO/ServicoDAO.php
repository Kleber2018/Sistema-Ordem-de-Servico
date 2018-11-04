<?php

namespace App\Models\DAO;

use App\Models\Entidades\Servico;

class ServicoDAO extends BaseDAO
{
    private $codigosOse;
    //codigo da ose é Ex: QD:000023
    private $codLetra;
    private $codNumero;

    private $vr;//verificador para depurar
    //salva os dados do formulário da View/usuario/cadastro
    public  function salvar(Servico $servico) {
        try {

            $servico->setOsCodigo($this->geraCodOse($servico->getOsLocalizacao()));
            
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


           // $this->codigosOse = $query->fetch();
            var_dump('antes do if'.$this->codigosOse);
           if($query->execute()){
               echo '</br>';
               // var_dump('dentro do if');
                $this->codigosOse = $query->fetch();
               echo '</br>';
                var_dump($this->codigosOse);//NAO CONSIGO ATRIBUIR O RETORNO OS_CODIGO DO SELECT PARA EXPLODIR NA SEQUENCIA
               echo '</br>';

                $this->vr = explode(":",$this->codigosOse['0']);
                $this->codNumero = intval($this->vr['1']+9);
                $this->codLetra = $this->vr[0];
                echo '</br>';
                var_dump($this->codLetra);
               echo '</br>';
                var_dump($this->codNumero);
            } else {
                $this->vr = str_split($loc,2);

                $this->codLetra = $this->vr[0];
                $this->codNumero = 01;
            }

            echo $this->codLetra.':0'.$this->codNumero;

              return  $this->codLetra.':0'.$this->codNumero;

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