<main class="column main">
    <nav class="breadcrumb is-small" aria-label="breadcrumbs">
        <ul>
            <li class="is-active"><a href="#"></a></li>
        </ul>
    </nav>
    <div class="content">
            <h1>Tela Inicial do software de Manutenção Eletromecânica</h1>
    </div>






<?php if($this->getVar()):?><!--PARA OCULTAR A TABELA CASO NÃO TENHA ORDENS DE SERVIÇO-->
    <table class="table">
        <thead>
        <tr>
            <th>Código</th>
            <th>Título</th>
            <th>Localização</th>
            <th>Responsável</th>
            <th>Tipo</th>
            <th>Observação</th>
            <th>Status</th>
            <th>Data</th>
        </tr>
        </thead>

        <tbody>         
                <?php
                    foreach ($this->getVar() as $servico) {
                        echo "<tr>";
                        echo "<td>".$servico->getOsCodigo()."</td>";
                        echo "<td>".$servico->getOsTitulo()."</td>";
                        echo "<td>".$servico->getOsLocalizacao()."</td>";
                        echo "<td>".$servico->getOsResponsavel()."</td>";
                        echo "<td>".$servico->getOsTipo()."</td>";
                        echo "<td>".$servico->getOsObs()."</td>";
                        echo "<td>".$servico->getOsStatus()."</td>";
                        echo "<td>".$servico->getOsaData()."</td>";
                        echo "</tr>";
                    }
                    ?>
        </tbody>
    </table>
<?php else: ?>

    <div class="content">
        </br>
        <h2>Nenhuma Ordem de Serviço Pendente</h2>
    </div>


<?php endif; ?>
</main>
</section>
