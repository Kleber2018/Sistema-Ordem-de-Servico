<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <h3>Cadastro de Usuário</h3>

            <?php if($Sessao::retornaMensagem()){ ?>
                <div class="alert alert-warning" role="alert"><?php echo $Sessao::retornaMensagem(); ?></div>
            <?php } ?>

            <form action="http://<?php echo APP_HOST; ?>/usuario/salvar" method="post" id="form_cadastro">
                <div class="form-group">
                    <label for="usuario-codigo">Código do Usuário</label>
                    <input type="text" class="form-control"  name="usuario-codigo" placeholder="código do Usuário" value="" required>
                </div>
                <div class="form-group">
                    <label for="usuario-nome">Nome do Usuário/Funcionário</label>
                    <input type="text" class="form-control"  name="usuario-nome" placeholder="Seu nome" value="" required>
                </div>
                <div class="form-group">
                    <label for="email">Senha</label>
                    <input type="text" class="form-control" name="usuario-senha" placeholder="Sua senha" value="" required>
                </div>

                <button type="submit" class="btn btn-success btn-sm">Salvar</button>
            </form>
        </div>
        <div class=" col-md-3"></div>
    </div>
</div>