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
    public static $driver;


    public function __construct()
    {
        /*
         * Constantes do sistema para usar em qualquer parte de nossa aplicação
         */

         //Para salvar a configuração de database temporariamente durante a sessão. OBS: O correto é salvar em arquivo.
         if (isset($_POST['databaseDriver'])) $_SESSION['databaseDriver'] = $_POST['databaseDriver'] ;
         if (isset ($_SESSION['databaseDriver'])) self::$driver = $_SESSION['databaseDriver'];
         else self::$driver = 'mysql';
              
        define('APP_HOST'       , $_SERVER['HTTP_HOST'] . "/projeto-final");
        define('PATH'           , realpath('./'));//para poder gerenciar os diretorios internos da aplicação
        define('TITLE'          , "Projeto Final de PHP");
        define('DB_HOST'        , "localhost");
        define('DB_USER'        , "root");
        define('DB_PASSWORD'    , "");
        define('DB_NAME'        , "ProjetoWebServidor");
        define('DB_DRIVER'      , self::$driver);

        $this->url();
    }

    public function login(){
        $login = new LoginController($this);
        $this->run();
    }


    //Monta o controller apartir dos parâmetros repassados pela função url
    public function run()
    {
        //Para começar uma sessão válida
        
        $logado = $_SESSION["logado"];
            //echo '</br> função run </br>';
            //var_dump($this->controller);

            //recebe o nome da pasta e add a palavra Pontroller
            if ($this->controller) {
                if($logado == "true"){
                    $this->controllerName = ucwords($this->controller) . 'Controller';//ucwords - retorna a primeira letra em maiuscula
                    $this->controllerName = preg_replace('/[^a-zA-Z]/i', '', $this->controllerName); //pesquisa por uma expressão regular
                } else {
                    $this->controllerName = "LoginController";
                }
            } else {
                if($logado == "true"){
                    session_start();
                    $this->controllerName = "HomeController";
                } else {
                    $this->controllerName = "LoginController";
                }
            }


        $this->controllerFile   = $this->controllerName . '.php';
        $this->action           = preg_replace('/[^a-zA-Z]/i', '', $this->action);



            // echo '</br> controller ';
            // var_dump($this->controller);
            // echo '</br>';
            // var_dump(!$this->controller);
            // echo '</br> file ';
            // var_dump($this->controllerFile);
            // echo '</br> action';
            // var_dump($this->action);
            // echo '</br>';

 
        //Nesse momento  ele abre as páginas
        if (!$this->controller) {
            //Verifica se está logado para direcionar para tela inicial ou login
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
*/

        //não entendi esse aki
        $nomeClasse     = "\\App\\Controllers\\" . $this->controllerName;
        $objetoController = new $nomeClasse($this);



    //     var_dump($objetoController);
    //     echo '</br> nome classe:  ';
    //    var_dump($nomeClasse);
    //     echo '</br> Parametro:';
    //     var_dump($this->params);


        //Se o controller não existir lança exceção
        if (!class_exists($nomeClasse)) {
            throw new Exception("Erro na aplicação", 500);
        }

        //Verifica se o método do controle existe e não existir lança exceção
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

        $rotas = [
            "home/index" => "home/index",
            "index" => "home/index",
            "entrada" => "home/index",
            "/" => "home/index",
            "painel"=>"home/index",
            "cadastro" => "usuario/cadastro",
            "localizador"=>"localizador/localizadorCadastro",
            "buscar"=>"apropriacao/servicoBusca",
            "teladeserviço"=>"apropriacao/servicoBusca",
            "cadastrolocalizador"=>"localizador/localizadorCadastro",
            "cadastroserviço"=>"servico/servicoCadastro",
            "relatorio"=>"relatorios",
            "controleusuarios"=>"usuario/cadastro",
            "config"=>"configuracoes"
        ];

            //Verifica se existe um Get
        if ( isset( $_GET['url'] ) ) {

            //a entrada do Get é usado o array associativo $rotas para alterar o get para uma rota correta
            $verificador = $rotas[$_GET['url']];
            // echo '</br> teste';
            // var_dump($verificador);
            
            if(isset($verificador)){
                $path = $verificador;
                // echo 'dentro do if'; 
            } else {
                $path = $_GET['url'];
                // echo 'fora do if'; 
            }
    

            // echo '</br>';
            // var_dump($path);
            $path = rtrim($path, '/');//limpando os espaços em branco no final da String

            // echo '</br>';
            // var_dump($path);
            $path = filter_var($path, FILTER_SANITIZE_URL); //verifica se a url é no padrão url

            $path = explode('/', $path);
            // echo '</br>';
            // var_dump($path[0]);
            // echo '</br> 1: ';
            //  var_dump($path[1]);

            // echo '</br> 2: ';
            // var_dump($path[2]);
            // echo '</br> 2: ';

            $this->controller  = $this->verificaArray( $path, 0 );//atribuindo valor da posição 0 na variavel controller
            $this->action      = $this->verificaArray( $path, 1 );// atribuindo valor na action

            //verifica se a posição 2 contem parametros (ex.os_codigo)
            if ( $this->verificaArray( $path, 2 ) ) {
                unset( $path[0] );//destroi a prosição 0
                unset( $path[1] );//destroi a posição 1
                // var_dump($path);
                $this->params = array_values( $path );

                // var_dump($this->params);
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

    //verificando se o array existe
    private function verificaArray ( $array, $key ) {
        if ( isset( $array[ $key ] ) && !empty( $array[ $key ] ) ) {
            return $array[ $key ];
        }
        return null;
    }
}