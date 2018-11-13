<?php

namespace App\Models\Entidades;

class Servico
{
    //variaveis serviço
    private $id;
    private $os_codigo; //codigo da Ordem de Serviço gerado automaticamente
    private $os_obs;
    private $os_localizacao;
    private $os_responsavel;
    private $os_titulo;
    private $os_tipo;
    private $os_equipe; // equipe A, equipe B
    private $os_status; //emitida, nao executada, executada
    private $os_dataPrevista;
    private $os_fnCodigo;

    //usado em ambos
    private $dataCriacao;

    //variaveis apropriacao de horas do serviço
    private $osa_data;
    private $osa_hora_inicial;
    private $osa_hora_final;
    private $osa_tipo_apropriacao;//hora extra ou normal
    private $osa_funcionario;

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

    public function getfnCodigo()
    {
        return $this->os_fnCodigo;
    }

    public function setfnCodigo($fnCodigo)
    {
        $this->os_fnCodigo = $fnCodigo;
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

    public function setDataPrevista($dataPrevista)
    {

        $this->os_dataPrevista = $dataPrevista;
    }

    /**
     * @return mixed
     */
    public function getDataCriacao()
    {
        return $this->dataCriacao;
    }

    /**
     * @param mixed $dataCriacao
     */
    public function setDataCriacao($dataCriacao)
    {
        $this->dataCriacao = $dataCriacao;
    }


    /**
     * @return mixed
     */
    public function getOsTipo()
    {
        return $this->os_tipo;
    }

    /**
     * @param mixed $os_tipo
     */
    public function setOsTipo($os_tipo)
    {
        $this->os_tipo = $os_tipo;
    }

    /**
     * @return mixed
     */
    public function getOsLocalizacao()
    {
        return $this->os_localizacao;
    }

    /**
     * @param mixed $os_localizacao
     */
    public function setOsLocalizacao($os_localizacao)
    {
        $this->os_localizacao = $os_localizacao;
    }


    /**
     * @return mixed
     */
    public function getOsCodigo()
    {
        return $this->os_codigo;
    }

    /**
     * @param mixed $os_codigo
     */
    public function setOsCodigo($os_codigo)
    {
        $this->os_codigo = $os_codigo;
    }

    /**
     * @return mixed
     */
    public function getOsObs()
    {
        return $this->os_obs;
    }

    /**
     * @param mixed $os_obs
     */
    public function setOsObs($os_obs)
    {
        $this->os_obs = $os_obs;
    }

    /**
     * @return mixed
     */
    public function getOsResponsavel()
    {
        return $this->os_responsavel;
    }

    /**
     * @param mixed $os_responsavel
     */
    public function setOsResponsavel($os_responsavel)
    {
        $this->os_responsavel = $os_responsavel;
    }

    /**
     * @return mixed
     */
    public function getOsTitulo()
    {
        return $this->os_titulo;
    }

    /**
     * @param mixed $os_titulo
     */
    public function setOsTitulo($os_titulo)
    {
        $this->os_titulo = $os_titulo;
    }

    /**
     * @return mixed
     */
    public function getOsEquipe()
    {
        return $this->os_equipe;
    }

    /**
     * @param mixed $os_equipe
     */
    public function setOsEquipe($os_equipe)
    {
        $this->os_equipe = $os_equipe;
    }

    /**
     * @return mixed
     */
    public function getOsStatus()
    {
        return $this->os_status;
    }

    /**
     * @param mixed $os_status
     */
    public function setOsStatus($os_status)
    {
        $this->os_status = $os_status;
    }

    /**
     * @return mixed
     */
    public function getOsaData()
    {
        return $this->osa_data;
    }

    /**
     * @param mixed $osa_data
     */
    public function setOsaData($osa_data)
    {
        $this->osa_data = $osa_data;
    }

    /**
     * @return mixed
     */
    public function getOsaHoraInicial()
    {
        return $this->osa_hora_inicial;
    }

    /**
     * @param mixed $osa_hora_inicial
     */
    public function setOsaHoraInicial($osa_hora_inicial)
    {
        $this->osa_hora_inicial = $osa_hora_inicial;
    }

    /**
     * @return mixed
     */
    public function getOsaHoraFinal()
    {
        return $this->osa_hora_final;
    }

    /**
     * @param mixed $osa_hora_final
     */
    public function setOsaHoraFinal($osa_hora_final)
    {
        $this->osa_hora_final = $osa_hora_final;
    }

    /**
     * @return mixed
     */
    public function getOsaTipoApropriacao()
    {
        return $this->osa_tipo_apropriacao;
    }

    /**
     * @param mixed $osa_tipo_apropriacao
     */
    public function setOsaTipoApropriacao($osa_tipo_apropriacao)
    {
        $this->osa_tipo_apropriacao = $osa_tipo_apropriacao;
    }

    /**
     * @return mixed
     */
    public function getOsaFuncionario()
    {
        return $this->osa_funcionario;
    }

    /**
     * @param mixed $osa_funcionario
     */
    public function setOsaFuncionario($osa_funcionario)
    {
        $this->osa_funcionario = $osa_funcionario;
    }


}

/*
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
        ADIC_DATA VARCHAR(10),
        LOC_CODIGO CHAR(12),
        FN_CODIGO VARCHAR(10),
        EEM_CODIGO CHAR(12),
        ADIC_OPER VARCHAR(10)
        );
 */