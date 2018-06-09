<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Books_model extends CI_Model
{

	var $table = 'books';


	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}


        public function getall_book()
        {
        $this->db->from('books as bk');
        $this->db->join('courses as cor','cor.course_id=bk.course_id','LEFT');
        $query=$this->db->get();
        return $query->result();
        }
        
        public function check_book($check)
        {
            $this->db->from($this->table);
            $this->db->where($check);
            $query=$this->db->get();
            $res=$query->num_rows();
            if($res>0)
            {
                return true;
            }else{
                return false;
            }
        }
        
         public function get_book_rows()
        {
        $this->db->from($this->table);
        $query=$this->db->get();
        return $query->num_rows();
        }


	public function get_by_id($id)
	{
		$this->db->from($this->table);
		$this->db->where('book_id',$id);
		$query = $this->db->get();

		return $query->row();
	}
        
        public function book_by_id($id)
	{
		$this->db->from($this->table);
		$this->db->where('book_id',$id);
		$query = $this->db->get();

		return $query->result();
	}

	public function book_add($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function book_update($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}

	public function delete_by_id($id)
	{
		$this->db->where('book_id', $id);
		$this->db->delete($this->table);
	}
        
        
    public function get_book_count()
    {   
        $this->db->from($this->table);
        $this->db->where('book_status','1');
        $query=$this->db->get();
        return $query->num_rows();
        
    }

    public function book_by_course_id($id)
	{
		$this->db->from($this->table);
		$this->db->where('course_id',$id);
		$query = $this->db->get();

		return $query->result();
	}
        
        public function book_created_at()
        {
            $this->db->query('ALTER TABLE `books` ADD `book_created_at` DATE NOT NULL AFTER `book_price`');
            return true;
        }

	


}
