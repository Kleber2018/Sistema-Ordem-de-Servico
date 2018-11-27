<?php

namespace App\Controllers;

// use App\Lib\Sessao;
use App\Models\DAO\ApropriacaoDAO;
use App\Models\DAO\ServicoDAO;
use App\Models\Entidades\Servico;

class ApropriacaoController extends Controller
{
    private $buscado;//utilizado para mostrar na view servicoInexistente que o codigo informado não existe

    //monta a página
    public function render($view)
    {
        if ($_SESSION['lembrar'] != "on"){
            $segundosDeslogar = 10; // Deslogar se a última requisição for maior que X segundos
            $this->checaAutenticacao($segundosDeslogar);
        }
 
        //$Sessao  = Sessao::class;
       $serv = $this->getVar(); //precisa estar aki dentro para popular os compos dentro da view
      
        
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
    }

    //Function é chamada pelo App.php com o codigo passados pela View servicoBusca.php
    public function servicoTela($cod = null)
    {
        $servicoDAO = new ServicoDAO();
        //para separar entrada Via POST e via function
        if(isset($cod)){
            $Servico = $servicoDAO->buscaOrdemServico($cod);//envia para o servicoDAO o codigo informado na tela servicoBusca e retorna um objeto Servico
            $apropriacoes = $servicoDAO->listarApropriacao($cod);
        }else{
            $Servico = $servicoDAO->buscaOrdemServico($_POST['os-codigo']);//envia para o servicoDAO o codigo informado na tela servicoBusca e retorna um objeto Servico
            $apropriacoes = $servicoDAO->listarApropriacao($_POST['os-codigo']);
        }
       
        //Verifica se o cod informado na view servicoBusca existe
        if($Servico->getOsCodigo()){
            $this->setVar($Servico);
            $this->setVar2($apropriacoes);

            $this->render('/apropriacao/servicoTela');
        } else {
            $this->setBuscado($_POST['os-codigo']);

            $this->render('/apropriacao/servicoInexistente');
        }

        // Sessao::limpaFormulario();
        // Sessao::limpaMensagem();
    }

    //Utilizado pela função ServicoApropriacaoHH (logo abaixo) depois que a apropriação foi salva, para abrir a tela da Ordem de Serviço
    public function ApropriacaoSucesso($cod)
    {
        $servicoDAO = new ServicoDAO();
        $Servico = $servicoDAO->buscaOrdemServico($cod);//envia para o servicoDAO o codigo informado na tela servicoBusca e retorna um objeto Servico
        $apropriacoes = $servicoDAO->listarApropriacao($cod);

        //Verifica se o cod informado na view servicoBusca existe
        if($Servico->getOsCodigo()){
            $this->setVar($Servico);
            $this->setVar2($apropriacoes);

            $this->render('/apropriacao/servicoTela');
        } else {
            $this->setBuscado($cod);

            $this->render('/apropriacao/servicoInexistente');
        }

    }

    //Function é chamada pelo App.php com os parametros passados pela View servicoApropriacaoHH.php
    public function ServicoApropriacaoHH()
    {
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

            if($servicoDAO->salvarApropriacao($Servico)){
                $this->ApropriacaoSucesso($_POST['os-codigo']);//para abrir a view da Ordem de Serviço

                //$this->redirect('/servico/sucesso');
            }else{
                echo 'erro ao gravar';
                //Sessao::gravaMensagem("Erro ao gravar");
            }
    }
    

    //utilizado pela View servicoTela para alterar o Status da Ordem de Servico para Realizada
    public function informarRealizacao()
    {
        $servicoDAO = new ServicoDAO();
        $Servico = new Servico();

        $Servico->setOsCodigo($_POST['os-codigo']);
        $Servico->setOsStatus('EXECUTADO');

            if($servicoDAO->update(
			'SMIOS',"OS_STATUS = :OS_STATUS",[':OS_STATUS'=>$Servico->getOsStatus(), ':OS_CODIGO'=>$Servico->getOsCodigo()],"OS_CODIGO = :OS_CODIGO"
			)
			){
                $this->servicoTela($Servico->getOsCodigo());//para retornar na tela de serviço
               
            }else{
                echo 'erro ao gravar';
                //Sessao::gravaMensagem("Erro ao gravar");
            }
    }

	//utilizado pela View servicoTela para alterar o Status da Ordem de Servico para Não Realizada
    public function informarNaoRealizacao()
    {
        $servicoDAO = new ServicoDAO();
        $Servico = new Servico();

        $Servico->setOsCodigo($_POST['os-codigo']);
        $Servico->setOsStatus('NÃO EXECUTADO');

            if($servicoDAO->update(
			'SMIOS',"OS_STATUS = :OS_STATUS",[':OS_STATUS'=>$Servico->getOsStatus(), ':OS_CODIGO'=>$Servico->getOsCodigo()],"OS_CODIGO = :OS_CODIGO"
			)
			){
                $this->servicoTela($Servico->getOsCodigo());//para retornar a tela do serviço
            }else{
                echo 'erro ao gravar';
                //Sessao::gravaMensagem("Erro ao gravar");
            }
    }


    //Utilizado pela view ServicoTela para excluir uma apropriação de horas
    public function exclusaoApropriacao($cod){

        $apropriacaoDAO = new ApropriacaoDAO();

        if(!$apropriacaoDAO->excluir($cod[0])){
            //Sessao::gravaMensagem("Produto inexistente");
            $this->redirect('/');
        }

        //Sessao::gravaMensagem("Apropriação excluido com sucesso!");

       $this->redirect('/');
    }
	
    //abre uma view informando que a apropriacao foi adcionada com sucesso
    public function sucesso()
    {
        //if(Sessao::retornaValorFormulario('os-titulo')) {
            $this->render('/servico/sucesso');

            //Sessao::limpaFormulario();
           // Sessao::limpaMensagem();
        // }else{
        //     $this->redirect('/');
        // }
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
