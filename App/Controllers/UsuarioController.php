<?php

namespace App\Controllers;

use App\Lib\Sessao;
use App\Models\DAO\UsuarioDAO;
use App\Models\Entidades\Usuario;

class UsuarioController extends Controller
{
    
    //para abrir a view de cadastro de Uusarios
    public function cadastro()
    {
        $this->render('/usuario/cadastro');

        // Sessao::limpaFormulario();
        // Sessao::limpaMensagem();
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

        Sessao::gravaFormulario($_POST);

        $usuarioDAO = new UsuarioDAO();

        /*
        if($usuarioDAO->verificaEmail($_POST['email'])){
            Sessao::gravaMensagem("Email existente");
            $this->redirect('/usuario/cadastro');
        }
*/

        if($usuarioDAO->salvar($Usuario)){
            $this->redirect('/usuario/sucesso');
        }else{
            Sessao::gravaMensagem("Erro ao gravar");
        }
    }
    
    public function sucesso()
    {
        if(Sessao::retornaValorFormulario('usuario-nome')) {
            $this->render('/usuario/sucesso');

            Sessao::limpaFormulario();
            Sessao::limpaMensagem();
        }else{
            $this->redirect('/');
        }
    }

    public function index()
    {
        $this->redirect('/usuario/cadastro');
    }

}