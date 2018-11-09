<main class="column main">
    <nav class="breadcrumb is-small" aria-label="breadcrumbs">
        <ul>
            <li><a href="#">Administração</a></li>
            <li><a>Cadastros</a></li>
            <li class="is-active"><a href="#" aria-current="page">Apropriação de horas</a></li>
        </ul>
        <br/>
    </nav>



    <div class="content">
            <?php if($Sessao::retornaMensagem()){ ?>
                <div class="alert alert-warning" role="alert"><?php echo $Sessao::retornaMensagem(); ?></div>
            <?php } ?>

            
            
            <form action="http://<?php echo APP_HOST; ?>/apropriacao/salvarApropriacaoHH" method="post" id="form_cadastro">


                <label for="data-ose" class="label"><h2> Ordem de Serviço <?php echo $this->getVar(); ?></h2></label></br>

                <div class="field">
                    <label for="data-ose" class="label">Ordem de serviço:</label>
                    <div class="control has-icons-left">
                        <input type="text" class="input" name="os-codigo" placeholder="" value="<?php echo $this->getVar(); ?>" required>
                        <span class="icon is-small is-left">
                                         <i class="fas fa-users"></i>
                        </span>
                    </div>
                </div>


                <div class="field">
                    <label for="data-ose" class="label">Data da Apropriação de Horas</label>
                    <div class="control has-icons-left">
                        <input type="text" class="input" name="os-data-prevista" placeholder="   /   /     " value="" required>
                        <span class="icon is-small is-left">
                                         <i class="fas fa-users"></i>
                        </span>
                    </div>
                </div>



                <div class="field">
                    <label for="data-ose" class="label">Hora Inicial</label>
                    <div class="control has-icons-left">
                        <input type="text" class="input" name="os-data-prevista" placeholder="   :     " value="" required>
                        <span class="icon is-small is-left">
                                         <i class="fas fa-users"></i>
                        </span>
                    </div>
                </div>


                <div class="field">
                    <label for="data-ose" class="label">Hora Final</label>
                    <div class="control has-icons-left">
                        <input type="text" class="input" name="os-data-prevista" placeholder="   :     " value="" required>
                        <span class="icon is-small is-left">
                                         <i class="fas fa-users"></i>
                        </span>
                    </div>
                </div>



                <div class="field">
                    <label for="tipo-os" class="label">Tipo de Apontamento</label>
                    <div class="select">
                        <select name="os-tipo">
                            <option value="1">HN (Hora Normal)</option>
                            <option value="2">HE (Hora Extra)</option>
                        </select>
                    </div>
                </div>



                <div class="field">
                    <label for="responsavel-ose" class="label">Responsável</label>
                    <div class="control has-icons-left">
                        <input type="text" class="input" name="os-responsavel" placeholder="Responsável" value="" required>
                        <span class="icon is-small is-left">
                             <i class="fas fa-users"></i>
                        </span>
                    </div>
                </div>




                <div class="control">
                    <div class="field">
                        <button type="submit" class="button is-link">Salvar e inserir nova Apropriação</button>abre novamente a tela para inserir outra apropriação
                    </div>
                </div>
            </form>
        <div class="control">
            <div class="field">
                <button type="submit" class="button is-link">Voltar para a ordem de servico</button>volta para a Ordem de Servico com a lista de apropriações de hora
            </div>
        </div>
    </div>
</main>
</section>
