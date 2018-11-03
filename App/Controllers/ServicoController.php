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

        $Servico = new Servico();
        $Servico->setOsLocalizacao('os-localizador');
        $Servico->setOsResponsavel('os-responsavel');
       // $Servico->setOsTipo('os-tipo');
        $Servico->setOsTitulo('os-titulo');
        $Servico->setOsObs('os-obs');


        Sessao::gravaFormulario($_POST);

        $servicoDAO = new ServicoDAO();

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