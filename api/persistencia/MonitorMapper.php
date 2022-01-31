<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/SistemaMonitoria/api/model/Monitor.php";

class MonitorMapper {
    
    public $dbuser = "root";
    public $dbpass = "";
    public $pdo;
	
    function __construct() {
        $this->pdo = new PDO("mysql:host=localhost;dbname=sistema_monitoria", $this->dbuser, $this->dbpass);
    }
	
	public function autenticacao($monitor) {
		error_log(print_r("XXX entrou XXX",TRUE)); 
        $sql = "select * from usuario where tipousuario_id = 4 and email='" . $monitor->get_email() . "' and senha='" . $monitor->get_senha() . "'";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        if(count($results)>0){
            return $results[0];
        }else{
             throw new Exception("Usuario ou senha invalidos");
        }      
    }	
	
    public function salvar(Monitor $monitor) {
        $sql = "INSERT INTO usuario (nome, matricula, email, senha, telefone, tipousuario_id) VALUES ('"
                . $monitor->get_nome() . "'"
                . ",'" . $monitor->get_matricula() . "'"
                . ",'" . $monitor->get_email() . "'"
                . ",'" . $monitor->get_senha() . "'"
                . ",'" . $monitor->get_telefone() . "'"
                . ",4);";
        if ($error = $this->pdo->query($sql) == TRUE) {
            echo "Criado com sucesso";
        } else {
            echo "Error: " . $sql . "<br>" . $error;
            throw new Exception("Erro ao criar monitor" . $error);
        }
    }
    public function buscar() {
        $sql = "select * from usuario WHERE tipousuario_id = 4";
        $statement = $this->pdo->prepare($sql );
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        return  $results;
    }
    public function remover($id) {
        $sql = "DELETE FROM usuario WHERE id = ". $id;
        $statement = $this->pdo->prepare($sql );
        if($statement->execute() == false) {
            throw new Exception("Erro ao deletar monitor");
        }
    }
}