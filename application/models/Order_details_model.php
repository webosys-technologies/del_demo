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
		$this->db->join('orders ','orders.order_id=ords.order_id',"LEFT");
		$this->db->join('students','students.student_id=ords.student_id','LEFT');
		$this->db->join('courses','courses.course_id=ords.course_id','LEFT');
		$this->db->where('ords.order_id',$id);
		$query = $this->db->get();

		return $query->result();
	}

	public function get_invoice($id)
	{
		$this->db->from('order_details as ords');
		$this->db->join('orders as or','or.order_id=ords.order_id','LEFT');
		$this->db->join('students','students.student_id=ords.student_id','LEFT');
		$this->db->join('centers','centers.center_id=or.center_id','LEFT');
		$this->db->join('books as bk','bk.book_id=students.book_id',"LEFT");
		$this->db->join('courses','courses.course_id=ords.course_id','LEFT');
		$this->db->where('ords.order_id',$id);
		$query = $this->db->get();

		return $query->result();
	}
}


 ?>