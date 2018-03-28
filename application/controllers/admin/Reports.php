
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
         $this->load->model('User_model');

        $this->load->helper('url');



		//$this->isLoggedIn();
	}

  public function center_report()
  {
    $user_LoggedIn=$this->session->userdata('user_LoggedIn');

        if(isset($user_LoggedIn) || $user_LoggedIn == TRUE)
        {   
            $id=$this->session->userdata('user_id');
            $data['center_data']=$this->Centers_model->getall();
                       
             $result['user_info']=$this->User_model->get_user_by_id($id);
           
             $this->load->view('admin/header',$result);
            $this->load->view('admin/center_report_view',$data);
            $this->load->view('admin/footer');



        }
        else{
          redirect('admin/index/login');
        }
  }

  function center_ajax_edit($id)
    {
            $data = $this->Centers_model->get_id($id);
              
      
            echo json_encode($data);
    }

    function center_print_profiles()
    {
         $user_LoggedIn=$this->session->userdata('user_LoggedIn');

        if(isset($user_LoggedIn) || $user_LoggedIn == TRUE)
        {   
            
             $checked=$this->input->post('cba');
           $id=array();
            if($checked)
                {
            foreach ($checked as $check ) {
            $id[]=$check;
          }
         
            $data['center_data'] = $this->Centers_model->get_multiple_id($id);
              
          $id=$this->session->userdata('user_id');
           $result['user_info']=$this->User_model->get_user_by_id($id);           
           
           
             $this->load->view('admin/header',$result);
            $this->load->view('admin/center_print_profiles',$data);
            $this->load->view('admin/footer');
            }
            else
            {
                $this->session->set_flashdata('error','please select at least one student...!');
               redirect('admin/Reports/center_report'); 
            }


        }
        else{
          redirect('admin/index/login');
        }
    }

	public function student_report()
	{  


        $user_LoggedIn=$this->session->userdata('user_LoggedIn');

        if(isset($user_LoggedIn) || $user_LoggedIn == TRUE)
        {   
            $id=$this->session->userdata('user_id');
      		  $data['student_data']=$this->Students_model->getall_students();
                       
             $result['user_info']=$this->User_model->get_user_by_id($id);
           
             $this->load->view('admin/header',$result);
      		  $this->load->view('admin/student_report_view',$data);
            $this->load->view('admin/footer');



        }
        else{
          redirect('admin/index/login');
        }


	}

       

   function student_ajax_edit($id)
    {
            $data = $this->Students_model->get_id($id);
              
      
            echo json_encode($data);
    }
    
    function student_print_profiles()
    {
         $user_LoggedIn=$this->session->userdata('user_LoggedIn');

        if(isset($user_LoggedIn) || $user_LoggedIn == TRUE)
        {   
            
             $checked=$this->input->post('cba');
           $id=array();
            if($checked)
                {
            foreach ($checked as $check ) {
            $id[]=$check;
          }
         
            $data['student_data'] = $this->Students_model->get_multiple_id($id);
              
          $id=$this->session->userdata('user_id');
           $result['user_info']=$this->User_model->get_user_by_id($id);           
           
           
             $this->load->view('admin/header',$result);
      		  $this->load->view('admin/student_print_profiles',$data);
            $this->load->view('admin/footer');
            }
            else
            {
                $this->session->set_flashdata('error','please select at least one student...!');
               redirect('admin/Reports/student_report'); 
            }


        }
        else{
          redirect('admin/index/login');
        }
    }
 




}