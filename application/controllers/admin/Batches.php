
  <?php if(!defined('BASEPATH')) exit('No direct script access allowed');

//require APPPATH . '/libraries/BaseController.php';

class Batches extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
       

        $this->load->model('Students_model');
        $this->load->model('Centers_model');
        $this->load->model('User_model');
       $this->load->model('Batches_model');
       $this->load->model('System_model');
        $this->load->library('session');
        $this->load->helper(array('form', 'url','file'));
        
	}

	public function index()
	{  


        $user_LoggedIn=$this->session->userdata('user_LoggedIn');

        if(isset($user_LoggedIn) || $user_LoggedIn == TRUE)
        { 
            $uid=$this->session->userdata('user_id');
            $data['batch_data']=$this->Batches_model->getall_batches();
            $result['user_info']=$this->User_model->get_user_by_id($uid);
            $result['data']=$this->Centers_model->getall();
            $result['system']=$this->System_model->get_info();

           
             $this->load->view('admin/header',$result);
      		$this->load->view('admin/batches_view',$data);
          $this->load->view('admin/footer',$result);
      }
        else{
          redirect('admin/index/login');
        }


	}
 

	

	function batch_add()
	{
                   $id=$this->input->post('center_id');
		    $check= $this->Batches_model->check_by_batch($this->input->post('batch_name'),$id);                   
                    if($check==false)
                    {
            	$data= array(
                'center_id' =>$id,
                'batch_name' => strtoupper($this->input->post('batch_name')),
                'batch_time' => $this->input->post('batch_time'),
                'batch_created_at' => date('Y-m-d'),
                'batch_status'  =>$this->input->post('status') ,
                );
                
                              
                $result= $this->Batches_model->batch_add($data);
                if($result)
                {
                  $this->session->set_flashdata('success','Batch Added Successfully');  
                }
                
                  
                echo json_encode(array("status" => TRUE,
                                       ));
                    }   
                    else
                    {
                
                   echo json_encode(array("error" => $this->input->post('batch_name').' Batch Already Exist'));
               
                   }
         
                
	}

	
    
  function ajax_edit($id)
    {
            $result = $this->Batches_model->get_id($id);
         
            
            echo json_encode($result);
    }
    
 
	
    function batch_update()
    {       
                 $id=$this->input->post('center_id');
		    $check= $this->Batches_model->check_by_batch($this->input->post('batch_name'),$id);                   
                    if($check==false)
                    {
            	$data= array(    
                'batch_name' => strtoupper($this->input->post('batch_name')),
                'batch_time' => ($this->input->post('batch_time')),
                'batch_status'  =>$this->input->post('status') ,
                );                
                    
                 $result=$this->Batches_model->batch_update(array('batch_id' => $this->input->post('batch_id')), $data);
                  
                  
                if($result)
                {
                  $this->session->set_flashdata('success','Batch Update Successfully');  
                }
                  
                  echo json_encode(array("status" => TRUE,
                                          ));   
                    }else{
                        $data1= array(    
                'batch_time' => ($this->input->post('batch_time')),
                'batch_status'  =>$this->input->post('status') ,
                );                
                    
                 $result1=$this->Batches_model->batch_update(array('batch_id' => $this->input->post('batch_id')), $data1);
                                   
                if($result1)
                {
                  $this->session->set_flashdata('success','Batch Update Successfully'); 
                  echo json_encode(array("status" => TRUE,
                                          ));  
                }else{
                    echo json_encode(array("error" => $this->input->post('batch_name').' Batch Already Exist'));
                }
                  
                  
                    }
                  
    }

    function batch_delete($id)
    {
         

        $result=$this->Batches_model->delete_by_id($id);
        
                if($result)
                {
                  $this->session->set_flashdata('success','Batch Delete Successfully');  
                }
        echo json_encode(array("status" => TRUE));
          

    }

    


}

                     



 ?>
