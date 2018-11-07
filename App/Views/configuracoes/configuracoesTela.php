<main class="column main">
    <nav class="breadcrumb is-small" aria-label="breadcrumbs">
        <ul>
        <li><a href="#">Administração</a></li>
            <li class="is-active"><a href="#" aria-current="page">Configurações</a></li>
        </ul>
        <br/>
    </nav>
    <div class="content">
    <form action="http://<?php echo APP_HOST; ?>/configuracoes" method="post" id="form_configuracoes">
    <label class="label">Selecione o driver do banco de dados</label>
        <div class="field has-addons">
            <div class="control">
                <div class="select">
                <select name="databaseDriver">
                    <?php
                        $driversDisponiveis = PDO::getAvailableDrivers();
                        foreach ($driversDisponiveis as $driver){
                            echo "<option value='${driver}'>${driver}</option>";
                        }
                    ?>
                </select>
                </div>
            </div>
            <div class="control">
                <button type="submit" class="button is-link">Selecionar</button>
            </div>
        </div>
        </form>
                        <p class="text">O driver que está sendo utilizado é: 
                        <?php 
                            echo DB_DRIVER;
                        ?>
                        </p>
    </div>
</main>
</section>
