<?php
namespace App\Controllers;

// use App\Lib\Sessao;
use App\Models\DAO\ServicoDAO;
use App\Models\DAO\LocalizadorDAO;
use App\Models\Entidades\Servico;
use App\Models\Entidades\Localizador;


class ServicoController extends Controller
{
    //Function é chamada pelo App.php com os parametros passados pela View servicoCadastro.php
    public function servicoCadastro()
    {        
        $localizadorDAO = new LocalizadorDAO();

        //print_r ($localizadorDAO->listar());

        //self::setViewParam('listaLocalizadores',$localizadorDAO->listar());

        $localizadores = $localizadorDAO->listar();
        $this->setVar($localizadores);


        $this->render('/servico/servicoCadastro');//através do render do Controller é montado as Views

        // Sessao::limpaFormulario();
        // Sessao::limpaMensagem();
    }

    //Function é chamada pelo App.php com os parametros passados pela View servicoTela.php
    public function chamaViewServicoTela()
    {
        $this->render('/servico/servicoTela');

        // Sessao::limpaFormulario();
        // Sessao::limpaMensagem();
    }

    //Function é chamada pelo App.php com os parametros passados pela View servicoApropriacaoHH.php
    public function chamaViewApropriacaoHH()
    {
        $this->render('/servico/servicoApropriacaoHH');

    }




    //Recebe os parametros da View servicoCadastro para serem salvas no BD através da função salvar no servicoDAO
    public function salvar()
    {
        $servicoDAO = new ServicoDAO();
        $Servico = new Servico();

            //Conversão do formato de data - HTML para MySQL
            $input_date=$_POST['data-ose-prevista'];
            $data=date("Y-m-d H:i:s",strtotime($input_date));

        $Servico->setOsLocalizacao($_POST['os-localizador1']);
        $Servico->setOsResponsavel($_POST['os-responsavel']);
        $Servico->setOsTipo($_POST['os-tipo']);
        $Servico->setOsTitulo($_POST['os-titulo']);
        $Servico->setOsObs($_POST['os-obs']);
        $Servico->setDataPrevista($_POST['data-ose-prevista']);
        
        //Sessao::gravaFormulario($_POST);

            if($servicoDAO->salvar($Servico)){
                $this->redirect('/servico/sucesso');
            }else{
                echo 'erro ao gravar';
                //Sessao::gravaMensagem("Erro ao gravar");
            }
    }

    //utilizado pela telaServico para excluir a Ordem de Serviço
    public function excluirServico()
    {
        $servicoDAO = new ServicoDAO();
        $Servico = new Servico();

            if($servicoDAO->deletando($_POST['os-codigo'])){
                $this->redirect('/');
            }else {
                echo 'erro ao gravar';
                //Sessao::gravaMensagem("Erro ao gravar");
            }
    }

    public function sucesso()
    {
        
        $this->render('/servico/sucesso');
        // if(Sessao::retornaValorFormulario('os-titulo')) {
        //     $this->render('/servico/sucesso');

        //     Sessao::limpaFormulario();
        //     Sessao::limpaMensagem();
        // }else{
            
        //     $this->redirect('/');
        // }
    }

    //para montar a view servicoCadastro no controller
    public function index()
    {
        $localizadorDAO = new localizadorDAO();
        self::setViewParam('listaLocalizadores',$localizadorDAO->listar());

        $this->redirect('/servico/servicoCadastro');
    }

}