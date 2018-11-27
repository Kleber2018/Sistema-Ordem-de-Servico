<?php

namespace App\Controllers;

// use App\Lib\Sessao;

class ConfiguracoesController extends Controller
{
    public function index()
    {
        
       $this->render('/configuracoes/configuracoesTela');

    }

    // public function configuracoesTela()
    // {
    //     $this->render('/configuracoes/configuracoesTela');

    //     Sessao::limpaFormulario();
    //     Sessao::limpaMensagem();
    // }

}