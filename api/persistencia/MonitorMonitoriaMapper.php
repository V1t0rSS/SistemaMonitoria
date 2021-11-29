<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/SistemaMonitoria/api/model/MonitorMonitoria.php";

class MonitorMonitoriaMapper {
    
    public $dbuser = "root";
    public $dbpass = "";
    public $pdo;
    function __construct() {
        $this->pdo = new PDO("mysql:host=localhost;dbname=sistema_monitoria", $this->dbuser, $this->dbpass);
    }
    public function salvar(MonitorMonitoria $monitor_monitoria) {
        $sql = "INSERT INTO monitor_monitoria (monitoria_id, monitor_id, data_inicio, data_fim, inativo) VALUES ('"
                . $monitor_monitoria->monitoria_id() . "'"
                . ",'" . $monitor_monitoria->monitor_id() . "'"
                . ",'" . $monitor_monitoria->data_inicio() . "'"
                . ",'" . $monitor_monitoria->data_fim() . "'"
                . ",'" . $monitor_monitoria->inativo() . "');";
        if ($error = $this->pdo->query($sql) == TRUE) {
            echo "Criado com sucesso";
        } else {
            echo "Error: " . $sql . "<br>" . $error;
            throw new Exception("Erro ao criar monitor_monitoria" . $error);
        }
    }
    public function buscar() {
        $sql = "select * from monitor_monitoria";
        $statement = $this->pdo->prepare($sql );
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        return  $results;
    }
}