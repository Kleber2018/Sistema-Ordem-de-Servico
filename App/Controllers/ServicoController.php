<?php

namespace App\Controllers;

use App\Lib\Sessao;
use App\Models\DAO\ServicoDAO;
use App\Models\Entidades\Servico;

class ServicoController extends Controller
{
    //Para abrir a view usuarioCadastro
    // Utiliza a render do Controller para montar a página
    public function servicoCadastro()
    {
        $this->render('/servico/servicoCadastro');

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
    }

    public function salvar()
    {
        $servicoDAO = new ServicoDAO();
        $Servico = new Servico();


        $Servico->setOsLocalizacao($_POST['os-localizador1'].$_POST['os-localizador2'].$_POST['os-localizador3']);
        $Servico->setOsResponsavel($_POST['os-responsavel']);
        //var_dump($_POST['os-localizador1']);
       // $Servico->setOsTipo($_POST['os-tipo']);
        $Servico->setOsTitulo($_POST['os-titulo']);
        $Servico->setOsObs($_POST['os-obs']);

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
        $this->redirect('/servico/servicoCadastro');
    }

}