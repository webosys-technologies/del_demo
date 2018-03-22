<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

//require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : 
 * @version : 1.1
 * @since : 
 */
//BaseController

class Dashboard extends CI_Controller
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
       $this->load->model('Students_model');
        $this->load->model('Topics_model');
        $this->load->model('Courses_model');
        $this->load->model('Exams_model');
         $this->load->model('Centers_model');
            $this->load->model('User_model');

        
              
      //  $this->isLoggedIn();   
    }
    
    /**
     * This function used to load the first screen of the user
     */
    public function index()
    {
        $this->global['pageTitle'] = 'Delto : Dashboard';
        
         $student_LoggedIn=$this->session->userdata('student_LoggedIn');
        if(isset($student_LoggedIn) || $student_LoggedIn == TRUE)
        {
             $id=$this->session->userdata('student_id');
                         
             $result['data']=$this->Students_model->get_by_id($id);
              $cid=$this->session->userdata('center_id');
              $result['center_names']=$this->Centers_model->center_name($cid);  //get center detail
              $course_id=$this->session->userdata('student_course_id');	 
                 
                $result['exams']=$this->Exams_model->no_of_exams($id);                 
                $result['courses']=$this->Courses_model->course_by_id($course_id);
                $result['count']=$this->Topics_model->topic_count($course_id);
//                 $result['topics']=$this->Topics_model->get_topics($cid);
             
             $this->load->view('student/header',$result);
             $this->load->view('student/dashboard',$result);
              $this->load->view('student/footer');
        }
        else
        {
            redirect('student/Index/login');
        }
    
           
    }
    
    
    public function video()
    {
         $student_LoggedIn=$this->session->userdata('student_LoggedIn');
        if(isset($student_LoggedIn) || $student_LoggedIn == TRUE)
        {
       
             $this->load->view('student/video');
        }
        else
        {
            redirect('student/Index/login');
        }
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

        if(empty($result)){ echo("true"); }
        else { echo("false"); }
    }
    
     
    
    
    function changePassword()
    {
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('oldPassword','Old password','required|max_length[20]');
        $this->form_validation->set_rules('newPassword','New password','required|max_length[20]');
        $this->form_validation->set_rules('cNewPassword','Confirm new password','required|matches[newPassword]|max_length[20]');
        
        if($this->form_validation->run() == FALSE)
        {
            $this->loadChangePass();
        }
        else
        {
            $oldPassword = $this->input->post('oldPassword');
            $newPassword = $this->input->post('newPassword');
            
            $resultPas = $this->User_model->matchOldPassword($this->vendorId, $oldPassword);
            
            if(empty($resultPas))
            {
                $this->session->set_flashdata('nomatch', 'Your old password not correct');
                redirect('loadChangePass');
            }
            else
            {
                $usersData = array('password'=>getHashedPassword($newPassword), 'updatedBy'=>$this->vendorId,
                                'updatedDtm'=>date('Y-m-d H:i:s'));
                
                $result = $this->User_model->changePassword($this->vendorId, $usersData);
                
                if($result > 0) { $this->session->set_flashdata('success', 'Password updation successful'); }
                else { $this->session->set_flashdata('error', 'Password updation failed'); }
                
                redirect('loadChangePass');
            }
        }
    }

    
}

?>