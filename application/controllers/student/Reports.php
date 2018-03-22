<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Reports extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->library(array('session', 'form_validation', 'email'));
		$this->load->database();
                $this->load->model('Centers_model');
		$this->load->model('Students_model');
                $this->load->model('Questions_model');
                $this->load->model('Topics_model');
                $this->load->model('Exam_details_model');
             //   $this->load->model('login_model');
              //  $i=1;
               
	}	
	function index()
	{
              $student_LoggedIn = $this->session->userdata('student_LoggedIn');
        
        if(isset($student_LoggedIn) || $student_LoggedIn == TRUE)
        {            
        	//$id= $this->session->userdata('student_id');        	
        	$this->reports();            
        }
        else
        {
           $this->load->view('student/login');
        }
            
		
	}
        public function reports()
        {
             $student_LoggedIn = $this->session->userdata('student_LoggedIn');
             if(isset($student_LoggedIn) || $student_LoggedIn == TRUE)
        {
            
        	$id= $this->session->userdata('student_id'); 
                $course_id=$this->session->userdata('student_course_id');

                $result['data']=$this->Students_model->get_by_id($id);
            	 
				 
              $cid=$this->session->userdata('center_id');
              $result['center_names']=$this->Centers_model->center_name($cid);  //get center detail

     
            
        	
            $this->load->view('student/header',$result);
                $this->load->view('student/reports');
                $this->load->view('student/footer');
                  
        }
        else
        {
             $this->load->view('student/login');
        }
        }
        
        
}


