<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/SistemaMonitoria/api/model/Administrador.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SistemaMonitoria/api/persistencia/AdministradorMapper.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SistemaMonitoria/api/rotas/IRouter.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SistemaMonitoria/api/rotas/Router.php";

//padrao de projetos strategy   
class Administradores implements IRouter {

    public function delete() {
        http_response_code(404);
        throw new Exception("Não implementado ainda");
    }

    public function get() {

      $administradorMapper = new AdministradorMapper();
      $resposta = $administradorMapper->buscar();
      echo json_encode($resposta);

    }

    public function post() {
        $administrador = new Administrador();
        if (isset($_POST['nome'])) {
            $administrador->set_nome($_POST['nome']);
        }if (isset($_POST['matricula'])) {
            $administrador->set_matricula($_POST['matricula']);
        }if (isset($_POST['email'])) {
            $administrador->set_email($_POST['email']);
        }if (isset($_POST['telefone'])) {
            $administrador->set_telefone($_POST['telefone']);
        }
        $administradorMapper = new AdministradorMapper();
        $resposta = $administradorMapper->salvar($administrador);
        echo $resposta;
    }

    public function put() {
        http_response_code(404);
        throw new Exception("Não implementado ainda");
    }

}

header("Access-Control-Allow-Origin: *");
$api= new Administradores();
$router = new Router($api);
$router->run();