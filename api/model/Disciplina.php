<?php

class Disciplina {
   
    protected $id;
    protected $titulo;

    public function get_id() {
        return $this->id;
    }

    public function get_titulo() {
        return $this->titulo;
    }

    public function set_id($id) {
        $this->id = $id;
        return $this;
    }

    public function set_titulo($titulo) {
        $this->titulo = $titulo;
        return $this;
    }
    
}
?>