<div class="container">
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
</div>