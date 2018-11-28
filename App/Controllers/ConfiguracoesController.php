<?php

namespace App\Controllers;

class ConfiguracoesController extends Controller
{
    public function index()
    {
        
       $this->render('/configuracoes/configuracoesTela');

    }
}