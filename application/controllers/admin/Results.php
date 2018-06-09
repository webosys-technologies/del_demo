<?php 

class Results extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Students_model');
		$this->load->model('Exams_model');
		$this->load->model('Centers_model');
              
    $this->load->model('Orders_model');
    $this->load->model('User_model');
    $this->load->model('System_model');

	}

	public function index()
	{
      $user_LoggedIn=$this->session->userdata('user_LoggedIn');
        if(isset($user_LoggedIn) || $user_LoggedIn == TRUE)
        {
        	
        	$data['exam_data']=$this->Exams_model->getall_exams();

           $uid=$this->session->userdata('user_id');
            $result['system']=$this->System_model->get_info();
            $result['user_info']=$this->User_model->get_user_by_id($uid);
       
            $this->load->view('admin/header',$result);


             $this->load->view('admin/results_view',$data);
            $this->load->view('admin/footer',$result);


        }
        else{
          redirect('admin/index/login');
        }

	}

   
   public function view_result($exam_id)
        {
           $student_LoggedIn = $this->session->userdata('student_LoggedIn');
             if(isset($student_LoggedIn) || $student_LoggedIn == TRUE)
        {
            
        		 
             $data=array('exam_id'=>$exam_id,
                         );
              $exam_result=$this->Exams_model->get_result_by_id($data);
             
              $correct_ans=0;
              $wrong_ans=0;              
              $total_que=50;
              $total_mark=50;
                          
              foreach($exam_result as $res)
              {
                  $marks_obtain=$res->exam_obtain_marks;
                  $result=$res->exam_result;
                  if($res->mark==1)
                  {
                     
                    $correct_ans++;  
                  }
                  else
                  {
                    $wrong_ans++;  
                  }
              }
             
        	
            echo json_encode(array('correct_ans'=>$correct_ans,
                                'wrong_ans'=>$wrong_ans,
                                'result'=>$result,
                                'total_que'=>$total_que,
                                'total_mark'=>$total_mark,
                                'marks_obtain'=>$marks_obtain));
                  
        }
        else
        {
             $this->load->view('student/login');
        }  
        }

}

 ?>