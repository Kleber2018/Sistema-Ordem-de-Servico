<?php

namespace App\Controllers;

use App\Lib\Sessao;
use App\Models\DAO\ServicoDAO;
use App\Models\Entidades\Servico;

class ApropriacaoController extends Controller
{
    private $buscado;//utilizado para mostrar na view servicoInexistente que o codigo informado não existe

    //monta a página
    public function render($view)
    {
        if ($_SESSION['lembrar'] != "on"){
            $segundosDeslogar = 5; // Deslogar se a última requisição for maior que X segundos
            $this->checaAutenticacao($segundosDeslogar);
        }
        //$viewVar = $this->getViewVar();
        $Sessao  = Sessao::class;

       $serv = $this->getVar(); //precisa estar aki dentro para popular os compos dentro da view
      //  print_r ($serv);
        
        require_once PATH . '/App/Views/layouts/header.php';
        require_once PATH . '/App/Views/layouts/menu.php';
        require_once PATH . '/App/Views/layouts/aside.php';
        require_once PATH . '/App/Views/' . $view . '.php';
        require_once PATH . '/App/Views/layouts/footer.php';
    }



        // chamado pelo menu para abrir a view servicoBusca
    public function servicoBusca()
    {
        $this->render('/apropriacao/servicoBusca');

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
    }

    //Function é chamada pelo App.php com o codigo passados pela View servicoBusca.php
    public function servicoTela()
    {
        $servicoDAO = new ServicoDAO();
        //$Servico = new Servico();

        $Servico = $servicoDAO->buscaOrdemServico($_POST['os-codigo']);//envia para o servicoDAO o codigo informado na tela servicoBusca e retorna um objeto Servico
        $apropriacoes = $servicoDAO->listarApropriacao($_POST['os-codigo']);
        //self::setViewParam('Servico',$Servico);

        //Verifica se o cod informado na view servicoBusca existe
        if($Servico->getOsCodigo()){
            $this->setVar($Servico);
            $this->setVar2($apropriacoes);

            $this->render('/apropriacao/servicoTela');
        } else {
            $this->setBuscado($_POST['os-codigo']);

            $this->render('/apropriacao/servicoInexistente');
        }

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
    }



    //Function é chamada pelo App.php com os parametros passados pela View servicoApropriacaoHH.php
    public function ServicoApropriacaoHH()
    {
        var_dump($_POST['os-codigo']);
        $this->setVar($_POST['os-codigo']);
        
        $this->render('/apropriacao/servicoApropriacaoHH');
    }


    //para salvar a apropriacao de horas (AINDA NÃO IMPLEMENTADO)
    public function salvarApropriacaoHH()
    {
        $servicoDAO = new ServicoDAO();
        $Servico = new Servico();

        $Servico->setOsCodigo($_POST['os-codigo']);
        $Servico->setOsResponsavel($_POST['os-responsavel']);
        $Servico->setOsaData($_POST['data-apropriacao']);
        $Servico->setOsaHoraInicial($_POST['hora-inicial']);
        $Servico->setOsaHoraFinal($_POST['hora-final']);

        $Servico->setOsaTipoApropriacao($_POST['tipo-os']);


       // $input_date=$_POST['data-ose-prevista'];
       // $data=date("Y-m-d H:i:s",strtotime($input_date));


        //Sessao::gravaFormulario($_POST);//???

            if($servicoDAO->salvarApropriacao($Servico)){
                $this->redirect('/servico/sucesso');
            }else{
                Sessao::gravaMensagem("Erro ao gravar");
            }
    }




    //abre uma view informando que a apropriacao foi adcionada com sucesso
    public function sucesso()
    {
        if(Sessao::retornaValorFormulario('os-titulo')) {
            $this->render('/servico/sucesso');

            Sessao::limpaFormulario();
            Sessao::limpaMensagem();
        }else{
            $this->redirect('/');
        }
    }

    public function index()
    {
        $this->redirect('/apropriação/servicoBusca');
    }

    //utilizado dentro da View servicoTela
    // public function getServ()
    // {
    //     return $this->serv;
    // }
    // public function setServ(Servico $serv)
    // {
    //     $this->serv = $serv;
    // }

  //utilizado pela view servicoInexistente
    public function getBuscado()
    {
        return $this->buscado;
    }
    public function setBuscado($buscado)
    {
        $this->buscado = $buscado;
    }


}