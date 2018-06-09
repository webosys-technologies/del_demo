<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Question_papers_model extends CI_Model
{

	var $table = 'question_papers';


	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
        
        function get_que_paper($id)   //get question paper by course id
        {
            $this->db->from($this->table);
            $this->db->where('course_id',$id);
            $query=$this->db->get();
            return $query->row();
            
        }
        
        

       
}