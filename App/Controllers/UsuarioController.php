<?php

namespace App\Controllers;

use App\Models\DAO\UsuarioDAO;
use App\Models\Entidades\Usuario;

class UsuarioController extends Controller
{
    //para abrir a view de cadastro de Uusarios
    public function cadastro()
    {
        $this->render('/usuario/cadastro');
    }

    //utilizado pela view usuario/cadastro para salvar o novo usuario
    public function salvar()
    {
        $Usuario = new Usuario();
        $Usuario->setFnCodigo($_POST['usuario-codigo']);
        $Usuario->setFnNome($_POST['usuario-nome']);
        $Usuario->setFnSenha($_POST['usuario-senha']);

        if (($_POST['admin']) == 'on') {
            $Usuario->setAdmin(1);
        } else {
            $Usuario->setAdmin(0);
        }

        $usuarioDAO = new UsuarioDAO();

        if($usuarioDAO->salvar($Usuario)){
            $this->redirect('/usuario/sucesso');
        }else{
            echo 'Erro ao gravar';
        }
    }
    
    public function sucesso()
    {
        $this->render('/usuario/sucesso');
    }

    public function index()
    {
        $this->redirect('/usuario/cadastro');
    }

}