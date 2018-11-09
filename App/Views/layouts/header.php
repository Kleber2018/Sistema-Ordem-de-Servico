<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo TITLE; ?></title>
  <link rel="stylesheet" href="http://<?php echo APP_HOST; ?>/public/css/bulma-0.7.2/css/bulma.min.css">
  <link rel="stylesheet" href="http://<?php echo APP_HOST; ?>/public/css/estilo<?php echo $_SESSION['altocontraste']; ?>.css">
  
  <script src="http://<?php echo APP_HOST; ?>/public/js/translate.js"></script>

    <script>
    function load(idioma){
        var translate = new Translate();
        var currentLng = idioma;
        var attributeName = 'data-tag';
        translate.init(attributeName, currentLng);
        translate.process(); 
    }
    </script>

</head>
<body onLoad="load('<?php echo $_SESSION['idioma']; ?>')"> 
<?php 
    //Atribuindo a língua escolhida
    // $str = file_get_contents("http://" . APP_HOST . "/public/lang/pt-br.json");

    // //$str = file_get_contents("http://" . APP_HOST . "/public/lang/" . $idioma . ".json");
    // $json = json_decode($str, true);
    // // echo '<br/>' . $idioma;
    // // echo '<br/>' . '<pre>' . print_r($json, true) . '</pre>';
?>

<!-- <!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo TITLE; ?></title>

   <link href="http://<?php echo APP_HOST; ?>/public/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://<?php echo APP_HOST; ?>/public/css/main.css" rel="stylesheet">

</head>
<body> -->

