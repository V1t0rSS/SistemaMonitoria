<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/SistemaMonitoria/api/model/Administrador.php";

class AdministradorMapper {
    
    public $dbuser = "root";
    public $dbpass = "";
    public $pdo;
    function __construct() {
        $this->pdo = new PDO("mysql:host=localhost;dbname=sistema_monitoria", $this->dbuser, $this->dbpass);
    }
    public function salvar(Administrador $administrador) {
        $sql = "INSERT INTO usuario (nome, matricula, email, senha, telefone, tipousuario_id) VALUES ('"
                . $administrador->get_nome() . "'"
                . ",'" . $administrador->get_matricula() . "'"
                . ",'" . $administrador->get_email() . "'"
                . ",'" . $administrador->get_senha() . "'"
                . ",'" . $administrador->get_telefone() . "'"
                . ",1);";
        if ($error = $this->pdo->query($sql) == TRUE) {
            echo "Criado com sucesso";
        } else {
            echo "Error: " . $sql . "<br>" . $error;
            throw new Exception("Erro ao criar administrador" . $error);
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