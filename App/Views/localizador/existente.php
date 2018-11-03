<main class="column main">
    <nav class="breadcrumb is-small" aria-label="breadcrumbs">
        <ul>
            <li><a href="#">Administração</a></li>
            <li><a>Cadastros</a></li>
            <li class="is-active"><a href="#" aria-current="page">Localizadores</a></li>
        </ul>
        <br/>
    </nav>
        <div class="content">
            <h1>Localizador <?php echo $Sessao::retornaValorFormulario('loc-titulo');?> Código já existe.</h1>
            <a href="http://<?php echo APP_HOST; ?>/localizador/localizadorCadastro" class="button is-info">Voltar</a>
        </div>
</main>

<!-- <div class="container">
    <div class="row">
        <br>
        <div class="col-md-12">
            <h4>Usuário <?php echo $Sessao::retornaValorFormulario('usuario-nome');?> cadastrado com sucesso.</h4>
            <a href="http://<?php echo APP_HOST; ?>/usuario/cadastro" class="btn btn-info">Voltar</a>
        </div>
    </div>
</div> -->