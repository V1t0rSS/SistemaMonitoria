<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/SistemaMonitoria/api/model/Aluno.php";

class AlunoMapper {
    
    public $dbuser = "root";
    public $dbpass = "";
    public $pdo;
    function __construct() {
        $this->pdo = new PDO("mysql:host=localhost;dbname=sistema_monitoria", $this->dbuser, $this->dbpass);
    }
    public function salvar(Aluno $aluno) {
        $sql = "INSERT INTO usuario (nome, matricula, email, senha, telefone, tipousuario_id) VALUES ('"
                . $aluno->get_nome() . "'"
                . ",'" . $aluno->get_matricula() . "'"
                . ",'" . $aluno->get_email() . "'"
                . ",'" . $aluno->get_senha() . "'"
                . ",'" . $aluno->get_telefone() . "'"
                . ",3);";
        if ($error = $this->pdo->query($sql) == TRUE) {
            echo "Criado com sucesso";
        } else {
            echo "Error: " . $sql . "<br>" . $error;
            throw new Exception("Erro ao criar aluno" . $error);
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