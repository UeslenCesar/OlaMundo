<?php

namespace App\sts\Models;

use PDO;

class StsCadMsg extends Conn{

    private object $conn;
    private $dados;


    public function cadMsg($dados){

        $this->dados = $dados;
        $this->conn = $this->connect();
        $query_msg = "INSERT INTO msg_contatos
        (nome, email, assunto, conteudo, created) VALUES
        (:nome, :email, :assunto, :conteudo, NOW())";
        $create_msg = $this->conn->prepare($query_msg);
        $create_msg->bindParam(':nome', $this->dados['nome'], PDO::PARAM_STR);
        $create_msg->bindParam(':email', $this->dados['email'], PDO::PARAM_STR);
        $create_msg->bindParam(':assunto', $this->dados['assunto'], PDO::PARAM_STR);
        $create_msg->bindParam(':conteudo', $this->dados['conteudo'], PDO::PARAM_STR);

        $create_msg->execute();
            if($create_msg->rowCount()){
                return true;

                 }else{
                    return false;
                 }
       


    }

}