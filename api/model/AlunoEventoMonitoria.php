<?php

class AlunoEventoMonitoria {
   
    protected $id;
    protected $eventomonitoria_id;
    protected $aluno_id;
    protected $presente;
    protected $intencao;

    public function get_id() {
        return $this->id;
    }

    public function get_eventomonitoria_id() {
        return $this->eventomonitoria_id;
    }
    
    public function get_aluno_id() {
        return $this->aluno_id;
    }

    public function get_presente() {
        return $this->presente;
    }

    public function get_intencao() {
        return $this->intencao;
    }

    public function set_id($id) {
        $this->id = $id;
        return $this;
    }
    
    public function set_eventomonitoria_id($eventomonitoria_id) {
        $this->eventomonitoria_id = $eventomonitoria_id;
        return $this;
    }

    public function set_aluno_id($aluno_id) {
        $this->aluno_id = $aluno_id;
        return $this;
    }

    public function set_presente($presente) {
        $this->presente = $presente;
        return $this;
    }

    public function set_intencao($intencao) {
        $this->intencao = $intencao;
        return $this;
    }
    
}
?>