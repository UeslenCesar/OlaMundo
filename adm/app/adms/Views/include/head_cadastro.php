<?php


if(!defined('R3F3CC')){
    header("Location: /");
    die("Página não encontrada.");
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="<?php echo URLADM;?>app/adms/assets/imagens/icone/favicon.ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l"
    crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
    crossorigin="anonymous">

    <link rel="stylesheet" href="<?php echo URLADM;?>app/adms/assets/css/style.css">
    <title>Área Restrita</title>
    <script>

    /*    

       function mudarnome(){
            if ( document.getElementById("radio_cnpj").checked==true ){
                var labelNome = document.getElementById("mudanome");
                labelNome.innerHTML = "Nome Fantasia";
                var labelSobrenome = document.getElementById("mudasobrenome");
                labelSobrenome.innerHTML = "Razão Social";
                var labelCpf = document.getElementById("mudacpf");
                labelCpf.innerHTML = "CNPJ";
                var radios = document.getElementById("campo");
                radios.innerHTML = `<label for="cpf_cnpj" class="form-label" id="mudacpf">CNPJ</label>
    <input type="text" class="form-control" id="cpf_cnpj" name="cpf_cnpj" value=""
    placeholder="00.000.000/0000-00" maxlength="18" onkeyup="maskcnpj()">`;
                
                return false;
            }else if (document.getElementById("radio_cpf").checked==true){
                var labelNome = document.getElementById("mudanome");
                labelNome.innerHTML = "Nome";
                var labelSobrenome = document.getElementById("mudasobrenome");
                labelSobrenome.innerHTML = "Sobrenome";
                var labelCpf = document.getElementById("mudacpf");
                labelCpf.innerHTML = "CPF";
                var radios = document.getElementById("campo");
                radios.innerHTML = `<label for="cpf_cnpj" class="form-label" id="mudacpf">CPF</label>
    <input type="text" class="form-control" id="cpf_cnpj" name="cpf_cnpj" value=""
    placeholder="000.000.000-00" maxlength="14" onkeyup="maskcpf()">`;
                var nome = document.getElementById("camponome");
                nome.innerHTML =`<label for="nome" class="form-label">Nome Fantasia</label>
   <input type="text" class="form-control" name="nome" value=""
    placeholder="Digite o nome da empresa" maxlength="90" >`
                return false;
            }
        }

    */    
                 
        function mudarnome(){
            if ( document.getElementById("radio_cnpj").checked==true ){
                var labelNome = document.getElementById("campo_nome");
                labelNome.innerHTML = `<label for="nome" class="form-label" id="mudanome">Nome Fantasia</label>
   <input type="text" class="form-control" name="nome" value=""
    placeholder="Digite o nome da Empresa" maxlength="90" autofocus>`;
                var sobrenome = document.getElementById("campo_sobrenome");
                sobrenome.innerHTML = `<label for="sobrenome" class="form-label" id="mudasobrenome">Razão Social</label>
    <input type="text" class="form-control" name="sobrenome"  value=""
    placeholder="Digite a Razão Social" maxlength="90" >`;
                var radios = document.getElementById("campo_cpf");
                radios.innerHTML = `<label for="cpf_cnpj" class="form-label" id="mudacpf">CNPJ</label>
    <input type="text" class="form-control" id="cpf_cnpj" name="cpf_cnpj" value=""
    placeholder="00.000.000/0000-00" maxlength="18" onkeyup="maskcnpj()">`;
                
                return false;
            }else if(document.getElementById("radio_cpf").checked==true){
                var labelNome = document.getElementById("campo_nome");
                labelNome.innerHTML = `<label for="nome" class="form-label" id="mudanome">Nome</label>
   <input type="text" class="form-control" name="nome" value=""
    placeholder="Digite seu nome" maxlength="90" autofocus>`;
                var sobrenome = document.getElementById("campo_sobrenome");
                sobrenome.innerHTML = ` <label for="sobrenome" class="form-label" id="mudasobrenome">Sobrenome</label>
    <input type="text" class="form-control" name="sobrenome"  value=""
    placeholder="Digite seu sobrenome" maxlength="90" >`;
                var radios = document.getElementById("campo_cpf");
                radios.innerHTML = `    <label for="cpf_cnpj" class="form-label" id="mudacpf">CPF</label>
    <input type="text" class="form-control" id="cpf_cnpj" name="cpf_cnpj" value=""
    placeholder="000.000.000-00" maxlength="18" onkeyup="maskcpf()">`;
  
                return false;
            }
        }
       


        function maskcpf(){
            var cpf = document.getElementById('cpf_cnpj')
            if(cpf.value.length == 3 || cpf.value.length == 7){
                cpf.value += "."
            }else if(cpf.value.length == 11){
                cpf.value +="-"
            }
        }

        function maskcnpj(){
            var cnpj = document.getElementById('cpf_cnpj')
            if(cnpj.value.length == 2 || cnpj.value.length == 6){
                cnpj.value += "."
            }else if(cnpj.value.length == 10){
                cnpj.value +="/"
            }else if
                (cnpj.value.length == 15)
                cnpj.value +="-"
            
        }


     
        
    </script>
</head>
<body class="text-center">
    
<!-- </body>
</html> -->