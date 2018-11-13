<?php

namespace App\Models\Entidades;

class Dados
{
    //variaveis serviço
    private $id;

    //variaveis para o gráfico na tela dashboard/Administração
    private $os_pns;//preventiva não sistematizada
    private $os_ceg;//corretiva emergêncial
    private $os_cne;//Corretiva não emergêncial
    private $os_mem;//Melhoria Eletromecânica
    private $os_sig;//serviço internos gerais(administrativos)
    private $os_valor;//para usar no DAO
    private $os_tipo; //pns, ceg, cne, mem, sig


       /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getfnpns()
    {
        return $this->os_fnpns;
    }

    public function setfnpns($fnpns)
    {
        $this->os_fnpns = $fnpns;
    }

    public function getDataPrevista()
    {
        //Conversão do formato de data - MySQL para HTML input datetime-local
        $input_date=$this->os_dataPrevista;
        $data=date("Y-m-d",strtotime($input_date));
        $hora=date("H:i",strtotime($input_date));
        $datahora = $data . "T" . $hora;

        return $datahora;

    }

    /**
     * @return mixed
     */
    public function getOsvalor()
    {
        return $this->os_valor;
    }

    /**
     * @param mixed $os_valor
     */
    public function setOsvalor($os_valor)
    {
        $this->os_valor = $os_valor;
    }

    /**
     * @return mixed
     */
    public function getOscne()
    {
        return $this->os_cne;
    }

    /**
     * @param mixed $os_cne
     */
    public function setOscne($os_cne)
    {
        $this->os_cne = $os_cne;
    }


    /**
     * @return mixed
     */
    public function getOspns()
    {
        return $this->os_pns;
    }

    /**
     * @param mixed $os_pns
     */
    public function setOspns($os_pns)
    {
        $this->os_pns = $os_pns;
    }

    /**
     * @return mixed
     */
    public function getOsceg()
    {
        return $this->os_ceg;
    }

    /**
     * @param mixed $os_ceg
     */
    public function setOsceg($os_ceg)
    {
        $this->os_ceg = $os_ceg;
    }

    /**
     * @return mixed
     */
    public function getOsmem()
    {
        return $this->os_mem;
    }

    /**
     * @param mixed $os_mem
     */
    public function setOsmem($os_mem)
    {
        $this->os_mem = $os_mem;
    }

    /**
     * @return mixed
     */
    public function getOssig()
    {
        return $this->os_sig;
    }

    /**
     * @param mixed $os_sig
     */
    public function setOssig($os_sig)
    {
        $this->os_sig = $os_sig;
    }

    /**
     * @return mixed
     */
    public function getOstipo()
    {
        return $this->os_tipo;
    }

    /**
     * @param mixed $os_tipo
     */
    public function setOstipo($os_tipo)
    {
        $this->os_tipo = $os_tipo;
    }


}

/*
        CREATE TABLE SMIOS (
        OS_pns VARCHAR(8) PRIMARY KEY,
        OS_ceg VARCHAR(60),
        OS_DATA_P DATETIME,
        OS_NOME_RESP VARCHAR(20),
        OS_valor VARCHAR(3),
        OS_sig VARCHAR(120),
        OS_DATA_R DATETIME,
        OS_UO_tipo VARCHAR(7),
        OS_STATUS VARCHAR(15),
        ADIC_DATA VARCHAR(10),
        LOC_pns CHAR(12),
        FN_pns VARCHAR(10),
        EEM_pns CHAR(12),
        ADIC_OPER VARCHAR(10)
        );
 */