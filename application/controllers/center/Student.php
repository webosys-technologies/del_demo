
  <?php if(!defined('BASEPATH')) exit('No direct script access allowed');

//require APPPATH . '/libraries/BaseController.php';

class Student extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
       // $this->load->view('center/header');

        $this->load->model('Students_model');
        $this->load->model('Books_model');        
        $this->load->model('Centers_model');
        $this->load->model('Courses_model');
        $this->load->model('Cities_model');
        $this->load->model('Batches_model');
        $this->load->model('System_model');
        $this->load->model('Sub_centers_model');
        $this->load->library('session');
        $this->load->helper(array('form', 'url','file'));

        


		//$this->isLoggedIn();
	}

	public function index()
	{  


        $center_LoggedIn=$this->session->userdata('center_LoggedIn');

        if(isset($center_LoggedIn) || $center_LoggedIn == TRUE)
        {         $id=$this->session->userdata('center_id');
      		$data['student_data']=$this->Students_model->get_by_center_id($id);
          $data['courses']=$this->Courses_model->getall_courses();
           $data['sub_center_data']=$this->Sub_centers_model->get_sub_centers_by_id($id);
          $data['cities']=$this->Cities_model->getall_cities("Maharashtra");
             $result['data']=$this->Centers_model->get_by_id($id);
             $data['batches']=$this->Batches_model->get_batches_by_id($id);
            $result['system']=$this->System_model->get_info();
              
           
             $this->load->view('center/header',$result);
      		$this->load->view('center/student',$data);
          $this->load->view('center/footer',$result);



        }
        else{
          redirect('center/index/login');
        }


	}
 

	

	function student_add()
	{
        $id=$this->session->userdata('center_id');

		         
           
            	$data= array(
                'center_id' =>$id,
                'sub_center_id' => $this->input->post('sub_center_id'),
                'course_id' => $this->input->post('course_id'),
                'batch_id' => $this->input->post('batch_id'),
                'book_id' =>$this->input->post('book_id'),
                'student_fname' => strtoupper($this->input->post('student_fname')),
                'student_lname' => strtoupper($this->input->post('student_lname')),
                'student_email' => $this->input->post('student_email'),
                'student_mobile' => $this->input->post('student_mobile'),
                'student_gender' => $this->input->post('student_gender'),
                'student_dob' 	=> $this->input->post('student_dob'),
                'student_last_education' => $this->input->post('student_last_education'),
                'student_address' => $this->input->post('student_address'),
                'student_city' => $this->input->post('student_city'),
                'student_state' => $this->input->post('student_state'),
                'student_pincode' =>$this->input->post('student_pincode'),
                'student_created_at' => date('Y-m-d'),
                'student_status'  => '0',
                );
                
                              
                $data['student_id'] = $this->Students_model->student_add($data);
                $res=$this->pic_upload($data);
                  
                echo json_encode(array("status" => TRUE,
                                       'error'=>$res));
                  
                
            
           // return ['status' => TRUE];
          //}
         // return [$data];
                
	}

	
    
  function ajax_edit($id)
    {
            $data = $this->Students_model->get_id($id);
//         print_r($data);
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
        
//             echo $this->input->post('batch_id');
          
                $data= array(
                'student_id'=>$this->input->post('student_id'),
                'sub_center_id' => $this->input->post('sub_center_id'),
                'batch_id' => $this->input->post('batch_id'),                  
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
                $status=$this->input->post('student_status');

                if ($status == 0) {
                  $data['course_id']=$this->input->post('course_id');
                  $data['book_id']=$this->input->post('book_id');
                }



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
       $id=$data['student_id'];
       
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
            
                                  
                                    
                   $insert =  $this->Students_model->student_update(array('student_id' =>$id), $pic);
                          
                         return true; 
                                               
                       }

        

            
    }


    
 function show_book($id)
        {
           
            $books=$this->Books_model->book_by_course_id($id);
            echo json_encode($books);
        }

     function show_cities($state)
        {
           
            $cities=$this->Cities_model->getall_cities(ltrim($state));
          
            echo json_encode($cities);
        }
    
    public function sub_center_id()
        {
            $res=$this->Students_model->sub_center_id();
            if($res)
            {
                redirect('center/student');
            }
        }
        
         public function sub_centers_id()
        {
            $res=$this->Students_model->sub_centers_id();
            if($res)
            {
                redirect('center/student');
            }
        }
        
        
    public function sub_centers_table()
    {
       $res=$this->Students_model->sub_centers_table();
       if($res)
       {
           redirect('center/student');
       }
    }
    
     public function center_askfor_password()
    {
       $res=$this->Students_model->center_askfor_password();
       if($res)
       {
           redirect('center/student');
       }
    }
   
    public function batch_table()
  {
      $res=$this->Students_model->batch_table();
  
      if($res)
       {
           redirect('center/student');
       }
  }
  
  public function batch_id()
  {
      $res=$this->Students_model->batch_id();
  
      if($res)
       {
           redirect('center/student');
       }
  }
   public function coupon_code()
  {
      $res=$this->Students_model->coupon_code();
  
      if($res)
       {
           redirect('center/student');
       }
  }
  
  


}

  



 ?>
