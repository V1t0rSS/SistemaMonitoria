<?php

class AlunoEventoMonitoria {
   
    protected $id;
    protected $monitoria_id;
    protected $monitor_id;
    protected $data_inicio;
    protected $data_fim;
    protected $inativo;

    public function get_id() {
        return $this->id;
    }

    public function get_monitoria_id() {
        return $this->monitoria_id;
    }
    
    public function get_monitor_id() {
        return $this->monitor_id;
    }

    public function get_data_inicio() {
        return $this->data_inicio;
    }

    public function get_inativo() {
        return $this->inativo;
    }

    public function set_id($id) {
        $this->id = $id;
        return $this;
    }
    
    public function set_monitoria_id($monitoria_id) {
        $this->monitoria_id = $monitoria_id;
        return $this;
    }

    public function set_monitor_id($monitor_id) {
        $this->monitor_id = $monitor_id;
        return $this;
    }

    public function set_data_inicio($data_inicio) {
        $this->data_inicio = $data_inicio;
        return $this;
    }

    public function set_inativo($inativo) {
        $this->inativo = $inativo;
        return $this;
    }
    
}
?>