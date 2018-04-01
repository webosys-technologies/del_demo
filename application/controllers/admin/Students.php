<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

//require APPPATH . '/libraries/BaseController.php';

class Students extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

       // $this->load->view('center/header');
        $this->load->model('Students_model');
        $this->load->model('Courses_model');
        $this->load->model('Centers_model');
        $this->load->model('Cities_model');
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
            $data['centers']=$this->Centers_model->getall();
             $data['cities']=$this->Cities_model->getall_cities("Maharashtra");
           $uid=$this->session->userdata('user_id');
            $result['user_info']=$this->User_model->get_user_by_id($uid);
       
            $this->load->view('admin/header',$result);
            $this->load->view('admin/student_view',$data);
            $this->load->view('admin/footer');

        }
        else
        {
            redirect('admin/index/login');
        }
    
    }


	function student_add()
	{
		 
           
            	$data= array(
                'center_id' =>$this->input->post('center_id'),
                'course_id' => $this->input->post('course_id'),
                'student_book' =>$this->input->post('book'),
                'student_fname' => strtoupper($this->input->post('student_fname')),
                'student_lname' => strtoupper($this->input->post('student_lname')),
                'student_email' => $this->input->post('student_email'),
                'student_mobile' => $this->input->post('student_mobile'),
                'student_gender' => $this->input->post('student_gender'),
                'student_dob'   => $this->input->post('student_dob'),
                'student_last_education' => $this->input->post('student_last_education'),
                'student_address' => $this->input->post('student_address'),
                'student_city' => $this->input->post('student_city'),
                'student_state' => $this->input->post('student_state'),
                'student_pincode' =>$this->input->post('student_pincode'),
                'student_created_at' => date('Y-m-d'),
                'student_status'  => '0',
                );
                
                $res=$this->pic_upload($data);
                 
                $result = $this->Students_model->student_add($data);
                
                echo json_encode(array("status" => TRUE,
                                       'error'=>$res));
                  
                
            
          
                
  }

  
    
  function ajax_edit($id)
    {
            $data = $this->Students_model->get_id($id);
         
            echo json_encode($data);
    }
    
    function students_data()   //student data by multiple id's
    {
       
         $checked=$this->input->post('cba');
        $ids=array();
        if($checked)
        {
          foreach ($checked as $check ) {
            $ids[]=$check;
          }
         
            $data = $this->Students_model->get_id($ids[0]);
         
            echo json_encode($data);
        }
        else
        {
            echo json_encode(array('error'=>'please select at least one student'));
        }
    }
  
    function student_update()
    {
        
            
          
                $data= array(
                'center_id' => $this->input->post('center_id'),
                'course_id' => $this->input->post('course_id'),
                'student_book' =>$this->input->post('book'),                
                'student_fname' => strtoupper($this->input->post('student_fname')),
                'student_lname' => strtoupper($this->input->post('student_lname')),
                'student_email' => $this->input->post('student_email'),
                'student_mobile' => $this->input->post('student_mobile'),
                'student_gender' => $this->input->post('student_gender'),
                'student_dob'   => $this->input->post('student_dob'),
                'student_last_education' => $this->input->post('student_last_education'),
                'student_address' => $this->input->post('student_address'),
                'student_city' => $this->input->post('student_city'),
                'student_state' => $this->input->post('student_state'),
                'student_pincode' =>$this->input->post('student_pincode'),                
                       
                
                );

                $res=$this->pic_upload($data);
                
                    
                  $this->Students_model->student_update(array('student_id' => $this->input->post('student_id')), $data);
                   echo json_encode(array("status" => TRUE,
                                          'error'=>$res));

                
            
                
                  
    }

    function student_delete($id)
    {
        $res=$this->Students_model->get_student_by_id($id);
        if(file_exists($res->student_profile_pic))
        {
        unlink($res->student_profile_pic);
        }
        
        $this->Students_model->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
           // return ['status' => FALSE];

    }
     function profile_pic_delete($id)
    {
         $res=$this->Students_model->get_student_by_id($id);
        if(file_exists($res->student_profile_pic))
        {
        unlink($res->student_profile_pic);
        }
        $this->Students_model->delete_profile_pic($id);
        echo json_encode(array("status" => TRUE));
           // return ['status' => FALSE];

    }

    function checkEmailExists()
    {
        $userId = $this->input->post("userId");
        $email = $this->input->post("email");

        if(empty($userId)){
            $result = $this->User_model->checkEmailExists($email);
        } else {
            $result = $this->User_model->checkEmailExists($email, $userId);
        }

        if(empty($result))
        {
         echo("true");
        }
        else { echo("false"); }
    }

    function pic_upload($data)
    {   
      $id=$this->input->post('student_id');
       
                                   $new_file=$data['student_fname'].mt_rand(100,999);
       
         $config = array(
                                  'upload_path' => './profile_pic',
                                  'allowed_types' => 'gif|jpg|png|jpeg',
                                  'max_size' => '7200',
                                  'max_width' => '1920',
                                  'max_height' => '1200',
                                  'overwrite' => false,
                                  'remove_spaces' =>true,
                                  'file_name' =>$new_file 
                              );           
                      
                     // $config['file_name'] = 'pawan'; //video_name in folder with extension
                       //echo $img_name;
                                  
                       $this->load->library('upload', $config);
                       $this->upload->initialize($config);

                       if (!$this->upload->do_upload('img')) # form input field attribute
                       {
                           if(empty($this->input->post('img')))
                           {
                                $msg="Image size should less than 7MB,Dimension 1920*1200";
                           return $msg; 
                            
                           }
                           else
                           {
                                   return true;                    
                           }
                         
                       }
                       else
                       {
                          $res=$this->Students_model->get_student_by_id($id);
                            if(file_exists($res->student_profile_pic))
                            {
                            unlink($res->student_profile_pic);
                            }                           
                          
                            $ext= explode(".",$this->upload->data('file_name'));  
                            $img_name =$new_file.".".end($ext); //video name as path in db
                             $img_path='profile_pic/'.str_replace(' ','_',$img_name);
                          $pic = array(
                              'student_profile_pic' => $img_path,
                            );
            
                                      
                                    
                   $insert =  $this->Students_model->student_update(array('student_id' =>$this->input->post('student_id')), $pic);
                          
                         return true; 
                                               
                       }

        

            
    }
    
     function show_cities($state)
        {
           
            $cities=$this->Cities_model->getall_cities(ltrim($state));
          
            echo json_encode($cities);
        }
    
    

}



 ?>