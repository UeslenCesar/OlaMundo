<?php namespace App\adms\Controllers;

if(!defined('R3F3CC')){
    header("Location: /");
    die("Página não encontrada.");
}

class Topoimg{

    private $dados;
    private $dadosForm;
    

    public function index(){
      
        $this->dadosForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        
        
        
        if(!empty($this->dadosForm['EditFotoPerfil'])){

            $this->dadosForm['arquivos']=($_FILES['arquivos'])?$_FILES['arquivos']: null;
          


            $editImgTopo = new \App\adms\Models\AdmsViewImgTopo();
            $viewHome = new \App\adms\Models\AdmsViewHome();
            $this->dados['home'] = $viewHome->viewHome();
            if($editImgTopo->editFotoPerfil($this->dadosForm)){
                // $urlDestino = URLADM."view";
                // header("Location: $urlDestino");
            }else{
                $this->dados['foto_perfil'] = $this->dadosForm;
                $viewHome = new \App\adms\Models\AdmsViewHome();
                $this->dados['home'] = $viewHome->viewHome();
                // $this->viewTopo();
            }

            // $this->dadosTopo();
            // $this->viewTopo();
        

        }else{
            // $this->dadosTopo();
            // $this->viewTopo();
        }



        if(!empty($this->dadosForm['EditTopoImgHome'])){

            $this->dadosForm['arquivos']=($_FILES['arquivos'])?$_FILES['arquivos']: null;
          


            $editImgTopo = new \App\adms\Models\AdmsViewImgTopo();
            
            if($editImgTopo->editImgTopo($this->dadosForm)){
                // $urlDestino = URLADM."topoimg";
                // header("Location: $urlDestino");

                
            }else{
                $this->viewTopo();
                $this->dados['home'] = $this->dadosForm;
                // $this->viewFotos();


            }

            $this->dadosTopo();
            $this->viewTopo();
            // $this->viewFotos();


            
        

        }
        else{
            $this->dadosTopo();
            // $this->viewTopo();
            // $this->viewFotos();

        }



        // if(!empty($this->dadosForm['buscar'])){

        //     $this->dadosForm['allfotos']=$this->dadosForm?$this->dadosForm['allfotos']:null;

        //         $viewFotos = new \App\adms\Models\AdmsViewImgTopo();
        //         $this->dados['allfotos'] = $viewFotos->allFotos($this->dadosForm);
        //         // $this->dados['home']=$viewHome->totalBilhetes();
        //         // $this->dados['home'] = $viewHome->viewHome();
        //         //  var_dump($this->dados['home']);
        //         $carregarView = new \Core\ConfigView("adms/Views/pgHome/editPgHomeImgTopo", $this->dados);
        //         $carregarView->renderizarControles();
              

            
        //     }
        //     else{

        //         $viewFotos = new \App\adms\Models\AdmsViewImgTopo();
        //         $this->dados['home'] = $viewFotos->allFotos($this->dadosForm);
        //         // $carregarView = new \Core\ConfigView("adms/Views/home/home", $this->dados);
        //         // $carregarView->renderizarControles();

        //     }


        if(!empty($this->dadosForm['buscar'])){


        $viewHome = new \App\adms\Models\AdmsViewImgTopo;
        $viewTopo = new \App\adms\Models\AdmsViewImgTopo;
        $this->dados['fotos'] = $viewTopo->viewImgBusca($this->dadosForm);
        $this->dados['allfotos'] = $viewHome->allFotos($this->dadosForm);
        // $this->dados['home']=$viewHome->totalBilhetes();
        // $this->dados['home'] = $viewHome->viewHome();
        //  var_dump($this->dados['home']);
        $carregarView = new \Core\ConfigView("adms/Views/pgHome/editPgHomeImgTopo", $this->dados);
        $carregarView->renderizarControles();
        

              

        }else{
            $this->viewTopo();
        }




        if(!empty($this->dadosForm['apagarFotos'])){


            $apagarFotos = new \App\adms\Models\AdmsViewImgTopo;
            $apagarFotos->apagarFotos($this->dadosForm);
            // $this->dados['home']=$viewHome->totalBilhetes();
            // $this->dados['home'] = $viewHome->viewHome();
            //  var_dump($this->dados['home']);
            $carregarView = new \Core\ConfigView("adms/Views/pgHome/editPgHomeImgTopo", $this->dados);
            $carregarView->renderizarControles();
            
    
                  
    
            }else{
                // $this->viewTopo();
            }
            
        
 


    }
    // fim da função index
    #######################################################



    private function dadosTopo(){
        $viewTopo = new \App\adms\Models\AdmsViewImgTopo;
        $viewHome = new \App\adms\Models\AdmsViewHome();

        $this->dados['fotos'] = $viewTopo->viewImgTopo();
        $this->dados['home'] = $viewHome->viewHome();
     
    }

    private function viewTopo(){
        $carregarView = new \Core\ConfigView("adms/Views/pgHome/editPgHomeImgTopo", $this->dados);
        $carregarView->renderizarControles();
        // $carregarView->renderizar();

    }

    // private function viewFotos(){
    //     $viewFotos = new \App\adms\Models\AdmsViewImgTopo;
    //     $this->dadosFotos = $viewFotos->allFotos();
    // }
}














// class Topoimg{

//     private $dados;
//     private $dadosForm;

//     public function index(){
      
//         $this->dadosForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        
//         if(!empty($this->dadosForm['EditTopoImgHome'])){

//             $this->dadosForm['imagem_nova']=($_FILES['imagem_nova'])?$_FILES['imagem_nova']: null;
          


//             $editImgTopo = new \App\adms\Models\AdmsViewImgTopo();
//             if($editImgTopo->editImgTopo($this->dadosForm)){
//                 $urlDestino = URLADM."view";
//                 header("Location: $urlDestino");
//             }else{
//                 $this->dados['topo'] = $this->dadosForm;
//                 $this->viewTopo();
//             }

//             $this->dadosTopo();
//             $this->viewTopo();
        

//         }else{
//             $this->dadosTopo();
//             $this->viewTopo();
//         }
 


//     }

//     private function dadosTopo(){
//         $viewTopo = new \App\adms\Models\AdmsViewImgTopo;
//         $this->dados['topo'] = $viewTopo->viewImgTopo();
     
//     }

//     private function viewTopo(){
//         $carregarView = new \Core\ConfigView("adms/Views/pgHome/editPgHomeImgTopo", $this->dados);
//         $carregarView->renderizar();
//     }
// }