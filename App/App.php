<?php
//Felipe Augusto Barcelos (RA1589482), Kleber Leandro dos Santos (RA1924729), Thiago Henrique Oliveira de Jesus(RA1889656).
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
              
        define('APP_HOST'       , $_SERVER['HTTP_HOST'] . "");//a pasta do projeto precisa ter esse mesmo nome
        define('PATH'           , realpath('./'));//para poder gerenciar os diretorios internos da aplicação
        define('TITLE'          , "Projeto Final de PHP");
        define('DB_HOST'        , "localhost");
        define('DB_USER'        , "root");//usuario no BD
        define('DB_PASSWORD'    , "");//senha do BD
        define('DB_NAME'        , "ProjetoWebServidor");//nome do BD
        define('DB_DRIVER'      , self::$driver);
        define('TEMPO'          , 1000);//Tempo para desconectar por inatividade (Caso não tenha habilitado o Lembre-me)

        $this->url();
    }

    public function login(){
        $login = new LoginController($this);
        $this->run();
    }


    //Monta o controller apartir dos parâmetros repassados pela função url
    public function run()
    {  
        $logado = $_SESSION["logado"];
      
        //recebe o nome da pasta e add a palavra Controller
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

        //se controller for null ele direciona para home ou index
        if (!$this->controller) {
            //Verifica se está logado para direcionar para tela inicial ou login
            if($logado == "true"){
                $this->controller = new HomeController($this);
                $this->controller->index();
            } else {
                print_r('dentro do login');
                $this->controller = new LoginController($this);
                $this->controller->renderLogin();
            }
        }

        if (!file_exists(PATH . '/App/Controllers/' . $this->controllerFile)) {
            throw new Exception("Página não encontrada.", 404);
        }

        //instanciando a classe controller específica
        $nomeClasse     = "\\App\\Controllers\\" . $this->controllerName;
        $objetoController = new $nomeClasse($this);

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
            throw new Exception("ERRO 500 - Digite um endereço válido", 500);
        }
        throw new Exception("Página não encontrada.", 404);
    }

    //para url amigavel
    public function url () {

        //relação de rotas utilizaveis
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

        $logado = $_SESSION["logado"];

            //Verifica se existe um Get
        if ( isset( $_GET['url'] ) ) {
            if(isset($verificador)){
                $path = $verificador;
            } else {
                $path = $_GET['url'];
            }
            $path = rtrim($path, '/');//limpando os espaços em branco no final da String
            $path = filter_var($path, FILTER_SANITIZE_URL); //verifica se a url é no padrão url
            $path = explode('/', $path);

            $this->controller  = $this->verificaArray( $path, 0 );//atribuindo valor da posição 0 na variavel controller
            $this->action      = $this->verificaArray( $path, 1 );// atribuindo valor na action

            //verifica se a posição 2 contem parametros (ex.os_codigo)
            if ( $this->verificaArray( $path, 2 ) ) {
                unset( $path[0] );//destroi a prosição 0
                unset( $path[1] );//destroi a posição 1
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

    public function setController($c)
    {
        $this->controller = $c;
    }

    public function setAction($a)
    {
        $this->action = $a;
    }

    //verificando se o array existe
    private function verificaArray ( $array, $key ) {
        if ( isset( $array[ $key ] ) && !empty( $array[ $key ] ) ) {
            return $array[ $key ];
        }
        return null;
    }
}
