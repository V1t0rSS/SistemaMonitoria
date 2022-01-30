<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/SistemaMonitoria/api/model/Monitoria.php";

class MonitoriaMapper {
    
    public $dbuser = "root";
    public $dbpass = "";
    public $pdo;
    function __construct() {
        $this->pdo = new PDO("mysql:host=localhost;dbname=sistema_monitoria", $this->dbuser, $this->dbpass);
    }
    public function salvar(Monitoria $monitoria) {
        $sql = "INSERT INTO monitoria (professor_id, disciplina_id, titulo) VALUES ("
                . "'" . $monitoria->get_professor_id() . "'"
                . ",'" . $monitoria->get_disciplina_id() . "'"
                . ",'" . $monitoria->get_titulo() . "');";
        if ($error = $this->pdo->query($sql) == TRUE) {
            echo "Criado com sucesso";
        } else {
            echo "Error: " . $sql . "<br>" . $error;
            throw new Exception("Erro ao criar monitoria" . $error);
        }
    }
    public function buscar() {
        $sql = "select * from monitoria";
        $statement = $this->pdo->prepare($sql );
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        return  $results;
    }
}