<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/SistemaMonitoria/api/model/Monitoria.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SistemaMonitoria/api/persistencia/MonitoriaMapper.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SistemaMonitoria/api/rotas/IRouter.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SistemaMonitoria/api/rotas/Router.php";

//padrao de projetos strategy   
class Monitorias implements IRouter {

    public function delete() {
        http_response_code(404);
        throw new Exception("Não implementado ainda");
    }

    public function get() {

      $MonitoriaMapper = new MonitoriaMapper();
      $resposta = $MonitoriaMapper->buscar();
      echo json_encode($resposta);

    }

    public function post() {
        $monitoria = new Monitoria();
        if (isset($_POST['professor_id'])) {
            $monitoria->set_professor_id($_POST['professor_id']);
        }
		if (isset($_POST['disciplina_id'])) {
            $monitoria->set_disciplina_id($_POST['disciplina_id']);
        }
		if (isset($_POST['titulo'])) {
            $monitoria->set_titulo($_POST['titulo']);
        }
        $MonitoriaMapper = new MonitoriaMapper();
        $resposta = $MonitoriaMapper->salvar($monitoria);
        echo $resposta;
    }

    public function put() {
        http_response_code(404);
        throw new Exception("Não implementado ainda");
    }

}

header("Access-Control-Allow-Origin: *");
$api= new Monitorias();
$router = new Router($api);
$router->run();