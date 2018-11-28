<?php

namespace App\Models\DAO;

use App\Models\Entidades\Servico;

class ApropriacaoDAO extends BaseDAO
{

   //Para excluir as apropriações
    public function excluir($id)
    {
        echo '</br>';
        var_dump($id);
        try {
             return $this->delete('SMIOSA',"ID = $id");
        }catch (Exception $e){
            throw new \Exception("Erro ao deletar $e", 500);
        }
    }
}
