<?php

class GrupoMonitoria Extends Monitor{
   
    protected $id;
    protected $disciplina;
	protected $monitor;

    public function get_id() {
        return $this->id;
    }
    
    public function get_disciplina() {
        return $this->nome;
    }
	
	public function get_monitor() {
        return $this->nome;
    }
	
    public function set_id($id) {
        $this->id = $id;
        return $this;
    }

    public function set_disciplina($matricula) {
        $this->matricula = $matricula;
        return $this;
    }
	
	public function set_monitor($id) {
		$this->id = $id;
        return $this;
    }
    
}