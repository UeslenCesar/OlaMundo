<?php

namespace App\adms\Controllers;

            if(!defined('R3F3CC')){
                header("Location: /");
                die("Página não encontrada.");
            }

class Ativar
{
    private $chave;
    
    
    public function index() {
        
        $this->chave = filter_input(INPUT_GET, "chave", FILTER_DEFAULT);

        if(!empty($this->chave)){

          $ativarCadastro = new \App\adms\Models\AdmsAtivar();
          $ativarCadastro->validarChave($this->chave);
          $urlDestino = URLADM;
          header("Location: $urlDestino");

        }else{
            
            $urlDestino = URLADM. "cadastro";
            header("Location: $urlDestino");
        }

    }

}





