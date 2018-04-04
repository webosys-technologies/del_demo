<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

//require APPPATH . '/libraries/BaseController.php';

class Centers extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

       // $this->load->view('center/header');
        $this->load->model('Students_model');
        $this->load->model('Courses_model');
        $this->load->model('Centers_model');
        $this->load->model('Cities_model');
         $this->load->model('User_model');
//

            $this->load->helper('url');
		//$this->isLoggedIn();
	}

	public function index()
    {
        $user_LoggedIn=$this->session->userdata('user_LoggedIn');
        if(isset($user_LoggedIn) || $user_LoggedIn == TRUE)
        {
             $data['cities']=$this->Cities_model->getall_cities("Maharashtra");
            $data['centers']=$this->Centers_model->getall();
            $uid=$this->session->userdata('user_id');
            $result['user_info']=$this->User_model->get_user_by_id($uid);
       
            $this->load->view('admin/header',$result);
            $this->load->view('admin/centers_view',$data);
            $this->load->view('admin/footer');

        }
        else
        {
            redirect('admin/index/login');
        }
    
    }
    
    function center_add()
	{
        $id=$this->session->userdata('center_id');

	
              
        
            	$data= array(
                
                'center_fname' => strtoupper($this->input->post('center_fname')),
                'center_lname' => strtoupper($this->input->post('center_lname')),
                'center_name' => strtoupper($this->input->post('center_name')),
                'center_email' => $this->input->post('center_email'),
                'center_mobile' => $this->input->post('center_mobile'),
                'center_gender' => $this->input->post('center_gender'),
                'center_dob' 	=> $this->input->post('center_dob'),
                'center_password' => $this->input->post('center_password'),
                'center_address' => $this->input->post('center_address'),
                'center_city' => $this->input->post('center_city'),
                'center_state' => $this->input->post('center_state'),
                'center_pincode' =>$this->input->post('center_pincode'),
                'center_askfor_password' =>'disable',
                'center_created_at' => date('Y-m-d'),
                'center_status'  => '0',
                );
                

               
                $result = $this->Centers_model->center_add($data);
                
                echo json_encode(array('status'=>true,
                                           "msg" => 'Data Saved successfully'));
                       
            
    
                
	}
        
            function center_update()
    {
        
            
          
               $data= array(
                
                'center_fname' => strtoupper($this->input->post('center_fname')),
                'center_lname' => strtoupper($this->input->post('center_lname')),
                'center_name' => strtoupper($this->input->post('center_name')),
                'center_email' => $this->input->post('center_email'),
                'center_mobile' => $this->input->post('center_mobile'),
                'center_gender' => $this->input->post('center_gender'),
                'center_dob' 	=> $this->input->post('center_dob'),
                'center_password' => $this->input->post('center_password'),
                'center_address' => $this->input->post('center_address'),
                'center_city' => $this->input->post('center_city'),
                'center_state' => $this->input->post('center_state'),
                'center_pincode' =>$this->input->post('center_pincode'),
                'center_status' =>$this->input->post('status'),
                  );

                    
                  
               
               $this->Centers_model->center_update(array('center_id' => $this->input->post('center_id')), $data);
               echo json_encode(array('status'=>true,
                                           "msg" => 'data updated successfully'));
                               
                
                  
    }
        
         function ajax_edit($id)
    {
            $data = $this->Centers_model->get_id($id);
         
            echo json_encode($data);
    }
        
         function center_delete($id)
    {

        $this->Centers_model->delete_by_id($id);
        echo json_encode(array("msg" => 'Data deleted Successfully...!'));
           // return ['status' => FALSE];

    }
    
     function show_cities($state)
        {
           
            $cities=$this->Cities_model->getall_cities(ltrim($state));
          
            echo json_encode($cities);
        }

	
        
}