<?php  namespace App\adms\Models;

            if(!defined('R3F3CC')){
                header("Location: /");
                die("Página não encontrada.");
            }
use PDO;

class AdmsViewHome extends Conn{

    private object $conn;
    private $dados;
    private $id_barco;

    function getResultado(): bool {
        return $this->resultado;
    }


    public function viewHome(){
       $this->conn = $this->connect();
       $this->viewTopo();
    //    $this->viewServ();
    //    $this->viewAcoes();
    //    $this->viewContatos();
       $this->viewBarco();
    //    $this->viewGeral();
       $this->viewBilhetesHoje();
       
    //    $this->viewRodapes();
       
      
       return $this->dados;
    }


    

    private function viewTopo(){

        $query_home_topo =  "SELECT 
        titulo_topo,
        subtitulo_topo,
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


    private function viewBilhetesHoje(){
        date_default_timezone_set('America/Sao_Paulo');
        $hoje = date('Y-m-d');
        $id_adm = $_SESSION['id_adm'];

        // $query_home_cont =  "SELECT(SELECT SUM(preco) as total FROM bilhetes
        // WHERE dia=:dia)total, id, nome_barco, dia, nome, numero, andar, preco FROM bilhetes WHERE dia=:dia ORDER BY nome_barco";

        $query_home_cont =  "SELECT(SELECT SUM(preco) as total FROM bilhetes
        WHERE dia=:dia)
        total,bilhetes.id, bilhetes.nome_barco, bilhetes.dia, bilhetes.nome, bilhetes.numero, bilhetes.andar, bilhetes.preco, bilhetes.id_adm_fk
        FROM bilhetes LEFT JOIN barco2 ON bilhetes.id=barco2.id_barco WHERE dia=:dia AND bilhetes.id_adm_fk=:id_adm ORDER BY bilhetes.nome_barco";
        
        $result_home_cont = $this->conn->prepare($query_home_cont);
        $result_home_cont->bindParam(':dia', $hoje);
        $result_home_cont->bindParam(':id_adm', $id_adm, PDO::PARAM_INT);

        $result_home_cont->execute();
        $this->dados['bilhetes'] = $result_home_cont->fetchAll(PDO::FETCH_ASSOC);
        $this->dados['totalbilhetes'] = $result_home_cont->rowCount();
        

       if(!$result_home_cont->rowCount()){
        $_SESSION['msg2'] = '<div class="alert alert-danger" role="alert"><p>Não há bilhetes para hoje.</p></div>';
        $this->resultado = false;

       } 
        

    }


    // private function totalBilhetesHoje(){
    //     date_default_timezone_set('America/Sao_Paulo');
    //     $hoje = date('Y-m-d');
    //     $query_home_cont =  "SELECT SUM(preco) as total FROM bilhetes WHERE dia=:dia ";
    //     $result_home_cont = $this->conn->prepare($query_home_cont);
    //     $result_home_cont->bindParam(':dia', $hoje);
    //     $result_home_cont->execute();
    //     $this->dados['total'] = $result_home_cont->fetchAll(PDO::FETCH_ASSOC);
        
    //     var_dump($this->dados['total']);

    //    if(!$result_home_cont->rowCount()){
    //     $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">Não há bilhetes para hoje.</div>';
    //     $this->resultado = false;

    //    } 
        

    // }



    

    




    private function viewBarco1(){

        $id_adm = $_SESSION['id_adm'];
        $query_barcos = "SELECT id_barco,
        nome_barco,
        foto_barco,
        tipo,
        capacidade,
        andares,
        comprimento,
        cidade,
        estado,
        sit_barco,
        id_adm_fk
        FROM barco2 where id_adm_fk = $id_adm ORDER BY modified DESC";
        $result_barcos_cont = $this->conn->prepare($query_barcos);
        $result_barcos_cont->execute();
        $this->dados['barcos'] = $result_barcos_cont->fetchAll(PDO::FETCH_ASSOC);

        $barcos = $this->dados['barcos'];

    }




    public function viewBarco(){

        $id_adm = $_SESSION['id_adm'];
        $this->conn = $this->connect();
        $query_barcos = "SELECT(select min(preco_padrao)from precos where id_preco=id_barco)
        preco_padrao,
        b.id_barco,
        b.nome_barco,
        b.foto_barco,
        b.tipo,
        b.capacidade,
        b.andares,
        b.comprimento,
        b.cidade,
        b.estado,
        b.sit_barco,
        b.id_adm_fk from barco2 as b
        left join precos p on b.id_barco=p.id_preco where b.id_adm_fk=:id_adm_fk GROUP BY id_barco ORDER BY b.modified ASC";
        $result_barcos_cont = $this->conn->prepare($query_barcos);
        $result_barcos_cont->bindParam(':id_adm_fk', $id_adm, PDO::PARAM_INT);
        // $result_barcos_cont->bindParam(':id_barco', $id_barco, PDO::PARAM_INT);

        $result_barcos_cont->execute();
        $this->dados['barcos'] = $result_barcos_cont->fetchAll(PDO::FETCH_ASSOC);
        return $this->dados;

        $barcos = $this->dados['barcos'];
        $barcos_nome = $this->dados['nome_barco'];

        var_dump($barcos_nome);
       var_dump($this->dados);
    
   /* CREIO QUE NAO POSSO APROVEITAR O CODIGO
    OU TEREI DE RENOMEAR*/
       
       var_dump($barcos);

    }


    public function viewGeral(array $dados = null){

        $this->dados = $dados;
        $id_adm = $_SESSION['id_adm'];
        $id_barco = 250;
        $this->conn=$this->connect();
        $query_barcos = "SELECT
        p.preco_padrao,
        p.saida,
        p.retorno,
        b.id_barco,
        b.nome_barco,
        b.foto_barco,
        b.tipo,
        b.capacidade,
        b.andares,
        b.comprimento,
        b.cidade,
        b.estado,
        b.sit_barco,
        b.id_adm_fk from barco2 as b
        left join precos p on b.id_barco=p.id_preco where b.id_adm_fk=:id_adm_fk and b.id_barco=:id_barco order by nome_barco";
        
        $result_barcos_cont = $this->conn->prepare($query_barcos);
        // $result_barcos_cont->bindParam(':id_barco', $this->dados['id_barco']);
        $result_barcos_cont->bindParam(':id_barco', $id_barco);
        $result_barcos_cont->bindParam(':id_adm_fk', $id_adm);

        $result_barcos_cont->execute();
        $this->dados['home'] = $result_barcos_cont->fetchAll(PDO::FETCH_ASSOC);

        // $barcos = $this->dados['barcos'];

        return $this->dados;

    }



    public function viewBilhetes(array $dados = null){
        $this->dados = $dados;
        date_default_timezone_set('America/Sao_Paulo');
        $hoje = date('Y-m-d');
        $this->dados['dia']==null?$dia=$hoje:$dia=$this->dados['dia'];
        $this->conn=$this->connect();
        $query_home_cont =  "SELECT(SELECT SUM(preco) as total from bilhetes WHERE dia=:dia AND id=:busca)total, id, dia, nome_barco, nome, numero, andar, preco FROM bilhetes WHERE dia=:dia AND id=:busca
        ORDER BY nome_barco";
        $result_home_cont = $this->conn->prepare($query_home_cont);
        $result_home_cont->bindParam(':dia', $dia);
        $result_home_cont->bindParam(':busca', $this->dados['busca']);

        $result_home_cont->execute();
        $this->dados['bilhetes'] = $result_home_cont->fetchAll(PDO::FETCH_ASSOC);
        $this->viewBarco();
        $this->conn=$this->connect();

        if(!$result_home_cont->rowCount()){
            $_SESSION['msg2'] = '<div class="alert alert-danger" role="alert"><p>Não há bilhetes nesta data.</p></div>';
            $this->resultado = false;
    
           } 

        return $this->dados;


    }

    public function totalBilhetes(array $dados = null){
        $this->dados = $dados;
        date_default_timezone_set('America/Sao_Paulo');
        $hoje = date('Y-m-d');
        $this->dados['dia']==null?$dia=$hoje:$dia=$this->dados['dia'];
        $this->conn=$this->connect();;
        $query_soma =  "SELECT SUM(preco) as total FROM bilhetes WHERE dia=:dia";
        $result_soma = $this->conn->prepare($query_soma);
        $result_soma->bindParam(':dia', $dia);
        $result_soma->bindParam(':busca', $this->dados['busca']);

        $result_soma->execute();
        $this->dados['total'] = $result_soma->fetchAll(PDO::FETCH_ASSOC);
        var_dump($this->dados['total']);
        $this->viewBarco();



        if(!$result_soma->rowCount()){
            $_SESSION['msg2'] = '<div class="alert alert-danger" role="alert"><p>Não há bilhetes nesta data.</p></div>';
            $this->resultado = false;
    
           } 

        return $this->dados;


    }
 
    

}