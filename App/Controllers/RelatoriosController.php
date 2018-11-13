<?php

namespace App\Controllers;

use App\Lib\Sessao;
use App\Models\DAO\ServicoDAO;
use App\Models\Entidades\Servico;
use App\Models\Entidades\Dados;

class RelatoriosController extends Controller
{
    public function index()
    {
        //para listar as OSEs Pendentes
        $servicoDAO = new ServicoDAO();

        $dadosGrafico =  $servicoDAO->retornaDadosGrafProdut();
        //$apropriacoes = $servicoDAO->listarApropriacao($_POST['os-codigo']);
        $Servicos = $servicoDAO->listaServicosExecutados();

        $this->setVar($Servicos);
        $this->setVar2($dadosGrafico);





       $this->render('/relatorios/relatoriosTela');

    }


}