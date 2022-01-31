<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/SistemaMonitoria/api/model/Disciplina.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SistemaMonitoria/api/persistencia/DisciplinaMapper.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SistemaMonitoria/api/rotas/IRouter.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SistemaMonitoria/api/rotas/Router.php";

//padrao de projetos strategy   
class Disciplinas implements IRouter {

    public function delete() {
        http_response_code(404);
        throw new Exception("Não implementado ainda");
    }

    public function get() {

      $DisciplinaMapper = new DisciplinaMapper();
      $resposta = $DisciplinaMapper->buscar();
      echo json_encode($resposta);

    }

    public function post() {
        $disciplina = new Disciplina();
        if (isset($_POST['titulo'])) {
            $disciplina->set_titulo($_POST['titulo']);
        }
        $disciplinaMapper = new DisciplinaMapper();
        $resposta = $disciplinaMapper->salvar($disciplina);
        echo $resposta;
    }

    public function put() {
        http_response_code(404);
        throw new Exception("Não implementado ainda");
    }

}

header("Access-Control-Allow-Origin: *");
$api= new Disciplinas();
$router = new Router($api);
$router->run();