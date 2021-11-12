<?php


if(!defined('R3F3CC')){
    header("Location: /");
    die("Página não encontrada.");
}

if(isset($_SESSION['msg'])){
    echo $_SESSION['msg'];
    // unset($_SESSION['msg']);

   

}

    if(isset($this->dados['form'])){
        $valorForm = $this->dados['form'];


    $id_adm = $_SESSION['id_adm'];
    


}
?>




<br><br>
<?php
if($valorForm['nome']){$nome = $valorForm['nome'];}
if($valorForm['sobrenome']){$sobrenome = $valorForm['sobrenome'];}
if($valorForm['cpf_cnpj']){$cpf_cnpj = $valorForm['cpf_cnpj'];}
if($valorForm['email']){$email = $valorForm['email'];}
if($valorForm['senha1']){$senha1 = $valorForm['senha1'];}
if($valorForm['senha2']){$senha2 = $valorForm['senha2'];}

$id_adm = $_SESSION['id_adm'];
$_SESSION['email_adm'];
$nome = $_SESSION['nome_adm'];
// echo "<h1>Olá, " .$_SESSION['nome_adm'].".</h1>";
$this->dadosForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);

echo "ADM".$id_adm;


$time=rand(1111,9999)."teste";

?>

<!-- ##################################### -->






<?php

$formulario = '<h2 class="mx-4">Olá, '."$nome".'. Cadastre sua Embarcação</h2>
<div class="container" style="text-align:center;">
<form method="POST" action="" class="row g-3" style="text-align: left; min-height: 350px;">
<div class="col-md-6" style="padding-top: 35px;">
    <label for="nome" class="form-label">Nome da Embarcação</label>
   <input type="text" class="form-control" name="nome" 
 placeholder="Nome da Embarcação" maxlength="90" autofocus  value='."$time".' required>

</div>

<div class="col-md-4" style="padding-top: 35px;">
    <label for="tipo" class="form-label">Tipo</label>
    <input type="text" class="form-control" name="tipo" value="traineira"
    placeholder="Tipo de embarcação" maxlength="90" >
</div>

<div class="col-md-2" style="padding-top: 35px;">
    <label for="cpf" class="form-label">Capacidade</label>
    <input type="number" class="form-control" id="capacidade" name="capacidade" value="1"
    placeholder="Número de vagas" min="1" max="999" >
</div> 

<div class="col-md-3" style="padding-top: 55px;">
    <label for="comprimento" class="form-label">Comprimento</label>
    <input type="number" class="form-control" name="comprimento"
    placeholder="Comprimento em metros" required min="1" max="999" value="1">
</div> 

<div class="col-md-3" style="padding-top: 55px;">
    <label for="largura" class="form-label">Largura</label>
    <input type="number" class="form-control" name="largura"
    placeholder="largura em metros" required min="1" max="999" value="1">
</div> 



<div class="col-md-4" style="padding-top: 55px;">
    <label for="estado" class="form-label">Cidade</label>
    <div class="input-group">
        <select class="form-select" id="cidade" name="cidade" >
        <option value="buzios">Armação dos Búzios</option>
        <option value="arraial do cabo" selected>Arraial do Cabo</option>
        <option value="cabo frio">Cabo Frio</option>
        </select>
    </div>
</div> 

<div class="col-md-2" style="padding-top: 55px;">
    <label for="andares" class="form-label">Andares</label>
    <input type="number" class="form-control" name="andares"
    placeholder="Número de andares" required min="1" max="99" value="1">
</div>


<input type="submit" name="proximo2" class="btn-login2" value="proximo"><br>

</form>
<div class="progress">
  <div style="width: 17%; background-color: #4FAAC6" ></div>
</div>
<h2>Etapa 1 de 6</h2>
</div>';

$formulario2 = '<h2 class="mx-4">Atividades da Embarcação</h2>
<div class="container" style="text-align:center;"><form method="POST" action="">
<div id="box">
<div class="form-check form-switch" id="switch">
<input class="form-check-input" type="checkbox" id="passeio" name="passeio" value="1" checked>
<label class="form-check-label" for="passeio">Passeio</label>
</div>
</div>


<div id="box">
<div class="form-check form-switch" id="switch">
<input class="form-check-input" type="checkbox" id="passeio_exclusivo" name="passeio_exclusivo" value="1">
<label class="form-check-label" for="passeio_exclusivo">Passeio Exclusivo</label>
</div>
</div>

<div id="box">
<div class="form-check form-switch" id="switch">
<input class="form-check-input" type="checkbox" id="mergulho" name="mergulho" value="1">
<label class="form-check-label" for="mergulho">Mergulho</label>
</div>
</div>


<div id="box">
<div class="form-check form-switch" id="switch">
<input class="form-check-input" type="checkbox" id="pesca_esportiva" name="pesca_esportiva" value="1">
<label class="form-check-label" for="pesca_esportiva">Pesca Esportiva</label>
</div>
</div>


<div id="box">
<div class="form-check form-switch" id="switch">
<input class="form-check-input" type="checkbox" id="barco_taxi" name="barco_taxi" value="1">
<label class="form-check-label" for="barco_taxi">Barco-Táxi</label>
</div>
</div>


<div id="box">
<div class="form-check form-switch" id="switch">
<input class="form-check-input" type="checkbox" id="locacao" name="locacao" value="1" disabled>
<label class="form-check-label" for="locacao">Locação</label>
</div>
</div>


<input type="submit" name="proximo3" class="btn-login2" value="proximo"><br>

</form>
<div class="progress">
  <div style="width: 35%; background-color: #4FAAC6" ></div>
</div>
<h2>Etapa 2 de 6</h2>
</div>';

$formulario3 = '<h1 class="mx-4">Titular da Embarcação</h1>
<div class="container"><br>


<form method="POST" action="" class="row g-3" style="text-align: left;">

<div class="radio" >
<div id="box">
<div class="form-check form-switch" id="switch" onchange="mudarnome()">
  <input class="form-check-input" type="radio" name="radio_cpf" id="radio_cpf" checked>
  <label class="form-check-label" for="radio_cpf">Pessoa Física</label>
</div>
</div>

<div id="box">
<div class="form-check form-switch" id="switch" onchange="mudarnome()">
  <input class="form-check-input" type="radio" name="radio_cpf" id="radio_cnpj" >
  <label class="form-check-label" for="radio_cnpj">Pessoa Jurídica</label>
</div>
</div>
</div>


<div class="col-md-6" id="campo_nome" style="padding-top: 35px;">
    <label for="nome" class="form-label" id="mudanome">Nome do Titular</label>
   <input type="text" class="form-control" name="nome" value="'.$nome.'"
    placeholder="Digite o nome do tiular" maxlength="90" autofocus>

</div>

<div class="col-md-6" id="campo_sobrenome" style="padding-top: 35px;">
    <label for="sobrenome" class="form-label" id="mudasobrenome">Sobrenome</label>
    <input type="text" class="form-control" name="sobrenome"  value="'.$sobrenome.'"
    placeholder="Digite o sobrenome" maxlength="90" >
</div>

<div class="col-md-6" id="campo_cpf" style="padding-top: 35px;">
    <label for="cpf_cnpj" class="form-label" id="mudacpf">CPF</label>
    <input type="text" class="form-control" id="cpf_cnpj" name="cpf_cnpj" value="'.$cpf_cnpj.'"
    placeholder="000.000.000-00" maxlength="14" onkeyup="maskcpf()">
</div> 



<div class="col-md-6" style="padding-top: 35px;">
    <label for="tie_tiem" class="form-label">Tie / Tiem</label>
    <input type="number" class="form-control" name="tie_tiem" value=""
    placeholder="Número do Tie / Tiem" >
</div>




<input type="submit" name="proximo4" class="btn-login2" value="proximo"><br>

</form>


</div>
';
$formulario4 = '<h2 class="mx-4">Escolha a foto da Embarcação</h2>
<div class="container" style="text-align:center;">
<form method="POST" action="" enctype="multipart/form-data" class="row g-3" style="text-align: left; min-height: 350px;">
<div class="mb-3">
  <label for="foto_barco" class="form-label">Selecione a foto da principal</label>
  <input class="form-control" type="file" name="imagem_nova" id="imagem_nova" >
</div>

<input type="submit" name="proximo5" class="btn-login2" value="proximo"><br>

</form>
</div>';


if($this->dadosForm['proximo2']){
    
    echo $formulario2;
    echo $_SESSION['foto_barco']."<br><hr>";
    echo $_SESSION['codigo_hash'];
    echo $_SESSION['last_id'];
    // unset($_SESSION['msg']);


    } elseif($this->dadosForm['proximo3']){
        echo $formulario3;

    }elseif($this->dadosForm['proximo4']){
        echo $formulario4;
           

    } else{
        echo $formulario;
        

      

    }




?>









