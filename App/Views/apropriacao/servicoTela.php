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


        <div class="control">
            <div class="field">
                <button type="submit" class="button is-link" >Excluir</button> Implementar: esse botão para excluir a Ordem de Serviço
            </div>
        </div>



        <form id="form_cadastro" action="http://<?php echo APP_HOST; ?>/apropriacao/ServicoApropriacaoHH" method="POST">

                
                    <label for="os-codigo1" class="label">Ordem de Serviço: </label> o conteudo desse campo está sendo usado para o formulario de apropriação de horas
                    <div class="field is-grouped">
                        <div class="control has-icons-left is-expanded is-disabled">
                            <input type="text" class="input" name="os-codigo" placeholder="" value="<?php echo $serv->getOsCodigo(); ?>">
                            <span class="icon is-small is-left">
                                    <i class="fas fa-map-marker-alt"></i>
                                </span>
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
                    <button type="submit" class="button is-link" >Apropriar Horas Trabalhadas</button> Implementar: esse botão para pegar o codigo da ose que está sendo visualizada e aabre a tela servicoApropriacaoHH para add as horas trabalhadas
                </div>
            </div>
    </form>
    </div>
              


    <table class="table">
        <thead>
        <tr>
            <th><abbr title="Position">Data</abbr></th>
            <th><abbr title="Played">Funcionário</abbr></th>
            <th><abbr title="Won">Início</abbr></th>
            <th><abbr title="Drawn">Término</abbr></th>
            <th><abbr title="Lost">Tipo</abbr></th>
            <th><abbr title="Goals for"> </abbr></th>
            <th><abbr title="Goals against"> </abbr></th>
        </tr>
        </thead>

        <tbody>
        <tr>
            <td>01/11/2018</td>
            <td>Kleber leandro</td>
            <td>08:30</td>
            <td>12:00</td>
            <td>HORA NORMAL</td>
            <td><a href="https://en.wikipedia.org/wiki/Leicester_City_F.C." title="Leicester City F.C.">Alterar</a></td>
            <td><a href="https://en.wikipedia.org/wiki/Leicester_City_F.C." title="Leicester City F.C.">Excluir</a></td>
        </tr>
        <tr>
            <td>01/11/2018</td>
            <td>Felipe</td>
            <td>08:30</td>
            <td>12:00</td>
            <td>HORA NORMAL</td>
            <td><a href="https://en.wikipedia.org/wiki/Leicester_City_F.C." title="Leicester City F.C.">Alterar</a></td>
            <td><a href="https://en.wikipedia.org/wiki/Leicester_City_F.C." title="Leicester City F.C.">Excluir</a></td>
        </tr>

        </tbody>
    </table>

          
        

    <div class="control">
        <div class="field">
            <button type="submit" class="button is-link" >Informar Realização</button> Implementar: esse botão para mudar o status da Ordem de serviço para Executada
        </div>
    </div></br>
    <div class="control">
        <div class="field">
            <button type="submit" class="button is-link" >Informar não Realização</button> Implementar: esse botão para mudar o status da Ordem de serviço para não Executada
        </div>
    </div></br>





</main>
</section>
