
  <?php if(!defined('BASEPATH')) exit('No direct script access allowed');

//require APPPATH . '/libraries/BaseController.php';

class Login_detail extends CI_Controller
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
        {        $id=$this->session->userdata('center_id');
      		$data['student_data']=$this->Students_model->get_by_center_id($id);
          $data['courses']=$this->Courses_model->getall_courses();
         $result['data']=$this->Centers_model->get_by_id($id);
           
             $this->load->view('center/header',$result);
      		$this->load->view('center/login_detail',$data);
          $this->load->view('center/footer');



        }
        else{
          redirect('center/index/login');
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