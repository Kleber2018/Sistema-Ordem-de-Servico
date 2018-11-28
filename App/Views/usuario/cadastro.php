<main class="column main">
    <nav class="breadcrumb is-small" aria-label="breadcrumbs">
        <ul>
            <li><a href="#">Administração</a></li>
            <li class="is-active"><a href="#" aria-current="page">Controle de usuários</a></li>
        </ul>
        <br/>
    </nav>
    <div class="content">
            <form action="http://<?php echo APP_HOST; ?>/usuario/salvar" method="post" id="form_cadastro">
                <label for="usuario-codigo" class="label" >Código do Usuário</label>
                <div class="field is-grouped">
                    <div class="control has-icons-left">
                        <input type="text" class="input" name="usuario-codigo" placeholder="Código" onkeydown="limita12(this);" onkeyup="limita12(this);" value="" required>
                        <span class="icon is-small is-left">
                            <i class="fas fa-id-card-alt"></i>
                        </span>
                    </div>
                    <!-- <div class="control"> -->
                    <div class="field">
                    <label class="checkbox">
                        <input type="checkbox" name="admin">
                             Administrador
                        </label>
                    </div>
                <!-- </div> -->
                </div>
                <div class="field">
                    <label for="usuario-nome" class="label">Nome do Usuário</label>
                    <div class="control has-icons-left">
                        <input type="text" class="input"  name="usuario-nome" placeholder="Nome" onkeydown="limita12(this);" onkeyup="limita12(this);" value="" required>
                        <span class="icon is-small is-left">
                            <i class="fas fa-user"></i>
                        </span>
                    </div>
                </div>
                <div class="field">
                    <label for="email" class="label">Senha do Usuário</label>
                    <div class="control has-icons-left">
                        <input type="password" class="input" name="usuario-senha" placeholder="Senha" onkeydown="limita12(this);" onkeyup="limita12(this);" value="" required>
                        <span class="icon is-small is-left">
                            <i class="fas fas fa-lock"></i>
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