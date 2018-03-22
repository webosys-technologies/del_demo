
  <?php 
  if(!defined('BASEPATH')) exit('No direct script access allowed');

//require APPPATH . '/libraries/BaseController.php';

class Admission extends CI_Controller
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

	public function index()
	{  

        $user_LoggedIn=$this->session->userdata('user_LoggedIn');
        if(isset($user_LoggedIn) || $user_LoggedIn == TRUE)
        {
          $data['student_data']=$this->Students_model->getall_students();
          $data['courses']=$this->Courses_model->getall_courses();

         // $result['data']=$this->Centers_model->get_by_id($id);
          $uid=$this->session->userdata('user_id');
            $result['user_info']=$this->User_model->get_user_by_id($uid);
       
            $this->load->view('admin/header',$result);        
      		$this->load->view('admin/student_admission_view',$data);
          $this->load->view('admin/footer');



        }
        else{
          redirect('admin/index/login');
        }


	}

  function create_passcode($id)
  {
    $student_id=$id;
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
             $passcode = array(); 
             $alpha_length = strlen($alphabet) - 1; 
             for ($i = 0; $i < 8; $i++) 
             {
                 $n = rand(0, $alpha_length);
                 $passcode[] = $alphabet[$n];
             }
             $pwd= implode($passcode);

             $data = array('student_exam_passcode' =>$pwd  );
             $this->Students_model->student_update(array('student_id'=>$student_id),$data);
                   echo json_encode(array("status" => TRUE));
             

  }
 
}



 ?>