<?php

namespace App\Models\Entidades;

class Localizador
{
    private $loc_codigo;
    private $loc_nivel;
    private $loc_titulo;
    private $loc_equipe;

    /**
     * @return mixed
     */
    public function getLocCodigo()
    {
        return $this->loc_codigo;
    }

    /**
     * @param mixed $loc_codigo
     */
    public function setLocCodigo($loc_codigo)
    {
        $this->loc_codigo = $loc_codigo;
    }

    /**
     * @return mixed
     */
    public function getLocNivel()
    {
        return $this->loc_nivel;
    }

    /**
     * @param mixed $loc_nivel
     */
    public function setLocNivel($loc_nivel)
    {
        $this->loc_nivel = $loc_nivel;
    }

    /**
     * @return mixed
     */
    public function getLocTitulo()
    {
        return $this->loc_titulo;
    }

    /**
     * @param mixed $loc_titulo
     */
    public function setLocTitulo($loc_titulo)
    {
        $this->loc_titulo = $loc_titulo;
    }

    /**
     * @return mixed
     */
    public function getLocEquipe()
    {
        return $this->loc_equipe;
    }

    /**
     * @param mixed $loc_equipe
     */
    public function setLocEquipe($loc_equipe)
    {
        $this->loc_equipe = $loc_equipe;
    }



}