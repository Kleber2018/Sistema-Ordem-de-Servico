<main class="column main">
    <nav class="breadcrumb is-small" aria-label="breadcrumbs">
        <ul>
            <li><a href="#">Administração</a></li>
            <li><a>Cadastros</a></li>
            <li class="is-active"><a href="#" aria-current="page">Serviços</a></li>
        </ul>
        <br/>
    </nav>



    <div class="content">
            <?php if($Sessao::retornaMensagem()){ ?>
                <div class="alert alert-warning" role="alert"><?php echo $Sessao::retornaMensagem(); ?></div>
            <?php } ?>

            <form action="http://<?php echo APP_HOST; ?>/servico/salvar" method="post" id="form_cadastro">
                <label for="os-localizador" class="label" >Codigo da Localização</label>
                <div class="field is-grouped">
                    <div class="control has-icons-left is-expanded">
                        <input type="text" class="input" name="os-localizador" placeholder="Ex: QD(PONTA GROSSA), OQ(PALMEIRA)" value="" required>
                        <span class="icon is-small is-left">
                            <i class="fas fa-map-marker-alt"></i>
                        </span>
                    </div>
                </div>

                <div class="field">
                    <label for="os-responsavel" class="label">Responsável</label>
                    <div class="control has-icons-left">
                        <input type="text" class="input" name="os-responsavel" placeholder="Responsável" value="" required>
                        <span class="icon is-small is-left">
                             <i class="fas fa-users"></i>
                        </span>
                    </div>
                </div>



                <div class="field">
                    <label for="os-tipo" class="label">Tipo (nao está puchando)</label>
                    <div class="select">
                        <select name="os-tipo">
                            <option value="1">1 - CEG (Corretiva Emergêncial)</option>
                            <option value="2">2 - CNE (Corretiva não Emergêncial)</option>
                            <option value="3">3 - PNS (Preventiva)</option>
                            <option value="9">9 - MEM (Melhoria)</option>
                            <option value="6">6 - SIG (Serviço Interno)</option>
                        </select>
                    </div>
                </div>



                <div class="field">
                    <label for="os-titulo" class="label">Título da ordem de Serviço</label>
                    <div class="control has-icons-left">
                        <input type="text" class="input"  name="os-titulo" placeholder="Título" value="" required>
                        <span class="icon is-small is-left">
                            <i class="fas fa-map-signs"></i>
                        </span>
                    </div>
                </div>

                <div class="field">
                    <label for="os-obs" class="label">Observação</label>
                    <div class="control has-icons-left">
                        <input type="text" class="input"  name="os-obs" placeholder="Observação" value="" required>
                        <span class="icon is-small is-left">
                            <i class="fas fa-map-signs"></i>
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