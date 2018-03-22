<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Videos_model extends CI_Model
{

	var $table = 'videos';


	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
        
        
        public function get_videos($id)
	{
		$this->db->from($this->table);
		$this->db->where('topic_id',$id);
		$query = $this->db->get();

		return $query->result();

	}
}