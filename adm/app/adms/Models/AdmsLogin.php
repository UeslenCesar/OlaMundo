<?php

namespace App\adms\Models;

use PDO;

if(!defined('R3F3CC')){
                header("Location: /");
                die("Página não encontrada.");
            }



class admsLogin extends Conn
{

    private object $conn;
    private $dados;
    private $resultadoBd;
    private bool $resultado = false;
    
    function getResultado(): bool {
        return $this->resultado;
    }

    
    public function login(array $dados = null) {
        $this->dados = $dados;
        $this->conn = $this->connect();
        $query_val_login = "SELECT id_adm, nome, email, senha, sit_adm FROM adm WHERE email=:email LIMIT 1";
        $result_val_login = $this->conn->prepare($query_val_login);
        $result_val_login->bindParam(':email', $this->dados['usuario'], PDO::PARAM_STR);
        $result_val_login->execute();
        $this->resultadoBd = $result_val_login->fetch();
        if($this->resultadoBd){
            if ($this->validarSitAdm()) {
                $this->validarSenha();
            } else {
                $this->resultado = false;
            }
        }else{
            $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">Usuário não encontrado!</div>';
            $this->resultado = false;
        }               
    }
    

    private function validarSitAdm(){
        if($this->resultadoBd['sit_adm'] != 1){
            $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">Conta não ativada.<br> Verifique sua caixa de e-mail e<br>clique no link para ativar sua conta.</div>';
            return false;
        } else {
            return true;
        }
    }

    private function validarSenha() {
        if(password_verify($this->dados['senha'], $this->resultadoBd['senha'])){
            $_SESSION['id_adm'] = $this->resultadoBd['id_adm'];
            $_SESSION['nome_adm'] = $this->resultadoBd['nome'];
            $_SESSION['email_adm'] = $this->resultadoBd['email'];
            $this->resultado = true;
        }else{
            $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">Usuário ou senha incorreta!</div>';
            $this->resultado = false;
        }
    }


}