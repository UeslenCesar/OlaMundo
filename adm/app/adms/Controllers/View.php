<?php

namespace App\adms\Controllers;

if(!defined('R3F3CC')){
    header("Location: /");
    die("Página não encontrada.");
}

class View{

    private $dados;

    public function index(){


        $this->dadosForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        if(!empty($this->dadosForm['Editar'])){



            $viewGeral = new \App\adms\Models\AdmsViewHome();
            $this->dados = $viewGeral->viewGeral($this->dadosForm);
            // var_dump($this->dados);

            $carregarView = new \Core\ConfigView("adms/Views/pgHome/editPgHomeTopo", $this->dados);
            
            $carregarView->renderizar();
        
            }else{


##################### ESTA É A TAG ORIGINAL ########################################################################
        // $viewHome = new \App\adms\Models\AdmsViewHome();
        // $this->dados['home'] = $viewHome->viewHome();
        // $carregarView = new \Core\ConfigView("adms/Views/pgHome/viewPgHome", $this->dados);
        // $carregarView->renderizarControles();
#######################################################################################################

        $viewGeral = new \App\adms\Models\AdmsViewHome();
        $this->dados = $viewGeral->viewGeral($this->dadosForm);
        $carregarView = new \Core\ConfigView("adms/Views/pgHome/editPgHomeTopo", $this->dados);
        
        $carregarView->renderizar();
    }

    if(!empty($this->dadosForm['EditTopoHome'])){
        $editTopo = new \App\adms\Models\AdmsViewTopo();
        $editTopo->editTopo($this->dadosForm);
    
        
            
            header("Refresh: 0;");

    
    }

    if(!empty($this->dadosForm['excluirBarco'])){
        $editTopo = new \App\adms\Models\AdmsViewTopo();
        $editTopo->delete($this->dadosForm);
    
        
            
            header("Refresh: 0;");

    
    }

    if(!empty($this->dadosForm['precoPadrao'])){
        $editTopo = new \App\adms\Models\AdmsViewTopo();
        $editTopo->editPreco($this->dadosForm);
    
        
            
            header("Refresh: 0;");

    
    }

    if(!empty($this->dadosForm['novoPreco'])){
        $editTopo = new \App\adms\Models\AdmsViewTopo();
        $editTopo->novoPreco($this->dadosForm);
    
        
            
            header("Refresh: 0;");

    
    }

}
}

