<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Courses extends CI_Controller {


	 public function __construct()
	 	{
	 		parent::__construct();
			$this->load->helper('url');
	 		$this->load->model('Courses_model');
                         $this->load->model('User_model');
                         $this->load->model('Students_model');
                      
	 	}

	public function index()
    {
        $user_LoggedIn=$this->session->userdata('user_LoggedIn');
        if(isset($user_LoggedIn) || $user_LoggedIn == TRUE)
        {
        
		$data['courses']=$this->Courses_model->getall_courses();
               $uid=$this->session->userdata('user_id');
            $result['user_info']=$this->User_model->get_user_by_id($uid);
       
            $this->load->view('admin/header',$result);
		$this->load->view('admin/course_view',$data);
		$this->load->view('admin/footer');

        }
        else
        {
            redirect('admin/index/login');
        }
    
    }

	
	public function course_add()
		{
                        $date=date('Y-m-d');
			$data = array(
					'course_name' => $this->input->post('name'),
					'course_duration' => $this->input->post('duration'),
					'course_fees' => $this->input->post('fees'),
					'course_reexam_fees' => $this->input->post('reexam_fees'),
					'course_created_at' => $date,
                                        'course_created_by' => 'admin',
                                        'course_status' => $this->input->post('status'),
				);
			$insert = $this->Courses_model->course_add($data);
			echo json_encode(array("status" => TRUE));
		}
		public function ajax_edit($id)
		{
			$data = $this->Courses_model->get_by_id($id);



			echo json_encode($data);
		}

		public function course_update()
            {
                     $date=date('Y-m-d');
		$data = array(
					'course_name' => $this->input->post('name'),
					'course_duration' => $this->input->post('duration'),
					'course_reexam_fees' => $this->input->post('reexam_fees'),
					'course_fees' => $this->input->post('fees'),
					'course_created_at' => $date,
                                        'course_created_by' => 'admin',
                                        'course_status' => $this->input->post('status'),
                                        'course_id'=>$this->input->post('id')
				);
                
                $this->student_course_date_update($data);
		$this->Courses_model->course_update(array('course_id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function course_delete($id)
	{
		$this->Courses_model->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}
        
        public function student_course_date_update($course)
        {
            
            $result=$this->Students_model->getall_students();
            
            foreach($result as $res)
            {
                if($res->student_course_start_date!="0000-00-00" && $res->course_id==$course['course_id'] )
                {
                  
                    $date=$res->student_course_start_date;
                    $data=array('student_course_end_date' =>date('Y-m-d', strtotime("+".$course['course_duration']."months", strtotime($date))));
                    $this->Students_model->student_update(array('student_id'=>$res->student_id),$data);   
                }
            }
            
        }



}
