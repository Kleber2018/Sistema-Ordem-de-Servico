<?php
namespace App\Controllers;

use App\Models\DAO\LocalizadorDAO;
use App\Models\Entidades\Localizador;

class LocalizadorController extends Controller
{
    public function localizadorCadastro()
    {
        $this->render('/localizador/localizadorCadastro');
    }

    public function salvar()
    {
        $Localizador = new Localizador();
        $Localizador->setLocCodigo($_POST['loc-codigo1'].$_POST['loc-codigo2'].$_POST['loc-codigo3']);
        $Localizador->setLocTitulo($_POST['loc-titulo']);
        $Localizador->setLocEquipe($_POST['loc-equipe']);

        $localizadorDAO = new LocalizadorDAO();

         if($localizadorDAO->verificaCodIgual($Localizador->getLocCodigo())){
            $this->redirect('/localizador/existente');
        }else {
            if($localizadorDAO->salvar($Localizador)){
                $this->redirect('/localizador/sucesso');
            }else{
                echo "Erro ao gravar";
            }
        }
    }


    public function sucesso()
    {
        $this->render('/localizador/sucesso');
    }

    public function existente()
    {
        $this->render('/localizador/existente');
    }


    public function index()
    {
        $this->redirect('/localizador/localizadorCadastro');
    }

}