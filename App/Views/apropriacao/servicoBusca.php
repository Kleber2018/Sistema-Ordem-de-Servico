<main class="column main">
    <nav class="breadcrumb is-small" aria-label="breadcrumbs">
        <ul>
            <li><a href="#">Administração</a></li>
            <li><a>Serviço</a></li>
            <li class="is-active"><a href="#" aria-current="page">Busca</a></li>
        </ul>
        <br/>
    </nav>


    <div class="content">
            <!-- < ?php if($Sessao::retornaMensagem()){ ?>
                <div class="alert alert-warning" role="alert">< ?php echo $Sessao::retornaMensagem(); ?></div>
            < ?php } ?> -->






        <form id="form_cadastro" action="http://<?php echo APP_HOST; ?>/apropriacao/ServicoTela" method="POST">

                    <div class="field">
                        <label for="titulo-os" class="label">Informe o Código da Ordem de Servico</label>
                        <div class="control has-icons-left">
                            <input type="text" class="input"  name="os-codigo" placeholder="QD:026 ou QD026" value="" required>
                            <span class="icon is-small is-left">
                                <i class="fas fa-map-signs"></i>
                            </span>
                        </div>
                    </div>


                </br>

            <!--Redireciona para ServicoController function servicoApropriacaoHH-->
                <div class="control">
                    <div class="field">
                        <button type="submit" class="button is-link" >Buscar</button>
                    </div>
                </div>
            </form>
        </div>




</main>
</section>
