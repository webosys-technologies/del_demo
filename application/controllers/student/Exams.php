<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Exams extends CI_Controller
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
        	$this->exam();            
        }
        else
        {
           $this->load->view('student/login');
        }
            
		
	}
        public function exam()
        {
             $student_LoggedIn = $this->session->userdata('student_LoggedIn');
             if(isset($student_LoggedIn) || $student_LoggedIn == TRUE)
        {
            
        	$id= $this->session->userdata('student_id'); 

                $result['data']=$this->Students_model->get_by_id($id);
            	 
				 
              $cid=$this->session->userdata('center_id');
              $result['center_names']=$this->Centers_model->center_name($cid);  //get center detail

            
        	
            $this->load->view('student/header',$result);
                $this->load->view('student/exams');
                $this->load->view('student/footer');
                  
        }
        else
        {
             $this->load->view('student/login');
        }
        }
        
        public function start_exam($passcode)
        {
              $student_LoggedIn = $this->session->userdata('student_LoggedIn');
             if(isset($student_LoggedIn) || $student_LoggedIn == TRUE)
        {
                
                 $sid=$this->session->userdata('student_id');
                 $course_id=$this->session->userdata('student_course_id');
                 
             $pass_code=$this->Students_model->get_id($sid);



          if($passcode==$pass_code->student_exam_passcode && $passcode!=="-")

            {
                $exam_session=array(
                                    'start_exam'=>true,          //exam set session userdata
                                    'exam_passcode'=>$pass_code->student_exam_passcode,
                                    );
                
                     $this->session->set_userdata($exam_session);     

                     $this->get_questions();
            }
            else
            {
               
                $errors=array('passcode_error'=>'You have entered wrong Passcode');
              echo json_encode($errors);
                
            }
        }
        else{
            redirect("student/index/login");
        }
        }
        
        
        
        
         public function result()
        {
              $student_LoggedIn = $this->session->userdata('student_LoggedIn');
             if(isset($student_LoggedIn) || $student_LoggedIn == TRUE)
        {
//              $sid=$this->session->userdata('student_id');
//              $passcode=array('student_exam_passcode'=>"-");
              $pass=$this->Students_model->student_update(array('student_id'=>$sid),$passcode);
             $exam_result=$this->Exam_details_model->get_result_by_id($sid);
             
             
//              $exam_session=array('que_count','start_exam', 'exam_passcode','qp_name','qp_no_of_qsn','qp_total_time');
//             $this->session->unset_userdata($exam_session);
      
                  echo json_encode(array('exam_result'=>$exam_result));
//                 return $exam_result;
        }
        else{
            redirect("student/index/login");
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
      
        function get_question($id)   //here $id is the question number
        {   

           $fun_btn_qno=$this->input->post("press_btn_qno");
           $question_num=$this->input->post("question_num");
           $press_btn=$this->input->post("press_btn");
           $qid=$this->input->post('question_id');
           $option=$this->input->post('option'); 

             
                             if(!empty($qid) && !empty($option))
                {
                                      
               $answer=$this->Questions_model->get_questions_by_id($qid);
                  foreach($answer as $ans)
                  {
                      $correct_ans=$ans->question_correct_ans;                     
                  }
                
                  if($correct_ans==$option)
                  {
                     $data['ans_qno'.$question_num]=array('question_id'=>$qid,
                                 'student_id'=>$this->session->userdata('student_id'),
                                 'correct_ans'=>$correct_ans,
                                 'given_ans'=>$option,
                                 'mark'=>1); 

                     $this->session->set_userdata($data);
                  }
                  else
                  {
                       $data['ans_qno'.$question_num]=array('question_id'=>$qid,
                                 'student_id'=>$this->session->userdata('student_id'),
                                 'correct_ans'=>$correct_ans,
                                 'given_ans'=>$option,
                                 'mark'=>0); 

                       $this->session->set_userdata($data);
                  }
                 
                }
                $solved_question=null;
                $check=null;
                $given_ans=null;
             for($i=1;$i<=50;$i++)
             {
                  if(!empty($this->session->userdata('ans_qno'.$i)))
                  {
                     $solved_question[]=$i;
                      $res= $this->session->userdata('ans_qno'.$i);
                      $given_ans[$i]= $res['given_ans'];;

                  }
                  
             }
            
        
               if($press_btn=="next")
               {
                   $question_num++;
               }
              if($press_btn=="prev")
               {
                    $question_num--;
               }
               
               if(!empty($fun_btn_qno))
               {
                   $question=$this->session->userdata('q'.$fun_btn_qno);
               }
               else
               {
                   $question=$this->session->userdata('q'.$question_num);
               }

            echo json_encode(array('no_of_que'=>50,
                                   'solved_question'=>$solved_question,     //solved question number
                                   'question'=>$question,
                                    'given_ans'=>$given_ans)
                                   );

        }
        
        
         public function get_questions()
        { 
             
              $student_LoggedIn = $this->session->userdata('student_LoggedIn');
             if(isset($student_LoggedIn) || $student_LoggedIn == TRUE)
        {
              
                  $exam_detail = $this->session->userdata('start_exam');
                 if(isset($exam_detail) || $exam_detail == TRUE)
                 {
        	$id= $this->session->userdata('student_id'); 
               $course_id= $this->session->userdata('student_course_id'); 
              
                 $qid=$this->input->post('question_id');  
                $option=$this->input->post('option'); 
               
                $rand=$this->Questions_model->no_of_questions();
                           
              
                  $i=1;
                  while($i<=50)
                  {
                      $qid=mt_rand(1,$rand);
                                   
                  $question=$this->Questions_model->get_questions($qid,$course_id);
               if($question)
               {                         
                 
                   $que_field['q'.$i]=array('qno'=>$i,
                                    'question_id'=>$question->question_id,
                                    'question_name'=>$question->question_name,
                                    'question_option_a'=>$question->question_option_a,
                                    'question_option_b'=>$question->question_option_b,
                                    'question_option_c'=>$question->question_option_c,
                                    'question_option_d'=>$question->question_option_d,
                                    'qp_no_of_qsn'=>50
                                   );
                     $i++;

                 
               }
                             
                  }
                 
                
           
             $this->session->set_userdata($que_field);
               echo json_encode(array('question'=>$this->session->userdata('q1'),
                                       'no_of_que'=>50,
                                       'start_exam'=>"success"
                   ));  //load first question.
        	
                  
        }//end of session
        }//end of function
        else
        {
           $this->load->view('student/login');
        }
            
            
        }
        
        function submit_exam()
        {
            
            $timestamp=explode(":",$this->input->post('timestamp'));
             $min=50-$timestamp[0];
             $sec=60-$timestamp[1];
            
           $fun_btn_qno=$this->input->post("press_btn_qno");  // IF LAST QUESTION IS REMAINING
           $question_num=$this->input->post("question_num");
           $press_btn=$this->input->post("press_btn");
           $qid=$this->input->post('question_id');
           $option=$this->input->post('option'); 
           
                       if(!empty($qid) && !empty($option))
                {
                                      
               $answer=$this->Questions_model->get_questions_by_id($qid);
                  foreach($answer as $ans)
                  {
                      $correct_ans=$ans->question_correct_ans;                     
                  }
                
                  if($correct_ans==$option)
                  {
                     $data['ans_qno'.$question_num]=array('question_id'=>$qid,
                                 'student_id'=>$this->session->userdata('student_id'),
                                 'correct_ans'=>$correct_ans,
                                 'given_ans'=>$option,
                                 'mark'=>1); 
                     $this->session->set_userdata($data);
                  }
                  else
                  {
                       $data['ans_qno'.$question_num]=array('question_id'=>$qid,
                                 'student_id'=>$this->session->userdata('student_id'),
                                 'correct_ans'=>$correct_ans,
                                 'given_ans'=>$option,
                                 'mark'=>0); 

                       $this->session->set_userdata($data);
                  }
                 
                }

           $sid=$this->session->userdata('student_id');
           $total_mark=0;
           for($i=1;$i<=50;$i++)
            {
                if(!empty($this->session->userdata('ans_qno'.$i)))
                {
                    $total_mark=$total_mark+$this->session->userdata('ans_qno'.$i)['mark'];
                }            
            }
            
            if($total_mark>=20)
             {
                 
                $result="pass"; 
             }
             else
             {
                 $result="fail";
             }
             $per=($total_mark/50)*100;
             $no_of_exam=$this->Exams_model->no_of_exams($sid);
            
             if($no_of_exam>0)
             {
                 $type="Re-Exam";
             }
             else
             {
                 $type="Regular Exam";
             }
              $result_data=array('student_id'=>$sid,
                                'exam_obtain_marks'=>$total_mark,
                                'exam_taken_time'=>$min.':'.$sec,
                                'exam_percentage'=>$per,
                                'exam_result'=>$result,
                                'exam_date'=>date('Y-m-d'),
                                'exam_type'=>$type,
                                'exam_status'=>'1');
             
             $insert_id=$this->Exams_model->insert_data($result_data);
           
         
           
           
            for($i=1;$i<=50;$i++)
            {
                if(!empty($this->session->userdata('ans_qno'.$i)))
                {
             $this->Exam_details_model->insert_data($this->session->userdata('ans_qno'.$i),$insert_id);  
                }
                else
                {
                     $not_solved=$this->session->userdata('q'.$i);
                  $que_data=$this->Questions_model->get_questions_by_id($not_solved['question_id']);
                
                  foreach($que_data as $ans1)
                  {
                      $cor_ans=$ans1->question_correct_ans;                     
                  }                    
                 
                  $not_solved_que=array('student_id'=>$this->session->userdata('student_id'),
                                        'question_id'=>$not_solved['question_id'],
                                        'correct_ans'=>$cor_ans,
                                        'given_ans'=>'-',
                                        'mark'=>'0');
                  $this->Exam_details_model->insert_data($not_solved_que,$insert_id);  
                }
                
                $this->session->unset_userdata('q'.$i);
                $this->session->unset_userdata('ans_qno'.$i);
            }
                $this->session->unset_userdata('generate_btn','que_count','start_exam', 'exam_passcode');
                  

                
                
//              $passcode=array('student_exam_passcode'=>"-");
//             $pass=$this->Students_model->student_update(array('student_id'=>$sid),$passcode);
             $exam_result=$this->Exam_details_model->get_result_by_id($sid,$insert_id);
            
             
             
             
   
                  echo json_encode(array('exam_result'=>$exam_result,
                                         'total_questions'=>50,
                                         'result'=>$result,
                                         'test_review_id'=>$insert_id));
            
        }
        
        
        
        function solved_question()
        {
            

                $this->session->set_userdata(array('generate_btn'=>true));
                echo json_encode(array('status'=>true,
                                       'count'=>50));

        }
       
        
        
      
}


