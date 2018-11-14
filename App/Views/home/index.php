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
  <?php     $d = $this->getVar2();  ?>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Tipo', 'Quantidade'],
          ['PNS - Preventiva Não Sistematizada',     <?php echo $d['pns'];?>],
          ['CEG - Corretiva Emergêncial',      <?php echo $d['ceg'];?>],
          ['CNE - Corretiva Não Emergência',  <?php echo $d['cne'];?>],
          ['SIG - Serviços Internos Gerais', <?php echo $d['sig'];?>],
		  ['MEM - Melhorias Eletromecãnicas', <?php echo $d['mem'];?>]
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




</main>
</section>
