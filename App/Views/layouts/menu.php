<nav class="navbar navbar-inverse navbar-fixed-top">
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
</nav>
