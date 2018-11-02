<?php

namespace App\Models\DAO;

use App\Models\Entidades\Localizador;

class LocalizadorDAO extends BaseDAO
{

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
            throw new \Exception("Erro na gravação de dados.", 500);
        }
    }
}