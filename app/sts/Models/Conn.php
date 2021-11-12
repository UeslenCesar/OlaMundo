<?php

namespace App\sts\Models;

if(!defined('R3F3CC')){
    header("Location: /");
    die("Página não encontrada.");
}


use Exception;
use PDO;

class Conn{

    private string $db="mysql";
    private string $host="localhost";
    private string $user="root";
    private string $pass="123";
    private string $dbname="celke";
    // private int    $port=3306;    // nao precisou dizer a porta
    private object $connect;

    protected function connect(){

        try{
            $this->connect = new PDO($this->db.':host=' .$this->host.';port=' .$this->port.';dbname=' .$this->dbname, $this->user, $this->pass);
            // echo"conexão ok<br>";    
            return $this->connect;

        }catch(Exception $ex){

            die('Erro: Por favor tente novamente'.$ex);
        }
    }


}