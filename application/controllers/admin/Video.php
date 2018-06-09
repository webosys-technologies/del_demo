
  <?php

   if(!defined('BASEPATH')) exit('No direct script access allowed');

//require APPPATH . '/libraries/BaseController.php';

class Video extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

               
        $this->load->model('Topics_model');
        $this->load->model('Courses_model');
         $this->load->model('User_model');
         $this->load->model('System_model');
        $this->load->helper('url');

	}

	public function index()
	{       
             $user_LoggedIn=$this->session->userdata('user_LoggedIn');
        if(isset($user_LoggedIn) || $user_LoggedIn == TRUE)
        {
        
		$data['topics']=$this->Topics_model->getall_topics();
               
                 $id=$this->session->userdata('user_id');
            $result['system']=$this->System_model->get_info();
            $result['user_info']=$this->User_model->get_user_by_id($id);
       
            $this->load->view('admin/header',$result);
		$this->load->view('admin/video_view',$data);
		$this->load->view('admin/footer',$result);

        }
        else
        {
            redirect('admin/index/login');
        }
        
	}

  
 
}



 ?> 

