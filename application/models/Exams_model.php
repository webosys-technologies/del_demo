<?php 

class Exams_model extends CI_Model
{
	var $table='exams';

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function getall_exams()
	{
		$this->db->from($this->table);
		$this->db->join('students','students.student_id=exams.student_id');
		$this->db->join('courses','courses.course_id=students.course_id');
		$this->db->join('centers','centers.center_id=students.center_id','left');
		$query=$this->db->get();
		return $query->result();
	}
        
        public function getdata($id)
	{
		$this->db->from($this->table);
                $this->db->where('student_id',$id);
		$query=$this->db->get();
		return $query->result();
	}

	public function get_by_center_id($id)
	{
		$this->db->from($this->table);
		$this->db->join('students','students.student_id=exams.student_id');
		$this->db->join('courses','courses.course_id=students.course_id');
		$this->db->join('centers','centers.center_id=students.center_id','left');
		$this->db->where('centers.center_id',$id);
		$this->db->order_by('exam_id','desc');
		$query=$this->db->get();
		return $query->result();
	}
        
         public function insert_data($data)
	{
	$query=$this->db->insert($this->table,$data);
		return $this->db->insert_id();

	}
        public function get_result_by_id($data)
        {
            $this->db->from('exams');
            $this->db->join('exam_details', 'exams.exam_id = exam_details.exam_id');
            $this->db->where('exams.exam_id',$data['exam_id']);

            $query = $this->db->get();
            return $query->result();          
        }
        
        public function no_of_exams($sid)
        {   
            $this->db->where('student_id',$sid);
            $query=$this->db->get($this->table);
            return $query->num_rows();
        }
          
      
       

}

 ?>