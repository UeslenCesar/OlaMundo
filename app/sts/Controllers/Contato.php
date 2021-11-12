<?php

namespace App\sts\Controllers;

            if(!defined('R3F3CC')){
                header("Location: /");
                die("Página não encontrada.");
            }

class Contato {

    private $dados;


    public function index(){
        
        $this->dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        $cadMsg = new \App\sts\Models\StsCadMsg();
        if($cadMsg->cadMsg($this->dados)){

            echo true;

             }else{
                    echo false;
             }

        
    }


    
}