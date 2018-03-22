<?php 

class Exams extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Students_model');
		$this->load->model('Exams_model');
		$this->load->model('Centers_model');
                 $this->load->model('User_model');
	}

  public function index()
    {
        $user_LoggedIn=$this->session->userdata('user_LoggedIn');
        if(isset($user_LoggedIn) || $user_LoggedIn == TRUE)
        {
        
          $data['exam_data']=$this->Exams_model->getall_exams();
              //$result['data']=$this->Centers_model->get_by_id($id);           
             $uid=$this->session->userdata('user_id');
            $result['user_info']=$this->User_model->get_user_by_id($uid);
       
            $this->load->view('admin/header',$result);
            $this->load->view('admin/exams_view',$data);
            $this->load->view('admin/footer');

        }
        else
        {
            redirect('admin/index/login');
        }
    
    }

	
}

 ?>