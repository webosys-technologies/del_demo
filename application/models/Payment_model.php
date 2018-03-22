<?php 

class Payment_model extends CI_Model
{
	var $table='payment';

	public function getall_payment()
	{
		$this->db->from($this->table);
		$this->db->join('centers as cen','cen.center_id=payment.center_id','LEFT');
		$this->db->order_by("payment_id","desc");
		
		$query=$this->db->get();
		return $query->result();
	}
	public function addpayment($data)
	{
		$query=$this->db->insert($this->table,$data);
		return $query;

	}

	public function get_by_center_id($id)
	{
		$this->db->from($this->table);
		$this->db->where('center_id',$id);
		$this->db->order_by("payment_id","desc");
		$query = $this->db->get();

		return $query->result();
	}
}


 ?>