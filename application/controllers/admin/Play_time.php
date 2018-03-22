<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Play_time extends CI_Controller {


	 public function __construct()
	 	{
	 		parent::__construct();
			$this->load->helper('url');
	 		$this->load->model('Courses_model');
	 		$this->load->model('User_model');
                        $this->load->model('Students_model');
                         $this->load->model('Play_time_model');

                      
	 	}

	public function index()
    {
        $user_LoggedIn=$this->session->userdata('user_LoggedIn');
        if(isset($user_LoggedIn) || $user_LoggedIn == TRUE)
        {
        
               
		$data['student_data']=$this->Students_model->getall_students();
                $uid=$this->session->userdata('user_id');
                $result['user_info']=$this->User_model->get_user_by_id($uid);
       
                $this->load->view('admin/header',$result);
		$this->load->view('admin/play_time_view',$data);
		$this->load->view('admin/footer');

        }
        else
        {
            redirect('admin/index/login');
        }
    
    }
    
    public function play_time_edit($id)
    {
        $result=$this->Play_time_model->topics_data($id);
        $data=$this->Play_time_model->play_time($id,$result);
        $stud_data=$this->Play_time_model->course_data($id);
       
        $putdata=array('topics'=>$result,
                        'play_time'=>$data,
                        'stud_data'=>$stud_data);
        echo json_encode($putdata);
    }
    
    public function play_time_update()
    {
        $dataSet=array();
        $id=$this->input->post('student_id');
        $topic_id=$this->input->post('topic_id');
        $play_time=$this->input->post('remaining_play_time');
        
       for($i=0;$i<sizeof($play_time);$i++)
	   {   
//                         
             $result=$this->Play_time_model->update_stud_play_time(array ('remaining_play_time' => ltrim($play_time[$i]),
	     					                          ),
                                                                     array('student_id'=>$id,'topic_id'=>$topic_id[$i]));
	   }
	   
//	    die;
     
              echo json_encode(array('status'=>true));
    }
	
	


}
