<?php

namespace App\adms\Controllers;

if(!defined('R3F3CC')){
    header("Location: /");
    die("Página não encontrada.");
}

class Topoimg{

    private $dados;
    private $dadosForm;

    public function index(){
      
        $this->dadosForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        
        if(!empty($this->dadosForm['proximo5'])){

            $this->dadosForm['imagem_nova']=($_FILES['imagem_nova'])?$_FILES['imagem_nova']: null;
          


            $editImgTopo = new \App\adms\Models\AdmsFotoPerfil();
            if($editImgTopo->editImgTopo($this->dadosForm)){
                $urlDestino = URLADM."view";
                header("Location: $urlDestino");
            }else{
                $this->dados['topo'] = $this->dadosForm;
                $this->viewTopo();
            }

            $this->dadosTopo();
            $this->viewTopo();
        

        }else{
            $this->dadosTopo();
            $this->viewTopo();
        }
 


    }

    private function dadosTopo(){
        $viewTopo = new \App\adms\Models\AdmsViewImgTopo;
        $this->dados['topo'] = $viewTopo->viewImgTopo();
     
    }

    private function viewTopo(){
        $carregarView = new \Core\ConfigView("adms/Views/pgHome/editPgHomeImgTopo", $this->dados);
        $carregarView->renderizar();
    }
}