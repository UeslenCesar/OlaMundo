<?php

namespace App\adms\Models;

            if(!defined('R3F3CC')){
                header("Location: /");
                die("Página não encontrada.");
            }
use PDO;

class AdmsFotoPerfil extends Conn{

    private object $conn;
    private $dados;

    public function viewImgTopo(){
        $this->conn = $this->connect();        
        $query_home_topo =  "SELECT id, imagem_topo
        FROM homes_topos LIMIT 1";
        $result_home_topo = $this->conn->prepare($query_home_topo);
        $result_home_topo->execute();
        $this->dados = $result_home_topo->fetch();
        $this->conn = $this->connect();        

        
      
       return $this->dados;
    }

    public function editImgTopo($dados){
        $this->dados = $dados;
        $this->conn = $this->connect();




     
        $queryTopo="UPDATE homes_topos SET imagem_topo=:imagem_topo,
        modifed=NOW() WHERE id=1";
        $edit_topo = $this->conn->prepare($queryTopo);
        $edit_topo->bindParam(':imagem_topo', $this->dados['imagem_nova']['name']);
        // $edit_topo->bindParam(':id', $this->dados['id'], PDO::PARAM_INT);
        $edit_topo->execute();

        if($edit_topo->rowCount()){
            if($this->upload()){
                $_SESSION['msg'] = '<div class="alert alert-success" role="alert">Nova imagem salva com sucesso!</div>';
                return true;
            }else{

                $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">A imagem nova não foi carregada!</div>';
                return false;

            }
            
        }
        
        
    }

    private function upload(){
        //onde salvar as imagens
        $diretorio = "app/adms/assets/imagens/topo/";
        if(move_uploaded_file($this->dados['imagem_nova']['tmp_name'], $diretorio .$this->dados['imagem_nova']['name'])){
        $this->apagarImagem();
        return true;

        }else{  
            
            return false;
        }
    }
   
    private function apagarImagem(){
        var_dump($this->dados);
        $img_antiga = "app/adms/assets/imagens/topo/" .$this->dados['imagem_topo'];
        unlink($img_antiga);
    }
}