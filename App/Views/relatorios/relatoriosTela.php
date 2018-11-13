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



<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Tipo', 'Quantidade'],
          ['PNS - Preventiva Não Sistematizada',     6],
          ['CEG - Corretiva Emergêncial',      2],
          ['CNE - Corretiva Não Emergência',  2],
          ['SIG - Serviços Internos Gerais', 8],
		  ['MEM - Melhorias Eletromecãnicas', 2]
        ]);

	
        var options = {
          title: 'Produtividade Geral dos Serviços'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart" style="width: 800px; height: 500px;"></div>
  </body>
</html>





<table><tbody>
<?php

              //var_dump($this->getVar2());
              
              print_r($this->getVar2());

              
              
              echo '</br>';
                    foreach ($this->getVar2() as $dado) {

                        var_dump($dado);
                        echo "<tr>";
                        echo "<td>".$dado->os_ceg."</td>";
                        echo "<td>".$dado->getOscne()."</td>";
                        echo "<td>".$dado->getOspns()."</td>";
                        echo "<td>".$dado->getOssig()."</td>";
                        echo "<td>".$dado->getOsmem()."</td>";
                        echo "</tr>";
                    }
                    ?>

</tbody></table>

        






</main>
</section>
