<?php

namespace App\Controllers;

use App\Lib\Sessao;
use App\Models\DAO\ServicoDAO;
use App\Models\Entidades\Servico;

class ApropriacaoController extends Controller
{

    public function servicoBusca()
    {
        $this->render('/apropriacao/servicoBusca');

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
    }

    //Function é chamada pelo App.php com o codigo passados pela View servicoBusca.php
    public function servicoTela()
    {
        $servicoDAO = new ServicoDAO();
        $Servico = new Servico();
        //$Servico->setOsCodigo($_POST['os-codigo']);


        $Servico = $servicoDAO->buscaOrdemServico($_POST['os-codigo']);//envia para o servicoDAO o codigo informado na tela servicoBusca e retorna um objeto Servico


        //$Servico->getOsCodigo();
        //self::setViewParam('Servico',$Servico);

        $this->setServ($Servico);

        $this->render('/apropriacao/servicoTela');

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
    }

    //Function é chamada pelo App.php com os parametros passados pela View servicoApropriacaoHH.php
    public function servicoApropriacaoHH()
    {
        $this->render('/apropriacao/servicoApropriacaoHH');

    }

    public function salvar()
    {
        $servicoDAO = new ServicoDAO();
        $Servico = new Servico();

        //Não entendi por que $_POST['os-localizador1'].$_POST['os-localizador2'].$_POST['os-localizador3']
        //$Servico->setOsLocalizacao($_POST['os-localizador1'].$_POST['os-localizador2'].$_POST['os-localizador3']); 

        $Servico->setOsLocalizacao($_POST['os-localizador1']);
        $Servico->setOsResponsavel($_POST['os-responsavel']);
        $Servico->setOsTipo($_POST['os-tipo']);
        $Servico->setOsTitulo($_POST['os-titulo']);
        $Servico->setOsObs($_POST['os-obs']);

        Sessao::gravaFormulario($_POST);

            if($servicoDAO->salvar($Servico)){
                $this->redirect('/servico/sucesso');
            }else{
                Sessao::gravaMensagem("Erro ao gravar");
            }
    }

    //function é chamada pelo App que por sua vez é chamada pelo form servicoTela para abrir novamente o servicoTela com os campos populados do View servicoTela
    public function buscarServico(){

        echo 'Precisa implementar um jeito de o codigo que for informado popular a a View servicoTela';
    }

    public function sucesso()
    {
        if(Sessao::retornaValorFormulario('os-titulo')) {
            $this->render('/servico/sucesso');

            Sessao::limpaFormulario();
            Sessao::limpaMensagem();
        }else{
            
            $this->redirect('/');
        }
    }

    public function index()
    {
        $this->redirect('/servico/servicoCadastro');
    }

}