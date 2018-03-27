<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Exam_Reviews extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->library(array('session', 'form_validation', 'email'));
		$this->load->database();
                $this->load->model('Centers_model');
		$this->load->model('User_model');
                $this->load->model('Students_model');
                $this->load->model('Questions_model');
                $this->load->model('Exams_model');
                $this->load->model('Topics_model');
                $this->load->model('Exam_details_model');
             //   $this->load->model('login_model');
              //  $i=1;
               
	}	
	function index()
	{
              $student_LoggedIn = $this->session->userdata('student_LoggedIn');
        
        if(isset($student_LoggedIn) || $student_LoggedIn == TRUE)
        {            
        	//$id= $this->session->userdata('student_id');        	
        	$this->exam_reviews();            
        }
        else
        {
           $this->load->view('student/login');
        }
            
		
	}
        public function exam_reviews()
        {
             $student_LoggedIn = $this->session->userdata('student_LoggedIn');
             if(isset($student_LoggedIn) || $student_LoggedIn == TRUE)
        {
            
        	$id= $this->session->userdata('student_id'); 

                $result['data']=$this->Students_model->get_by_id($id);
            	 
				 
              $cid=$this->session->userdata('center_id');
              $result['center_names']=$this->Centers_model->center_name($cid);  //get center detail
              $result['exams']=$this->Exams_model->getdata($id);
             
        	
            $this->load->view('student/header',$result);
                $this->load->view('student/exam_reviews',$result);
                $this->load->view('student/footer');
                  
        }
        else
        {
             $this->load->view('student/login');
        }
        }
        
        public function show_review($exam_id)
        {
           $student_LoggedIn = $this->session->userdata('student_LoggedIn');
             if(isset($student_LoggedIn) || $student_LoggedIn == TRUE)
        {
            
        	$id= $this->session->userdata('student_id'); 		 
             $data=array('student_id'=>$id,
                         'exam_id'=>$exam_id);
              $exam_result=$this->Exams_model->get_result_by_id($data);
              
              $correct_ans=0;
              $wrong_ans=0;              
              $total_que=10;
              $total_mark=10;
                          
              foreach($exam_result as $res)
              {
                  $exam_id=$res->exam_id;
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
                                'marks_obtain'=>$marks_obtain,
                                'exam_id'=>$exam_id));
                  
        }
        else
        {
             $this->load->view('student/login');
        }  
        }
        
         function test_review($exam_id)
        {
              $student_LoggedIn = $this->session->userdata('student_LoggedIn');
             if(isset($student_LoggedIn) || $student_LoggedIn == TRUE)
        {
              $sid=$this->session->userdata('student_id');
              $cid=$this->session->userdata('student_course_id');
              $data=array('student_id'=>$sid,
                          'exam_id'=>$exam_id);
              $exam_result=$this->Exam_details_model->test_review($data);  
            
          
              echo json_encode($exam_result);
                     
         }
        else
            {
            redirect("student/index/login");
        }
            
        }
        
        
        
      
}


