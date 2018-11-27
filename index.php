<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo TITLE; ?></title>
  <link rel="stylesheet" href="http://<?php echo APP_HOST; ?>/public/css/bulma-0.7.2/css/bulma.min.css">
  <link rel="stylesheet" href="http://<?php echo APP_HOST; ?>/public/css/estilo.css">
  
  <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>

  <script defer src="http://<?php echo APP_HOST; ?>/public/js/translate.js"></script>
    <script>
    function carregarIdioma(){
        var translate = new Translate();
        var currentLng = 'en';
        var attributeName = 'data-tag';
        translate.init(attributeName, currentLng);
        translate.process(); 
    }
    </script>

</head>
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