<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Books extends CI_Controller {


	 public function __construct()
	 	{
	 		parent::__construct();
			$this->load->helper('url');
	 		$this->load->model('Courses_model');
	 		$this->load->model('Books_model');
                        $this->load->model('User_model');

                      
	 	}

	public function index()
    {
        $user_LoggedIn=$this->session->userdata('user_LoggedIn');
        if(isset($user_LoggedIn) || $user_LoggedIn == TRUE)
        {
        
        $data['book']=$this->Books_model->getall_book();
		$data['courses']=$this->Courses_model->getall_courses();
                $uid=$this->session->userdata('user_id');
            $result['user_info']=$this->User_model->get_user_by_id($uid);
       
            $this->load->view('admin/header',$result);
		$this->load->view('admin/books_view',$data);
		$this->load->view('admin/footer');

        }
        else
        {
            redirect('admin/index/login');
        }
    
    }

	
	public function book_add()
		{
                        $date=date('Y-m-d');
			$data = array(
					'book_name' => $this->input->post('name'),
					'book_price' => $this->input->post('price'),
					'course_id' => $this->input->post('course_id'),
                    'book_status' => $this->input->post('status'),
				);
			$insert = $this->Books_model->book_add($data);
			echo json_encode(array("status" => TRUE));
		}
		public function ajax_edit($id)
		{
			$data = $this->Books_model->get_by_id($id);



			echo json_encode($data);
		}

		public function book_update()
            {
                     $date=date('Y-m-d');
		$data = array(
					'book_name' => $this->input->post('name'),
					'book_price' => $this->input->post('price'),
					'course_id' => $this->input->post('course_id'),
                    'book_status' => $this->input->post('status'),
				);
		$this->Books_model->book_update(array('book_id' => $this->input->post('id')), $data);

		echo json_encode(array("status" => TRUE));
	}

	public function book_delete($id)
	{
		$this->Books_model->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}



}
