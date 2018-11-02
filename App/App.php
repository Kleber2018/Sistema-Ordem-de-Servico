<?php

namespace App;

use App\Controllers\HomeController;
use App\Controllers\LoginController;
use Exception;

//coração da aplicação
//fica responsável em chamar o controler responsável por akela url
class App
{
    private $controller;
    private $controllerFile;
    private $action;
    private $params;
    public  $controllerName;



    public function __construct()
    {
        /*
         * Constantes do sistema para usar em qualquer parte de nossa aplicação
         */
        define('APP_HOST'       , $_SERVER['HTTP_HOST'] . "/projeto-final");
        define('PATH'           , realpath('./'));//para poder gerenciar os diretorios internos da aplicação
        define('TITLE'          , "Projeto Final de PHP");
        define('DB_HOST'        , "localhost");
        define('DB_USER'        , "root");
        define('DB_PASSWORD'    , "");
        define('DB_NAME'        , "ProjetoWebServidor");
        define('DB_DRIVER'      , "mysql");

        $this->url();
    }

    public function login(){
        $login = new LoginController($this);
       // $login->renderLogin();

        $this->run();
    }


    public function run()
    {
        //para puxar uma sessão válida
        session_start();
        $logado = $_SESSION["logado"];
        //usuário que está logado
        $usuario = $_SESSION["usuario"];



            if ($this->controller) {
                $this->controllerName = ucwords($this->controller) . 'Controller';
                $this->controllerName = preg_replace('/[^a-zA-Z]/i', '', $this->controllerName);
            } else {
                if($logado == "true"){
                    $this->controllerName = "HomeController";
                } else {
                    $this->controllerName = "LoginController";
                }
            }







        $this->controllerFile   = $this->controllerName . '.php';
        $this->action           = preg_replace('/[^a-zA-Z]/i', '', $this->action);


/*
            echo '</br>';
            echo '</br>';
            echo '</br>';
            var_dump($this->controller);
            echo '</br>';
            var_dump(!$this->controller);
            echo '</br>';
            var_dump($this->controllerFile);
            echo '</br>';
            var_dump($this->action);
*/



        //nesse momente que ele abre as páginas
        if (!$this->controller) {
            //verifica se está logado para direcionar para tela inicial ou login
            if($logado == "true"){
                $this->controller = new HomeController($this);
                $this->controller->index();
            } else {
                $this->controller = new LoginController($this);
                $this->controller->renderLogin();
            }
        }





        if (!file_exists(PATH . '/App/Controllers/' . $this->controllerFile)) {
            throw new Exception("Página não encontrada.", 404);
        }

/*
        echo '</br>nome da classe';
        var_dump($this->controllerName);
        echo '</br>nome da classe';
*/
        //não entendi esse aki
        $nomeClasse     = "\\App\\Controllers\\" . $this->controllerName;
        $objetoController = new $nomeClasse($this);


/*
        var_dump($objetoController);
        echo '</br>';
       var_dump($nomeClasse);
        echo '</br>';
       var_dump($this->action);
        echo '</br>';
        var_dump($this->params);

*/

        if (!class_exists($nomeClasse)) {
            throw new Exception("Erro na aplicação", 500);
        }


        //nao entendi essa parte
        if (method_exists($objetoController, $this->action)) {
            $objetoController->{$this->action}($this->params);
            return;
        } else if (!$this->action && method_exists($objetoController, 'index')) {
            $objetoController->index($this->params);
            return;
        } else {
            throw new Exception("Nosso suporte já esta verificando desculpe!", 500);
        }


        throw new Exception("Página não encontrada.", 404);
    }

    //para url amigavel
    public function url () {

        if ( isset( $_GET['url'] ) ) {

            $path = $_GET['url'];//utiliza o htaccess
            $path = rtrim($path, '/');
            $path = filter_var($path, FILTER_SANITIZE_URL); 

            $path = explode('/', $path);

            $this->controller  = $this->verificaArray( $path, 0 );
            $this->action      = $this->verificaArray( $path, 1 );

            if ( $this->verificaArray( $path, 2 ) ) {
                unset( $path[0] );
                unset( $path[1] );
                $this->params = array_values( $path );
            }
        }
    }

    public function getController()
    {
        return $this->controller;
    }

    public function getAction()
    {
        return $this->action;
    }

    public function getControllerName()
    {
        return $this->controllerName;
    }

    public function getParams()
    {
        return $this->params;
    }

    private function verificaArray ( $array, $key ) {
        if ( isset( $array[ $key ] ) && !empty( $array[ $key ] ) ) {
            return $array[ $key ];
        }
        return null;
    }
}