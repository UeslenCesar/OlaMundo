<?php

namespace App\sts\Models;


if(!defined('R3F3CC')){
    header("Location: /");
    die("Página não encontrada.");
}




class StsHome extends Conn{

    private object $conn;
    private array $dados;

    public function index(){
        $this->conn = $this->connect();
        $this->viewTopo();
        $this->viewServ();
        $this->viewAcoes();
        $this->viewContatos();
        $this->viewRodapes();
        
       
        return $this->dados;
    
    }

    private function viewTopo(){

        $query_home_topo =  "SELECT subtitulo_topo,
        text_btn_topo,
        link_btn_topo,
        imagem_topo
        FROM homes_topos LIMIT 1";
        $result_home_topo = $this->conn->prepare($query_home_topo);
        $result_home_topo->execute();
        $this->dados['topo'] = $result_home_topo->fetch();
    }

    private function viewServ(){

        $query_home_serv =  "SELECT id,
        titulo_serv,
        subtitulo_serv,
        icone_um_serv,
        titulo_um_serv,
        desc_um_serv,
        icone_dois_serv,
        titulo_dois_serv,
        desc_dois_serv,
        icone_tres_serv,
        titulo_tres_serv,
        desc_tres_serv,
        created ,
        modifed  FROM homes_servicos LIMIT 1";
        $result_home_serv = $this->conn->prepare($query_home_serv);
        $result_home_serv->execute();
        $this->dados['serv'] = $result_home_serv->fetch();
    }

        private function viewAcoes(){

        $query_home_acoes =  "SELECT id,
        titulo_acao,
        subtitulo_acao,
        desc_acao,
        text_btn_acao,
        link_btn_acao,
        imagem_acao,
        created,
        modified  FROM homes_acoes LIMIT 1";
        $result_home_acoes = $this->conn->prepare($query_home_acoes);
        $result_home_acoes->execute();
        $this->dados['acoes'] = $result_home_acoes->fetch();
    }

    private function viewContatos(){

        $query_home_cont =  "SELECT id,
        titulo_contato,
        subtitulo_contato,
        end_contato,
        tel_contato,
        email_contato,
        created,
        modifed  FROM homes_contatos LIMIT 1";
        $result_home_cont = $this->conn->prepare($query_home_cont);
        $result_home_cont->execute();
        $this->dados['cont'] = $result_home_cont->fetch();
    }

    private function viewRodapes(){

        $query_rodapes =  "SELECT id,
        id,
        titulo_pg,
        titulo_contato,
        txt_telefone,
        link_telefone,
        txt_end,
        link_end,
        txt_cpnj,
        link_cnpj,
        titulo_rede_soc,
        txt_um_rede_soc,
        link_um_rede_soc,
        txt_dois_rede_soc,
        link_dois_rede_soc,
        txt_tres_rede_soc,
        link_tres_rede_soc,
        txt_quatro_rede_soc,
        link_quatro_rede_soc,
        created,
        modified 
        FROM rodapes LIMIT 1";
        $result_rodapes = $this->conn->prepare($query_rodapes);
        $result_rodapes->execute();
        $this->dados['rodape'] = $result_rodapes->fetch();
    }
} 