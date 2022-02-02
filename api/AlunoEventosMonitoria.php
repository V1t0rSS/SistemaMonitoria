<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/SistemaMonitoria/api/model/AlunoEventoMonitoria.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SistemaMonitoria/api/persistencia/AlunoEventoMonitoriaMapper.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SistemaMonitoria/api/rotas/IRouter.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SistemaMonitoria/api/rotas/Router.php";

//padrao de projetos strategy   
class AlunoEventosMonitoria implements IRouter {

    public function delete() {
        if (isset($_REQUEST['id'])) {
            // delete eventos
            $aluno_eventomonitoriaMapper = new AlunoEventoMonitoriaMapper();
            $aluno_eventomonitoriaMapper->remover($_REQUEST['id'], $_SESSION['id']);
        } else {
            http_response_code(400);
            throw new Exception("Faltando o identificador da monitoria");
        }
    }
    
    public function get() {

        $aluno_eventomonitoriaMapper = new AlunoEventoMonitoriaMapper();
        $resposta = $aluno_eventomonitoriaMapper->buscar();
        echo json_encode($resposta);
  
    }

    public function post() {
        $aluno_eventomonitoriaMapper = new AlunoEventoMonitoriaMapper();
        $resposta = $aluno_eventomonitoriaMapper->salvar($_REQUEST['id'], $_SESSION['id']);
        echo $resposta;
    }

    public function put() {
        http_response_code(404);
        throw new Exception("Não implementado ainda");
    }

}

header("Access-Control-Allow-Origin: *");
$api= new AlunoEventosMonitoria();
$router = new Router($api);
$router->run();