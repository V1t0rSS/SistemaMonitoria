<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/SistemaMonitoria/api/model/Professor.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SistemaMonitoria/api/persistencia/ProfessorMapper.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SistemaMonitoria/api/rotas/IRouter.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SistemaMonitoria/api/rotas/Router.php";

//padrao de projetos strategy   
class Professores implements IRouter
{

    public function login($professor)
    {
		error_log(print_r("achou o login", TRUE)); 
        $professorMapper = new ProfessorMapper();
        $resposta = $professorMapper->autenticacao($professor);
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
            $professorMapper = new ProfessorMapper();
            $professorMapper->remover($_REQUEST['id']);
        } else {
            http_response_code(400);
            throw new Exception("Faltando o identificador do professor");
        }
    }

    public function get()
    {

        $professorMapper = new ProfessorMapper();
        $resposta = $professorMapper->buscar();
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
            $professor = new Professor();
            if (isset($_POST['nome'])) {
                $professor->set_nome($_POST['nome']);
            }
            if (isset($_POST['matricula'])) {
                $professor->set_matricula($_POST['matricula']);
            }
            if (isset($_POST['email'])) {
                $professor->set_email($_POST['email']);
            }
            if (isset($_POST['telefone'])) {
                $professor->set_telefone($_POST['telefone']);
            }
            if (isset($_POST['senha'])) {
                $professor->set_senha($_POST['senha']);
            }
            $professorMapper = new ProfessorMapper();
            $resposta = $professorMapper->salvar($professor);
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
$api = new Professores();
$router = new Router($api);
$router->run();
