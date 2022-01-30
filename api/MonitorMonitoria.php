<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/SistemaMonitoria/api/model/MonitorMonitoria.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SistemaMonitoria/api/persistencia/MonitorMonitoriaMapper.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SistemaMonitoria/api/rotas/IRouter.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SistemaMonitoria/api/rotas/Router.php";

//padrao de projetos strategy   
class MonitorMonitoria implements IRouter {

    public function delete() {
        http_response_code(404);
        throw new Exception("Não implementado ainda");
    }

    public function get() {

      $monitor_monitoriaMapper = new MonitorMonitoriaMapper();
      $resposta = $monitor_monitoriaMapper->buscar();
      echo json_encode($resposta);

    }

    public function post() {
        $monitor_monitoria = new MonitorMonitoria();
        if (isset($_POST['monitor_id'])) {
            $monitor_monitoria->set_nome($_POST['monitor_id']);
        }if (isset($_POST['monitoria_id'])) {
            $monitor_monitoria->set_matricula($_POST['monitoria_id']);
        }if (isset($_POST['data_inicio'])) {
            $monitor_monitoria->set_email($_POST['data_inicio']);
        }if (isset($_POST['data_fim'])) {
            $monitor_monitoria->set_telefone($_POST['data_fim']);
        }if (isset($_POST['inativo'])) {
            $monitor_monitoria->set_telefone($_POST['inativo']);
        }
        $monitor_monitoriaMapper = new MonitorMonitoriaMapper();
        $resposta = $monitor_monitoriaMapper->salvar($monitor_monitoria);
        echo $resposta;
    }

    public function put() {
        http_response_code(404);
        throw new Exception("Não implementado ainda");
    }

}

header("Access-Control-Allow-Origin: *");
$api= new MonitorMonitoria();
$router = new Router($api);
$router->run();