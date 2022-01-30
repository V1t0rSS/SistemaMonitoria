<?php

class Monitoria {
   
    protected $id;
    protected $professor_id;
    protected $disciplina_id;
    protected $titulo;

    public function get_id() {
        return $this->id;
    }

    public function get_professor_id() {
        return $this->professor_id;
    }
    
    public function get_disciplina_id() {
        return $this->disciplina_id;
    }

    public function get_titulo() {
        return $this->titulo;
    }

    public function set_id($id) {
        $this->id = $id;
        return $this;
    }

    public function set_professor_id($professor_id) {
        $this->professor_id = $professor_id;
        return $this;
    }

    public function set_disciplina_id($disciplina_id) {
        $this->disciplina_id = $disciplina_id;
        return $this;
    }

    public function set_titulo($titulo) {
        $this->titulo = $titulo;
        return $this;
    }
    
}
?>