<?php

class GrupoMonitoria Extends Monitor{
   
    protected $id;
    protected $disciplina;
	protected $monitor;

    public function get_id() {
        return $this->id;
    }
    
    public function get_disciplina() {
        return $this->disciplina;
    }
	
	public function get_monitor() {
        return $this->monitor;
    }
	
    public function set_id($id) {
        $this->id = $id;
        return $this;
    }

    public function set_disciplina($disciplina) {
        $this->disciplina = $disciplina;
        return $this;
    }
	
	public function set_monitor($monitor) {
		$this->monitor = $monitor;
        return $this;
    }
    
}