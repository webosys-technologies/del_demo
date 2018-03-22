<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Students_model extends CI_Model
{
	var $table='students';

	function __construct()
	{

		parent::__construct();
		$this->load->database();
	}
        
         function loginMe($student_email, $student_password)
    {
     /*   $this->db->select('BaseTbl.userId, BaseTbl.password, BaseTbl.name, BaseTbl.roleId, Roles.role');
        $this->db->from('tbl_users as BaseTbl');
        $this->db->join('tbl_roles as Roles','Roles.roleId = BaseTbl.roleId'); 
        $this->db->where('BaseTbl.email', $email);
        $this->db->where('BaseTbl.isDeleted', 0);  */
         $this->db->where('student_email', $student_email);
          $this->db->or_where('student_username', $student_email);
          $this->db->where('student_password', $student_password);
        $this->db->from('students as stud');        
         $this->db->join('courses as crs', 'crs.course_id=stud.course_id', 'LEFT');
        $query=$this->db->get();
        
         $row = $query->num_rows();
        $result=$query->result();
        
        $this->db->where('student_email', $student_email);
        $this->db->or_where('student_username', $student_email);
        $query2 = $this->db->get('students');
        $valid_email=$query2->num_rows();
        return array($row,$result,$valid_email);
        
   
    }

	public function getall_students()
    {
        $this->db->from('students as stud');        
         $this->db->join('courses as crs', 'crs.course_id=stud.course_id', 'LEFT');
         $this->db->join('centers as cen','cen.center_id=stud.center_id','LEFT');
         
        $this->db->order_by("student_id","desc");
        $query=$this->db->get();
        return $query->result();
       
    }
    
    public function getall_students_no()
    {
        $this->db->from($this->table);        
        $this->db->where('student_status','1');
        $query=$this->db->get();
        return $query->num_rows();
       
    }
    
    public function get_students_count($id)
    {
        $this->db->from($this->table);
        $this->db->where('center_id',$id);
        $this->db->where('student_status',"1");
        $query=$this->db->get();
        return $query->num_rows();

        // $query=$this->db->from('topics as tp')
        //     ->join('courses as crs', 'crs.course_id=tp.course_id', 'LEFT')
        //     ->get();
    }

    public function get_by_center_id($id)
	{
        $this->db->from('students as stud');        
         $this->db->join('courses as crs', 'crs.course_id=stud.course_id', 'LEFT');
		$this->db->where('center_id',$id);
        $this->db->order_by("student_id","desc");

		$query = $this->db->get();

		return $query->result();
	}
        
        
         public function get_by_id($id)
	{
         $this->db->from('students as stud');        
         $this->db->join('courses as crs', 'crs.course_id=stud.course_id', 'LEFT');
         $this->db->where('student_id',$id);
         $query = $this->db->get();
       	return $query->result();
	}
        
               
        
        public function get_student_by_id($id)
	{
         $this->db->from($this->table);        
         $this->db->where('student_id',$id);
         $query = $this->db->get();
       	return $query->row();
	}
        
    
               

    public function student_add($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}
        
        public function update_student_profile($id)
        {
             $data=array(
                            'student_mobile'=>$this->input->post('student_mobile'),
                            'student_address'=>$this->input->post('student_address'),
                            'student_city'=>$this->input->post('student_city'),
                            'student_pincode'=>$this->input->post('student_pincode'),
                            'student_state'=>$this->input->post('student_state'));
            
            
            $this->db->set($data);
            $this->db->where('student_id',$id);
            $result=$this->db->update($this->table,$data);
            if($result)
            {
                return true;
            }
            else
            {
                return false;
            }
            
        }
     

	public function student_update($where, $data)
	{
           
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}

	public function delete_by_id($id)
	{
		$this->db->where('student_id', $id);
		$this->db->delete($this->table);
	}
        
        public function delete_profile_pic($id)
	{     
                           
            $this->db->set('student_profile_pic',"");
                $this->db->where('student_id', $id);
                $this->db->update($this->table); 
                
	}
        
        public function check_password($id)
        {
             $this->db->from($this->table);
            $this->db->where('student_id', $id);
            $query=$this->db->get();
            
            $result=$query->result();
            foreach($result as $res)
            {
                $password=$res->student_password;
            }
            return $password;
            
        }

        
        public function reset_password($data)
        {
             $this->db->set('student_password',$data['student_password']);
             $this->db->where('student_id',$data['student_id']);
            $this->db->update($this->table);
            return true;
            
                     
           
            
        }

        public function get_multiple_id($ids=array())
        {
            $this->db->from('students as stud');        
             $this->db->join('books as bk', 'bk.course_id=stud.course_id', 'LEFT');
            
             $this->db->join('courses as crs', 'crs.course_id=stud.course_id', 'LEFT');
             foreach($ids as $id)
            {    // where $org is the instance of one object of active record
                 $this->db->or_where('student_id',$id);
            }
            $query=$this->db->get();
            return $query->result();
        }

        public function get_id($id)
        {

                    
        $this->db->from('students as stud');        

         $this->db->join('courses as crs', 'crs.course_id=stud.course_id', 'LEFT');
            $this->db->where('student_id',$id);
            $query = $this->db->get();

            return $query->row();
        }
        
         
        
        function check_if_email_exist($student_email)
	{
		$this->db->where('student_email',$student_email);
                $this->db->or_where('student_username',$student_email);
		$result=$this->db->get($this->table);

		if($result->num_rows()>0)
		{
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}



}

 ?>