
  <?php if(!defined('BASEPATH')) exit('No direct script access allowed');

//require APPPATH . '/libraries/BaseController.php';

class Batches extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
       

        $this->load->model('Students_model');
        $this->load->model('Centers_model');
       $this->load->model('Batches_model');
       $this->load->model('System_model');
        $this->load->library('session');
        $this->load->helper(array('form', 'url','file'));

        


		
	}

	public function index()
	{  


        $center_LoggedIn=$this->session->userdata('center_LoggedIn');

        if(isset($center_LoggedIn) || $center_LoggedIn == TRUE)
        { 
            $id=$this->session->userdata('center_id');
            $data['batch_data']=$this->Batches_model->get_batches_by_id($id);
            $result['data']=$this->Centers_model->get_by_id($id);
            $result['system']=$this->System_model->get_info();
           
             $this->load->view('center/header',$result);
      		$this->load->view('center/batches_view',$data);
          $this->load->view('center/footer',$result);



        }
        else{
          redirect('center/index/login');
        }


	}
 

	

	function batch_add()
	{
        $id=$this->session->userdata('center_id');

		       
           
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

	
    
  function ajax_edit($id)
    {
            $result = $this->Batches_model->get_id($id);
         
            
            echo json_encode($result);
    }
    
 
	
    function batch_update()
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
