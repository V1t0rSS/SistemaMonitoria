<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/SistemaMonitoria/api/model/Aluno.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SistemaMonitoria/api/persistencia/AlunoMapper.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SistemaMonitoria/api/rotas/IRouter.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SistemaMonitoria/api/rotas/Router.php";

//padrao de projetos strategy   
class Alunos implements IRouter {

    public function delete() {
        http_response_code(404);
        throw new Exception("Não implementado ainda");
    }

    public function get() {

      $alunoMapper = new AlunoMapper();
      $resposta = $alunoMapper->buscar();
      echo json_encode($resposta);

    }

    public function post() {
        $aluno = new Aluno();
        if (isset($_POST['nome'])) {
            $aluno->set_nome($_POST['nome']);
        }if (isset($_POST['matricula'])) {
            $aluno->set_matricula($_POST['matricula']);
        }if (isset($_POST['email'])) {
            $aluno->set_email($_POST['email']);
        }if (isset($_POST['telefone'])) {
            $aluno->set_telefone($_POST['telefone']);
        }
        $alunoMapper = new AlunoMapper();
        $resposta = $alunoMapper->salvar($aluno);
        echo $resposta;
    }

    public function put() {
        http_response_code(404);
        throw new Exception("Não implementado ainda");
    }

}

header("Access-Control-Allow-Origin: *");
$api= new Alunos();
$router = new Router($api);
$router->run();