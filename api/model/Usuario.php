<?php

class Usuario {
   
    protected $id;
    protected $nome;
    protected $matricula;
    protected $email;
    protected $senha;
    protected $telefone;
    protected $tipousuario;

    const ADMINISTRADOR = 1;
    const PROFESSOR = 2;
    const MONITOR = 3;
    const ALUNO = 4;

    public function get_id() {
        return $this->id;
    }
    
    public function get_nome() {
        return $this->nome;
    }

    public function get_matricula() {
        return $this->matricula;
    }

    public function get_email() {
        return $this->email;
    }

    public function get_senha() {
        return $this->senha;
    }

    public function get_telefone() {
        return $this->telefone;
    }

    public function set_id($id) {
        $this->id = $id;
        return $this;
    }

    public function set_nome($nome) {
        $this->nome = $nome;
        return $this;
    }

    public function set_matricula($matricula) {
        $this->matricula = $matricula;
        return $this;
    }

    public function set_email($email) {
        $this->email = $email;
        return $this;
    }

    public function set_senha($senha) {
        $this->senha = $senha;
        return $this;
    }
    
    public function set_telefone($telefone) {
        $this->telefone = $telefone;
        return $this;
    }
    
}
?>