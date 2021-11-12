<?php

namespace App\adms\Controllers;

use App\adms\Models\AdmsViewHome;

if(!defined('R3F3CC')){
                header("Location: /");
                die("Página não encontrada.");
            }

class Home {

    private $dados;

    public function index(){

        $this->dadosForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        // $this->dados = $this->dadosForm;
        // var_dump($this->dados);



            // $viewHome = new \App\adms\Models\AdmsViewHome();
            // // $this->dados['barcos'] = $viewHome->viewHome();
            // $this->dados['home'] = $viewHome->viewHome();
            // $carregarView = new \Core\ConfigView("adms/Views/home/home", $this->dados);
            // $carregarView->renderizar();



            if(!empty($this->dadosForm['buscar'])){


                $viewHome = new \App\adms\Models\AdmsViewHome();
                    $this->dados['home'] = $viewHome->viewBilhetes($this->dadosForm);
                    // $this->dados['home']=$viewHome->totalBilhetes();
                    // $this->dados['home'] = $viewHome->viewHome();
                    //  var_dump($this->dados['home']);
                    $carregarView = new \Core\ConfigView("adms/Views/home/home", $this->dados);
                    $carregarView->renderizarControles();
                  




                // $viewBilhetes = new \App\adms\Models\AdmsViewHome();
                // $this->dados['bilhetes'] = $viewBilhetes->viewBilhetes();
                // $carregarView = new \Core\ConfigView("adms/Views/home/home", $this->dados);
                // $carregarView->renderizar();
                // var_dump($this->dadosForm);
                
                
                // $viewHome = new \App\adms\Models\AdmsViewHome();
                // $this->dados['home'] = $viewHome->viewHome();
                // $carregarView = new \Core\ConfigView("adms/Views/home/home", $this->dados);
                // $carregarView->renderizar();

            
                
                // if($viewBilhetes->getResultado()){
                    // $urlDestino = URLADM."home";
                
                    // header("Location: $urlDestino");
                //     $carregarView = new \Core\ConfigView("adms/Views/home/home", $this->dados);
                //     $carregarView->renderizar();

              
                
                }else{

                    $viewHome = new \App\adms\Models\AdmsViewHome();
                    // $this->dados['barcos'] = $viewHome->viewHome();
                    $this->dados['home'] = $viewHome->viewHome();
                    $carregarView = new \Core\ConfigView("adms/Views/home/home", $this->dados);
                    $carregarView->renderizarControles();

                }
            

          

      }


    
}
// }