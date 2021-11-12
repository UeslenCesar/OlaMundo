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
                $this->url="login";
             }

}
    


public function carregar(){

    $this->config();
    $valPermissao = new \Core\Permissao();
    $valPermissao->index($this->url);
    $urlController = ucwords($this->url);
    $classe = "\\App\\adms\\Controllers\\".$urlController;
    // echo "Classe: ".$classe."</br>";
    $classeCarregar = new $classe;
    $classeCarregar->index();

}

    private function config(){

        define('URLADM', 'http://localhost/www.bilhetenautico.com.br/adm/');
        define('URL', 'http://localhost/www.bilhetenautico.com.br/');

    }

    
      
        
   }

    

