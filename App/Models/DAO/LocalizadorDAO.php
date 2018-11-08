<?php

namespace App\Models\DAO;

use App\Models\Entidades\Localizador;

class LocalizadorDAO extends BaseDAO
{

    //salva os dados do formulário da View/usuario/cadastro
    public  function salvar(Localizador $localizador) {
        try {

           // $nome      = $usuario->getNome();
            //$email     = $usuario->getEmail();
            return $this->insert(
                'smicl',
                ":loc_codigo, :loc_titulo, :loc_equipe",
                [
                    ':loc_codigo'=>$localizador->getLocCodigo(),
                    //':loc_nivel'=>$localizador->getLocNivel(),
                    ':loc_titulo'=>$localizador->getLocTitulo(),
                    ':loc_equipe'=>$localizador->getLocEquipe()
                ]
            );

        }catch (\Exception $e){
            throw new \Exception("Erro na gravação de dados do Localizador DAO.", 500);
        }
    }

    /*
     * É chamado pelo if do LocalizadorController
     * Se retornar uma linha no return quer dizer que já existe um codigo cadastrado
     */
    public function verificaCodIgual($cod)
    {
        try {

            $query = $this->select(
                "SELECT * FROM SMICL WHERE LOC_CODIGO = '$cod' "
            );

            return $query->fetch();

        }catch (Exception $e){
            throw new \Exception("Erro no acesso aos dados.", 500);
        }
    }

    public function listar($cod = null)
    {
        $localizadores = array();

        if($cod) {
            $query = $this->select(
                "SELECT * FROM SMICL WHERE LOC_CODIGO = '$cod' "
            );
            $retorno = $query->fetchObject();
            $localizador = new Localizador();
            $localizador->setLocCodigo($retorno->LOC_CODIGO);
            $localizador->setLocNivel($retorno->LOC_NIVEL);
            $localizador->setLocTitulo($retorno->LOC_TITULO);
            $localizador->setLocEquipe($retorno->LOC_EQUIPE);

            return $localizador;

        }else{
            $query = $this->select(
                "SELECT * FROM SMICL"
            );
            while ($retorno = $query -> fetchObject()){
                $localizador = new Localizador();
                $localizador->setLocCodigo($retorno->LOC_CODIGO);
                $localizador->setLocNivel($retorno->LOC_NIVEL);
                $localizador->setLocTitulo($retorno->LOC_TITULO);
                $localizador->setLocEquipe($retorno->LOC_EQUIPE);
                $localizadores[] = $localizador;
            }
            return $localizadores;
        }
    }  

}