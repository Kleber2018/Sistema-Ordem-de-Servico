<main class="column main" xmlns="http://www.w3.org/1999/html">
    <nav class="breadcrumb is-small" aria-label="breadcrumbs">
        <ul>
            <li><a href="#">Administração</a></li>
            <li><a>Serviço</a></li>
            <li class="is-active"><a href="#" aria-current="page"><?php echo $serv->getOsCodigo(); ?></a></li>
        </ul>
        <br/>
    </nav>


    <div class="content">
            <!--< ?php if($Sessao::retornaMensagem()){ ?>
                <div class="alert alert-warning" role="alert">< ?php echo $Sessao::retornaMensagem(); ?></div>
            < ?php } ?> -->




        <label for="localizador-os-codigo" class="label" >Ordem de Servico: <?php echo $serv->getOsCodigo(); ?></label>
        <div class="field is-grouped">
            <div class="control">
                <form id="form_cadastro" action="http://<?php echo APP_HOST; ?>/servico/excluirServico" method="POST">
                    <div>
                        <div class="control is-expanded is-disabled">
                            <input type="hidden" class="input" name="os-codigo" placeholder="" value="<?php echo $serv->getOsCodigo(); ?>">
                        </div>
                    </div>
                    </br>            
                    <div class="control">
                        <div class="field">
                            <button type="submit" class="button is-link <?php if (!$_SESSION['admin']) echo "is-hidden"; ?>" >Excluir</button>
                        </div>
                    </div>
                </form>  
            </div>          
            <div class="control">
                <form id="form_cadastro" action="http://<?php echo APP_HOST; ?>/apropriacao/informarNaoRealizacao" method="POST">
                            <div>
                                <div class="control is-expanded is-disabled">
                                    <input type="hidden" class="input" name="os-codigo" placeholder="" value="<?php echo $serv->getOsCodigo(); ?>">
                                </div>
                            </div>                  
                        </br>
                    <!--Redireciona para ServicoController function servicoApropriacaoHH-->
                    <div class="control">
                        <div class="field">
                            <button type="submit" class="button is-link <?php if ($serv->getOsStatus() == 'NÃO EXECUTADO') echo "is-hidden"; ?>" >Informar não Realização</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="control">
                <form id="form_cadastro" action="http://<?php echo APP_HOST; ?>/apropriacao/informarRealizacao" method="POST">             
                            <div>
                                <div class="control is-expanded is-disabled">
                                    <input type="hidden" class="input" name="os-codigo" placeholder="" value="<?php echo $serv->getOsCodigo(); ?>">
                                </div>
                            </div>                  
                        </br>
                    <!--Redireciona para ServicoController function servicoApropriacaoHH-->
                    <div class="control">
                        <div class="field">
                    <button type="submit" class="button is-link <?php if ($serv->getOsStatus() == 'EXECUTADO') echo "is-hidden"; ?>" >Informar Realização</button>
                        </div>
                    </div>
                </form>
            </div>
    
    </div>
	

        <form id="form_cadastro" action="http://<?php echo APP_HOST; ?>/apropriacao/ServicoApropriacaoHH" method="POST">

                
                      <div class="field is-grouped">
                        <div class="control is-expanded is-disabled">
                            <input type="hidden" class="input" name="os-codigo" placeholder="" value="<?php echo $serv->getOsCodigo(); ?>">
                        </div>
                    </div>

                    <fieldset disabled>

                    <label for="localizador-os-codigo" class="label" >Status do Serviço</label>
                    <div class="field is-grouped">
                        <div class="control has-icons-left is-expanded is-disabled">
                            <input type="text" class="input" name="os-localizador1" placeholder="Ex: PENDENTE, EXECUTADA" value="<?php echo $serv->getOsStatus(); ?>" required>
                            <span class="icon is-small is-left">
                                <i class="fas fa-angle-double-right"></i>
                                </span>
                        </div>
                    </div>



                    <label for="localizador-os-codigo" class="label" >Código do localizador</label>
                    <div class="field is-grouped">
                        <div class="control has-icons-left is-expanded is-disabled">
                            <input type="text" class="input" name="os-localizador1" placeholder="Ex: QDJ1(PONTA GROSSA - ETA)" value="<?php echo $serv->getOsLocalizacao(); ?>" required>
                            <span class="icon is-small is-left">
                                    <i class="fas fa-map-marker-alt"></i>
                                </span>
                        </div>
                    </div>


                    <div class="field">
                        <label for="responsavel-ose" class="label">Responsável</label>
                        <div class="control has-icons-left">
                            <input type="text" class="input" name="os-responsavel" placeholder="Responsável" value="<?php echo $serv->getOsResponsavel(); ?>" required>
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
                                <option><?php echo $serv->getOsTipo(); ?></option>
                            </select>
                        </div>
        </div>
                    </div>


                    <div class="field">
                    <label for="data-ose-prevista" class="label">Data Prevista</label>
                        <div class="control has-icons-left">
                            <input name="data-ose-prevista" type="datetime-local" class="input" value="<?php echo $serv->getDataPrevista(); ?>">
                                                        <span class="icon is-small is-left">
                                <i class="fas fa-clock"></i>
                            </span>
                        </div>
                    </div>


                    <div class="field">
                        <label for="titulo-os" class="label">Título da ordem de Serviço</label>
                        <div class="control has-icons-left">
                            <input type="text" class="input"  name="os-titulo" placeholder="Título" value="<?php echo $serv->getOsTitulo(); ?>" required>
                            <span class="icon is-small is-left">
                                <i class="fas fa-map-signs"></i>
                            </span>
                        </div>
                    </div>

                    <div class="field">
                        <label for="obs-os" class="label">Observação</label>
                        <div class="control has-icons-left">
                            <input type="text" class="input"  name="os-obs" placeholder="Observação" value="<?php echo $serv->getOsObs(); ?>" required>
                            <span class="icon is-small is-left">
                                <i class="fas fa-comments"></i>
                            </span>
                        </div>
                    </div>
                    
                </fieldset>
                </br>
            <!--Redireciona para ServicoController function servicoApropriacaoHH-->
            <div class="control">
                <div class="field">
                    <button type="submit" class="button is-link" >Apropriar Horas Trabalhadas</button>
                </div>
            </div>
    </form>
    </div>
              



<?php if($this->getVar2()):?><!--PARA OCULTAR A TABELA CASO NÃO TENHA APROPRIAÇÃO DE HORAS-->
    <table class="table">
        <thead>
        <tr>
            <th><abbr title="Position">Data da Apropriação</abbr></th>
            <th><abbr title="Position">Hora Inicial</abbr></th>
            <th><abbr title="Position">Hora Final</abbr></th>
            <th><abbr title="Position">Tipo de Apropriação</abbr></th>
            <th><abbr title="Position">Executante</abbr></th>
        </tr>
        </thead>

        <tbody>         
                <?php
                    foreach ($this->getVar2() as $apropriacoes) {
                        echo "<tr>";
                        echo "<td>".$apropriacoes->getOsaData()."</td>";
                        echo "<td>".$apropriacoes->getOsaHoraInicial()."</td>";
                        echo "<td>".$apropriacoes->getOsaHoraFinal()."</td>";
                        echo "<td>".$apropriacoes->getOsaTipoApropriacao()."</td>";
                        echo "<td>".$apropriacoes->getOsaFuncionario()."</td>";
                        ?>
                <td><a href="http://<?php echo APP_HOST; ?>/apropriacao/exclusaoApropriacao/<?php echo $apropriacoes->getId(); ?>" class="btn btn-danger btn-sm">Excluir</a></td>
                        <?php

                        echo "</tr>";
                    }
                    ?>
        </tbody>
    </table>
<?php endif ?>









	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	



</main>
</section>
