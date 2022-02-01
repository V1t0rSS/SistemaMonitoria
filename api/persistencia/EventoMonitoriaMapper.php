<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/SistemaMonitoria/api/model/EventoMonitoria.php";

class EventoMonitoriaMapper {
    
    public $dbuser = "root";
    public $dbpass = "";
    public $pdo;
    function __construct() {
        $this->pdo = new PDO("mysql:host=localhost;dbname=sistema_monitoria", $this->dbuser, $this->dbpass);
    }
    public function salvar(EventoMonitoria $eventomonitoria) {
        $sql = "INSERT INTO eventomonitoria (monitoria_id, data, hora_inicio, hora_fim, observacao, relatorio) VALUES ("
                . "'" . $eventomonitoria->get_monitoria_id() . "'"
                . ",'" . $eventomonitoria->get_data() . "'"
                . ",'" . $eventomonitoria->get_hora_inicio() . "'"
                . ",'" . $eventomonitoria->get_hora_fim() . "'"
                . ",'" . $eventomonitoria->get_observacao() . "'"
                . ",'" . $eventomonitoria->get_relatorio() . "');";
        if ($error = $this->pdo->query($sql) == TRUE) {
            echo "Criado com sucesso";
        } else {
            echo "Error: " . $sql . "<br>" . $error;
            throw new Exception("Erro ao criar eventomonitoria" . $error);
        }
    }
    public function buscar() {
        $sql = " SELECT eventomonitoria.* FROM eventomonitoria ";
        
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        return  $results;
    }
    public function remover($id) {
        $sql = "DELETE FROM eventomonitoria WHERE id = ". $id;
        $statement = $this->pdo->prepare($sql);
        if($statement->execute() == false) {
            throw new Exception("Erro ao deletar eventomonitoria");
        }
    }
    public function removerMonitoria($monitoria_id) {
        $sql = "DELETE FROM eventomonitoria WHERE monitoria_id = ". $monitoria_id;
        $statement = $this->pdo->prepare($sql);
        if($statement->execute() == false) {
            throw new Exception("Erro ao deletar eventomonitoria");
        }
    }
}