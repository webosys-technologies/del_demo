<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Topics_model extends CI_Model
{

	var $table = 'topics';


	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}


        public function getall_topics()
        {
//        $this->db->from('topics');
//        $query=$this->db->get();
        
            $query=$this->db->from('topics as tp')
            ->join('courses as crs', 'crs.course_id=tp.course_id', 'LEFT')
            ->get();
           
        return $query->result();
        }


	public function get_by_id($id)
	{
		$this->db->from($this->table);
		$this->db->where('topic_id',$id);
		$query = $this->db->get();

		return $query->row();
	}
        public function topic_count($id)
	{
		$this->db->from($this->table);
		$this->db->where('course_id',$id);
		$query = $this->db->get();

		return $query->num_rows();
	}
         public function get_topic_count()
	{
		$this->db->from($this->table);
		$this->db->where('topic_status','1');
		$query = $this->db->get();

		return $query->num_rows();
	}

	public function topic_add($data)
	{
		$this->db->insert($this->table, $data);
                return $this->db->insert_id();
	}

	public function topic_update($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}
        public function delete_topic_video($id)
        {
             $this->db->set('topic_video_path',"");
                $this->db->where('topic_id', $id);
                $this->db->update($this->table); 
        }

	public function delete_by_id($id)
	{
		$this->db->where('topic_id', $id);
		$this->db->delete($this->table);
	}

	public function get_topics($id)
	{
		$this->db->from($this->table);
		$this->db->where('course_id',$id);
		$query = $this->db->get();

		return $query->result();

	}
         public function get_topics_by_course($id)
        {

                    
        $this->db->from('students as stud');        

         $this->db->join('courses as crs', 'crs.course_id=stud.course_id', 'LEFT');
            $this->db->where('student_id',$id);
            $query = $this->db->get();

            return $query->row();
        }
        public function get_video($id)
	{
		$this->db->from($this->table);
		$this->db->where('topic_id',$id);
		$query = $this->db->get();

		return $query->row();

	}
}
