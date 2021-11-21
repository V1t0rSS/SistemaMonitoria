<?php

class RelatorioEventoMonitoria {
   
    protected $id;
    protected $anotacao;

    public function get_id() {
        return $this->id;
    }
    
    public function get_anotacao() {
        return $this->anotacao;
    }

    public function set_id($id) {
        $this->id = $id;
        return $this;
    }

    public function set_anotacao($anotacao) {
        $this->anotacao = $anotacao;
        return $this;
    }
    
}