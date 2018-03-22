<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Topics extends CI_Controller
{
	public function __construct()
	{

	 		parent::__construct();
			$this->load->helper('url');
	 		$this->load->model('Topics_model');
	 		$this->load->model('Students_model');
                        $this->load->model('Videos_model');
                         $this->load->model('Centers_model');
                        $this->load->model('Courses_model');
                        $this->load->model('Play_time_model');
                        $this->load->library('session');
	}
        
        
        
          public function show_topics() {
            
             
              $student_LoggedIn = $this->session->userdata('student_LoggedIn');
        
        if(isset($student_LoggedIn) || $student_LoggedIn == TRUE)
        {
            
               $student_id=$this->session->userdata('student_id');
              $course_id=$this->session->userdata('student_course_id');
            
          $result['data']=$this->Students_model->get_by_id($student_id); //get student informatn
            	$cid=$this->session->userdata('center_id');
              $result['center_names']=$this->Centers_model->center_name($cid);  //get center detail	        	
               $result['topics']=$this->Topics_model->get_topics($course_id);          //get all topics
                          
                 if(isset($result['data']))
                {    
                                                     
                    $this->load->view('student/header',$result);
                    $this->load->view('student/topics',$result);
                    $this->load->view('student/footer');
                }
        }
        else
        {
            redirect('student/Index/login');
        }
        }
        
        
        
	public function topic($topic_id)
	{  
         $student_LoggedIn = $this->session->userdata('student_LoggedIn');
        
        if(isset($student_LoggedIn) || $student_LoggedIn == TRUE)
        {
             $student_id=$this->session->userdata('student_id');
             
             if($topic_id>0)
             {
              $result=$this->Play_time_model->check_id($student_id,$topic_id); //check whether data is available in play time table
              if($result==false)
              {
               $play_time=$this->Play_time_model->insert_playtime($student_id,$topic_id);
               
                $video=$this->Topics_model->get_video($topic_id);      //get topic video path
                     $videos=array('topic_id'=>$video->topic_id,
                                   'topic_name'=>$video->topic_name,
                                   'topic_description'=>$video->topic_description,
                                   'topic_video_path'=>$video->topic_video_path,
                                   'topic_name'=>$video->topic_name,
                                   'remaining_play_time'=>$play_time
                                   );
                   
                     $result=array('topic'=>$videos);
                     echo json_encode($result);
              }
             else
             {
                  $play_time=$this->Play_time_model->check_played($student_id,$topic_id); 
                 if($play_time['play'])
                 { 

                     $video=$this->Topics_model->get_video($topic_id);      //get topic video path
                     $videos=array('topic_id'=>$video->topic_id,
                                   'topic_name'=>$video->topic_name,
                                   'topic_description'=>$video->topic_description,
                                   'topic_video_path'=>$video->topic_video_path,
                                   'topic_name'=>$video->topic_name,
                                   'remaining_play_time'=>$play_time['remaining_play_time']
                                   );
                   
                     $result=array('topic'=>$videos);
                     echo json_encode($result);                  

                }
                else
                {
                     $result1['errors']="Play Time For This Topic Video Is Over";
                     echo json_encode($result1);
                  
                }
        	        	
             }
        
                   
        
             }
            
          
            
          
        }
//        }
        else
        {
           redirect("student/dashboard");
            

        }

	
		
		
        }
        
      
        
              
        function update_play_time($topics_id)
                
        {
           
             $student_LoggedIn = $this->session->userdata('student_LoggedIn');
        
        if(isset($student_LoggedIn) || $student_LoggedIn == TRUE)
        {
            $stud_id=$this->session->userdata('student_id');
          
               $play_time= $this->Play_time_model->update_playtime($stud_id,$topics_id);
              
               if($play_time['status']==false)
               {               
                   echo json_encode(array('status'=>false,
                                          'errors'=>'Play Time For This Topic Video Is Over'));
                                          
               }
               else
              {
                    
                echo json_encode(array('status'=>true,
                                       'remaining_play_time'=>$play_time['remaining_play_time']));
               }
             
         }
        
        else
        {
            redirect("student/dashboard");
        }
	
        }
        
      
        
     
        
}

 ?>