<?php 

class Cities_model extends CI_Model
{
	var $table='cities';

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	
        function getall_cities($state)
        {
            $this->db->from($this->table);
            $this->db->where('city_state',$state);
            $query=$this->db->get();
            return $query->result();
        }      

}

 ?>