<?php

namespace App\adms\Models;

            if(!defined('R3F3CC')){
                header("Location: /");
                die("Página não encontrada.");
            }
use PDO;

class AdmsViewImgTopo extends Conn{

    private object $conn;
    private $dados;

    // public function viewImgTopo(){
    //     $this->conn = $this->connect();        
    //     $query_home_topo =  "SELECT id, imagem_topo
    //     FROM homes_topos LIMIT 1";
    //     $result_home_topo = $this->conn->prepare($query_home_topo);
    //     $result_home_topo->execute();
    //     $this->dados = $result_home_topo->fetch();
    //     $this->conn = $this->connect();        

        
      
    //    return $this->dados;
    // }

    public function viewImgTopo(){
        $id_adm = $_SESSION['id_adm'];

        $this->conn = $this->connect();        
        $query_home_topo =  "SELECT id_barco,
        nome_barco,
        foto_barco,
        id_adm_fk
        FROM barco2 where id_adm_fk = $id_adm ORDER BY nome_barco desc";
        $result_home_topo = $this->conn->prepare($query_home_topo);
        $result_home_topo->execute();
        $this->dados = $result_home_topo->fetchAll(PDO::FETCH_ASSOC);
        $this->conn = $this->connect();        

        
      
       return $this->dados;
    }


    public function viewImgBusca($dados){
        // $id_adm = $_SESSION['id_adm'];
        $this->dados = $dados;
        $this->conn = $this->connect();        
        $query_home_topo =  "SELECT id_barco,
        nome_barco,
        foto_barco,
        id_adm_fk
        FROM barco2 where id_barco=:id_barco";
        $result_home_topo = $this->conn->prepare($query_home_topo);
        $result_home_topo->bindParam(':id_barco', $this->dados['busca'], PDO::PARAM_INT);
        $result_home_topo->execute();
        $this->dados = $result_home_topo->fetchAll(PDO::FETCH_ASSOC);
        $this->conn = $this->connect();        

        
      
       return $this->dados;
    }


    public function allFotos(array $dados = null){
        // $id_adm = $_SESSION['id_adm'];
        $this->dados = $dados;
        $this->conn = $this->connect();
        // $id_barco = $this->dados['busca'];

        $query_home_topo =  "SELECT id_foto, foto FROM fotos where id_foto=:id_barco LIMIT 32";
        $result_home_topo = $this->conn->prepare($query_home_topo);
        $result_home_topo->bindParam(':id_barco', $this->dados['busca'], PDO::PARAM_INT);
        $result_home_topo->execute();
        $this->dadosFotos = $result_home_topo->fetchAll(PDO::FETCH_ASSOC);
        $this->conn = $this->connect(); 
        // var_dump($this->dados['busca']);

        
      
       return $this->dadosFotos;
    }

    public function editImgTopo($dados){

        $this->dados = $dados;
        $id_adm = $_SESSION['id_adm'];

        $this->conn = $this->connect();

        //arquivos permitidos
        $arquivos_permitidos = ['jpg','jpeg','png'];

        //capturando dados do formulario
        $arquivos = $this->dados['arquivos'];

        //capturar nomes dos arquivos
        $nomes = $arquivos['name'];
        // var_dump($nomes);

        //capturar extensão dos arquivos
        for($i = 0; $i < count($nomes); $i++):
        $extensao = explode('.', $nomes[$i]);
        $extensao = end($extensao);
        $nomes[$i] = md5(rand()) .'.'. $extensao;


        //  var_dump($this->dados['id_barco']);


        
        $queryTopo="INSERT INTO fotos VALUES (:id_barco, :foto_barco, :id_adm_fk)";
        $edit_topo = $this->conn->prepare($queryTopo);
        $edit_topo->bindParam(':id_barco', $this->dados['id_barco'], PDO::PARAM_INT);
        $edit_topo->bindParam(':foto_barco', $nomes[$i], PDO::PARAM_STR);
        $edit_topo->bindParam(':id_adm_fk', $id_adm, PDO::PARAM_INT);

        $edit_topo->execute();

        // if($edit_topo->rowCount()){
        //     // if($this->upload()){
    if(in_array($extensao, $arquivos_permitidos)):

        $diretorio = "app/adms/assets/imagens/fotos/";
        move_uploaded_file($this->dados['arquivos']['tmp_name'][$i], $diretorio . $nomes[$i]);
        // $this->apagarImagem();
        $_SESSION['msg'] = '<div class="alert alert-success" role="alert">Nova imagem salva com sucesso!</div>';
        // return true;

        // }else{

        //     $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">A imagem nova não foi carregada!</div>';
        //     return false;

        // }

    else:
        $_SESSION['erro'] = 'Erro no envio. Verifique o tamanho ou a extensão do(s) arquivo(s).';
        // $destino = header("Location:../");

        endif;


    endfor;
              
}
    // }
            
            
// }
        
        
    // }





    public function editFotoPerfil(array $dados = null){

        $this->dados = $dados;
        $this->conn = $this->connect();

        //arquivos permitidos
        $arquivos_permitidos = ['jpg','jpeg','png'];

        //capturando dados do formulario
        $arquivos = $this->dados['arquivos'];

        //capturar nomes dos arquivos
        $nomes = $arquivos['name'];
        // var_dump($nomes);
        $id_barco = $this->dados['id_barco'];

        //capturar extensão dos arquivos
        for($i = 0; $i < count($nomes); $i++):
        $extensao = explode('.', $nomes[$i]);
        $extensao = end($extensao);
        $nomes[$i] = md5(rand()) .'.'. $extensao;
        $this->dados['foto'] = $nomes[$i];


        // var_dump($this->dados['arquivos']);
        // var_dump($arquivos);
        // var_dump($id_barco);
        // var_dump($nomes[$i]);


        
        $queryTopo="UPDATE barco2 SET foto_barco=:foto_barco WHERE id_barco=:id_barco";
        // "UPDATE barco2 SET foto_barco='$nomes[$i]' WHERE id_barco=:238";
        $edit_topo = $this->conn->prepare($queryTopo);
        $edit_topo->bindParam(':foto_barco', $nomes[$i], pdo::PARAM_STR);
        $edit_topo->bindParam(':id_barco', $id_barco, PDO::PARAM_INT);

        $edit_topo->execute();

        if($edit_topo->rowCount()){
        //     // if($this->upload()){
    if(in_array($extensao, $arquivos_permitidos)):

        $diretorio = "app/adms/assets/imagens/fotos/";
        move_uploaded_file($this->dados['arquivos']['tmp_name'][$i], $diretorio . $nomes[$i]);
        // $this->apagarImagem();
        $_SESSION['msg'] = '<div class="alert alert-success" role="alert">Nova imagem salva com sucesso!</div>';
        return true;

      

    else:
        $_SESSION['erro'] = 'Erro no envio. Verifique o tamanho ou a extensão do(s) arquivo(s).';
        // $destino = header("Location:../");

        endif;
    }else{

        $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">A imagem nova não foi carregada!</div>';
        return false;

    }


    endfor;
    

    // private function upload(){
    //     //onde salvar as imagens
    //     $diretorio = "app/adms/assets/imagens/topo/";
    //     if(move_uploaded_file($this->dados['imagem_nova']['tmp_name'], $diretorio .$this->dados['imagem_nova']['name'])){
    //     $this->apagarImagem();
    //     return true;

    //     }else{  
            
    //         return false;
    //     }
    // }
   
    // private function apagarImagem(){
    //     var_dump($this->dados);
    //     $img_antiga = "app/adms/assets/imagens/topo/" .$this->dados['imagem_topo'];
    //     unlink($img_antiga);
    }






public function apagarFotos(array $dados = null){

    $this->dados = $dados;
    $id_adm = $_SESSION['id_adm'];
    $fotos = $this->dados['foto'];
    $id_foto = $this->dados['id_foto'];

    $this->conn = $this->connect();

    // for($i = 0; $i < count($fotos); $i++):
    
    $queryTopo="DELETE FROM fotos where id_foto=:id_foto AND foto=:foto AND id_adm_fk=:id_adm_fk ";
    $edit_topo = $this->conn->prepare($queryTopo);
    $edit_topo->bindParam(':foto', $fotos, pdo::PARAM_STR);
    $edit_topo->bindParam(':id_adm_fk', $id_adm, PDO::PARAM_INT);
    $edit_topo->bindParam(':id_foto', $id_foto, PDO::PARAM_INT);


    $edit_topo->execute();


         if($edit_topo->rowCount()){
            // if($this->upload()){
                $this->apagarImagem();
                $_SESSION['msg'] = '<div class="alert alert-success" role="alert">Imagem apagada com sucesso!</div>';
                return true;
        
                }else{
        
                    $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">A imagem não foi apagada!</div>';
                    return false;
        
                }



// endfor;


// private function upload(){
//     //onde salvar as imagens
//     $diretorio = "app/adms/assets/imagens/topo/";
//     if(move_uploaded_file($this->dados['imagem_nova']['tmp_name'], $diretorio .$this->dados['imagem_nova']['name'])){
//     $this->apagarImagem();
//     return true;

//     }else{  
        
//         return false;
//     }
// }

}
private function apagarImagem(){
    var_dump($this->dados);
    $img_antiga = "app/adms/assets/imagens/fotos/" .$this->dados['foto'];
    unlink($img_antiga);
}
}