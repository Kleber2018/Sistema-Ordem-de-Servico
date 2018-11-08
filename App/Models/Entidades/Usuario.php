<?php

namespace App\Models\Entidades;

class Usuario
{
    private $fn_codigo;
    private $fn_nome;
    private $fn_senha;
    private $admin;


    public function getAdmin()
    {
        return $this->admin;
    }

    public function setAdmin($admin)
    {
        $this->admin = $admin;
    }

    /**
     * @return mixed
     */
    public function getFnCodigo()
    {
        return $this->fn_codigo;
    }

    /**
     * @param mixed $fn_codigo
     */
    public function setFnCodigo($fn_codigo)
    {
        $this->fn_codigo = $fn_codigo;
    }

    /**
     * @return mixed
     */
    public function getFnNome()
    {
        return $this->fn_nome;
    }

    /**
     * @param mixed $fn_nome
     */
    public function setFnNome($fn_nome)
    {
        $this->fn_nome = $fn_nome;
    }

    /**
     * @return mixed
     */
    public function getFnSenha()
    {
        return $this->fn_senha;
    }

    /**
     * @param mixed $fn_senha
     */
    public function setFnSenha($fn_senha)
    {
        $this->fn_senha = $fn_senha;
    }



}