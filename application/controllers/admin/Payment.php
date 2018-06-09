<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

 class Payment extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->helper('url');  
        $this->load->model('Payment_model');    
        $this->load->model('Orders_model');
         $this->load->model('User_model');
         $this->load->model('System_model');

    }

    public function index()
    {
        $user_LoggedIn=$this->session->userdata('user_LoggedIn');
        if(isset($user_LoggedIn) || $user_LoggedIn == TRUE)
        {
                
            $data['payment']=$this->Payment_model->getall_payment();
            $uid=$this->session->userdata('user_id');
            $result['system']=$this->System_model->get_info();
            $result['user_info']=$this->User_model->get_user_by_id($uid);
       
            $this->load->view('admin/header',$result);
            $this->load->view('admin/payment_view',$data);
            $this->load->view('admin/footer',$result);

        }
        else
        {
            redirect('admin/index/login');
        }
    
    }

    

	  
   }

   ?>