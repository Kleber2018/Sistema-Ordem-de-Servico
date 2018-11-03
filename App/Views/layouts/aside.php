<section class="main-content columns is-fullheight">
  
  <aside class="column is-2 is-narrow-mobile is-fullheight aside menu">
    
    <ul class="menu-list ">
    <p class="menu-label">Administração</p>

            <li><a href="#"><span class="icon is-small"><i class="fas fa-tachometer-alt"></i></span> Dashboard</a></li>
            <li><a><span class="icon is-small"><i class="fas fa-edit"></i></span> Cadastros</a>
              <ul>
                  <li><a>Equipamentos</a></li>
                  <li><a <?php if($viewVar['nameController'] == "LocalizadorController") { ?> class="is-active" <?php } ?> href="http://<?php echo APP_HOST; ?>/localizador/localizadorCadastro">Localizadores</a></li>
                  <li><a>Serviços</a></li>
                </ul>
            </li>
            <li><a href="tables.html"><span class="icon is-small"><i class="fa fa-table"></i></span> Relatórios</a></li>
            <li><a <?php if($viewVar['nameController'] == "UsuarioController") { ?> class="is-active" <?php } ?> href="http://<?php echo APP_HOST; ?>/usuario/cadastro"><i class="fa fa-cog"></i> Controle de usuários</a></li>
          </ul>
    </ul>
  </aside>

<!--   
<div class="wrapper">
    <div class="columns">
      <aside class="column is-2 aside">
        <nav class="menu">

          <ul class="menu-list">
              <p class="menu-label">
                    Administração
              </p>
            <li><a href="#"><span class="icon is-small"><i class="fas fa-tachometer-alt"></i></span> Dashboard</a></li>
            <li><a href="forms.html"><span class="icon is-small"><i class="fas fa-edit"></i></span> Cadastros</a>
              <ul>
                  <li><a>Equipamentos</a></li>
                  <li><a>Localizadores</a></li>
                  <li><a>Serviços</a></li>
                </ul>
            </li>
            <li><a href="tables.html"><span class="icon is-small"><i class="fa fa-table"></i></span> Relatórios</a></li>
            <li><a <?php if($viewVar['nameController'] == "UsuarioController") { ?> class="is-active" <?php } ?> href="http://<?php echo APP_HOST; ?>/usuario/cadastro"><i class="fa fa-cog"></i> Controle de usuários</a></li>
          </ul>
        </nav>
      </aside> -->