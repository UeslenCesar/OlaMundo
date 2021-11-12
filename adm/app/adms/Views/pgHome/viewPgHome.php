<?php

namespace App\adms\Controllers;

if(!defined('R3F3CC')){
    header("Location: /");
    die("Página não encontrada.");
}
// header("Refresh: 0;");
if(isset($_SESSION['msg'])){
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}
?>



<!-- <div class="container">
 <h1>Detalhes da Página Home</h1>
</div>


<hr>



<div class="">
<div class="d-flex">
    <div class="mr-auto p-2">
    <h2>Detalhes do topo</h2>
    </div>
    <div class="p-2">
    <a href="<?php echo URLADM ?>topo" class="btn btn-warning">Editar</a>
    </div>
    
</div> -->

<div class="maindash">
    <div class="detalhes">
<?php if(!empty($this->dados['home']['topo'])){ 
    extract($this->dados['home']['topo']);
    $barcos = $this->dados['home']['barcos'];
    foreach($barcos as $barco){
        $barco['sit_barco']==2?$sit_barco="SIM":$sit_barco="NÃO";
        echo '<div class="card mb-3" style="width: 100%;">
        <div class="row no-guters">
          <div class="col-md-4">
            <img src="'.URLADM.'app/adms/assets/imagens/fotos/'.$barco['foto_barco'].'" class="img-fluid rounded-start" alt="...">
          </div>
          <div class="col-md-8">

            <div class="card-body">
    <div class="mr-auto p-2">

              <h2>'."Embarcação: " .$barco['nome_barco'].'</h2>


              
            <input type="number" name="id_barco" id="id_barco" value="'.$barco['id_barco'].'">
              <p class="card-text">'."Passageiros: " . $barco['capacidade'].', Tripulação: '.$barco['capacidade'].', Andares: '.$barco['andares'].'</p>
              <p class="card-text">'."Comprimento: " . $barco['comprimento'].'m, Largura: '.$barco['comprimento'].'m</p>
              <p class="card-text">'."Cidade: " . strtoupper($barco['cidade']).' - '.strtoupper($barco['estado']).', Ativo: '.$sit_barco.'</p>
              <p class="card-text">'."Preço Padrão: R$" .number_format($barco['preco_padrao'],2,",",".").'</p>
              

              </div>

              <div class="editar">
              <form action="" method="POST">
                  <input type="number" name="id_barco" id="id_barco" value="'.$barco['id_barco'].'">
                  <input type="submit" name="Editar" id="Editar" class="btn btn-warning" value="Editar">
              </form>
                  </div>
              
            


            </div>
          </div>
        </div>
  
      </div>';
        
        
    }

    
    ?>

    <form action="" method="POST">
        <input type="number" name="id_barco" id="id_barco" value="247">
        <input type="submit" name="Editar" id="Editar">
    </form>
        
    <!-- </div>
    </div>
    
        <a href="'.URLADM.'topo" class="btn btn-warning">Editar</a>

        
        <dl class="row">
        <dt class="col-sm-3">Titulo asaasa topo</dt>
        <div class="img-perfil"> 
        <img src="<?php echo URLADM;?>app/adms/assets/imagens/topo/<?php echo $imagem_topo;?>" width="250" height="150" >
            <div class="edit">
            <a href="<?php echo URLADM ?>topoimg" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a>
            </div>
        </div>
        <dd class="col-sm-9"><?php echo $this->dados['home']['barcos']['nome_barco'][0];?></dd>
         <dd class="col-sm-9">
        < ?php //echo $subtitulo_topo;?>
        </dd> 
        <dt class="col-sm-3">Subtitulo</dt>
        <dd class="col-sm-9"><?php echo $subtitulo_topo;?></dd>
        <dt class="col-sm-3">Texto do botão</dt>
        <dd class="col-sm-9"><?php echo $text_btn_topo;?></dd>
        <dt class="col-sm-3">Link do botão</dt>
        <dd class="col-sm-9"><?php echo $link_btn_topo;?></dd>
       

        </dl>   -->

        <?php }else{
            echo '<div class="alert alert-danger" role="alert">Sem registro.</div>';
        } ?>

        <!-- <hr>
        <div class="container">
<div class="d-flex">
    <div class="mr-auto p-2">
    <h2>Detalhes dos Serviços</h2>
    </div>
    <div class="p-2">
    <a href="<?php echo URLADM ?>topo" class="btn btn-warning">Editar</a>
    </div>
    
</div> -->



<?php if(!empty($this->dados['home']['serv'])){ 
    extract($this->dados['home']['serv']);
    
    
    ?>

        
        <!-- <dl class="row">
       
            <dt class="col-sm-3">Titulo</dt>
            <dd class="col-sm-9"><?php echo $titulo_um_serv;?></dd>
            <dt class="col-sm-3">Descrição</dt>
            <dd class="col-sm-9"><?php echo $desc_um_serv;?></dd>
            <dt class="col-sm-3">Ícone</dt>
            <dd class="col-sm-9"><i class="<?php echo $icone_um_serv;?>"></i><?php echo $icone_um_serv;?></dd>
            

            <dt class="col-sm-3">Titulo</dt>
            <dd class="col-sm-9"><?php echo $titulo_dois_serv;?></dd>
            <dt class="col-sm-3">Descrição</dt>
            <dd class="col-sm-9"><?php echo $desc_dois_serv;?></dd>
            <dt class="col-sm-3">Ícone</dt>
            <dd class="col-sm-9"><i class="<?php echo $icone_dois_serv;?>"></i><?php echo $icone_dois_serv;?></dd>
            
            
            <dt class="col-sm-3">Titulo</dt>
            <dd class="col-sm-9"><?php echo $titulo_tres_serv;?></dd>
            <dt class="col-sm-3">Descrição</dt>
            <dd class="col-sm-9"><?php echo $desc_tres_serv;?></dd>
            <dt class="col-sm-3">Ícone</dt>
            <dd class="col-sm-9"><i class="<?php echo $icone_tres_serv;?> "> - </i><?php echo $icone_tres_serv;?></dd>
            
           
       

        </dl>   -->

        <?php }else{
            echo '<div class="alert alert-danger" role="alert">Sem serviços.</div>';
        }

        // echo "<pre>".var_dump($this->dados)."</pre>";




        ?>
<!-- 
        <hr>
        
        <div class="container">
<div class="d-flex">
    <div class="mr-auto p-2">
    <h2>Detalhes da Ação</h2>
    </div>
    <div class="p-2">
    <a href="<?php echo URLADM ?>topo" class="btn btn-warning">Editar</a>
    </div>
    
</div>
        


        <?php if(!empty($this->dados['home']['acoes'])){ 
            extract($this->dados['home']['acoes']);
            
            
            ?>
        
                
                <dl class="row">
                <img src="<?php echo URLADM;?>app/adms/assets/imagens/acao/<?php echo $imagem_acao;?>" width="250" height="150" >
                

                <dt class="col-sm-3">Titulo da Ação</dt>
                <dd class="col-sm-9"><?php echo $titulo_acao;?></dd>
                <dt class="col-sm-3">Subtitulo da Ação</dt>
                <dd class="col-sm-9"><?php echo $subtitulo_acao;?></dd>
                <dt class="col-sm-3">Descrição da Ação</dt>
                <dd class="col-sm-9"><?php echo $desc_acao;?></dd>
               
        
                </dl>   -->
        
                <?php }else{
                    echo '<div class="alert alert-danger" role="alert">Sem registro.</div>';
                } ?>
        
                <!-- <hr>
            

                
     
                
        <div class="container">
<div class="d-flex">
    <div class="mr-auto p-2">
    <h2>Contato</h2>
    </div>
    <div class="p-2">
    <a href="<?php echo URLADM ?>topo" class="btn btn-warning">Editar</a>
    </div>
    
</div>
 -->

        <?php if(!empty($this->dados['home']['cont'])){ 
            extract($this->dados['home']['cont']);
            
            
            ?>
        
                
                <!-- <dl class="row">                         

                <dt class="col-sm-3">Titulo</dt>
                <dd class="col-sm-9"><?php echo $titulo_contato;?></dd>
                <dt class="col-sm-3">Subtitulo</dt>
                <dd class="col-sm-9"><?php echo $subtitulo_contato;?></dd>
                <dt class="col-sm-3">Endereço:</dt>
                <dd class="col-sm-9"><?php echo $end_contato;?></dd>
                <dt class="col-sm-3">Telefone:</dt>
                <dd class="col-sm-9"><?php echo $tel_contato;?></dd>
                <dt class="col-sm-3">E-mail:</dt>
                <dd class="col-sm-9"><?php echo $email_contato;?></dd>
               
        
                </dl>   -->
        
                <?php }else{
                    echo '<div class="alert alert-danger" role="alert">Sem registro.</div>';
                } ?>
        
    
        



<!-- </div> -->
<!-- <script>
window.reload(true);

</script> -->
<?php

var_dump($_SESSION['id_adm']);

?>