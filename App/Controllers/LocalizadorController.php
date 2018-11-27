<?php

namespace App\Controllers;

// use App\Lib\Sessao;
use App\Models\DAO\LocalizadorDAO;
use App\Models\Entidades\Localizador;

class LocalizadorController extends Controller
{
    public function localizadorCadastro()
    {

        $this->render('/localizador/localizadorCadastro');

        //Sessao::limpaFormulario();
       // Sessao::limpaMensagem();
    }

    public function salvar()
    {
        $Localizador = new Localizador();
        $Localizador->setLocCodigo($_POST['loc-codigo1'].$_POST['loc-codigo2'].$_POST['loc-codigo3']);
        $Localizador->setLocTitulo($_POST['loc-titulo']);
        $Localizador->setLocEquipe($_POST['loc-equipe']);

        //Sessao::gravaFormulario($_POST);

        $localizadorDAO = new LocalizadorDAO();

         if($localizadorDAO->verificaCodIgual($Localizador->getLocCodigo())){
            $this->redirect('/localizador/existente');
        }else {
            if($localizadorDAO->salvar($Localizador)){
                $this->redirect('/localizador/sucesso');
            }else{
                //$this->redirect('/localizador/exitente');
                //Sessao::gravaMensagem("Erro ao gravar");
            }
        }
    }


    public function sucesso()
    {
        $this->render('/localizador/sucesso');
        
        // if(Sessao::retornaValorFormulario('loc-titulo')) {
        //     $this->render('/localizador/sucesso');

        //     Sessao::limpaFormulario();
        //     Sessao::limpaMensagem();
        // }else{
            
        //     $this->redirect('/');
        // }
    }


    public function existente()
    {
        $this->render('/localizador/existente');

        // if(Sessao::retornaValorFormulario('loc-titulo')) {
        //     $this->render('/localizador/existente');

        //     //Sessao::limpaFormulario();
        //     //Sessao::limpaMensagem();
        // }else{
            
        //     $this->redirect('/');
        // }
    }


    public function index()
    {
        $this->redirect('/localizador/localizadorCadastro');
    }

}