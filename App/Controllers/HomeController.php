<?php

namespace App\Controllers;

use App\Models\DAO\ServicoDAO;
use App\Models\Entidades\Servico;


class HomeController extends Controller
{
    public function index()
    {
       if ($_SESSION['idioma'] != 'en')  $_SESSION['idioma'] = 'ptbr';



       //para listar as OSEs Pendentes
        $servicoDAO = new ServicoDAO();
        //$apropriacoes = $servicoDAO->listarApropriacao($_POST['os-codigo']);
        $Servicos = $servicoDAO->listaServicosPendentes();

        $this->setVar($Servicos);

       $this->render('home/index');
    }

    public function en()
    {
        unset ($_SESSION['idioma']);
        $_SESSION['idioma'] = 'en';
        $this->index();
    }

    public function ptbr()
    {
        unset ($_SESSION['idioma']);
        $_SESSION['idioma'] = 'ptbr';
        $this->index();
    }

    public function altoContraste()
    {
        if ($_SESSION['altocontraste'] != '-altocontraste')  $_SESSION['altocontraste'] = '-altocontraste';
        else $_SESSION['altocontraste'] = '';
        $this->index();
    }

}