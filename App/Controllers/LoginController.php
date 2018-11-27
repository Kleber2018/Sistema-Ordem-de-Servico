<?php

namespace App\Controllers;

use App\Models\DAO\UsuarioDAO;
use App\Models\Entidades\Usuario;

class LoginController extends Controller
{


    public function renderLogin()
    {
        //$Sessao  = Sessao::class;
        // require_once PATH . '/App/Views/layouts/header.php';
        // require_once PATH . '/App/Views/layouts/menu.php';
        require_once PATH . '/App/Views/login/login.php';
    }

    public function index()
    {
        //$Sessao  = Sessao::class;
        // require_once PATH . '/App/Views/layouts/header.php';
        // require_once PATH . '/App/Views/layouts/menu.php';
        require_once PATH . '/App/Views/login/login.php';
    }

    //utilizado pelo login para verificar se o usuario existe no BD
    public function verificar(){

        //Setando dados para buscar no banco de dados
        $usuario = new Usuario();
        $usuario->setFnCodigo($_POST['usuario']);
        $usuario->setFnSenha($_POST['senha']);

        $usuarioDAO = new UsuarioDAO();
        session_destroy();

        //Executa a query para encontrar se existe usuário e senha no banco de dados
        $login = $usuarioDAO->buscaLogin($usuario) ?? null;

        //Começa a sessão se encontrado
        if (isset($login['FN_CODIGO']) && isset($login['SENHA'])) {
            session_start();
            $_SESSION['logado'] = "true";
            $_SESSION['usuario'] = $login['FN_CODIGO'];
            $_SESSION['senha'] = $login['SENHA'];
            $_SESSION['admin'] = $login['ADMIN'];
            $_SESSION['lembrar'] = $_POST['lembrar'];
            $this->redirect('/home/index');
        } else {
            echo "<script>alert('Dados incorretos!');";
            echo "window.location='..';</script>";
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