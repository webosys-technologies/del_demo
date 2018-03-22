<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller
{
	public function __construct()
	{

	 		parent::__construct();
			$this->load->helper('url');
                          $this->load->model('Centers_model');                    
	 		$this->load->model('Topics_model');
	 		$this->load->model('Students_model');
//                        $this->load->model('Videos_model');
//                        $this->load->model('Courses_model');
	}
        
	public function index()
	{
		    $student_LoggedIn = $this->session->userdata('student_LoggedIn');
        
        if(isset($student_LoggedIn) || $student_LoggedIn == TRUE)
        {
        	$id= $this->session->userdata('student_id');
        	
        	$this->profile($id);
                
        	
        }
        else
        {
            $this->load->view('student/login');
            

        }
	}

	public function profile($id)
	{	
            $result['data']=$this->Students_model->get_by_id($id);
            	 
		 foreach ($result['data'] as $res) {
		 	$cid=$res->course_id;
		 }		 
             $cid=$this->session->userdata('center_id');
              $result['center_names']=$this->Centers_model->center_name($cid);  //get center detail
            $result['topics']=$this->Topics_model->get_topics($cid);
	    $this->load->view('student/header',$result);
            $this->load->view("student/profile",$result);
            $this->load->view('student/footer');

//		$result=$this->Students_model->get_by_id($id);
//                
//		 foreach ($result as $res) {
//		 	$cid=$res->course_id;
//		 }		 
//		
//		$data['topics']=$this->Topics_model->get_topics($cid);
//		$this->load->view('student/header');
//		$this->load->view('student/topics',$data);

	}
        
        

}

 ?>