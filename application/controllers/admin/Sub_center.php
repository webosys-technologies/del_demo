
  <?php if(!defined('BASEPATH')) exit('No direct script access allowed');

//require APPPATH . '/libraries/BaseController.php';

class Sub_center extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
       

        $this->load->model('User_model');
        $this->load->model('Centers_model');
       $this->load->model('Sub_centers_model');
       $this->load->model('System_model');
        $this->load->library('session');
        $this->load->helper(array('form', 'url','file'));

        


		
	}

	public function index()
	{  


        $user_LoggedIn=$this->session->userdata('user_LoggedIn');

        if(isset($user_LoggedIn) || $user_LoggedIn == TRUE)
        { 
            $id=$this->session->userdata('user_id');
            $data['sub_center_data']=$this->Sub_centers_model->getall_sub_centers();
             $data['center_data']=$this->Centers_model->getall();
            $result['user_info']=$this->User_model->get_user_by_id($id);
            $result['system']=$this->System_model->get_info();
          
             $this->load->view('admin/header',$result);
            $this->load->view('admin/sub_centers_view',$data);
           $this->load->view('admin/footer',$result);

          }
        else{
          redirect('admin/index/login');
        }


	}
 

	

	function sub_center_add()
	{
                 $id=$this->input->post('center_id');
                $name=$this->input->post('fullname');
                $sub_center_name=$this->input->post('sub_center_name');
                $check=$this->Sub_centers_model->check_sub_center($sub_center_name,$id);
                if($check==false)
                {                  
            	$data= array(
                'center_id' =>$id,
                'sub_center_fullname' => strtoupper($name),
                'sub_center_name' => strtoupper($sub_center_name),
                'sub_center_created_at' => date('Y-m-d'),
                'sub_center_status'  =>$this->input->post('status') ,
                );
                
                              
                $data['student_id'] = $this->Sub_centers_model->sub_center_add($data);
                 if($data)
                {
                $this->session->set_flashdata('success', 'Sub-Centers Added Successfully');
                }
                  
                echo json_encode(array("status" => TRUE,
                                       ));               
         
                
	}
        else
        {
           echo json_encode(array("error" => "Sub Center already exist",
                                       ));
        }
        }
	
    
  function ajax_edit($id)
    {
            $data = $this->Sub_centers_model->get_id($id);
         
            echo json_encode($data);
    }
    
 
	
    function sub_center_update()
    {       
                 
                $id=$this->input->post('center_id');
                $name=$this->input->post('fullname');
                $sub_center_name=$this->input->post('sub_center_name');
                $check=$this->Sub_centers_model->check_sub_center($sub_center_name,$id);
                if($check==false)
                {
        
            	$data= array(       
                'center_id'=>$id,
                'sub_center_fullname' => strtoupper($name),
                'sub_center_name' => strtoupper($sub_center_name),
                'sub_center_status'  =>$this->input->post('status') ,
                );

                       
                    
                  $result=$this->Sub_centers_model->sub_center_update(array('sub_center_id' => $this->input->post('sub_center_id')), $data);
                 if($result)
                {
                $this->session->set_flashdata('success', 'Sub-Centers Updated Successfully');
                }
                  echo json_encode(array("status" => TRUE,
                                          ));   
                }else{
                   
                    $data1= array(       
                'sub_center_fullname' => strtoupper($name),
                'sub_center_status'  =>$this->input->post('status') ,
                );
                     $res=$this->Sub_centers_model->sub_center_update($id, $data1);
                     if($res)
                     {
                          $this->session->set_flashdata('success', 'Sub-Centers Updated Successfully');
                           echo json_encode(array("status" => TRUE,
                                          ));   
                     }else{
                         echo json_encode(array("error" => "Sub Center already exist",
                                       ));                        
                     }
                }      
                  
    }

    function sub_center_delete($id)
    {
         

        $result=$this->Sub_centers_model->delete_by_id($id);
         if($result)
                {
                $this->session->set_flashdata('success', 'Sub-Centers Deleted Successfully');
                }
        echo json_encode(array("status" => TRUE));
          

    }
    


}

                     



 ?>
