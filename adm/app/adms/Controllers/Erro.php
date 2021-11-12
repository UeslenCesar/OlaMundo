<?php

namespace App\adms\Controllers;

if(!defined('R3F3CC')){
    header("Location: /");
    die("Página não encontrada.");
}


class Erro{

    public function index(){
        echo "Erro</br>";
    }

}