<?php


if(!defined('R3F3CC')){
    header("Location: /");
    die("Página não encontrada.");
}

if(isset($_SESSION['msg'])){
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}

    if(isset($this->dados['form'])){
        $valorForm = $this->dados['form'];
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


echo'<h1 class="mx-4">Crie Sua Conta</h1>
<div class="container"><br>






<!-- formulario de pessoa fisica -->



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


<div class="col-md-4" id="campo_nome" style="padding-top: 35px;">
    <label for="nome" class="form-label" id="mudanome">Nome</label>
   <input type="text" class="form-control" name="nome" value="'.$nome.'"
    placeholder="Digite seu nome" maxlength="90" >

</div>

<div class="col-md-4" id="campo_sobrenome" style="padding-top: 35px;">
    <label for="sobrenome" class="form-label" id="mudasobrenome">Sobrenome</label>
    <input type="text" class="form-control" name="sobrenome"  value="'.$sobrenome.'"
    placeholder="Digite seu sobrenome" maxlength="90" >
</div>

<div class="col-md-4" id="campo_cpf" style="padding-top: 35px;">
    <label for="cpf_cnpj" class="form-label" id="mudacpf">CPF</label>
    <input type="text" class="form-control" id="cpf_cnpj" name="cpf_cnpj" value="'.$cpf_cnpj.'"
    placeholder="000.000.000-00" maxlength="18" onkeyup="maskcpf()">
</div> 

<!-- <div class="col-md-4" style="padding-top: 35px;"> 
    <label for="cpf" class="form-label">CNPJ</label>
    <input type="text" class="form-control" id="cnpj" name="cpf_cnpj" value="'.$cpf_cnpj.'"
    placeholder="00.000.000/0000-00" maxlength="18" onkeyup="maskcnpj()" >
</div> -->

<div class="col-md-4" style="padding-top: 55px;">
    <label for="email" class="form-label">E-mail</label>
    <input type="email" class="form-control" name="email" value="@gmail.com"
    placeholder="Digite um e-mail válido." required autofocus >
</div>


<div class="col-md-4" style="padding-top: 55px;">
    <label for="senha" class="form-label">Senha</label>
    <input type="password" class="form-control" name="senha" value="1"
    placeholder="Digite sua senha" >
</div>


<div class="col-md-4" style="padding-top: 55px;">
    <label for="confirmarSenha" class="form-label">Confirmar senha</label>
    <input type="password" class="form-control" name="senha" value="1"
    placeholder="Confirme sua senha">
</div> 


<input type="submit" name="proximo1" class="btn-login2" value="proximo"><br>

</form>


</div>


';

?>





