<?php

namespace App\adms\Models;

            if(!defined('R3F3CC')){
                header("Location: /");
                die("Página não encontrada.");
            }
use PDO;

class AdmsViewTopo extends Conn{

    private object $conn;
    private $dados;

    public function viewTopo(){
        $this->conn = $this->connect();
        $query_home_topo =  "SELECT id, titulo_topo, subtitulo_topo,
        text_btn_topo,
        link_btn_topo,
        imagem_topo
        FROM homes_topos LIMIT 1";
        $result_home_topo = $this->conn->prepare($query_home_topo);
        $result_home_topo->execute();
        $this->dados = $result_home_topo->fetch();
        $this->conn = $this->connect();    
        
      
       return $this->dados;
    }

    // public function viewBarco(){

    //     $id_adm = $_SESSION['id_adm'];
    //     $query_barcos = "SELECT id_barco,
    //     nome_barco,
    //     foto_barco,
    //     tipo,
    //     capacidade,
    //     andares,
    //     comprimento,
    //     cidade,
    //     estado,
    //     sit_barco,
    //     id_adm_fk,
    //     -- modified
    //     FROM barco2 where id_adm_fk = $id_adm ORDER BY modified";
    //     $result_barcos_cont = $this->conn->prepare($query_barcos);
    //     $result_barcos_cont->execute();
    //     $this->dados['barcos'] = $result_barcos_cont->fetchAll(PDO::FETCH_ASSOC);

    //     $barcos = $this->dados['barcos'];

    // }

    // public function viewTopo(){

        // $id_adm = $_SESSION['id_adm'];
        // $id_adm = 196;
        // $this->dados = $dados;
        // $id_barco = $this->dados['id_barco'];
        // $id_barco = 239;
        // $this->conn = $this->connect();
        // $query_barcos = "SELECT
        // p.preco_padrao,
        // b.id_barco,
        // b.nome_barco,
        // b.foto_barco,
        // b.tipo,
        // b.capacidade,
        // b.andares,
        // b.comprimento,
        // b.cidade,
        // b.estado,
        // b.sit_barco,
        // b.id_adm_fk from barco2 as b
        // join precos p on b.id_barco=p.id where id_barco=:id_barco and b.id_adm_fk=:id_adm_fk order by nome_barco";
        // $result_barcos_cont = $this->conn->prepare($query_barcos);
        // $result_barcos_cont->bindParam(':id_adm_fk', $id_adm, PDO::PARAM_INT);
        // $result_barcos_cont->bindParam(':id_barco', $id_barco, PDO::PARAM_INT);

        // $result_barcos_cont->execute();
        // $this->dados['join_barcos'] = $result_barcos_cont->fetchAll(PDO::FETCH_ASSOC);
        // return $this->dados;

        // $barcos = $this->dados['barcos'];
        // $barcos_nome = $this->dados['nome_barco'];

        // var_dump($barcos_nome);
    //    var_dump($this->dados);
    
   /* CREIO QUE NAO POSSO APROVEITAR O CODIGO
    OU TEREI DE RENOMEAR*/
       
    //    var_dump($barcos);

    // }



    // public function editTopo($dados){
    //     $this->dados = $dados;
    //     $this->conn = $this->connect();
    //     $queryTopo="UPDATE homes_topos SET titulo_topo=:titulo_topo,
    //     subtitulo_topo=:subtitulo_topo,
    //     text_btn_topo=:text_btn_topo,
    //     link_btn_topo=:link_btn_topo,
    //     modifed=NOW() WHERE id=:id";
    //     $edit_topo = $this->conn->prepare($queryTopo);
    //     $edit_topo->bindParam(':titulo_topo', $this->dados['titulo_topo']);
    //     $edit_topo->bindParam(':subtitulo_topo', $this->dados['subtitulo_topo']);
    //     $edit_topo->bindParam(':text_btn_topo', $this->dados['text_btn_topo']);
    //     $edit_topo->bindParam(':link_btn_topo', $this->dados['link_btn_topo']);
    //     $edit_topo->bindParam(':id', $this->dados['id'], PDO::PARAM_INT);
    //     $edit_topo->execute();

    //     if($edit_topo->rowCount()){
    //         $_SESSION['msg'] = '<div class="alert alert-success" role="alert">Alterações salvas com sucesso!</div>';
    //         return true;
    //     }else{

    //         $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">As alterações não foram feitas!</div>';
    //         return false;
    //     }
        
    // }


    public function editTopo(array $dados = null){
        $this->dados = $dados;
        var_dump($this->dados);
        $id_adm = $_SESSION['id_adm'];
        // $id_barco = 247;
        $this->conn = $this->connect();
        $queryTopo="UPDATE barco2 SET
        nome_barco=:nome_barco,
        tipo=:tipo,
        capacidade=:capacidade,
        andares=:andares,
        comprimento=:comprimento,
        cidade=:cidade,
        estado=:estado,
        sit_barco=:sit_barco,
        modified=NOW()
        WHERE id_barco=:id_barco AND id_adm_fk=:id_adm";
        $edit_topo = $this->conn->prepare($queryTopo);
        $edit_topo->bindParam(':nome_barco', $this->dados['nome_barco'], PDO::PARAM_STR);
        $edit_topo->bindParam(':tipo', $this->dados['tipo'], PDO::PARAM_STR);
        $edit_topo->bindParam(':capacidade', $this->dados['capacidade'], PDO::PARAM_INT);
        $edit_topo->bindParam(':andares', $this->dados['andares'], PDO::PARAM_INT);
        $edit_topo->bindParam(':comprimento', $this->dados['comprimento'], PDO::PARAM_INT);
        $edit_topo->bindParam(':cidade', $this->dados['cidade'], PDO::PARAM_STR);
        $edit_topo->bindParam(':estado', $this->dados['estado'], PDO::PARAM_STR);
        $edit_topo->bindParam(':sit_barco', $this->dados['sit_barco'], PDO::PARAM_INT);      
        $edit_topo->bindParam(':id_barco', $this->dados['id_barco'], PDO::PARAM_INT);
        // $edit_topo->bindParam(':id_barco', $id_barco);

        $edit_topo->bindParam(':id_adm', $id_adm);

        $edit_topo->execute();

        if($edit_topo->rowCount()){
            $_SESSION['msg'] = '<div class="alert alert-success" role="alert">Alterações salvas com sucesso!</div>';
            return true;
        }else{

            $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">Nenhuma alteração foi feita!</div>';
            return false;
        }


        return $this->dados;

        
    }


    public function editPreco($dados){
        $this->dados = $dados;
        $id_adm = $_SESSION['id_adm'];
        // $id_barco = 268;

        $this->conn = $this->connect();
        $queryTopo="UPDATE precos SET
        preco_padrao=:preco_padrao
        -- modified=NOW()
        WHERE id_preco=:id_barco AND saida=:saida AND id_adm_fk=:id_adm";
        $edit_topo = $this->conn->prepare($queryTopo);
        $edit_topo->bindParam(':preco_padrao', $this->dados['preco_padrao'], PDO::PARAM_STR);
        $edit_topo->bindParam(':id_barco', $this->dados['id_barco'], PDO::PARAM_INT);
        $edit_topo->bindParam(':saida', $this->dados['saida'], PDO::PARAM_STR);

        $edit_topo->bindParam(':id_adm', $id_adm);
        // $edit_topo->bindParam(':id_barco', $id_barco);


        $edit_topo->execute();

        if($edit_topo->rowCount()){
            $_SESSION['msg'] = '<div class="alert alert-success" role="alert">Alterações salvas com sucesso!</div>';
            return true;
        }else{

            $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">Nenhuma alteração foi feita!</div>';
            return false;
        }


        return $this->dados;

        
    }

    public function novoPreco($dados){

        $this->dados = $dados;
        $id_adm = $_SESSION['id_adm'];
        $this->conn = $this->connect();
        $id_barco = 268;


        // for($i = 0; $i < count($nomes); $i++):
            $queryTopo="INSERT INTO precos VALUES (:id_barco, :preco_padrao, :saida, :retorno, :id_adm_fk)";
            $edit_topo = $this->conn->prepare($queryTopo);
            $edit_topo->bindParam(':id_barco', $this->dados['id_barco'], PDO::PARAM_INT);
            $edit_topo->bindParam(':preco_padrao', $this->dados['preco_padrao'], PDO::PARAM_INT);
            $edit_topo->bindParam(':saida', $this->dados['saida'], PDO::PARAM_STR);
            $edit_topo->bindParam(':retorno', $this->dados['retorno'], PDO::PARAM_STR);

            $edit_topo->bindParam(':id_adm_fk', $id_adm, PDO::PARAM_INT);
            // $edit_topo->bindParam(':id_barco', $id_barco, PDO::PARAM_INT);

            $edit_topo->execute();
        // endfor;
        return $this->dados;

              
}



    public function delete($dados){
        $this->dados = $dados;
        // var_dump($this->dados);
        $id_adm = $_SESSION['id_adm'];
        $this->conn = $this->connect();
        $queryTopo="DELETE FROM barco2
        WHERE id_barco=:id_barco AND id_adm_fk=:id_adm";
        $edit_topo = $this->conn->prepare($queryTopo);
        $edit_topo->bindParam(':id_barco', $this->dados['id_barco'], PDO::PARAM_INT);
        $edit_topo->bindParam(':id_adm', $id_adm, PDO::PARAM_INT);
        $edit_topo->execute();

        if($edit_topo->rowCount()){
            $_SESSION['msg'] = '<div class="alert alert-success" role="alert">Alterações salvas com sucesso!</div>';
            return true;
        }else{

            $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">Nenhuma alteração foi feita!</div>';
            return false;
        }


        return $this->dados;

        
    }


    
   

}