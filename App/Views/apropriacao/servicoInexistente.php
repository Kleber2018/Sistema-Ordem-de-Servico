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
            <h2>Não encontrado o serviço com o código: <b><?php echo $this->getBuscado(); ?></b></h2>
            <a href="http://<?php echo APP_HOST; ?>/apropriacao/servicoBusca" class="button is-info">Voltar</a>
        </div>
</main>