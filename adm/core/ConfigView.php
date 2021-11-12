<?php

namespace Core;

if(!defined('R3F3CC')){
    header("Location: /");
    die("Página não encontrada.");
}

class ConfigView{

    private string $nome;
    private $dados;

    
    public function __construct($nome, array $dados = null){
        
        $this->nome=$nome;
        $this->dados=$dados;

        
    }

    public function renderizar(){

        if(file_exists('app/' . $this->nome . '.php')){
                include 'app/adms/Views/include/head.php';
                // include 'app/adms/Views/include/menu.php';
                include 'app/' . $this->nome . '.php';
                // include 'app/sts/Views/include/rodape.php';
                include 'app/adms/Views/include/footer.php';
        }else{
            echo"erro ao carregar a pagina<br>";
            echo"erro ao carregar a view: {$this->nome}<br>";
        }
    }

    public function renderizarControles(){

        if(file_exists('app/' . $this->nome . '.php')){
                include 'app/adms/Views/include/head.php';
                include 'app/adms/Views/include/menu_controles.php'; /*menu lateral*/
                include 'app/' . $this->nome . '.php';
                // include 'app/sts/Views/include/rodape.php';
                include 'app/adms/Views/include/footer.php';
        }else{
            echo"erro ao carregar a pagina<br>";
            echo"erro ao carregar a view: {$this->nome}<br>";
        }
    }

    public function renderizarLogin(){

        if(file_exists('app/' . $this->nome . '.php')){
                include 'app/adms/Views/include/head_login.php';
                include 'app/' . $this->nome . '.php';
                // include 'app/sts/Views/include/rodape.php';
                include 'app/adms/Views/include/footer.php';
        }else{
            echo"erro ao carregar a pagina<br>";
            echo"erro ao carregar a view: {$this->nome}<br>";
        }
    }

    public function renderizarCadastro(){

        if(file_exists('app/' . $this->nome . '.php')){
                include 'app/adms/Views/include/head_cadastro.php';
                include 'app/' . $this->nome . '.php';
                // include 'app/sts/Views/include/rodape.php';
                include 'app/adms/Views/include/footer.php';
        }else{
            echo"erro ao carregar a pagina<br>";
            echo"erro ao carregar a view: {$this->nome}<br>";
        }
    }

    public function renderizarEmbarcacao(){

        if(file_exists('app/' . $this->nome . '.php')){
                include 'app/adms/Views/include/head_cadastro.php';
                include 'app/' . $this->nome . '.php';
                // include 'app/sts/Views/include/rodape.php';
                include 'app/adms/Views/include/footer.php';
        }else{
            echo"erro ao carregar a pagina<br>";
            echo"erro ao carregar a view: {$this->nome}<br>";
        }
    }



}