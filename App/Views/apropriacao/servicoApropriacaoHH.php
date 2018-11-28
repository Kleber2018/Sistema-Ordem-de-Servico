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
                                 
            <form action="http://<?php echo APP_HOST; ?>/apropriacao/salvarApropriacaoHH" method="post" id="form_cadastro">
                <label for="data-ose" class="label"><h2> Ordem de Serviço <?php echo $this->getVar(); ?></h2></label></br>
                <div class="field">
                    <!-- <label for="data-ose" class="label">Ordem de serviço:</label> -->
                    <div class="control has-icons-left">
                        <input type="hidden" class="input" name="os-codigo" placeholder="" value="<?php echo $this->getVar(); ?>">
                    </div>
                </div>

                <div class="field">
                <label for="data-apropriacao" class="label">Data da Apropriação de Horas</label>
                    <div class="control has-icons-left">
                        <input name="data-apropriacao" type="date" class="input">
                        <span class="icon is-small is-left">
                            <i class="fas fa-clock"></i>
                        </span>
                    </div>
                </div>
                
                <div class="field">
                    <label for="hora-inicial" class="label">Hora Inicial</label>
                    <div class="control has-icons-left">
                        <input type="time" class="input" name="hora-inicial" value="" required>
                        <span class="icon is-small is-left">
                                         <i class="fas fa-users"></i>
                        </span>
                    </div>
                </div>

                <div class="field">
                    <label for="hora-final" class="label">Hora Final</label>
                    <div class="control has-icons-left">
                        <input type="time" class="input" name="hora-final" value="" required>
                        <span class="icon is-small is-left">
                                         <i class="fas fa-users"></i>
                        </span>
                    </div>
                </div>

               <div class="field">
                    <label for="tipo-os" class="label">Tipo de Apontamento</label>
                    <div class="select">
                        <select name="tipo-os">
                            <option value="HN">HN (Hora Normal)</option>
                            <option value="HE">HE (Hora Extra)</option>
                        </select>
                    </div>
                </div>

                <div class="field">
                    <label for="responsavel-ose" class="label">Responsável</label>
                    <div class="control has-icons-left">
                        <input type="text" class="input" name="os-responsavel" placeholder="Responsável" onkeydown="limita30(this);" onkeyup="limita30(this);" value="" required>
                        <span class="icon is-small is-left">
                             <i class="fas fa-users"></i>
                        </span>
                    </div>
                </div>

                <div class="control">
                    <div class="field">
                        <button type="submit" class="button is-link">Salvar Apropriação</button>
                    </div>
                </div>
            </form>
    </div>

<!-- Botão para voltar para a tela de servico -->
    <form id="form_cadastro" action="http://<?php echo APP_HOST; ?>/apropriacao/ServicoTela" method="POST">

        <div class="field">
            <div class="control has-icons-left">
            <input type="hidden" class="input" name="os-codigo" placeholder="" value="<?php echo $this->getVar(); ?>">
            </div>
        </div>

        <div class="control">
            <div class="field">
                <button type="submit" class="button is-link" >Voltar para Ordem de Servico</button>
            </div>
        </div>
    </form>
</div>

</main>
</section>
