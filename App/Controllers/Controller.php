<?php

namespace App\Controllers;

use App\Lib\Sessao;
use App\Models\Entidades\Servico;

abstract class Controller
{
    protected $app;
    private $viewVar;
    //public static $segundosDeslogar = 5;
    private $serv;


    public function __construct($app)
    {
        $this->setViewParam('nameController',$app->getControllerName());
    }


    //monta a página
    public function render($view)
    {
        if ($_SESSION['lembrar'] != "on"){
            $segundosDeslogar = 5; // Deslogar se a última requisição for maior que X segundos
            $this->checaAutenticacao($segundosDeslogar);
        }
        $viewVar = $this->getViewVar();
        $Sessao  = Sessao::class;

        $serv= $this->getServ();//precisa estar aki dentro para popular os compos dentro da view

        require_once PATH . '/App/Views/layouts/header.php';
        require_once PATH . '/App/Views/layouts/menu.php';
        require_once PATH . '/App/Views/layouts/aside.php';
        require_once PATH . '/App/Views/' . $view . '.php';
        require_once PATH . '/App/Views/layouts/footer.php';
    }

    public function redirect($view)
    {
        header('Location: http://' . APP_HOST . $view);
        exit;
    }

    public function getViewVar()
    {
        return $this->viewVar;
    }



    public function setViewParam($varName, $varValue)
    {
        if ($varName != "" && $varValue != "") {
            $this->viewVar[$varName] = $varValue;
        }
    }


    public function checaAutenticacao($segundosDeslogar){
        if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > $segundosDeslogar)) {
            
            session_unset(); 
            session_destroy();
        
            echo "<script>alert('Você permaneceu inativo mais que ${segundosDeslogar} segundos e foi deslogado!');";
            echo "window.location='..';</script>";
        }
        $_SESSION['LAST_ACTIVITY'] = time();
    }

    /**
     * @return mixed
     */
    public function getServ()
    {
        return $this->serv;
    }

    /**
     * @param mixed $serv
     */
    public function setServ(Servico $serv)
    {
        $this->serv = $serv;
    }





}