<?php

namespace App\adms\Controllers;

            if(!defined('R3F3CC')){
                header("Location: /");
                die("Página não encontrada.");
            }


class Login
{
    private $dados;
    private $dadosForm;
    
    public function index() {
        
        $this->dadosForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if(!empty($this->dadosForm['SendLogin'])){
            $valLogin = new \App\adms\Models\AdmsLogin();
            $valLogin->login($this->dadosForm);
            if($valLogin->getResultado()){
                $urlDestino = URLADM ."home";
                header("Location: $urlDestino");
            }else{
                $this->dados['form'] = $this->dadosForm;
            }
        }
        // var_dump($this->dados);
        $carregarView = new \Core\ConfigView("adms/Views/login/login", $this->dados);
        $carregarView->renderizarLogin();
    }
}