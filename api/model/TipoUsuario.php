<?php

class TipoUsuario {
   
    protected $id;
    protected $descricao;

    public function get_id() {
        return $this->id;
    }

    public function get_descricao() {
        return $this->descricao;
    }

    public function set_id($id) {
        $this->id = $id;
        return $this;
    }

    public function set_descricao($descricao) {
        $this->descricao = $descricao;
        return $this;
    }
    
}
?>