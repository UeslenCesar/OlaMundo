<?php

namespace App\adms\Controllers;

            if(!defined('R3F3CC')){
                header("Location: /");
                die("Página não encontrada.");
            }

class Cadastro
{
    // private $dados;
    private $dadosForm;
    
    public function index() {
        
        $this->dadosForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        // var_dump($this->dados);

        $this->dados['form'] = $this->dadosForm;

   

        // if(!empty($this->dadosForm['proximo1'])){
        //     $valCadastro = new \App\adms\Models\AdmsCadastro();
        //     $valCadastro->cadastrar($this->dadosForm);
        //     if($valCadastro->getResultado()){
        //         $urlDestino = URLADM;
            
        //         header("Location: $urlDestino");
        //     }else{
        //         $this->dados['form'] = $this->dadosForm;
        //     }
        // }
        

        if(!empty($this->dadosForm['proximo1'])){
            $valCadastro = new \App\adms\Models\AdmsCadastro();
            $valCadastro->cadastrar($this->dadosForm);
            if($valCadastro->getResultado()){
                $urlDestino = URLADM;
            
                header("Location: $urlDestino");
            }else{
                $this->dados['form'] = $this->dadosForm;
            }
        }
        $carregarView = new \Core\ConfigView("adms/Views/cadastro/cadastro", $this->dados);
        $carregarView->renderizarCadastro();
    }
}





