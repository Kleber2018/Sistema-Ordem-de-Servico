<?php

namespace App\Controllers;

class HomeController extends Controller
{
    public function index()
    {
       if ($_SESSION['idioma'] != 'en')  $_SESSION['idioma'] = 'pt-br';

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
        $_SESSION['idioma'] = 'pt-br';
        $this->index();
    }
}