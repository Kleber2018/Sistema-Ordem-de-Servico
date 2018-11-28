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
            <form action="http://<?php echo APP_HOST; ?>/localizador/salvar" method="post" id="form_cadastro">
                <label for="localizador-codigo" class="label" >Código do localizador</label>
                <div class="field is-grouped">
                    <div class="control has-icons-left is-expanded">
                        <input type="text" class="input" name="loc-codigo1" placeholder="Ex: QD(PONTA GROSSA), OQ(PALMEIRA)"  onkeydown="limita12(this);" onkeyup="limita12(this);" value="" required>
                        <span class="icon is-small is-left">
                                <i class="fas fa-map-marker-alt"></i>
                            </span>
                    </div>                   
                </div>

                <div class="field">
                    <label for="localizacao-titulo" class="label">Título do localizador</label>
                    <div class="control has-icons-left">
                        <input type="text" class="input"  name="loc-titulo" placeholder="Título" onkeydown="limita30(this);" onkeyup="limita30(this);" value="" required>
                        <span class="icon is-small is-left">
                            <i class="fas fa-map-signs"></i>
                        </span>
                    </div>
                </div>

                <div class="field">
                    <label for="equipe" class="label">Equipe Responsável Pelo Localizador</label>
                    <div class="control has-icons-left">
                        <input type="text" class="input" name="loc-equipe" placeholder="Equipe" onkeydown="limita12(this);" onkeyup="limita12(this);" value="" required>
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