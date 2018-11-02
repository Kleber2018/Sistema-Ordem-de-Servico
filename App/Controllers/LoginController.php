<?php

namespace App\Controllers;

class LoginController extends Controller
{


    public function renderLogin()
    {
        $Sessao  = Sessao::class;
        require_once PATH . '/App/Views/login/login.php';
    }


    public function verificar(){
        $usuario = $_POST["usuario"] ?? null;
        $senha = $_POST["senha"] ?? null;

        //IMPLEMENTAR
        //NESSA PARTE PRECISA IMPLEMENTAR A PARTE QUE BUSCA ANO BANCO DE DADOS
        $verificador[0] = array(
            'usuario' => "kleber",
            'senha' => "123"
        );
        $verificador[1] = array(
            'usuario' => "Leandro",
            'senha' => "123"
        );
        $verificador[2] = array(
            'usuario' => "adm",
            'senha' => "333"
        );
        session_destroy();


        session_start();

        $vr=true;
        //VERIFICA SE O USUARIO EXISTE E CRIA A SESSION
        foreach($verificador as $linha){
            if($usuario == $linha['usuario'] && $senha == $linha['senha']){
                $_SESSION['logado'] = "true";
                $_SESSION['usuario'] = $usuario;
                $this->redirect('/home/index');
                $vr=false;//
            }
        }

        //????????? não está sendo usado
        if($vr){
            header("location: login.php");
        }
        if(isset($_SESSION["logado"]) && $_SESSION["logado"] == "true"){
            header("location: index.php");
        }
    }


    /**
     * Destruir a session e redirecionar para / que na Clase App direciona para login.php
     */
    public function deslogar(){
        session_start();
        $logado = $_SESSION["logado"];
        //$usuario = $_SESSION["usuario"];

        if($logado == "true"){
            session_destroy();
            $this->redirect('/');
        } else {
            $this->redirect('/');
        }
    }
}