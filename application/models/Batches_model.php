<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Batches_model extends CI_Model
{
	var $table='batches';

	function __construct()
	{

		parent::__construct();
		$this->load->database();
	}
        
        public function check_by_batch($name,$id)
        {
             
            $this->db->from($this->table);
            $this->db->where('batch_name',$name);
            $this->db->where('center_id',$id);
            $query=$this->db->get();
            $row=$query->num_rows();
           
            if($row>0)
            {
               
                return true;
            }else{
                return false;
            }
        }
        
        public function get_batches_by_id($id)
        {
            $this->db->from($this->table);
            $this->db->where('center_id',$id);
            $query=$this->db->get();
            return $query->result();
            
        }
        
          public function get_allbatch()
        {
            $this->db->from($this->table);
            $this->db->where('batch_status','1');
            $query=$this->db->get();
            return $query->num_rows();
            
        }
      
         public function get_batch_count($id)
        {
            $this->db->from($this->table);
            $this->db->where('center_id',$id);
            $this->db->where('batch_status',1);
            $query=$this->db->get();
            return $query->num_rows();
            
        }
        public function batch_add($data)
        {
            $this->db->insert($this->table, $data);
            return $this->db->insert_id();
        }
         public function get_id($id)
        {
                    
        $this->db->from($this->table);       
        $this->db->where('batch_id',$id);
            $query = $this->db->get();

            return $query->row();
        }
        public function batch_update($where, $data)
	{
           
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}
        public function delete_by_id($id)
	{
		$this->db->where('batch_id', $id);
		$this->db->delete($this->table);
                return $this->db->affected_rows();
	}
        
        public function getall_batchs()
        {
            
         $this->db->from('batchs as sub');        
         $this->db->join('centers as crs', 'crs.center_id=sub.center_id', 'LEFT');
         $query = $this->db->get();
       	return $query->result();
           
        }
        
         public function getall_batches()
        {
          $this->db->from('batches as bat');        
         $this->db->join('centers as crs', 'bat.center_id=crs.center_id', 'LEFT');
         $query = $this->db->get();
       	return $query->result();
           
        }
        
        
       
}

 ?>