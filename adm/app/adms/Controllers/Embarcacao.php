<?php

namespace App\adms\Controllers;

            if(!defined('R3F3CC')){
                header("Location: /");
                die("Página não encontrada.");
            }

class Embarcacao
{
    private $dados;
    public function index() {
        
        $this->dadosForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);


        $this->dados['form'] = $this->dadosForm;
        var_dump($this->dados['form']['nome']);



       
     if($this->dadosForm['proximo2']){
            // $request = md5($this->dados['nome']);
            // if(isset($_SESSION['ultima_request']) && $_SESSION['ultima_request'] == $request){

            //     // header("Refresh:0;");

            //     $urlDestino = URLADM;
                
            //     header("Location: $urlDestino"."embarcacao");
            //     $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">Esta embarcação já foi cadastrada!</div>';

            // }else{

                $valCadastro = new \App\adms\Models\AdmsCadastro();
                $valCadastro->cadastrar2($this->dadosForm);
                // $_SESSION['ultima_request'] = $request;

                
            // }

    }

        if($this->dados['proximo3']){
            $valCadastro = new \App\adms\Models\AdmsCadastro();
            $valCadastro->cadastrar3($this->dados);
            // }
            // if($valCadastro->getResultado()){


            //    $urlDestino = URLADM ."embarcacao";            
            //     header("Location: $urlDestino");
             
            }else{
                $this->dados['form'] = $this->dados;
                
            
        }

        


        $carregarView = new \Core\ConfigView("adms/Views/embarcacao/embarcacao", $this->dados);
        $carregarView->renderizarCadastro();
    }

 
}





