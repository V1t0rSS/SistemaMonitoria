<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/SistemaMonitoria/api/model/Professor.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SistemaMonitoria/api/persistencia/ProfessorMapper.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SistemaMonitoria/api/rotas/IRouter.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SistemaMonitoria/api/rotas/Router.php";

//padrao de projetos strategy   
class Professores implements IRouter {

    public function delete() {
        http_response_code(404);
        throw new Exception("Não implementado ainda");
    }

    public function get() {

      $professorMapper = new ProfessorMapper();
      $resposta = $professorMapper->buscar();
      echo json_encode($resposta);

    }

    public function post() {
        $professor = new Professor();
        if (isset($_POST['nome'])) {
            $professor->set_nome($_POST['nome']);
        }if (isset($_POST['matricula'])) {
            $professor->set_matricula($_POST['matricula']);
        }if (isset($_POST['email'])) {
            $professor->set_email($_POST['email']);
        }if (isset($_POST['telefone'])) {
            $professor->set_telefone($_POST['telefone']);
        }
        $professorMapper = new ProfessorMapper();
        $resposta = $professorMapper->salvar($professor);
        echo $resposta;
    }

    public function put() {
        http_response_code(404);
        throw new Exception("Não implementado ainda");
    }

}

header("Access-Control-Allow-Origin: *");
$api= new Professores();
$router = new Router($api);
$router->run();