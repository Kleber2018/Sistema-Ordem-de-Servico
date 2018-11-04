<?php

use App\App;
use App\Lib\Erro;

session_start();

error_reporting(E_ALL & ~E_NOTICE);//para não parar por causa de erro de notice

require_once("vendor/autoload.php");

try {
    $app = new App();
    $app->login();
}catch (\Exception $e){
    $oError = new Erro($e);
    $oError->render();
}