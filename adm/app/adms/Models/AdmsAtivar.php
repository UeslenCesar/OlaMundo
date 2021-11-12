<?php

namespace App\adms\Models;


use PDO;

if(!defined('R3F3CC')){
                header("Location: /");
                die("Página não encontrada.");
            }



class AdmsAtivar extends Conn {

    private $chave;
    private bool $resultado = false;
    private $resultadoDb;
    private object $conn;

    public function getResultado(): bool{
        return $this->resultado;
    }

    public function validarChave($chave) {
        $this->chave = $chave;
        // var_dump($this->chave);
        $this->conn = $this->connect();
        $query_val_chave = "SELECT id_adm, nome, email, senha, sit_adm FROM adm
        WHERE chave_ativar=:chave_ativar LIMIT 1";
        
        $result_val_chave = $this->conn->prepare($query_val_chave);
        $result_val_chave->bindParam(':chave_ativar', $this->chave, PDO::PARAM_STR);
        $result_val_chave->execute();
        $this->resultadoDb = $result_val_chave->fetch();

            if($this->resultadoDb){
                if($this->ativarAdm()){


                $_SESSION['msg'] = '<div class="alert alert-success" role="alert">Sua conta foi ativada!</div>';
                            $this->resultado = true;


                }else{
                    $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">Usuário não ativado.<br>
                                        Tente novamente mais tarde.</div>';
                            $this->resultado  = false;}
                            
                }else{ 
                    
                    $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">Usuário não encontrado!<br>
                    Verifique se o link foi copiado corretamente.</div>';
                            $this->resultado = false;              
                
             }
    }


    
    private function ativarAdm(){
        $chave_ativar = "";
        $sit_adm = 1;
        $query_ativar_adm = "UPDATE adm SET chave_ativar=:chave_ativar, sit_adm=:sit_adm, modified=NOW() WHERE id_adm=:id";
        $ativar_adm = $this->conn->prepare($query_ativar_adm);

        $ativar_adm->bindParam(':sit_adm', $sit_adm, PDO::PARAM_INT);
        $ativar_adm->bindParam(':id', $this->resultadoDb['id_adm'], PDO::PARAM_INT);
        $ativar_adm->bindParam(':chave_ativar', $chave_ativar, PDO::PARAM_STR);
        $ativar_adm->execute();

            if($ativar_adm->rowCount()){
                return true;
            }else{
                return false;
            }


    }
}