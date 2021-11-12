<?php

namespace Core;

            if(!defined('R3F3CC')){
                header("Location: /");
                die("Página não encontrada.");
            }

class Permissao{

    private string $urlController;
    private array $pgPublica;
    private array $pgRestrita;
    private string $resultado;

    public function getResultado(): string{
        return $this->resultado;
    }

    public function index($urlController): void{
        $this->urlController = $urlController;
        $this->pgPublica = ["login", "cadastro", "ativar"];

        if(in_array($this->urlController, $this->pgPublica)){
            $this->resultado = $this->urlController;
        }else{
            $this->pgRestrita();
        }
    }

    private function pgRestrita(): void{
        $this->pgRestrita = ["home", "view", "topo", "topoimg", "embarcacao"]; //paginas restritas: view, topo, topoimg
        if(in_array($this->urlController, $this->pgRestrita)){
            $this->verificarLogin();
           

        }else{
            $_SESSION['msg']="<p style='color:red'>Página não encontrada.</p>";
            $urlDestino = URLADM;
            header("Location: $urlDestino");
        }

    }

    private function verificarLogin(): void{
         if(isset($_SESSION['id_adm'])
        and isset($_SESSION['nome_adm'])
        and isset($_SESSION['email_adm'])){

        }else{
            $_SESSION['msg']="<p style='color:red'>Faça login para acessar a página.</p>";
            $urlDestino = URLADM."login";
            header("Location: $urlDestino");
        }

    }
    

}