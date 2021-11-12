<?php

namespace App\adms\Models;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

use PDO;

if(!defined('R3F3CC')){
                header("Location: /");
                die("Página não encontrada.");
            }



class AdmsCadastro extends Conn
{

    private object $conn;
    private $dados;
    private $resultadoBd;
    private bool $resultado = false;
    
    
    
    function getResultado(): bool {
        return $this->resultado;
    }

    

    
    public function cadastrar(array $dados = null) {
        $this->dados = $dados;
        $this->dados['senha'] = password_hash($this->dados['senha'], PASSWORD_DEFAULT);
        $this->dados['chave_ativar'] = password_hash(rand(), PASSWORD_DEFAULT);
        $this->conn = $this->connect();
        $query_val_cadastro = "INSERT INTO adm
        (id_adm, nome, sobrenome, cpf_cnpj, email, senha, chave_ativar, sit_adm, created, modified) VALUES
        (DEFAULT, :nome, :sobrenome, :cpf_cnpj, :email, :senha, :chave_ativar, DEFAULT, NOW(), DEFAULT)";
        $result_val_cadastro = $this->conn->prepare($query_val_cadastro);

           /* $query_val_cadastro = "INSERT INTO adm VALUES
            (id_adm,nome, cnpj, cpf, email, senha, created, modified VALUES
            (DEFAULT, :nome, :cnpj, :cpf, :email, :senha, NOW(), DEFAULT, LIMIT 1";
           */
        $result_val_cadastro->bindParam(':nome', $this->dados['nome'], PDO::PARAM_STR);
        $result_val_cadastro->bindParam(':sobrenome', $this->dados['sobrenome'], PDO::PARAM_STR);
        $result_val_cadastro->bindParam(':cpf_cnpj', $this->dados['cpf_cnpj'], PDO::PARAM_STR);
        $result_val_cadastro->bindParam(':email', $this->dados['email'], PDO::PARAM_STR);
        $result_val_cadastro->bindParam(':senha', $this->dados['senha'], PDO::PARAM_STR);
        $result_val_cadastro->bindParam(':chave_ativar', $this->dados['chave_ativar'], PDO::PARAM_STR);

        $result_val_cadastro->execute();
        $this->resultadoBd = $result_val_cadastro->fetch();
        // if($this->resultadoBd){
            // $this->validarSenha();

            //novo codigo

            if ($result_val_cadastro->rowCount()) {

            $this->enviarEmail();  return true;
                     

        }else{
            $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">Usuário não cadastrado!</div>';
            $this->resultado = false;
        }               
    }
    
    
        private function enviarEmail(){


            $mail = new PHPMailer(true);
            
            
            //Server settings
            
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.mailtrap.io';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = '5338961268ab71';                     //SMTP username
            $mail->Password   = '3fff24d254ba97';                               //SMTP password
            // $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $mail->setFrom('cadastro@bilhetenautico.com.br', 'Email automatico');
            $mail->addAddress($this->dados['email'], $this->dados['nome']);     //Add a recipient
            
            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Confirme seu cadastro';
            $mail->Body    = "Olá, {$this->dados['nome']}.<br>
            Confirme seu e-mail clicando no link abaixo<br>
            <a href='".URLADM."ativar?chave={$this->dados['chave_ativar']}'>".URLADM."ativar?chave={$this->dados['chave_ativar']}</a><br>";
            $mail->AltBody = "{$this->dados['nome']}.\n\n
            Confirme seu e-mail, copie o link abaixo e cole no seu navegador:\n\n".URLADM."ativar?chave={$this->dados['chave_ativar']}";
          

            $mail->send();
            $_SESSION['msg'] = '<div class="alert alert-success" role="alert">Solicitação enviada com sucesso! Verifique seu e-mail.<br> 
            Você receberá uma mensagem de confirmação para <br>ATIVAR SUA CONTA.</div>';   
            
            unset($_POST);

        }


        
//#############################################################################################
 




    public function cadastrar2(array $dados = null) {
        
        $this->dados = $dados;
        // var_dump($this->dados);
        $id_adm = $_SESSION['id_adm'] ;
        // $foto_barco = md5(rand()).'.'.'jpg';
        $codigo_hash = md5(rand());
        // $this->dados['senha'] = password_hash($this->dados['senha'], PASSWORD_DEFAULT);
        // $this->dados['chave_ativar'] = password_hash(rand(), PASSWORD_DEFAULT);
        $this->conn = $this->connect();
        $query_val_cadastro = "INSERT INTO barco2       
        (id_barco, nome_barco, tipo, capacidade, andares, comprimento,  cidade, estado, sit_barco, id_adm_fk, created, codigo_hash) VALUES
        (DEFAULT, :nome, :tipo, :capacidade, :andares, :comprimento,  :cidade, :estado, DEFAULT, $id_adm, NOW(), '$codigo_hash')";
        
        

        $result_val_cadastro = $this->conn->prepare($query_val_cadastro);
        

           /* $query_val_cadastro = "INSERT INTO adm VALUES
            (id_adm,nome, cnpj, cpf, email, senha, created, modified VALUES
            (DEFAULT, :nome, :cnpj, :cpf, :email, :senha, NOW(), DEFAULT, LIMIT 1";
           */
        $result_val_cadastro->bindParam(':nome', $this->dados['nome'], PDO::PARAM_STR);
        // $result_val_cadastro->bindParam(':id_adm_fK', $id_adm, PDO::PARAM_INT);
        $result_val_cadastro->bindParam(':tipo', $this->dados['tipo'], PDO::PARAM_STR);
        $result_val_cadastro->bindParam(':capacidade', $this->dados['capacidade'], PDO::PARAM_INT);
        $result_val_cadastro->bindParam(':andares', $this->dados['andares'], PDO::PARAM_INT);
        $result_val_cadastro->bindParam(':comprimento', $this->dados['comprimento'], PDO::PARAM_INT);
        $result_val_cadastro->bindParam(':cidade', $this->dados['cidade'], PDO::PARAM_STR);
        $result_val_cadastro->bindParam(':estado', $this->dados['estado'], PDO::PARAM_STR);


        $result_val_cadastro->execute();
        $last_id = $this->conn->lastInsertId();
        $_SESSION['last_id'] = $last_id;        
        $this->resultadoBd = $result_val_cadastro->fetch();
        
            //novo codigo

            if ($result_val_cadastro->rowCount()) {

                // $_SESSION['foto_barco'] = $foto_barco;
                $_SESSION['codigo_hash'] = $codigo_hash;

                $_SESSION['msg'] = '<div class="alert alert-success" role="alert">Embarcação cadastrada com sucesso!<br>
                //Acesse seu e-mail para ATIVAR SUA CONTA.</div>';    
                     $this->resultado = true;
                     unset($_POST);



        }else{
            $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">Embarcação não cadastrada!</div>';
            $this->resultado = false;
        }              
        
       
    }

        
        

       
   






public function cadastrar3(array $dados = null) {
    $id_barco = $_SESSION['last_id'];
    $this->dados = $dados;
    $this->conn = $this->connect();
    // $this->id_barco();

    $query_val_cadastro = "INSERT INTO atividades       
    (id_atividades, passeio, passeio_exclusivo, mergulho, pesca, barco_taxi, locacao) VALUES
    ((SELECT id_barco FROM barco2 WHERE id_barco=$id_barco), :passeio, :passeio_exclusivo, :mergulho, :pesca, :barco_taxi, :locacao)";
    
    

    $result_val_cadastro = $this->conn->prepare($query_val_cadastro);
    

     
    $result_val_cadastro->bindParam(':passeio', $this->dados['passeio'], PDO::PARAM_INT);
    $result_val_cadastro->bindParam(':passeio_exclusivo', $this->dados['passeio_exclusivo'], PDO::PARAM_INT);
    $result_val_cadastro->bindParam(':mergulho', $this->dados['mergulho'], PDO::PARAM_INT);
    $result_val_cadastro->bindParam(':pesca', $this->dados['pesca_esportiva'], PDO::PARAM_INT);
    $result_val_cadastro->bindParam(':barco_taxi', $this->dados['barco_taxi'], PDO::PARAM_INT);
    $result_val_cadastro->bindParam(':locacao', $this->dados['locacao'], PDO::PARAM_INT);


    $result_val_cadastro->execute();
    
    $this->resultadoBd = $result_val_cadastro->fetch();
    
        //novo codigo

        if ($result_val_cadastro->rowCount()) {

            //$_SESSION['msg'] = '<div class="alert alert-success" role="alert">Embarcação cadastrada com sucesso!<br>
            //Acesse seu e-mail para ATIVAR SUA CONTA.</div>';    
                 $this->resultado = true;
                 unset($_POST);



    }else{
        $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">Embarcação não cadastrada!</div>';
        $this->resultado = false;
    }              
    
   
}





    // if($this->resultadoBd){
    //     if ($this->validarSitAdm()) {
    //         $this->validarSenha();
    //     } else {
    //         $this->resultado = false;
    //     }
    // }else{
    //     $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">Usuário não encontrado!</div>';
    //     $this->resultado = false;
    // }  






//     $query_carro = "INSERT INTO carros (placa, vidro_eletrico, ar_condicionado, freio_abs)
//                 VALUES (:placa, :vidro_eletrico, :ar_condicionado, :freio_abs)";
//     $cad_carro = $conn->prepare($query_carro);
//     $cad_carro->bindParam(':placa', $dados['placa'], PDO::PARAM_STR);
//     $cad_carro->bindParam(':vidro_eletrico', $dados['vidro_eletrico'], PDO::PARAM_INT);
//     $cad_carro->bindParam(':ar_condicionado', $dados['ar_condicionado'], PDO::PARAM_INT);
//     $cad_carro->bindParam(':freio_abs', $dados['freio_abs'], PDO::PARAM_INT);
    
//     $cad_carro->execute();
    
//     if($cad_carro->rowCount()){
//         $_SESSION['msg'] = "<p style='color: green;'>Carro cadastrado com sucesso!</p>";
//         header("Location: index.php");
//     }else{
//         echo "<p style='color: #f00;'>Erro: Carro não cadastrado com sucesso!</p>";
//     }
// }




// if($_SERVER['REQUEST_METHOD']=='POST'){
//     $request = md5(implode($_POST));
//     if(isset($_SESSION['ultima_request']) && $_SESSION['ultima_request'] == $request){
//         echo "Usuário já foi inserido";
//     }else{	
//         $_SESSION['ultima_request'] = $request;
//         $nome = $_POST['nome'];
//         $cpf = $_POST['cpf'];
//         $_SESSION['nome'] = $nome;
//         $_SESSION['cpf'] = $cpf;						
//         $result_dados_pessoais = "INSERT INTO usuarios (nome, cpf) VALUES ('$nome', '$cpf')";
//         $resultado_dados_pessoais= mysqli_query($conn, $result_dados_pessoais);
//         //ID do usuario inserido
//         $ultimo_id = mysqli_insert_id($conn);	
//         echo $ultimo_id;
//     }

// public function cadastrarFoto(array $dados = null){

//     $this->dados = $dados;
//     $this->conn = $this->connect();

// // $id_foto = $_SESSION['last_id'];
// //     //arquivos permitidos
// $arquivos_permitidos = ['jpg','jpeg','png'];

// //capturando dados do formulario
// $arquivos = $this->dados['foto_barco'];

// // //capturar nomes dos arquivos
// $nomes = $arquivos['name'];

// // //capturar extensão dos arquivos
// for($i = 0; $i < count($nomes); $i++):
//     $extensao = explode('.', $nomes[$i]);
//     $extensao = end($extensao);
//     $nomes[$i] = md5(rand()) .'.'. $extensao;

// //         //verificando a extensao dos arquivos
//         if(in_array($extensao, $arquivos_permitidos)):

        
//             $queryFoto="INSERT INTO fotos (id_foto, foto) VALUES (DEFAULT, '$nomes[$i]')";
//             $foto_perfil = $this->conn->prepare($queryFoto);
//             // $foto_perfil->bindParam(':foto_barco', $this->dados['foto_barco']);
//             // $foto_perfil->bindParam(':id', $this->dados['id'], PDO::PARAM_INT);
//             $foto_perfil->execute();
//                 // $query = $this->conn->prepare("INSERT INTO fotos VALUES($id_foto, '$nomes[$i]')");
    
                

            

//             if($foto_perfil->rowCount()):

//                 $diretorio = "app/adms/assets/imagens/perfil/";
//                 move_uploaded_file($this->dados['arquivos']['tmp_name'][$i], $diretorio . $nomes[$i]);
                           
//                 $_SESSION['msg'] = '<div class="alert alert-success" role="alert">Imagem salva com sucesso!</div>';
//                 return true;
//             endif;
        
//         else:

//                 $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">A imagem não foi carregada!</div>';
//                 return false;

//         endif;

//                     // $mover = move_uploaded_file($this->dados['arquivos']['tmp_name'][$i], '../fotos/' . $nomes[$i]);
//                     // $_SESSION['sucesso'] = 'Arquivos enviados com sucesso!';
//                     // $destino = header("Location: mostrafotos.php");
            

            
       

        

// endfor;

// }

public function fotoperfil($dados){
    $this->dados = $dados;
    $this->conn = $this->connect();
    
        

    // $id_foto = 4;
    
    $query_foto="UPDATE fotos2 SET foto=:imagem_nova WHERE id=4";
    $foto_perfil = $this->conn->prepare($query_foto);
    $foto_perfil->bindParam(':imagem_nova', $this->dados['imagem_nova']['name'],PDO::PARAM_STR);
    // $foto_perfil->bindParam(':id', $this->dados['id'], PDO::PARAM_INT);
    $foto_perfil->execute();


    // $this->resultadoBd = $foto_perfil->fetch();
    if($foto_perfil->rowCount()){
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
    if(move_uploaded_file($this->dados['imagem_nova']['tmp_name'], $diretorio . $this->dados['imagem_nova']['name'])){
    return true;

    }else{  
        
        return false;
    }


}



}
