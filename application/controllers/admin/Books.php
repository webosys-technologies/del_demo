<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Books extends CI_Controller {


	 public function __construct()
	 	{
	 		parent::__construct();
			$this->load->helper('url');
	 		$this->load->model('Courses_model');
	 		$this->load->model('Books_model');
            $this->load->model('System_model');
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
            $result['system']=$this->System_model->get_info();

       
            $this->load->view('admin/header',$result);
		$this->load->view('admin/books_view',$data);
		$this->load->view('admin/footer',$result);

        }
        else
        {
            redirect('admin/index/login');
        }
    
    }

	
	public function book_add()
		{
                        $id=$this->input->post('course_id');
                        $name=$this->input->post('name');
                        
                        $check=array('course_id'=>$id,
                                     'book_name'=>$name);
                        
                        $res=$this->Books_model->check_book($check);
                        if($res==false){
                        $date=date('Y-m-d');                       
			$data = array(
					'book_name' =>$name,
					'book_price' => $this->input->post('price'),
                                        'book_created_at'=>$date,
					'course_id' => $id,
                                        'book_status' => $this->input->post('status'),
				);
			$insert = $this->Books_model->book_add($data);
                        if($insert){
                            $this->session->set_flashdata('success',$name.' Book Added Successfully');
                        }
			echo json_encode(array("status" => TRUE,
                                               "book"=>$data['book_name']));
                        }
                        else
                        {
                           
                            echo json_encode(array("error" => $name.'Book already exist'
                                               ));                            
                        }
                        
		}
		public function ajax_edit($id)
		{
			$data = $this->Books_model->get_by_id($id);



			echo json_encode($data);
		}

		public function book_update()
            {          
                    $name=$this->input->post('name');
                    $id=$this->input->post('course_id');
                    
                    $check=array('course_id'=>$id,
                                 'book_name'=>$name);
                    
                    $res=$this->Books_model->check_book($check);
                        if($res==false){
                     $date=date('Y-m-d');
		$data = array(
					'book_name' => $name ,					
					'course_id' => $id,
                                        'book_status' => $this->input->post('status'),
				);
		$this->Books_model->book_update(array('book_id' => $this->input->post('id')), $data);
                 $this->session->set_flashdata('success',$name.' Updates Successfully');
		echo json_encode(array("status" => TRUE));
            }else{
                $data1=array('book_price' => $this->input->post('price'));
                $result=$this->Books_model->book_update(array('book_id' => $this->input->post('id')), $data1);
                if($result)
                {
                 $this->session->set_flashdata('success',$name.' Updates Successfully');
		echo json_encode(array("status" => TRUE));
                }else{
                    echo json_encode(array('error' => $name.'Book Already Exist'));
                }
            }
            
                        }

	public function book_delete($id)
	{
		$this->Books_model->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}
        
        public function book_created_at()
        {
            $res=$this->Books_model->book_created_at();
            if($res)
            {
              redirect('admin/Books');  
            }
        }



}
