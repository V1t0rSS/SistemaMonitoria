<?php

class EventoMonitoria {
   
    protected $id;
    protected $data;

    public function get_id() {
        return $this->id;
    }
    
    public function get_data() {
        return $this->data;
    }

	
    public function set_id($id) {
        $this->id = $id;
        return $this;
    }
	
	public function set_data($data) {
		$this->data = $data;
        return $this;
    }
    
}