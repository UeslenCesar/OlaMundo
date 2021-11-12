<?php

namespace App\adms\Controllers;

if(!defined('R3F3CC')){
    header("Location: /");
    die("Página não encontrada.");
}

class Topo{

    private $dados;
    private $dadosForm;

    public function index(){

        $this->dadosForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        
        // $this->viewTopo();
        
        
    
                if(!empty($this->dadosForm['Edit___________TopoHome'])){
                    $editTopo = new \App\adms\Models\AdmsViewTopo();
                    $editTopo->editTopo($this->dadosForm);

                    
                    if($editTopo->editTopo($this->dadosForm)){
                        $urlDestino = URLADM."view";
                        header("Location: $urlDestino");
                    }else{
                        $this->dados['home'] = $this->dados;
                        $this->viewTopo();
                    }

                }else{
                    $this->dadosTopo();
                    $this->viewTopo();
                }

        // var_dump($this->dados);
 


    }

    private function dadosTopo(){
        // $viewTopo = new \App\adms\Models\AdmsViewTopo;
        // $this->dados['topo'] = $viewTopo->viewTopo();
        $viewHome = new \App\adms\Models\AdmsViewHome();
        $this->dados = $viewHome->viewGeral($this->dadosForm);
    }

    private function viewTopo(){
        
        
        $viewHome = new \App\adms\Models\AdmsViewHome();
        $this->dados = $viewHome->viewGeral($this->dadosForm);
        $carregarView = new \Core\ConfigView("adms/Views/pgHome/editPgHomeTopo", $this->dados);
        $carregarView->renderizar();
    }
}