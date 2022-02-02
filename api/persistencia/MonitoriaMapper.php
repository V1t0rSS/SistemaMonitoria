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
    public function buscar($id = null) {
        $sql = " select monitoria.*, disciplina.titulo as disciplina, professor.nome as responsavel from monitoria ";
        $sql .= " LEFT JOIN disciplina ON monitoria.disciplina_id = disciplina.id ";
        $sql .= " LEFT JOIN usuario as professor ON monitoria.professor_id = professor.id ";
        if($id)
            $sql .= " WHERE monitoria.id = ". $id;
        
        $statement = $this->pdo->prepare($sql );
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        return  $results;
    }
    public function remover($id) {
        $sql = "DELETE FROM monitoria WHERE id = ". $id;
        $statement = $this->pdo->prepare($sql );
        if($statement->execute() == false) {
            throw new Exception("Erro ao deletar monitoria");
        }
    }
    public function getUltimoId() {
        $sql = " select max(monitoria.id) as prox_id from monitoria ";
        $statement = $this->pdo->prepare($sql );
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        if($results[0]["prox_id"])
            return $results[0]["prox_id"];
        else
            return 1;
    }
}