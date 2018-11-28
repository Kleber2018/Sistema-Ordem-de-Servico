<section class="columns is-fullheight">
  
  <aside class="column is-2 aside menu is-fullheight">
    <ul class="menu-list ">
        <p class="menu-label"><label data-tag="administracao"></p>
        <li class="menu-item"><a href="http://localhost/projeto-final/"><span class="icon is-small"><i class="fas fa-tachometer-alt"></i></span><span data-tag="painel"></span></a></li>
        <li class="menu-item"><a <?php if($viewVar['nameController'] == "ApropriacaoController") { ?> class="is-active" <?php } ?> href="http://<?php echo APP_HOST; ?>/apropriacao/servicoBusca"><i class="fas fa-briefcase"></i> <span data-tag="servico"></span></a></li>
            <li><a><span class="icon is-small"><i class="fas fa-edit"></i></span> <span data-tag="cadastros"></span></a>
              <ul>
                  <li class="menu-item"><a <?php if($viewVar['nameController'] == "LocalizadorController") { ?> class="is-active" <?php } ?> href="http://<?php echo APP_HOST; ?>/localizador/localizadorCadastro"><span data-tag="localizadores"></span></a></li>
                  <li class="menu-item <?php if (!$_SESSION['admin']) echo "is-hidden"; ?>"><a <?php if($viewVar['nameController'] == "ServicoController") { ?> class="is-active" <?php } ?> href="http://<?php echo APP_HOST; ?>/servico/servicoCadastro"><span data-tag="tarefas"></span></a></li>
                </ul>
            </li>
            <li class="menu-item"><a <?php if($viewVar['nameController'] == "RelatoriosController") { ?> class="is-active" <?php } ?> href="http://<?php echo APP_HOST; ?>/relatorios"><i class="fa fa-table"></i></span> <span data-tag="relatorios"></span></a></li>
            <li class="menu-item <?php if (!$_SESSION['admin']) echo "is-hidden"; ?>"><a <?php if($viewVar['nameController'] == "UsuarioController") { ?> class="is-active" <?php } ?> href="http://<?php echo APP_HOST; ?>/usuario/cadastro"><i class="fas fa-users-cog"></i> <span data-tag="controle"></span></a></li>
            <li class="menu-item <?php if (!$_SESSION['admin']) echo "is-hidden"; ?>"><a <?php if($viewVar['nameController'] == "ConfiguracoesController") { ?> class="is-active" <?php } ?> href="http://<?php echo APP_HOST; ?>/configuracoes"><i class="fas fa-cog"></i></span> <span data-tag="configuracoes"></span></a></li>
          </ul>
    </ul>
  </aside>
