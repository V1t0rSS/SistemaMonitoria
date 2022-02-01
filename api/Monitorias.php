<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/SistemaMonitoria/api/model/Monitoria.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SistemaMonitoria/api/model/EventoMonitoria.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SistemaMonitoria/api/persistencia/MonitoriaMapper.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SistemaMonitoria/api/persistencia/EventoMonitoriaMapper.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SistemaMonitoria/api/rotas/IRouter.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SistemaMonitoria/api/rotas/Router.php";

//padrao de projetos strategy   
class Monitorias implements IRouter {

    public function delete() {
        if (isset($_REQUEST['id'])) {
            // delete eventos
            $eventomonitoriaMapper = new eventomonitoriaMapper();
            $eventomonitoriaMapper->removerMonitoria($_REQUEST['id']);
            // deleta a monitoria
            $monitoriaMapper = new monitoriaMapper();
            $monitoriaMapper->remover($_REQUEST['id']);
        } else {
            http_response_code(400);
            throw new Exception("Faltando o identificador da monitoria");
        }
    }

    public function get() {

      $monitoriaMapper = new monitoriaMapper();
      $resposta = $monitoriaMapper->buscar();
      echo json_encode($resposta);

    }

    public function post() {
        // insere a monitoria
        $monitoria = new Monitoria();
        if (isset($_POST['professor_id']))
            $monitoria->set_professor_id($_POST['professor_id']);
		if (isset($_POST['disciplina_id']))
            $monitoria->set_disciplina_id($_POST['disciplina_id']);
		if (isset($_POST['titulo']))
            $monitoria->set_titulo($_POST['titulo']);
        // pega o id a ser gerado da monitoria
        $monitoriaMapper = new monitoriaMapper();
        $monitoria_id = $monitoriaMapper->getProxId();
        // salva
        $resposta = $monitoriaMapper->salvar($monitoria);

        // insere eventos de monitoria durante o periodo determinado
		if (isset($_POST['data_inicio']) && isset($_POST['data_fim'])) {
            $eventomonitoriaMapper = new eventomonitoriaMapper();

            $inicio = new DateTime($_POST['data_inicio']);
            $fim = new DateTime($_POST['data_fim']);
            $intervalo = DateInterval::createFromDateString('1 day');
            $period = new DatePeriod($inicio, $intervalo, $fim);
            foreach ($period as $dt) {
                $eventomonitoria = new EventoMonitoria();
                $eventomonitoria->set_monitoria_id($monitoria_id);
                $eventomonitoria->set_data($dt->format("Y-m-d"));
                $eventomonitoria->set_hora_inicio($_POST['hora_inicio']);
                $eventomonitoria->set_hora_fim($_POST['hora_fim']);
                $eventomonitoriaMapper->salvar($eventomonitoria);
            }
        }

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