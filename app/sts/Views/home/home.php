<?php


if(!defined('R3F3CC')){
    header("Location: /");
    die("Página não encontrada.");
}


?>

<!-- <body scroll="no" style="overflow: hidden"> -->

<body>
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <!-- <a class="navbar-brand" href="#">Encontre uma embarcação</a> -->
      <div class="container"> 

        <h2 class="logo2">Bilhete Náutico</h2>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
    
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
            <a class="nav-link" href="#inicio">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#servicos">Serviços</a>
            </li>
            
            <li class="nav-item">
            <a class="nav-link" href="<?php echo URLADM;?>">Usuário</a>
            </li>

            <li class="nav-item">
            <a class="nav-link" href="#contato" >Contato</a>
            </li>

        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="hidden" placeholder="Buscar" aria-label="Search">
            <button class="btn btn-success my-0 my-sm-0" type="submit" style="background-color: #00000000;"><i class="fas fa-search"></i></button>
        </form>
    </div>
        </div>
    </nav>
    
        






    <div class="jumbotron text-center descr-topo" style="background-image: url('<?php echo URLADM;?>app/adms/assets/imagens/topo/<?php echo $this->dados['topo']['imagem_topo'];?>')">
        <h2><a name="inicio" class="link"></a></h2>
        <div class="container">
            <h1 class="logo1" style type="text/css">Viva a experiência!<?php echo $this->dados['topo']['titulo_topo'];?></h1>
            <!-- <p class="lead mb-4"><?php echo $this->dados['topo']['subtitulo_topo'];?></p> -->
            <p>
            <!-- <a href="<?php echo $this->dados['topo']['link_btn_topo'];?>" class="btn btn-dark bnt-lg" style="background-color: #338f85;"> Mais detalhes<?php echo $this->dados['topo']['text_btn_topo'];?></a> -->
            </p>
         </div>

        </div>





        <div class="jumbotron servicos" style="color: #338f85;">
            <h2><a name="servicos" class="link"></a></h2>
            <div class="container text-center">
            <h2 class="display-4"><?php echo $this->dados['serv']['titulo_serv'];?></h2>
            <p class="lead pb-4"><?php echo $this->dados['serv']['sutitulo_serv'];?></p>

            <div class="row">
                <div class="col-lg-4">
                <div class="rounded-circle circulo centralizar shadow border border-info">
                    <i class="<?php echo $this->dados['serv']['icone_um_serv'];?>"></i>
                </div>
                <h2 class="mt-4 mb-4"><?php echo $this->dados['serv']['titulo_um_serv'];?></h2>
                <p><?php echo $this->dados['serv']['desc_um_serv'];?></p>
                </div>
                <div class="col-lg-4">
                <div class="rounded-circle circulo centralizar shadow border border-info">
                    <i class="<?php echo $this->dados['serv']['icone_dois_serv'];?>"></i>
                    </div>
                    <h2 class="mt-4 mb-4"><?php echo $this->dados['serv']['titulo_dois_serv'];?></h2>
                <p><?php echo $this->dados['serv']['desc_dois_serv'];?></p>
                </div>
                <div class="col-lg-4">
                <div class="rounded-circle circulo centralizar shadow border border-info">
                    <i class="<?php echo $this->dados['serv']['icone_tres_serv'];?>"></i>
                    </div>
                    <h2 class="mt-4 mb-4"><?php echo $this->dados['serv']['titulo_tres_serv'];?></h2>
                <p><?php echo $this->dados['serv']['desc_tres_serv'];?></p>
                </div>

            </div>

            </div>
            </div>

        <div class="jumbotron descr-chamada" style= "background-image: url('<?php echo URL?>app/sts/assets/imagens/acao/<?php echo $this->dados['acoes']['imagem_acao'];?>');">
            <h2><a name="descricao" class="link"></a></h2>
            <div class="container text-center">
            <h4 class="lead"><?php echo $this->dados['acoes']['titulo_acao'];?></h4>
            <h2 class="display-4"><?php echo $this->dados['acoes']['subtitulo_acao'];?></h2>
            <p class="lead mb-4"><?php echo $this->dados['acoes']['desc_acao'];?></p>
            <a href="<?php echo $this->dados['acoes']['link_btn_acao'];?>" class="btn btn-primary btn-lg"><?php echo $this->dados['acoes']['text_btn_acao'];?></a>
        
            </div>



        </div>


            <div class="jumbotron contato">
            <h2><a name="contato" class="link"></a></h2>
            <div class="container text-center">
            <h2 class="display-4 mb-4"><?php echo $this->dados['cont']['titulo_contato'];?></h2>

            <div class="row">
                <div class="col-lg-6">
                <h2 class="mt-4 mb-4"><?php echo $this->dados['cont']['subtitulo_contato'];?></h2>
                <p>Endereço: <?php echo $this->dados['cont']['end_contato'];?></p>
                <p><?php echo $this->dados['cont']['tel_contato'];?></p>
                <p><?php echo $this->dados['cont']['email_contato'];?></p>
                </div>
                <div class="col-lg-6">
                
                <form method="POST" id="insert_form">
                    <div class="form-group" >
                        <label for="nome">Nome</label>
                        <input type="hidden" id="url" value="<?php echo URL;?>contato">
                        <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome completo">
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Seu melhor e-mail" >
                    </div>
                    <div class="form-group">
                        <label for="assunto">Assunto</label>
                        <input type="text" name="assunto" class="form-control" id="assunto" placeholder="Assunto da mensagem" >
                    </div>
                    <div class="form-group">
                        <label for="conteudo">Conteúdo</label>
                        <textarea name="conteudo" class="form-control" id="conteudo" placeholder="Conteúdo da mensagem" ></textarea>
                    </div>
                    <input type="submit" name="CadMsg" id="CadMsg" value="Enviar" class="btn btn-primary">
                </form>
                <span class="msg"></span>
                </div>
            </div>
            </div>
        </div>
