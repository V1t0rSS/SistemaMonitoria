<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/SistemaMonitoria/api/model/Monitor.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SistemaMonitoria/api/persistencia/MonitorMapper.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SistemaMonitoria/api/rotas/IRouter.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SistemaMonitoria/api/rotas/Router.php";

//padrao de projetos strategy   
class Monitores implements IRouter
{

    public function login($monitor)
    {
		error_log(print_r("achou o login", TRUE)); 
        $monitorMapper = new MonitorMapper();
        $resposta = $monitorMapper->autenticacao($monitor);
        if ($resposta) {
            $_SESSION["id"] = $resposta['id'];
            $_SESSION["nome"] = $resposta['nome'];
            $_SESSION["usuario_tipo"] = $resposta['tipousuario_id'];
            $_SESSION["usuario_matricula"] = $resposta['matricula'];
        }
    }

    public function logout()
    {
        try {
            session_destroy(); //destroy a sessao no servidor.
        } catch (Exception $ex) {
        }
    }

    public function info()
    {
        try {
            var_dump($_SESSION);
        } catch (Exception $ex) {
        }
    }

    public function delete() {
        if (isset($_REQUEST['id'])) {
            $monitorMapper = new MonitorMapper();
            $monitorMapper->remover($_REQUEST['id']);
        } else {
            http_response_code(400);
            throw new Exception("Faltando o identificador do monitor");
        }
    }

    public function get()
    {

        $monitorMapper = new MonitorMapper();
        $resposta = $monitorMapper->buscar();
        echo json_encode($resposta);
    }

    public function post()
    {
        if ($_REQUEST["method"] == "LOGIN") {
            $usuario = new Usuario();
            if (isset($_POST['email'])) {
                $usuario->set_email($_POST['email']);
            }
            if (isset($_POST['senha'])) {
                $usuario->set_senha($_POST['senha']);
            }
            $this->login($usuario);
            http_response_code(200);
        } else if ($_REQUEST["method"] == "LOGOUT") {
            $this->logout();
        } else {
            $monitor = new Monitor();
            if (isset($_POST['nome'])) {
                $monitor->set_nome($_POST['nome']);
            }
            if (isset($_POST['matricula'])) {
                $monitor->set_matricula($_POST['matricula']);
            }
            if (isset($_POST['email'])) {
                $monitor->set_email($_POST['email']);
            }
            if (isset($_POST['telefone'])) {
                $monitor->set_telefone($_POST['telefone']);
            }
            if (isset($_POST['senha'])) {
                $monitor->set_senha($_POST['senha']);
            }
            $monitorMapper = new MonitorMapper();
            $resposta = $monitorMapper->salvar($monitor);
            echo $resposta;
        }
    }

    public function put()
    {
        http_response_code(404);
        throw new Exception("Não implementado ainda");
    }
}

header("Access-Control-Allow-Origin: *");
$api = new Monitores();
$router = new Router($api);
$router->run();
