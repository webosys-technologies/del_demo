<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Index extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->library(array('session', 'form_validation', 'email'));
		$this->load->database();
		$this->load->model('User_model');
                $this->load->model('Centers_model');
                $this->load->model('login_model');
            
                
                
        }
	
	function index()
	{
		$this->load->view('admin/login');
	}
        
       
        
        function login()
    {
             $user_LoggedIn = $this->session->userdata('user_LoggedIn');
        
        if(isset($user_LoggedIn) || $user_LoggedIn == TRUE)
        {
           redirect('admin/Dashboard');
        }
        else
        {
             $this->load->view('admin/login');
            
        }
    }
    
    
    
    
    public function loginMe()
    {
        
        $this->load->library('form_validation');
        
      //  $this->form_validation->set_rules('email', 'Username', 'callback_username_check');
        $this->form_validation->set_rules('user_email', 'Email', 'required|valid_email|max_length[128]|trim');
        $this->form_validation->set_rules('user_password', 'Password', 'required|max_length[32]');
        
        if($this->form_validation->run() == FALSE)
        {
            $this->login();
        }
        else  
        {
            $user_email = $this->input->post('user_email');
            $user_password = $this->input->post('user_password');
            list($result,$getdata,$valid_email) = $this->User_model->loginMe($user_email, $user_password);  
            
            foreach($getdata as $res)  
         {   
            $status=array('user_status'=>$res->user_status);
        }
        
       if($valid_email>0)
       {
           
            
            
            if($result > 0 && $status['user_status']==1)
            {
               foreach ($getdata as $res)
                {
                    $sessionArray = array(
                        
                         'user_id' => $res->user_id,
                    'user_fname' => $res->user_fname,
                    'user_lname' => $res->user_lname,
                    'user_email' => $res->user_email,
                    'user_mobile' =>$res->user_mobile,
                    'user_LoggedIn' => true
                                    );
                                    
                    $this->session->set_userdata($sessionArray);  
                    
                    redirect('admin/Dashboard');
                  
               }
              }
            else
            {
                $this->session->set_flashdata('error', 'Email or password mismatch');
                
                if($result > 0 && $status['user_status']==0)
                {
                 $this->session->set_flashdata('error', 'This email is not active');
                }
                
                redirect('admin/Index/Login');  
            }  
        }
        else
        {
             $this->session->set_flashdata('error', 'This email id is not registered with us.');
                 redirect('admin/Index/Login'); 
        }
        }
    }
    
    
     public function signout()
    {
    
        
//        $this->session->sess_destroy();
         $this->session->unset_userdata('user_LoggedIn'); 
        redirect('admin/Index/login');  
    }
    public function user_profile_pic()
    {
        $this->User_model->user_profile_pic();
    }
    
        
}