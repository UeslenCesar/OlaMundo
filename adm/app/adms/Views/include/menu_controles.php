

<!-- <?php if($this->dados['home']['topo']){ 
    extract($this->dados['home']['topo']);   
    ?> -->
    
            
            <!-- <dl class="row"> 
            <dt class="col-sm-3">Titulo asaasa topo</dt>
            <div class="img-perfil"> 
            <img src="<?php echo URLADM;?>app/adms/assets/imagens/topo/<?php echo $imagem_topo;?>" width="250" height="150" >
                <div class="edit">
                <a href="<?php echo URLADM ?>topoimg" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a>
                </div>
            </div>
            <dd class="col-sm-9"><?php echo $this->dados['home']['topo']['titulo_topo'];?></dd>
             <dd class="col-sm-9">
            < ?php //echo $subtitulo_topo;?>
            </dd> 
            <dt class="col-sm-3">Subtitulo</dt>
            <dd class="col-sm-9"><?php echo $subtitulo_topo;?></dd>
            <dt class="col-sm-3">Texto do botão</dt>
            <dd class="col-sm-9"><?php echo $text_btn_topo;?></dd>
            <dt class="col-sm-3">Link do botão</dt>
            <dd class="col-sm-9"><?php echo $link_btn_topo;?></dd>
            </dl>  -->
    
            <!-- <?php }else{
                echo '<div class="alert alert-danger" role="alert"><Sem registro.</div>';
            } ?> -->
    
    
    
    <?php
    if(isset($this->dados['home']['barcos'])){
        $barcos = $this->dados['home']['barcos'];
        // var_dump($barcos);
    }
    if(isset($this->dados['home']['bilhetes'])){
        $bilhetes=$this->dados['home']['bilhetes'];
    
    }
    $barcos = $this->dados['home']['barcos'];
    $bilhetes2=$this->dados['home']['bilhetes2'];
    $totalBilhetes = $this->dados['totalbilhetes'];
    // var_dump($this->dados['totalbilhetes']);
    // var_dump($this->dados['home']['barcos']);
    
    // var_dump($barcos[0]['nome_barco']);
    // var_dump($bilhetes[0]['total']);
    
    // var_dump($bilhetes[11]['nome_barco']);
    
    // var_dump($barcos);
    // var_dump($bilhetes2);
    // $dados=$this->dadosForm;
    
    
    
    // var_dump($bilhetes);
    
    $dadosFormulario = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    // var_dump($dadosFormulario);
    
    // echo $dadosFormulario['busca'];
    
    date_default_timezone_set('America/Sao_Paulo');
            $hoje = date('Y-m-d');
    ?>


<div class="painel">

<div class="navigation">
    <ul>
        <li>
            <a href="#" onclick="toggleMenu()">
            <span class="icon" id="list"><i class="bi bi-list"></i></span>
            <span class="title">PAINEL DE CONTROLE</span>
            </a>
        </li>

        <li>
            <a href="#">
            <span class="icon"><i class="bi bi-person-circle"></i></span>
            <span class="title"><?php echo $_SESSION['nome_adm'];?></span>
            </a>
        </li>

        <li>
            <a class="" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
            <span class="icon"><i class="bi bi-compass"></i></span>
            <!-- <span class="title"><?php if(isset($barcos)){echo $barcos[0]['nome_barco'];}else{echo "Nunhuma Embarcação";} ?></span> -->
            <span class="title">Embarcação</span>
            </a>      
</p>
<div class="collapse" id="collapseExample">
  <div class="card card-body">
  <select class="select" id="barco" name="barco" multiple onchange="busca()">
     <?php foreach($barcos as $embarcacao){
    echo '<option value="'.$embarcacao['id_barco'].'">'.strtoupper($embarcacao['nome_barco']).'</option>';
    } ?> 
</select>
  </div>
</div>


            
        </li>
        <li>
            <a href=<?php echo URLADM."embarcacao";?>>
            <span class="icon"><i class="bi bi-plus-circle"></i></span>
            <span class="title">Cadastrar Embarcação</span>
            </a>
        </li>

        <li>
        <a href="<?php echo URLADM."view";?>">
            <span class="icon"><i class="bi bi-sliders"></i></span>
            <span class="title">Configurações Gerais</span>
            </a>
        </li>
        <li>
            <a href="<?php echo URLADM."topoimg";?>">
            <span class="icon"><i class="bi bi-images"></i></span>
            <span class="title">Galeria de Fotos</span>
            </a>
        </li>
     
        <li>
            <a href="<?php echo URLADM."home";?>">
            <span class="icon"><i class="bi bi-stickies"></i></span>
            <span class="title">Bilhetes</span>
            </a>
        </li>
        <li>
            <a href="<?php echo URLADM."sair";?>">
            <span class="icon"><i class="bi bi-box-arrow-left"></i></span>
            <span class="title">Sair</span>
            </a>
        </li>
        <hr>
        <li>
            <a href="<?php echo URL;?>">
            <span class="icon"><i class="bi bi-house-fill"></i></span>
            <span class="title">Pagina Principal</span>
            </a>
        </li>
        
    </ul>
</div>

<div class="topbar"> 
            



            <div class="toggle" onclick="toggleMenu()"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40"  class="bilist" viewBox="0 0 16 16">
      <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
    </svg></div>
    
    <div class="user">
                <img src="<?php echo URLADM;?>app/adms/assets/imagens/topo/user.jpg" alt="">
            </div>
    <div class="welcome">
        <span class="adm">
        <?php echo $_SESSION['nome_adm']." | "; ?></span>
        <span class="email"><?php echo $_SESSION['email_adm']; ?></span>
    
    </div>
    <div class="search">
                <label>
                        <form method="POST" action="">
                        <input type="date" name="dia" id="dia" value="<?php $hoje2 ?>" >
                        
                        <!-- <input type="text" placeholder="<?php echo date('d/m/Y', strtotime($hoje)) ?>" onfocus="(this.type='date')" name="dia" id="dia" value="<?php $hoje2 ?>" required> -->
                <!-- <input type="number" name="busca" id="busca" value=""> -->
                </label>
                </div>
    
                <select class="form-select" id="busca" name="busca" hidden>
         <?php foreach($barcos as $embarcacao){
        echo '<option value="'.$embarcacao['id_barco'].'">'.strtoupper($embarcacao['id_barco']).$embarcacao['nome_barco'].'</option>';
        } ?> 
    </select>
    
    
             <input class="btn" type="submit" id="buscar" name="buscar" value="OK">
             <!-- <button type="submit" value="k"><span class="icon"><i class="bi bi-house-door-fill"></i></span></button> -->
         </form>
            
  </div>
  
 