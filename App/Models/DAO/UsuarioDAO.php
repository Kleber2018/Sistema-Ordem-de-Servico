<?php

namespace App\Models\DAO;

use App\Models\Entidades\Usuario;

class UsuarioDAO extends BaseDAO
{
    public function verificaEmail($email)
    {
        try {

            $query = $this->select(
                "SELECT * FROM usuario WHERE email = '$email' "
            );

            return $query->fetch();

        }catch (Exception $e){
            throw new \Exception("Erro no acesso aos dados.", 500);
        }
    }


    public  function salvar(Usuario $usuario) {
        try {
            //$nome      = $usuario->getNome();
           // $email     = $usuario->getEmail();
            return $this->insert(
                'smifn',
                ":fn_codigo,:fn_nome, :senha",
                [
                    ':fn_codigo'=>$usuario->getFnCodigo(),
                    ':fn_nome'=>$usuario->getFnNome(),
                    ':senha'=>$usuario->getFnSenha()
                ]
            );

        }catch (\Exception $e){
            throw new \Exception("Erro na gravação de dados.", 500);
        }
    }
}