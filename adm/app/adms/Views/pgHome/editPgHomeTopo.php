<?php

namespace App\adms\Controllers;

if(!defined('R3F3CC')){
    header("Location: /");
    die("Página não encontrada.");
    
}

if(isset($this->dados['home'])){
    $valorForm = $this->dados['home'];
 
}
?>




<div class="container">
<div class="alert alert-success" role="alert" style="background-image: linear-gradient(
45deg, #043A56, #128c97 100%); margin-bottom: 40px;">

<div class="d-flex">
    <div class="mr-auto p-2">
    <h1 style="color: whitesmoke; padding-left: 5px; margin-right: 30px;">Configurações Gerais</h1>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="white" class="bi bi-sliders" style="margin-right: 30px;" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M11.5 2a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM9.05 3a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0V3h9.05zM4.5 7a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM2.05 8a2.5 2.5 0 0 1 4.9 0H16v1H6.95a2.5 2.5 0 0 1-4.9 0H0V8h2.05zm9.45 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm-2.45 1a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0v-1h9.05z"/>
</svg>
    <!-- <div class="p-2">
    <a href="<?php echo URLADM ?>view" style="padding-right: 10px;"><svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="white" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
  <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
</svg></a>
    </div> -->
</div>
    
    
</div>

<?php

if(isset($_SESSION['msg'])){
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}


?>

<script>

$('button').click(function(){
    $('a[href="#home"]').tab('show');
})

</script>


<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Preços</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Promoções</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Geral</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

      <!-- <h1 class="h4">Preço Padrão</h1> -->

      
          <?php 

          foreach ($valorForm as $form){
          
          $form['preco_padrao']==null?$valor="novoPreco":$valor="precoPadrao";
          
          echo '<div class="jumbotron">
          <form action="" method="POST" class="formulario" id="formulario" onclick="preco2()" onkeyup="preco2()">
         <div class="form-row">

          

          <input type="number" name="id_barco" id="id_barco" value="'.$form['id_barco'].'">




            <div class="form-group col-md-2">
            <label class="form-label" for="saida" >Saída:</label>
            <input name="saida" type="time" class="form-control" id="saida" 
            placeholder="Digite um horario"
             value="'.$form['saida'].'"
             required> 
            </div>

            

            <div class="form-group col-md-2">
            <label class="form-label" for="retorno" >Retorno:</label>
            <input name="retorno" type="time" class="form-control" id="retorno" 
            placeholder="Digite um horario" value="'.$form['retorno'].'" required> 
            </div>


            <div class="form-group col-md-4">
            <label class="form-label" for="preco" >Preço atual:</label>
            <input name="preco" type="text" class="form-control" id="preco" disabled
            placeholder="" value="'.number_format($form['preco_padrao'],2,",",".").'">
            </div>

            <div class="form-group col-md-4">
            <label class="form-label" for="preco_padrao" >Novo preço:</label>
            <input name="preco_padrao" type="number" class="form-control" id="preco_padrao"
            placeholder="R$ '.$form['preco_padrao'].'"
            value="'.$form['preco_padrao'].'">
            </div> 


            
            

          
         
           
          </div>

          <div class="float-left">
          <input type="submit" name="'.$valor.'" id="salvar_hora" class="btn btn-primary" value="Salvar">
          </div>

          <div class="float-right">
          <input type="submit" name="delete_hora" id="delete_hora" class="btn btn-danger"  value="Excluir">
          </div>
          </form>
          </div>';}?>
          

<div id="novo_campo"></div>

<button type="button" id="novo" class="btn btn-warning" onclick="novoCampo()">Novo Horario</button>


</div>
<span>teste</span>

          <div class="ticket">
<div class="barcode1">
<svg xmlns="http://www.w3.org/2000/svg"  fill="currentColor" class="bi bi-upc" viewBox="0 0 16 16">
  <path d="M3 4.5a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7zm2 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7zm2 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7zm2 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-7zm3 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7z"/>
</svg><svg xmlns="http://www.w3.org/2000/svg"   fill="currentColor" class="bi bi-upc" viewBox="0 0 16 16">
  <path d="M3 4.5a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7zm2 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7zm2 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7zm2 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-7zm3 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7z"/>
</svg><svg xmlns="http://www.w3.org/2000/svg"   fill="currentColor" class="bi bi-upc" viewBox="0 0 16 16">
  <path d="M3 4.5a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7zm2 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7zm2 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7zm2 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-7zm3 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7z"/>
</svg>
</div>
  <div class="shape">
 
    <span id="moeda">R$</span>
  <p class="text-center" id="resultado" ><?php echo number_format($valorForm[0]['preco_padrao'],2,",","."); ?></p>
<span id="resultado2">VALOR DO BILHETE</span>
<span id="resultado3">00-000.000.00-AA</span>


<div class="shape-linha"></div>

  </div>
</div>



  
  </div>

<form action="" method="POST">
</form>

  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">


          
plpplplplplp

  </div>
  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">

            <form action="" method="POST" class="formulario">
            <div class="form-row">

            <div class="form-group col-md-6">

            <input name="id_barco"  type="number" id="id_barco"
            value="<?php if($valorForm[0]['id_barco']){echo $valorForm[0]['id_barco'];} ?>">  


            <label class="form-label" for="nome_barco">Nome da Embarcação</label>
            <input type="text" class="form-control" name="nome_barco" id="nome_barco" placeholder="Nome da embarcação"
            value="<?php if($valorForm[0]['nome_barco']){echo $valorForm[0]['nome_barco'];} ?>">   
            </div>
        
            <div class="form-group col-md-6">
            <label class="form-label" for="tipo" >Tipo de Embarcação</label>
            <input name="tipo" type="text" class="form-control" id="tipo"
            placeholder="Ex: Veleiro, lancha, escuna..." value="<?php if($valorForm[0]['tipo']){echo $valorForm[0]['tipo'];} ?>">
            </div>
           
            <div class="form-group col-md-3">
            <label class="form-label" for="cidade">Cidade de Origem</label>
            <input name="cidade" type="text" class="form-control" id="cidade"
            placeholder="Cidade de origem" min="1" value="<?php if($valorForm[0]['cidade']){echo $valorForm[0]['cidade'];} ?>">
            </div>
            <div class="form-group col-md-3">
            <label class="form-label" for="estado">Estado</label>
            <input name="estado"  type="text" class="form-control" id="estado"
            placeholder="Selecione seu Estado" value="<?php if($valorForm[0]['estado']){echo $valorForm[0]['estado'];} ?>">
            </div>

            

        
            <div class="form-group col-md-3">
            <label class="form-label" for="capacidade">Capacidade</label>
            <input name="capacidade"  type="number" class="form-control" id="capacidade"
            placeholder="Número de Passageiros" value="<?php if($valorForm[0]['capacidade']){echo $valorForm[0]['capacidade'];} ?>">
            </div>
            <div class="form-group col-md-3">
            <label class="form-label" for="comprimento">Comprimento</label>
            <input name="comprimento"  type="number" class="form-control" id="comprimento"
            placeholder="Comprimento em metros" value="<?php if($valorForm[0]['comprimento']){echo $valorForm[0]['comprimento'];} ?>">
            </div>
            <div class="form-group col-md-4">
            <label class="form-label" for="largura">Largura</label>
            <input name="largura"  type="number" class="form-control" id="largura"
            placeholder="Largura em metros" value="<?php if($valorForm[0]['largura']){echo $valorForm[0]['largura'];} ?>">
            </div>
            <div class="form-group col-md-4">
            <label class="form-label" for="andares">Andares</label>
            <input name="andares"  type="number" class="form-control" id="andares"
            placeholder="Andares" value="<?php if($valorForm[0]['andares']){echo $valorForm[0]['andares'];} ?>">
            </div>

            <div class="form-group col-md-4">
            <label class="form-label" for="andares">Ativo</label>
            <input name="sit_barco"  type="number" class="form-control" id="sit_barco"
            placeholder="Andares" value="<?php if($valorForm[0]['sit_barco']){echo $valorForm[0]['sit_barco'];} ?>">
            </div>

            </div>
            <input name="EditTopoHome" id="EditTopoHome" type="submit" class="btn btn-primary" value="Salvar">

            <input type="number" name="id_barco" id="" value="<?php if($valorForm[0]['id_barco']){echo $valorForm[0]['id_barco'];} ?>">
            <input type="submit" class="btn btn-danger" name="excluirBarco" id="excluirBarco" value="APAGAR">
                     
            </form>

  </div>
</div>


<?php

foreach($valorForm as $preco){
  echo $preco['preco_padrao'] ."<br>";
}
?>

  
<script>
   function preco2(){
     let preco2 = document.getElementById('preco_padrao').value
     let preco3 = parseFloat(preco2).toLocaleString('pt-BR');
     document.getElementById("resultado").innerHTML = preco3 +",00";
     return false;
     
   }       

   function novoCampo(){
     document.getElementById("novo_campo").innerHTML = '<div class="jumbotron"><form action="" method="POST" class="formulario" id="formulario-js" onclick="" onkeyup="">'+
'<div class="form-row"><input type="number" name="id_barco" id="id_barco" value="<?php $valorForm['id_barco']?>">'+
'<div class="form-group col-md-2"><label class="form-label" for="saida" >Saída:</label><input name="saida" type="time" class="form-control" id="saida" '+
'placeholder="Digite um horario" required></div>'+
'<div class="form-group col-md-2"><label class="form-label" for="retorno" >Retorno:</label>'+
'<input name="retorno" type="time" class="form-control" id="retorno" ' +
'placeholder="Digite um horario" value="<?php $valorForm['retorno']?>" required> </div>'+
'<div class="form-group col-md-4"><label class="form-label" for="preco" >Preço atual do bilhete:</label>'+
'<input name="preco" type="text" class="form-control" id="preco" disabled '+
'placeholder="" value="<?php number_format($form['preco_padrao'],2,",",".")?>"></div>'+
'<div class="form-group col-md-4"><label class="form-label" for="preco_padrao" >Novo preço:</label>'+
'<input name="preco_padrao" type="number" class="form-control" id="preco_padrao" '+
'placeholder="R$ <?php $valorForm['preco_padrao']?>"value="<?php $valorForm['saida']?>"></div>'+
'<div class="float-left"><input type="submit" name="novoPreco" id="salvar_hora" class="btn btn-primary" value="Salvar">'+
'</div><div class="float-right">'+
'<input type="submit" name="delete_hora" id="delete_hora" class="btn btn-danger"  value="Excluir"></div></form></div>'

   }


      
</script>














