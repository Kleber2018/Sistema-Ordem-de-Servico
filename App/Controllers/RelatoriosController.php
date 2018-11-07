<?php

namespace App\Controllers;

use App\Lib\Sessao;

class RelatoriosController extends Controller
{
    public function index()
    {
        
       $this->render('/relatorios/relatoriosTela');

    }


}