<?php

namespace App\Models\DAO;

use App\Models\Entidades\Usuario;

class UsuarioDAO extends BaseDAO
{
    
    //não usado?
    // public function verificaEmail($email)
    // {
    //     try {

    //         $query = $this->select(
    //             "SELECT * FROM usuario WHERE email = '$email' "
    //         );

    //         return $query->fetch();

    //     }catch (Exception $e){
    //         throw new \Exception("Erro no acesso aos dados.", 500);
    //     }
    // }


    //Salva um novo usuário para Login
    public  function salvar(Usuario $usuario) {
        try {
            //$nome      = $usuario->getNome();
           // $email     = $usuario->getEmail();
            return $this->insert(
                'smifn',
                ":fn_codigo,:fn_nome, :senha, :admin",
                [
                    ':fn_codigo'=>$usuario->getFnCodigo(),
                    ':fn_nome'=>$usuario->getFnNome(),
                    ':senha'=>$usuario->getFnSenha(),
                    ':admin'=>$usuario->getAdmin()
                ]
            );
        }catch (\Exception $e){
            throw new \Exception("Erro na gravação de dados do usuarioDao.", 500);
        }
    }

    //Verifica se o usuário existe no BD
    public function buscaLogin(Usuario $usuario)
    {
        try {
            $sql = "SELECT * FROM SMIFN WHERE FN_CODIGO = '" . $usuario->getFnCodigo() ."' AND SENHA = '" . $usuario->getFnSenha() . "'";
            //echo $sql . "<br/>";
            $query = $this->select($sql);
            return $query->fetch();

        }catch (Exception $e){
            throw new \Exception("Erro no acesso aos dados no dao usuario.", 500);
        }
    }

    public function listaUsuarios(){

        

    }

}