<main class="column main">
    <nav class="breadcrumb is-small" aria-label="breadcrumbs">
        <ul>
            <li><a href="#">Administração</a></li>
            <li class="is-active"><a href="#" aria-current="page">Controle de usuários</a></li>
        </ul>
        <br/>
    </nav>
        <div class="content">
            <h1>Usuário <?php echo $Sessao::retornaValorFormulario('usuario-nome');?> cadastrado com sucesso.</h1>
            <a href="http://<?php echo APP_HOST; ?>/usuario/cadastro" class="button is-info">Voltar</a>
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