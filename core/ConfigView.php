<?php

namespace Core;

if(!defined('R3F3CC')){
    header("Location: /");
    die("Página não encontrada.");
}

class ConfigView{

    private string $nome;
    private $dados;
    public function __construct($nome, array $dados){
        
        $this->nome=$nome;
        $this->dados=$dados;

        
    }

    public function renderizar(){

        if(file_exists('app/' . $this->nome . '.php')){
                include 'app/sts/Views/include/head.php';
                include 'app/' . $this->nome . '.php';
                include 'app/sts/Views/include/rodape.php';
                include 'app/sts/Views/include/footer.php';
        }else{
            echo"erro ao carregar a pagina<br>";
            echo"erro ao carregar a view: {$this->nome}<br>";
        }
    }
}