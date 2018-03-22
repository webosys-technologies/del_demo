<?php 

class Order_details_model extends CI_Model
{
	var $table='order_details';

	function addorder($data)
	{
		$query=$this->db->insert($this->table,$data);
		return $query;
	}

	public function get_id($id)
	{
		$this->db->from('order_details as ords');
		$this->db->join('students','students.student_id=ords.student_id','LEFT');
		$this->db->join('courses','courses.course_id=ords.course_id','LEFT');
		$this->db->where('order_id',$id);
		$query = $this->db->get();

		return $query->result();
	}
}


 ?>