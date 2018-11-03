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
            <?php if($Sessao::retornaMensagem()){ ?>
                <div class="alert alert-warning" role="alert"><?php echo $Sessao::retornaMensagem(); ?></div>
            <?php } ?>

            <form action="http://<?php echo APP_HOST; ?>/localizador/salvar" method="post" id="form_cadastro">
                <label for="localizador-codigo" class="label" >Código do localizador</label>
                <div class="field is-grouped">
                        <div class="control has-icons-left is-expanded">
                            <input type="text" class="input" name="loc-codigo" placeholder="Ex: QD(PONTA GROSSA), OQ(PALMEIRA)" value="" required>
                            <span class="icon is-small is-left">
                                <i class="fas fa-map-marker-alt"></i>
                            </span>
                        </div>
                        <div class="control has-icons-left is-expanded">
                            <input type="text" class="input" name="loc-codigo" placeholder="Ex: J1:(ETA)" value="" required>
                            <span class="icon is-small is-left">
                                <i class="fas fa-map-marker"></i>
                            </span>
                        </div>
                    
                </div>
                <div class="field">
                    <label for="localizacao-titulo" class="label">Título do localizador</label>
                    <div class="control has-icons-left">
                        <input type="text" class="input"  name="loc-titulo" placeholder="Título" value="" required>
                        <span class="icon is-small is-left">
                            <i class="fas fa-map-signs"></i>
                        </span>
                    </div>
                </div>
                <div class="field">
                    <label for="equipe" class="label">Equipe Responsável Pelo Localizador</label>
                    <div class="control has-icons-left">
                        <input type="text" class="input" name="loc-equipe" placeholder="Equipe" value="" required>
                        <span class="icon is-small is-left">
                             <i class="fas fa-users"></i>
                        </span>
                    </div>
                </div>
                <div class="control">
                    <div class="field">
                        <button type="submit" class="button is-link">Salvar</button>
                    </div>
                </div>
            </form>
        </div>
</main>
</section>


<!-- <div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <h3>Cadastro de Localizador</h3>

            <?php if($Sessao::retornaMensagem()){ ?>
                <div class="alert alert-warning" role="alert"><?php echo $Sessao::retornaMensagem(); ?></div>
            <?php } ?>

            <form action="http://<?php echo APP_HOST; ?>/localizador/salvar" method="post" id="form_cadastro">
                <div class="form-group">
                    <label for="localizador-codigo">Codigo da Localização</label>
                    <input type="text" class="form-control"  name="loc-codigo" placeholder="EX: QD(PONTA GROSSA), OQ(PALMEIRA)" value="<?php echo $Sessao::retornaValorFormulario('nome'); ?>" required>
                </div>
                <div class="form-group">
                    <label for="localizacao-titulo">Título da Localização</label>
                    <input type="text" class="form-control" name="loc-titulo" placeholder="Título" value="<?php echo $Sessao::retornaValorFormulario('email'); ?>" required>
                </div>
                <div class="form-group">
                    <label for="equipe">Equipe responsável pela Localização</label>
                    <input type="text" class="form-control" name="loc-equipe" placeholder="Equipe A" value="<?php echo $Sessao::retornaValorFormulario('email'); ?>" required>
                </div>

                <button type="submit" class="btn btn-success btn-sm">Salvar</button>
            </form>
        </div>
        <div class=" col-md-3"></div>
    </div>
</div> -->