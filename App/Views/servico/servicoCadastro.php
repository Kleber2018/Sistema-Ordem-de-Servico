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
            <form action="http://<?php echo APP_HOST; ?>/servico/salvar" method="post" id="form_cadastro">

                <label for="localizador-os-codigo" class="label" >Código do localizador</label>
        <div class="field">
            <div class="control has-icons-left">
            <span class="icon is-small is-left">
                <i class="fas fa-map-marker-alt"></i>
            </span>
                <div class="select">
                <select name="os-localizador1">
                    <?php
                    foreach ($this->getVar() as $localizador) {
                        echo "<option value='".$localizador->getLocCodigo()."'>".$localizador->getLocCodigo()."</option>";
                    }
                    ?>
                </select>
                </div>
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

                <div class="field">
                    <label for="tipo-os" class="label">Tipo</label>
                    <div class="control has-icons-left">
                        <span class="icon is-small is-left">
                            <i class="fas fa-pen"></i>
                        </span>
                    <div class="select">
                        <select name="os-tipo">
                            <option value="CEG">1 - CEG (Corretiva Emergêncial)</option>
                            <option value="CNE">2 - CNE (Corretiva não Emergêncial)</option>
                            <option value="PNS">3 - PNS (Preventiva)</option>
                            <option value="MEM">9 - MEM (Melhoria)</option>
                            <option value="SIG">6 - SIG (Serviço Interno)</option>
                        </select>
                </div>
                    </div>
                </div>


        <div class="field">
        <label for="data-ose-prevista" class="label">Data Prevista</label>
            <div class="control has-icons-left">
                <input name="data-ose-prevista" type="datetime-local" class="input">
                <span class="icon is-small is-left">
                    <i class="fas fa-clock"></i>
                </span>
            </div>
        </div>

                <div class="field">
                    <label for="titulo-os" class="label">Título da ordem de Serviço</label>
                    <div class="control has-icons-left">
                        <input type="text" class="input"  name="os-titulo" placeholder="Título" onkeydown="limita90(this);" onkeyup="limita90(this);" value="" required>
                        <span class="icon is-small is-left">
                            <i class="fas fa-map-signs"></i>
                        </span>
                    </div>
                </div>

                <div class="field">
                    <label for="obs-os" class="label">Observação</label>
                    <div class="control has-icons-left">
                        <input type="text" class="input"  name="os-obs" placeholder="Observação" onkeydown="limita90(this);" onkeyup="limita90(this);" value="" required>
                        <span class="icon is-small is-left">
                        <i class="fas fa-comments"></i>
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
