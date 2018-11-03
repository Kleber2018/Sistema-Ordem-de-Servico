<nav class="navbar" role="navigation" aria-label="main navigation">
    <div class="hero navbar-brand is-centered">
        <a href="http://<?php echo APP_HOST; ?>" class="navbar-item">
          <img src="http://<?php echo APP_HOST; ?>/public/imgs/logo-cog-2.png"  height="128">
          <p class = "is-size-4" style="padding-bottom:2px; padding-left:6px;"> Sistema Eletromecânico</p>
        </a>

    </div>

    <div class="navbar-end">
        <div class='navbar-item has-dropdown is-hoverable has-text-dark'>
            <a class='navbar-link has-text-grey'>
            Bem vindo <?php echo $_SESSION['usuario']?>
            </a>
        <div class='navbar-dropdown is-right'>
            <a class='navbar-item' href="http://<?php echo APP_HOST; ?>/Login/deslogar">
                <span class='icon is-small'>
                    <i class='fas fa-sign-out-alt'></i>
                </span>
                <h1 class='content has-text-grey'>Deslogar</h1>
            </a>
          <!-- PHP que desloga após certo tempo -->
<?php
	// 	session_start();
	// 	$logado = $_SESSION['logado'];
	// 	$usuario = $_SESSION['usuario'];

	// //Desloga depois de um tempo inativo.
	// require("checaAutenticacao.php"); 
  ?>

        </div>
        </div>
        </div>
    </nav>

<!-- <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="http://<?php echo APP_HOST; ?>">Sistema Eletromecânico</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li <?php if($viewVar['nameController'] == "HomeController") { ?> class="active" <?php } ?>>
                    <a href="http://<?php echo APP_HOST; ?>/home/index" >Home</a>
                </li>
                <li <?php if($viewVar['nameController'] == "UsuarioController") { ?> class="active" <?php } ?>>
                    <a href="http://<?php echo APP_HOST; ?>/usuario/cadastro" >Cadastro de Usuário</a>
                </li>
                <li <?php if($viewVar['nameController'] == "LocalizadorController") { ?> class="active" <?php } ?>>
                    <a href="http://<?php echo APP_HOST; ?>/localizador/localizadorCadastro" >Cadastro de Localizador</a>
                </li>
                <li <?php if($viewVar['nameController'] == "UsuarioController") { ?> class="active" <?php } ?>>
                    <a href="http://<?php echo APP_HOST; ?>/Login/deslogar" >Sair</a>
                </li>
            </ul>
        </div>
    </div>
</nav> -->
