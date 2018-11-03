<!DOCTYPE html>
<html class="content tela-login">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo TITLE; ?></title>
  <link rel="stylesheet" href="http://<?php echo APP_HOST; ?>/public/css/bulma-0.7.2/css/bulma.min.css">
  <link rel="stylesheet" href="http://<?php echo APP_HOST; ?>/public/css/estilo.css">

  <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
</head>
<body>
<div class="container has-text-centered">
    <div class="column is-4 is-offset-4">
        <p class="subtitle"><span style="font-size: 32px;">LOGIN</span><br/>Por favor, faça o login para continuar.</p>
        <div class="box">
            <form name="logar" action="http://<?php echo APP_HOST; ?>/Login/verificar" method="POST">
                <div class="field">
                    <div class="control">
                        <input class="input" type="text" name="usuario" placeholder="Usuário" value="" required autofocus>
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <input class="input" type="password" name="senha" placeholder="Senha" required>
                    </div>
                </div>
                <div class="field">
                    <label class="checkbox">
                        <input type="checkbox" name="lembrar">
                        Lembre-me
                    </label>
                </div>
                <button type="submit" class="button is-link is-large" name="entrar" value="ENTRAR">
                    Login
                </button>
            </form>
        </div>
    </div>
</div>


</body>
</html>