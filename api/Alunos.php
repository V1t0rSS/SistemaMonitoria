<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/SistemaMonitoria/api/model/Aluno.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SistemaMonitoria/api/persistencia/AlunoMapper.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SistemaMonitoria/api/rotas/IRouter.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/SistemaMonitoria/api/rotas/Router.php";

//padrao de projetos strategy   
class Alunos implements IRouter
{

    public function login($aluno)
    {
		error_log(print_r("achou o login", TRUE)); 
        $alunoMapper = new AlunoMapper();
        $resposta = $alunoMapper->autenticacao($aluno);
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
            $alunoMapper = new AlunoMapper();
            $alunoMapper->remover($_REQUEST['id']);
        } else {
            http_response_code(400);
            throw new Exception("Faltando o identificador do aluno");
        }
    }

    public function get()
    {

        $alunoMapper = new AlunoMapper();
        $resposta = $alunoMapper->buscar();
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
            $aluno = new Aluno();
            if (isset($_POST['nome'])) {
                $aluno->set_nome($_POST['nome']);
            }
            if (isset($_POST['matricula'])) {
                $aluno->set_matricula($_POST['matricula']);
            }
            if (isset($_POST['email'])) {
                $aluno->set_email($_POST['email']);
            }
            if (isset($_POST['telefone'])) {
                $aluno->set_telefone($_POST['telefone']);
            }
            if (isset($_POST['senha'])) {
                $aluno->set_senha($_POST['senha']);
            }
            $alunoMapper = new AlunoMapper();
            $resposta = $alunoMapper->salvar($aluno);
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
$api = new Alunos();
$router = new Router($api);
$router->run();
