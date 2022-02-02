<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/SistemaMonitoria/api/model/AlunoEventoMonitoria.php";

class AlunoEventoMonitoriaMapper {
    
    public $dbuser = "root";
    public $dbpass = "";
    public $pdo;
    function __construct() {
        $this->pdo = new PDO("mysql:host=localhost;dbname=sistema_monitoria", $this->dbuser, $this->dbpass);
    }
    public function salvar($monitoria_id, $aluno_id) {

        $sql = " SELECT aluno_eventomonitoria.* FROM aluno_eventomonitoria ";
        $sql .= " INNER JOIN eventomonitoria ON eventomonitoria.id = aluno_eventomonitoria.eventomonitoria_id ";
        $sql .= " WHERE eventomonitoria.monitoria_id = ". $monitoria_id ." ";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);

        if(!$results) {
            $sql = " SELECT eventomonitoria.* FROM eventomonitoria ";
            $sql .= " WHERE monitoria_id = ". $monitoria_id ." ";
            $statement = $this->pdo->prepare($sql);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);

            foreach ($results as $evento_monitoria) {
                $sql = "INSERT INTO aluno_eventomonitoria (eventomonitoria_id, aluno_id) VALUES ('"
                        . $evento_monitoria["id"] . "'"
                        . ",'" . $aluno_id . "');";
                if ($error = $this->pdo->query($sql) == TRUE) {
                    echo "Criado com sucesso";
                } else {
                    echo "Error: " . $sql . "<br>" . $error;
                    throw new Exception("Erro ao criar participação" . $error);
                }
            }
        } else {
            echo "Error: " . $sql . "<br>" . $error;
            throw new Exception("Erro ao criar participação" . $error);
        }
    }
    public function remover($monitoria_id, $aluno_id) {
        $sql = " DELETE aluno_eventomonitoria FROM aluno_eventomonitoria ";
        $sql .= " INNER JOIN eventomonitoria ON aluno_eventomonitoria.eventomonitoria_id = eventomonitoria.id ";
        $sql .= " WHERE eventomonitoria.monitoria_id = ". $monitoria_id . " AND aluno_eventomonitoria.aluno_id = ". $aluno_id;
        $statement = $this->pdo->prepare($sql );
        if($statement->execute() == false) {
            throw new Exception("Erro ao cancelar participação");
        }
    }
}