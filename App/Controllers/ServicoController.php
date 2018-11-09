<?php

namespace App\Controllers;

use App\Lib\Sessao;
use App\Models\DAO\ServicoDAO;
use App\Models\DAO\LocalizadorDAO;
use App\Models\Entidades\Servico;
use App\Models\Entidades\Localizador;


class ServicoController extends Controller
{
    //Function é chamada pelo App.php com os parametros passados pela View servicoCadastro.php
    public function servicoCadastro()
    {        
        $localizadorDAO = new LocalizadorDAO();

        //print_r ($localizadorDAO->listar());

        //self::setViewParam('listaLocalizadores',$localizadorDAO->listar());

        $localizadores = $localizadorDAO->listar();
        $this->setVar($localizadores);


        $this->render('/servico/servicoCadastro');//através do render do Controller é montado as Views

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
    }

    //Function é chamada pelo App.php com os parametros passados pela View servicoTela.php
    public function chamaViewServicoTela()
    {
        $this->render('/servico/servicoTela');

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
    }

    //Function é chamada pelo App.php com os parametros passados pela View servicoApropriacaoHH.php
    public function chamaViewApropriacaoHH()
    {
        $this->render('/servico/servicoApropriacaoHH');

    }

    public function salvar()
    {
        $servicoDAO = new ServicoDAO();
        $Servico = new Servico();

        //Conversão do formato de data - HTML para MySQL
        $input_date=$_POST['data-ose-prevista'];
        $data=date("Y-m-d H:i:s",strtotime($input_date));

        $Servico->setOsLocalizacao($_POST['os-localizador1']);
        $Servico->setOsResponsavel($_POST['os-responsavel']);
        $Servico->setOsTipo($_POST['os-tipo']);
        $Servico->setOsTitulo($_POST['os-titulo']);
        $Servico->setOsObs($_POST['os-obs']);
        $Servico->setDataPrevista($data);
        
        Sessao::gravaFormulario($_POST);

            if($servicoDAO->salvar($Servico)){
                $this->redirect('/servico/sucesso');
            }else{
                Sessao::gravaMensagem("Erro ao gravar");
            }
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
        $localizadorDAO = new localizadorDAO();
        self::setViewParam('listaLocalizadores',$localizadorDAO->listar());

        $this->redirect('/servico/servicoCadastro');
    }

}