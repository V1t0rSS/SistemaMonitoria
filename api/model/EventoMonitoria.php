<?php

class EventoMonitoria {
   
    protected $id;
    protected $monitoria_id;
    protected $data;
    protected $hora_inicio;
    protected $hora_fim;
    protected $observacao;
    protected $relatorio;

    public function get_id() {
        return $this->id;
    }

    public function get_monitoria_id() {
        return $this->monitoria_id;
    }
    
    public function get_data() {
        return $this->data;
    }

    public function get_hora_inicio() {
        return $this->hora_inicio;
    }

    public function get_hora_fim() {
        return $this->hora_fim;
    }
    
    public function get_observacao() {
        return $this->observacao;
    }

    public function get_relatorio() {
        return $this->relatorio;
    }

    public function set_id($id) {
        $this->id = $id;
        return $this;
    }
    
    public function set_monitoria_id($monitoria_id) {
        $this->monitoria_id = $monitoria_id;
        return $this;
    }

    public function set_data($data) {
        $this->data = $data;
        return $this;
    }

    public function set_hora_inicio($hora_inicio) {
        $this->hora_inicio = $hora_inicio;
        return $this;
    }

    public function set_hora_fim($hora_fim) {
        $this->hora_fim = $hora_fim;
        return $this;
    }

    public function set_observacao($observacao) {
        $this->observacao = $observacao;
        return $this;
    }

    public function set_relatorio($relatorio) {
        $this->relatorio = $relatorio;
        return $this;
    }
    
}
?>