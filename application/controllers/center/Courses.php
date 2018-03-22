<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Courses extends CI_Controller {
   

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	 public function __construct()
	 	{
	 		parent::__construct();
			$this->load->helper('url');
	 		$this->load->model('Courses_model');
                        $this->load->model('Centers_model');
      
	 		
                      
	 	}


	public function index()
	{	
		
		  $center_LoggedIn = $this->session->userdata('center_LoggedIn');
        
        if(isset($center_LoggedIn) || $center_LoggedIn == TRUE)
        {
		$data['courses']=$this->Courses_model->getall_courses();
               
              
                $id=$this->session->userdata('center_id');            
             $result['data']=$this->Centers_model->get_by_id($id);
           
             $this->load->view('center/header',$result);
		$this->load->view('center/course_view',$data);

          $this->load->view('center/footer');


        }
        else
        {
            $this->load->view('center/login');
            

        }


	}

	

	


}
