
  <?php if(!defined('BASEPATH')) exit('No direct script access allowed');

//require APPPATH . '/libraries/BaseController.php';

class Reports extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

       // $this->load->view('center/header');
                
        $this->load->model('Students_model');
        $this->load->model('Courses_model');
         $this->load->model('Centers_model');
        $this->load->helper('url');



		//$this->isLoggedIn();
	}

	public function index()
	{  


        $center_LoggedIn=$this->session->userdata('center_LoggedIn');

        if(isset($center_LoggedIn) || $center_LoggedIn == TRUE)
        {   
            $id=$this->session->userdata('center_id');
      		  $data['student_data']=$this->Students_model->get_by_center_id($id);
                       
             $result['data']=$this->Centers_model->get_by_id($id);
           
             $this->load->view('center/header',$result);
      		  $this->load->view('center/reports',$data);
            $this->load->view('center/footer');



        }
        else{
          redirect('center/index/login');
        }


	}

       

   function ajax_edit($id)
    {
            $data = $this->Students_model->get_id($id);
              
      
            echo json_encode($data);
    }
    
    function print_profiles()
    {
         $center_LoggedIn=$this->session->userdata('center_LoggedIn');

        if(isset($center_LoggedIn) || $center_LoggedIn == TRUE)
        {   
            
             $checked=$this->input->post('cba');
           $id=array();
            if($checked)
                {
            foreach ($checked as $check ) {
            $id[]=$check;
          }
         
            $data['student_data'] = $this->Students_model->get_multiple_id($id);
              
          $center_id=$this->session->userdata('center_id');
           $result['data']=$this->Centers_model->get_by_id($center_id);           
           
           
             $this->load->view('center/header',$result);
      		  $this->load->view('center/print_profiles',$data);
            $this->load->view('center/footer');
            }
            else
            {
                $this->session->set_flashdata('error','please select at least one student...!');
               redirect('center/Reports'); 
            }


        }
        else{
          redirect('center/index/login');
        }
    }
 




}