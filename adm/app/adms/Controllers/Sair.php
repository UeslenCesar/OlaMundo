<?php

namespace App\adms\Controllers;

            if(!defined('R3F3CC')){
                header("Location: /");
                die("Página não encontrada.");
            }

class Sair {


    public function index(){
     
       unset($_SESSION['id_adm'], $_SESSION['nome'], $_SESSION['email']);
       $_SESSION['msg'] = '<div class="alert alert-dark" role="alert">Sessão encerrada.</div>';
       $urlDestino = URLADM.'login';
       header("Location: $urlDestino");
      }


    
}