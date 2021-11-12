<?php

namespace App\adms\Controllers;

if(!defined('R3F3CC')){
    header("Location: /");
    die("Página não encontrada.");
    
}


// var_dump($this->dadosFotos);

if(isset($this->dados['fotos'])){
    $foto_barco = $this->dados['fotos'];



}

if($this->dados['allfotos']){
    $all_fotos = $this->dados['allfotos'];
    // var_dump($all_fotos);

}
// var_dump($this->dadosFotos);


if(!empty($valorForm['imagem_topo'])){$imagem = $valorForm['imagem_topo'];}
else{$imagem = $foto_barco['foto_barco'];}
if($imagem==null){$imagem = "sem_foto.png";}
// $imagem = "sem_foto.png";
// $imagem = $this->dados['fotos']['foto_barco'];
// var_dump($imagem);

?>




<?php

foreach($foto_barco as $fotos){

    $fotos['foto_barco']==null ? $foto_perfil = "sem_foto.png": $foto_perfil = $fotos['foto_barco'];
    // var_dump($foto_perfil);

}
?> 

 <div class="maindash">
     <div class="detalhes">
    <div class="">
        <div class="">
        <h3>Embarcação: <?php echo $fotos['nome_barco'] ?></h3>
        </div>
        <div class="">
         <!-- <a href="<?php echo URLADM;?>view" class="btn btn-primary btn-sm">Visualizar</a>  -->
        <span>Clique para alterar a foto principal.</span>

        </div>
        
    </div>
    
    
    
    <div class="form">
    

    <form action="" method="post" enctype="multipart/form-data">
    
            <input name="id_barco"  type="number" id="id_barco"
            value="<?php echo $fotos['id_barco'];?>"> 
    
    
            <input name="imagem_topo"  type="" id="imagem_topo"
            value="<?php echo $fotos['foto_barco'];?>">  
    
            <label for="imagem_nova">
            <div class="img-perfil">
            <div class="edit">
            <a><i class="bi bi-cloud-arrow-up-fill"></i></a> </div>
            <img src="<?php echo URLADM."app/adms/assets/imagens/fotos/".$foto_perfil;?>"
            alt="Imagem do Topo" id="preview-img" class="img-thumbnail prev-img" name="imagem_nova">
           
            </div>
            

            </label>
            
            <input name="arquivos[]" type="file" class="form-control" id="imagem_nova" onchange="previewImagem();" required>   
    
    
        
           <input name="EditFotoPerfil" type="submit" class="btn btn-warning" value="Salvar">
    
    </form>
    </div>
    <?php if(isset($_SESSION['msg'])){
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);} ?>
    <hr>






<div class="main">
<!-- <h1> Embarcação</h1> -->

    <div class="gallery">
        

<?php

foreach($all_fotos as $all){

    $all['foto']==null ? $foto = "sem_foto.png": $foto = $all['foto'];
    // var_dump($all);
    echo '<div class="img">
    <form action="" method="POST">
    <input type="number" name="id_foto" id="id_foto"value="'.$all['id_foto'].'">
    <input type="text" name="foto" id="foto" value="'.$foto.'">
    <input class="" type="submit" name="apagarFotos" value="Apagar foto">
    </form>
    <a href="'.URLADM.'app/adms/assets/imagens/fotos/'.$foto.'"/>
    <img src="'.URLADM.'app/adms/assets/imagens/fotos/'.$foto.'" alt=""/></a></div>';

}
?> 

<!-- <form action="" method="POST">
<input type="submit" name="apagarFotos" value="Apagar fotos">

</form> -->
</div>
</div>

<img src="<?php echo URLADM;?>app/adms/assets/imagens/fotos/<?php echo $foto_perfil;?>"width="250"
style="margin:  30px 0 20px 0;">

<div class="form">
<form action="" method="POST" enctype="multipart/form-data">


    <input name="id_barco"  type="number" id="id_barco" value="<?php echo $fotos['id_barco'];?>"> 
    <input type="file" name="arquivos[]" multiple="multiple required" value="Selecione as fotos" required>
    <input type="submit" name="EditTopoImgHome" value="Salvar">


    

</form>
<br>
<p>Máximo: 16 fotos</p>


     <div class="voltar"><button class="btn" onclick="history.go(-1);">Voltar 1</button></div>

</div> 
</div> 
</div>

