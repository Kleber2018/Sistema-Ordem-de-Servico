<?php
namespace App\Controllers;

use App\Models\Entidades\Servico;
use App\Models\Entidades\Dados;

abstract class Controller
{
    protected $app;
    private $viewVar;
    private $var; //variavel para ser usada nas view
    private $var2; //variavel2 para ser usada nas view
    
    public function __construct($app)
    {
        $this->setViewParam('nameController',$app->getControllerName());
    }

    //monta a página
    public function render($view)
    {
        if ($_SESSION['lembrar'] != "on"){
            $segundosDeslogar = TEMPO; // Deslogar se a última requisição for maior que X segundos
            $this->checaAutenticacao($segundosDeslogar);
        }
        $viewVar = $this->getViewVar();

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

    // /**
    //  * Variável 1 para ser usada nas views
    //  */
    public function getVar()
    {
        return $this->var;
    }
    public function setVar($var)
    {
        $this->var = $var;
    }

    // /**
    //  * Variável 2 para ser usada nas views
    //  */
    public function getVar2()
    {
        return $this->var2;
    }
    public function setVar2($var)
    {
        $this->var2 = $var;
    }

}