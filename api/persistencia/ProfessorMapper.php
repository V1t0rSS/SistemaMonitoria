<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/SistemaMonitoria/api/model/Professor.php";

class ProfessorMapper {
    
    public $dbuser = "root";
    public $dbpass = "";
    public $pdo;
    function __construct() {
        $this->pdo = new PDO("mysql:host=localhost;dbname=sistema_monitoria", $this->dbuser, $this->dbpass);
    }
    public function salvar(Professor $professor) {
        $sql = "INSERT INTO usuario (nome, matricula, email, senha, telefone, tipousuario_id) VALUES ('"
                . $professor->get_nome() . "'"
                . ",'" . $professor->get_matricula() . "'"
                . ",'" . $professor->get_email() . "'"
                . ",'" . $professor->get_senha() . "'"
                . ",'" . $professor->get_telefone() . "'"
                . ",2);";
        if ($error = $this->pdo->query($sql) == TRUE) {
            echo "Criado com sucesso";
        } else {
            echo "Error: " . $sql . "<br>" . $error;
            throw new Exception("Erro ao criar professor" . $error);
        }
    }
    public function buscar() {
        $sql = "select * from usuario";
        $statement = $this->pdo->prepare($sql );
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        return  $results;
    }
}