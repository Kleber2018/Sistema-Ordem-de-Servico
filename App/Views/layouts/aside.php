<section class="columns is-fullheight">
  
  <aside class="column is-2 aside menu is-fullheight">
    
    <ul class="menu-list ">
        <p class="menu-label"><label data-tag="administracao"></p>
        <li class="menu-item"><a href="#"><span class="icon is-small"><i class="fas fa-tachometer-alt"></i></span><label data-tag="painel"></a></li>
        <li class="menu-item"><a <?php if($viewVar['nameController'] == "ApropriacaoController") { ?> class="is-active" <?php } ?> href="http://<?php echo APP_HOST; ?>/apropriacao/servicoBusca"><i class="fas fa-briefcase"></i> <label data-tag="servico"></label></a></li>

            <li><a><span class="icon is-small"><i class="fas fa-edit"></i></span> <label data-tag="cadastros"></label></a>
              <ul>
                  <!-- <li class="menu-item"><a>Equipamentos</a></li> -->
                  <li class="menu-item"><a <?php if($viewVar['nameController'] == "LocalizadorController") { ?> class="is-active" <?php } ?> href="http://<?php echo APP_HOST; ?>/localizador/localizadorCadastro"><label data-tag="localizadores"></label></a></li>
                  <li class="menu-item <?php if (!$_SESSION['admin']) echo "is-hidden"; ?>"><a <?php if($viewVar['nameController'] == "ServicoController") { ?> class="is-active" <?php } ?> href="http://<?php echo APP_HOST; ?>/servico/servicoCadastro"><label data-tag="tarefas"></label></a></li>
                </ul>
            </li>
            <li class="menu-item"><a <?php if($viewVar['nameController'] == "RelatoriosController") { ?> class="is-active" <?php } ?> href="http://<?php echo APP_HOST; ?>/relatorios"><i class="fa fa-table"></i></span> <label data-tag="relatorios"></label></a></li>
            <li class="menu-item <?php if (!$_SESSION['admin']) echo "is-hidden"; ?>"><a <?php if($viewVar['nameController'] == "UsuarioController") { ?> class="is-active" <?php } ?> href="http://<?php echo APP_HOST; ?>/usuario/cadastro"><i class="fas fa-users-cog"></i> <label data-tag="controle"></label></a></li>
            <li class="menu-item <?php if (!$_SESSION['admin']) echo "is-hidden"; ?>"><a <?php if($viewVar['nameController'] == "ConfiguracoesController") { ?> class="is-active" <?php } ?> href="http://<?php echo APP_HOST; ?>/configuracoes"><i class="fas fa-cog"></i></span> <label data-tag="configuracoes"></label></a></li>
          </ul>
    </ul>
  </aside>
