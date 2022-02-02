<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/SistemaMonitoria/api/model/EventoMonitoria.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SistemaMonitoria/api/persistencia/EventoMonitoriaMapper.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SistemaMonitoria/api/rotas/IRouter.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SistemaMonitoria/api/rotas/Router.php";

//padrao de projetos strategy   
class EventoMonitorias implements IRouter {

    public function delete() {
        http_response_code(404);
        throw new Exception("Não implementado ainda");
    }

    public function get() {

      $EventoMonitoriaMapper = new EventoMonitoriaMapper();
      $resposta = $EventoMonitoriaMapper->buscar();
      echo json_encode($resposta);

    }

    public function post() {
        $eventomonitoria = new EventoMonitoria();
        if (isset($_POST['titulo'])) {
            $eventomonitoria->set_titulo($_POST['titulo']);
        }
        $eventomonitoriaMapper = new EventoMonitoriaMapper();
        $resposta = $eventomonitoriaMapper->salvar($eventomonitoria);
        echo $resposta;
    }

    public function put() {
        http_response_code(404);
        throw new Exception("Não implementado ainda");
    }

}

header("Access-Control-Allow-Origin: *");
$api= new EventoMonitorias();
$router = new Router($api);
$router->run();