
<?php
if($valorForm['nome']){$nome = $valorForm['nome'];}
if($valorForm['sobrenome']){$sobrenome = $valorForm['sobrenome'];}
if($valorForm['cpf_cnpj']){$cpf_cnpj = $valorForm['cpf_cnpj'];}
if($valorForm['email']){$email = $valorForm['email'];}
if($valorForm['senha1']){$senha1 = $valorForm['senha1'];}
if($valorForm['senha2']){$senha2 = $valorForm['senha2'];}
echo'<h1 class="mx-4">Crie Sua Conta</h1>
<div class="container">



<!-- formulario de pessoa fisica -->
<form method="POST" action="" class="row g-3" style="text-align: left;">
<div class="col-md-4" style="padding-top: 35px;">
    <label for="nome" class="form-label">Nome</label>
   <input type="text" class="form-control" name="nome" value="'.$nome.'"
    placeholder="Digite seu nome" maxlength="90" required autofocus>

</div>

<div class="col-md-4" style="padding-top: 35px;">
    <label for="sobrenome" class="form-label">Sobrenome</label>
    <input type="text" class="form-control" name="sobrenome" value="'.$sobrenome.'"
    placeholder="Digite seu sobrenome" maxlength="90" required>
</div>

<div class="col-md-4" style="padding-top: 35px;">
    <label for="cpf" class="form-label">CPF</label>
    <input type="text" class="form-control" id="cpf" name="cpf_cnpj" value="'.$cpf_cnpj.'"
    placeholder="000.000.000-00" maxlength="14" onkeyup="maskcpf()" required>
</div> 

<!-- <div class="col-md-4" style="padding-top: 35px;"> 
    <label for="cpf" class="form-label">CNPJ</label>
    <input type="text" class="form-control" id="cnpj" name="cpf_cnpj" value="'.$cpf_cnpj.'"
    placeholder="000.000.000-00" maxlength="18" onkeyup="maskcnpj()" required>
</div> -->

<div class="col-md-4" style="padding-top: 55px;">
    <label for="email" class="form-label">E-mail</label>
    <input type="email" class="form-control" name="email" value="'.$email.'"
    placeholder="Digite um e-mail válido." required>
</div>


<div class="col-md-4" style="padding-top: 55px;">
    <label for="senha" class="form-label">Senha</label>
    <input type="password" class="form-control" name="senha" value="'.$senha1.'"
    placeholder="Digite sua senha" required>
</div>


<div class="col-md-4" style="padding-top: 55px; padding-bottom: 60px;">
    <label for="confirmarSenha" class="form-label">Confirmar senha</label>
    <input type="password" class="form-control" name="senha" value="'.$senha2.'"
    placeholder="Confirme sua senha">
</div> 


<input type="submit" name="proximo1" class="btn-login" value="proximo"><br>

</form>

<div class="progress">
  <div style="width: 20%; background-color: #4FAAC6" ></div>
</div>
<h2>Etapa 1 de 5</h2>
</div>


';?>