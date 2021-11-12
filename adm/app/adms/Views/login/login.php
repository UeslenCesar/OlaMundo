<?php


            if(!defined('R3F3CC')){
                header("Location: /");
                die("Página não encontrada.");
            }

            // echo password_hash(123456, PASSWORD_DEFAULT);

         

            // var_dump($this->dados);
            if(isset($this->dados['form'])){
                $valorForm =$this->dados['form'];
            }

            ?>




<section class="form-section">
      <!-- <img src="<?php echo URLADM; ?>app/adms/assets/imagens/ship-wheel.png" alt="" height="50" width="50"> -->
     <h1>Acesso Restrito</h1>

      <div class="form-wrapper">
        <form action="" method="POST">
        <?php   if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }

            ?>
          <div class="input-block">
            <label for="login-email">Email</label>
            <input type="email" id="usuario" name="usuario" value="99@gmail.com"
  required autofocus/>
  <!-- <input type="email" id="usuario" name="usuario" value="<?php if(isset($valorForm['usuario'])){echo $valorForm['usuario'];}?>"
  required autofocus/> -->
          </div>
          <div class="input-block">
            <label for="login-password">Senha</label>
            <input type="password" id="senha" name="senha" required value="1"/>
          </div>
          <input type="submit" name="SendLogin" id="SendLogin" class="btn-login" value="Login"><br>
          
          <p class="linha-inferior"><a href="<?php echo URLADM; ?>cadastro">Ainda não é cadastrado?<br>Crie sua conta. </a></p>
        </form>
      </div>
     

    </section>
    