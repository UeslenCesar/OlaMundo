<?php

namespace App\sts\Controllers;

            if(!defined('R3F3CC')){
                header("Location: /");
                die("Página não encontrada.");
            }

class Home {

    private $dados;
    public function index(){
        $viewHome=new \App\sts\Models\StsHome();
        $this->dados = $viewHome->index();

        $carregarview = new \Core\ConfigView("sts/Views/home/home", $this->dados);

        $carregarview->renderizar();
    }


    
}