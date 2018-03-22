<?php 

  if(!defined('BASEPATH')) exit('No direct script access allowed');



class Orders extends CI_Controller
{
  function __construct()
  {
    parent::__construct();

        $this->load->model('Orders_model');
         $this->load->model('User_model');
         $this->load->model('Order_details_model');

            $this->load->helper('url');


  }
  public function index()
    {
        $user_LoggedIn=$this->session->userdata('user_LoggedIn');
        if(isset($user_LoggedIn) || $user_LoggedIn == TRUE)
        {
                
            $data['orders']=$this->Orders_model->getall_orders();

         $uid=$this->session->userdata('user_id');
            $result['user_info']=$this->User_model->get_user_by_id($uid);
       
            $this->load->view('admin/header',$result);
            $this->load->view('admin/orders_view',$data);
            $this->load->view('admin/footer');

        }
        else
        {
            redirect('admin/index/login');
        }
    
    }

    function ajax_edit($id)
    {
            $data = $this->Order_details_model->get_id($id);
            
         
            echo json_encode($data);
    }
  

	
    
}



 ?>