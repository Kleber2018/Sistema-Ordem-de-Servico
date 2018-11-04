<main class="column main">
    <nav class="breadcrumb is-small" aria-label="breadcrumbs">
        <ul>
            <li><a href="#">Administração</a></li>
            <li><a>Serviço</a></li>
            <li class="is-active"><a href="#" aria-current="page"><?php echo $serv->getOsCodigo(); ?></a></li>
        </ul>
        <br/>
    </nav>


    <div class="content">
            <?php if($Sessao::retornaMensagem()){ ?>
                <div class="alert alert-warning" role="alert"><?php echo $Sessao::retornaMensagem(); ?></div>
            <?php } ?>





        <label for="localizador-os-codigo" class="label" >Ordem de Servico <h3><?php echo $serv->getOsCodigo(); ?></h3></label>

        <form id="form_cadastro" action="http://<?php echo APP_HOST; ?>/apropriacao/servicoApropriacaoHH" method="POST">

                <fieldset disabled>
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
                        <label for="tipo-os" class="label">Tipo (nao está puchando)</label>
                        <div class="select">
                            <select name="os-tipo">
                                <option value="1">1 - CEG (Corretiva Emergêncial)</option>
                                <option value="2">2 - CNE (Corretiva não Emergêncial)</option>
                                <option value="3">3 - PNS (Preventiva)</option>
                                <option value="9">9 - MEM (Melhoria)</option>
                                <option value="6">6 - SIG (Serviço Interno)</option>
                            </select>
                        </div>
                    </div>


                    <div class="field">
                        <label for="data-ose" class="label">Data Prevista</label>
                        <div class="control has-icons-left">
                            <input type="text" class="input" name="os-data-prevista" placeholder="   /   /     " value="" required>
                            <span class="icon is-small is-left">
                                             <i class="fas fa-users"></i>
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
                                <i class="fas fa-map-signs"></i>
                            </span>
                        </div>
                    </div>
                </fieldset>
                </br>

            <!--Redireciona para ServicoController function servicoApropriacaoHH-->
                <div class="control">
                    <div class="field">
                        <button type="submit" class="button is-link" >informar realização e Apropriar Horas trabalhadas</button> Implementar: esse botão para pegar o codigo da ose que está sendo visualizada e aabre a tela servicoApropriacaoHH para add as horas trabalhadas
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
        <tr>
            <td>01/11/2018</td>
            <td>Kleber leandro</td>
            <td>13:30</td>
            <td>17:00</td>
            <td>HORA NORMAL</td>
            <td><a href="https://en.wikipedia.org/wiki/Leicester_City_F.C." title="Leicester City F.C.">Alterar</a></td>
            <td><a href="https://en.wikipedia.org/wiki/Leicester_City_F.C." title="Leicester City F.C.">Excluir</a></td>
        </tr>



        </tbody>
    </table>



</main>
</section>
