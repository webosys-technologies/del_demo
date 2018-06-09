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
         $this->load->model('Batches_model');
          $this->load->model('Books_model');
          $this->load->model('System_model');


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
            $result['system']=$this->System_model->get_info();

            $this->load->view('admin/header',$result);


            $this->load->view('admin/student_view',$data);
            $this->load->view('admin/footer',$result);

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
                'book_id' =>$this->input->post('book'),
                'batch_id' =>$this->input->post('batch_id'),
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
                if($result)
                {
                $this->session->set_flashdata('success', 'Data Save Successfully');
                }
                else
                {
//                $this->session->set_flashdata('error',$res);
                }
                echo json_encode(array("status" => TRUE,
                                       ));
                  
                
            
          
                
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
                'batch_id' =>$this->input->post('batch_id'),
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
                'student_password' =>$this->input->post('student_password'),                
                       
                
                );
                
                
                $status=$this->input->post('student_status');

                if ($status == 0) {
                    $data['center_id'] = $this->input->post('center_id');
                    $data['book_id'] =$this->input->post('book');
                  $data['course_id']=$this->input->post('course_id');
                            }

                $res=$this->pic_upload($data);
                
                    
                  $result=$this->Students_model->student_update(array('student_id' => $this->input->post('student_id')), $data);
                  if($result)
                {
                   $this->session->set_flashdata('success', 'Student Update Successfully');
                }
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
        
        $result=$this->Students_model->delete_by_id($id);
         if($result)
                {
                $this->session->set_flashdata('success', 'Student Deleted Successfully');
                }
        echo json_encode(array("status" => TRUE));
           

    }
     function profile_pic_delete($id)
    {
         $res=$this->Students_model->get_student_by_id($id);
        if(file_exists($res->student_profile_pic))
        {
        unlink($res->student_profile_pic);
        }
        $result=$this->Students_model->delete_profile_pic($id);
        if($result)
                {
                $this->session->set_flashdata('success', 'Profile Picture deleted Successfully');
                }
        
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
                            $img_name =$new_file.".".end($ext); //image name as path in db
                             $img_path='profile_pic/'.str_replace(' ','_',$img_name);
                          $pic = array(
                              'student_profile_pic' => $img_path,
                            );
            
                                      
                                    
                   $insert =  $this->Students_model->student_update(array('student_id' =>$this->input->post('student_id')), $pic);
//                         $this->session->set_flashdata('success', 'Profile Picture added Successfully'); 
                         return true; 
                                               
                       }

        

            
    }
    
     function show_cities($state)
        {
           
            $cities=$this->Cities_model->getall_cities(ltrim($state));
          
            echo json_encode($cities);
        }
     function show_book($id)
        {
           
            $books=$this->Books_model->book_by_course_id($id);
            echo json_encode($books);
        }
        
        function show_batch($id)
        {
           
            $batches=$this->Batches_model->get_batches_by_id($id);
            echo json_encode($batches);
        }


    public  function ExcelDataAdd() 
    {  
      $this->load->library('excel');

//Path of files were you want to upload on localhost (C:/xampp/htdocs/ProjectName/uploads/excel/)  
         $configUpload['upload_path'] ='./videos';
         $configUpload['allowed_types'] = 'xls|xlsx|csv';
         $configUpload['max_size'] = '5000';
         $this->load->library('upload', $configUpload);
         $this->upload->do_upload('userfile');  
         $upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
         $file_name = $upload_data['file_name']; //uploded file name
           $extension=$upload_data['file_ext'];    // uploded file extension
    
//$objReader =PHPExcel_IOFactory::createReader('Excel5');     //For excel 2003 
 $objReader= PHPExcel_IOFactory::createReader('Excel2007'); // For excel 2007     
          //Set to read only
          $objReader->setReadDataOnly(true);      
        //Load excel file
     $objPHPExcel=$objReader->load('./videos/'.$file_name);    
         $totalrows=$objPHPExcel->setActiveSheetIndex(0)->getHighestRow();   //Count Numbe of rows avalable in excel         
         $objWorksheet=$objPHPExcel->setActiveSheetIndex(0);                
          //loop from first data untill last data
        // $data_user=array();
          for($i=2;$i<=$totalrows;$i++)
          {
              $FirstName= $objWorksheet->getCellByColumnAndRow(0,$i)->getValue();     
              $LastName= $objWorksheet->getCellByColumnAndRow(1,$i)->getValue(); //Excel Column 1
        $Email= $objWorksheet->getCellByColumnAndRow(2,$i)->getValue(); //Excel Column 2
        $Mobile=$objWorksheet->getCellByColumnAndRow(3,$i)->getValue(); //Excel Column 3
        $Last_Education=$objWorksheet->getCellByColumnAndRow(4,$i)->getValue(); //Excel Column 5
        $Address=$objWorksheet->getCellByColumnAndRow(5,$i)->getValue(); //Excel Column 6
        $data_user=array('student_fname'=>$FirstName, 'student_lname'=>$LastName ,'student_email'=>$Email ,'student_mobile'=>$Mobile  ,'student_last_education' =>$Last_Education , 'student_address' =>$Address);
        $this->Students_model->student_add($data_user);
              
              
          }
          //print_r($data_user);

             unlink('././videos/'.$file_name); //File Deleted After uploading in database .       
            // redirect(base_url() . "put link were you want to redirect");
             
       
     }
  

    

}



 ?>