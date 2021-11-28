<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/SistemaMonitoria/api/model/Disciplina.php";

class DisciplinaMapper {
    
    public $dbuser = "root";
    public $dbpass = "";
    public $pdo;
    function __construct() {
        $this->pdo = new PDO("mysql:host=localhost;dbname=sistema_monitoria", $this->dbuser, $this->dbpass);
    }
    public function salvar(Disciplina $disciplina) {
        $sql = "INSERT INTO disciplina (titulo) VALUES ('"
                . $disciplina->get_titulo() . ");";
        if ($error = $this->pdo->query($sql) == TRUE) {
            echo "Criada com sucesso";
        } else {
            echo "Error: " . $sql . "<br>" . $error;
            throw new Exception("Erro ao criar disciplina" . $error);
        }
    }
    public function buscar() {
        $sql = "select * from disciplina";
        $statement = $this->pdo->prepare($sql );
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        return  $results;
    }
}