<?php

namespace Core;





if(!defined('R3F3CC')){
    header("Location: /");
    die("Página não encontrada.");
}



class ConfigController {

private string $url;

public function __construct(){
 
        if(!empty(filter_input(INPUT_GET, "url", FILTER_DEFAULT))){
     
                $this->url = filter_input(INPUT_GET, "url", FILTER_DEFAULT);

    } else{ 
                $this->url="home";
             }

}
    


public function carregar(){

    $this->config();
    $urlController = ucwords($this->url);
    $classe = "\\App\\sts\\Controllers\\".$urlController;
    // echo "Classe: ".$classe."</br>";
    $classeCarregar = new $classe;
    $classeCarregar->index();

}

    private function config(){

        define('URL','http://localhost/www.bilhetenautico.com.br/');
        define('URLADM','http://localhost/www.bilhetenautico.com.br/adm/');
    }

    
      
        
   }

    

