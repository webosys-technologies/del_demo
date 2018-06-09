<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Courses extends CI_Controller {
   


	 public function __construct()
	 	{
	 		parent::__construct();
			$this->load->helper('url');
	 		$this->load->model('Courses_model');
	 		$this->load->model('System_model');
                        $this->load->model('Centers_model');
      
	 		
                      
	 	}


	public function index()
	{	
		
		  $center_LoggedIn = $this->session->userdata('center_LoggedIn');
        
        if(isset($center_LoggedIn) || $center_LoggedIn == TRUE)
        {
		$data['courses']=$this->Courses_model->getall_courses();
               
              
                $id=$this->session->userdata('center_id');            
            $result['system']=$this->System_model->get_info();
             $result['data']=$this->Centers_model->get_by_id($id);
           
             $this->load->view('center/header',$result);
		$this->load->view('center/course_view',$data);

          $this->load->view('center/footer',$result);


        }
        else
        {
            $this->load->view('center/login');
            

        }


	}

	

	


}
