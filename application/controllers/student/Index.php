
<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Index extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->library(array('session', 'form_validation', 'email'));
		$this->load->database();
		$this->load->model('User_model');
                $this->load->model('Students_model');
                $this->load->model('Exams_model');
	}
	
	function index()
	{
//            $this->load->view('student/ask_center_password');
		$this->login();
	}
   
   function login()
    {
             $student_LoggedIn = $this->session->userdata('student_LoggedIn');
        
        if(isset($student_LoggedIn) || $student_LoggedIn == TRUE)
        {
             redirect('student/Dashboard');
        }
        else
        {
             $this->load->view('home/home_header');
            $this->load->view('student/login');
             $this->load->view('home/home_footer');
        }
    }
    
    public function ask_center_password()
    {
        $this->load->view('student/ask_center_password');
    }
          
    
    public function loginMe()
    {
        
        $this->load->library('form_validation');
        
      //  $this->form_validation->set_rules('email', 'Username', 'callback_username_check');
//        $this->form_validation->set_rules('student_email', 'Email', 'required|valid_email|max_length[128]|trim');
        $this->form_validation->set_rules('student_password', 'Password', 'required|max_length[32]');
        
        if($this->form_validation->run() == FALSE)
        {
            $this->login();
        }
        else  
        {
            $student_email = $this->input->post('student_email');
            $student_password = $this->input->post('student_password');
            
            $check=$this->check_student_email($student_email);
            if($check)
            {
           $getdata = $this->Students_model->loginMe($student_email, $student_password);  
           
             if($getdata)
             {
           foreach($getdata as $res)  
          {   
            $status=array('student_status'=>$res->student_status,
                          'student_profile_pic'=>$res->student_profile_pic,
                          'center_id'=>$res->center_id,
                          'student_id'=>$res->student_id,
                           'student_course_end_date'=>$res->student_course_end_date,
                            'student_course_start_date'=>$res->student_course_start_date,
                            'course_duration'=>$res->course_duration,
                          );
            
           }
        
           

           
            if($status['student_status']>=1 && (!empty($status['student_profile_pic'])))
            {
             $center_detail=$this->Students_model->get_center_detail($status['center_id']);
             if($center_detail->center_askfor_password=='disable')
             {                
                if($status['student_course_start_date']=='0000-00-00'){
                    $dur=$status['course_duration'];
                    $date=date('Y-m-d');
                    $data=array('student_course_start_date'=>$date,
                   'student_course_end_date' =>date('Y-m-d', strtotime("+".$dur."months", strtotime($date))));
                    $this->Students_model->student_update(array('student_id'=>$status['student_id']),$data);
                    }
                    $stud_data=$this->Students_model->get_student_by_id($status['student_id']);
                    if($stud_data->student_course_end_date < date('Y-m-d'))
                    {
                        $update_status=array('student_status'=>'2' );
                        $this->Students_model->student_update(array('student_id'=>$status['student_id']),$update_status);
                       $this->session->set_flashdata('success','course Completed...!');
                        redirect('student/index/login');
                    }
               
                foreach ($getdata as $res)
                {
                    $sessionArray = array(
                        
                     'student_id' => $res->student_id,
                    'student_fname' => $res->student_fname,
                    'student_lname' => $res->student_lname,
                    'student_email' => $res->student_email,
                    'student_course_id' => $res->course_id,
                    'center_id'=>$res->center_id,
                    'student_LoggedIn' => true
                                    );
                                                
                  
               }
               $this->session->set_userdata($sessionArray);                   
                    redirect('student/Dashboard');
             }
               else
               {
                   
                   $this->load->view('student/ask_center_password',$status);
               }
               
              }
              
            else
            {   
            
               
               
                if($status['student_status']==0)
                {
                 $this->session->set_flashdata('error', 'This User is not active');
                 
                }
                 if((empty($status['student_profile_pic'])))
                 {
                     $this->session->set_flashdata('error', 'Please Update the profile photo before login');
                 }
                 
                              
                redirect('student/Index/login');  
            } 
               
             }
             else
             {
               $this->session->set_flashdata('error', 'Username or password mismatch');
                redirect('student/Index/login');  
             }
       
         }
        else
        {
         $this->session->set_flashdata('error', 'This Username is not registered with us.');
            redirect('student/Index/login');  
        }
       
            
        }
    }
    
    
     public function signout()
    {
        
        $this->session->sess_destroy();
//   /*     redirect('controller_class/login');
//        $this->session->unset_userdata('student_LoggedIn'); 
           redirect('student/Index/login');  
    }
    
    public function check_center_password()
    {
        $stud_id=$this->input->post('student_id');
        $pass=$this->input->post('center_password');
        $res=$this->Students_model->get_center_id($stud_id);
        
        $data=array('center_id'=>$res->center_id,
                    'center_password'=>$pass);
        
        $result=$this->Students_model->check_center_password($data);
       
        if($result)
        {
            $getdata = $this->Students_model->get_by_id($stud_id);
            foreach($getdata as $res)  
          {   
            $status=array('student_status'=>$res->student_status,
                          'student_profile_pic'=>$res->student_profile_pic,
                          'center_id'=>$res->center_id,
                          'student_id'=>$res->student_id,
                           'student_course_end_date'=>$res->student_course_end_date,
                            'student_course_start_date'=>$res->student_course_start_date,
                            'course_duration'=>$res->course_duration,
                          );
            
           }
            
            
          if($status['student_course_start_date']=='0000-00-00'){
                    $dur=$status['course_duration'];
                    $date=date('Y-m-d');
                    $data=array('student_course_start_date'=>$date,
                   'student_course_end_date' =>date('Y-m-d', strtotime("+".$dur."months", strtotime($date))));
                    $this->Students_model->student_update(array('student_id'=>$status['student_id']),$data);
                    }
                $stud_data=$this->Students_model->get_student_by_id($stud_id);
                    if($stud_data->student_course_end_date < date('Y-m-d'))
                    {
                        $update_status=array('student_status'=>'2' );
                        $this->Students_model->student_update(array('student_id'=>$status['student_id']),$update_status);
                        $this->session->set_flashdata('success','course Completed...!');
      
         redirect('student/index/login');
                    }
               
                foreach ($getdata as $res)
                {
                    $sessionArray = array(
                        
                     'student_id' => $res->student_id,
                    'student_fname' => $res->student_fname,
                    'student_lname' => $res->student_lname,
                    'student_email' => $res->student_email,
                    'student_course_id' => $res->course_id,
                    'center_id'=>$res->center_id,
                    'student_LoggedIn' => true
                                    );                                  
                   
                  
               }  
                $this->session->set_userdata($sessionArray);                      
                    redirect('student/Dashboard');
               
        }
        else
        {
            $this->session->set_flashdata('error','Center Administrative password does not match');
            $stud_data['student_id']=$stud_id;
            $this->load->view('student/ask_center_password',$stud_data);
        }
    }
        
    
        
        
        function check_if_email_exist($requested_email)
	{
		$this->load->model('Students_model');
		$email_available=$this->Centers_model->check_if_email_exist($requested_email);

		if($email_available){
//                    $this->form_validation->set_message('check_if_email_exist', 'You must select a business');
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
        
        function check_student_email($requested_email)
	{
		$this->load->model('Students_model');
		$email_available=$this->Students_model->check_if_email_exist($requested_email);

		if($email_available){
                    return FALSE;
                    
		}
		else{
//			$this->form_validation->set_message('check_if_email_exist', 'You must enter a email');
			return TRUE;
		}
	}
        
         
        
        public function update_profile()
        {
             $student_LoggedIn = $this->session->userdata('student_LoggedIn');
        
        if(isset($student_LoggedIn) || $student_LoggedIn == TRUE)
        {
        	$id=$this->session->userdata('student_id');
                
                
                $this->form_validation->set_rules('student_mobile','Mobile','trim|required|numeric');
		$this->form_validation->set_rules('student_address','Address','trim|required');
		$this->form_validation->set_rules('student_city','City','trim|required');
		$this->form_validation->set_rules('student_pincode','Pincode','trim|required|numeric');
		$this->form_validation->set_rules('student_state','State','trim|required');   
                
		//validate form input
		if ($this->form_validation->run() == false)
        {		
			
                   redirect('student/Dashboard');                    
        }
        else
        {      
               
               $result=$this->Students_model->update_student_profile($id);
               if($result)
               {
                   redirect('student/Profile');
               }
               else
               {
                   
               }
        
               
                
        }
        }
        else
        {
            $this->load->view('student/login');
            

        }
            
                      
        }
        
        
        
        
        public function change_password()
        {
             $student_LoggedIn = $this->session->userdata('student_LoggedIn');
        
        if(isset($student_LoggedIn) || $student_LoggedIn == TRUE)
        {
        	$this->load->view('student/change_password');
                
        	
        }
        else
        {
            $this->load->view('student/login');
            

        }
            
                      
        }
        
        
         public function reset_password()
        {
             $student_LoggedIn = $this->session->userdata('student_LoggedIn');
        
        if(isset($student_LoggedIn) || $student_LoggedIn == TRUE)
            
        {    
                $id=$this->session->userdata('student_id');
            
                $this->form_validation->set_rules('student_old_password','old_Password','trim|required|min_length[8]');
        	$this->form_validation->set_rules('student_new_password','new_Password','trim|required|min_length[8]');
		$this->form_validation->set_rules('student_confirm_password','Confirm Password','trim|required|matches[student_new_password]');
          
                if($this->form_validation->run() == FALSE)
        {
                    
            $this->session->set_flashdata('error', 'New password and confirm password does not match ....!');
            redirect('student/Dashboard');
        }
        else
        {   
            $old_password=$this->input->post('student_old_password');
            $new_password=$this->input->post('student_new_password');
            $result['data']=$this->Students_model->get_by_id($id);
            
            if($result['data'])
            {
                 
                foreach($result['data'] as $res)
                {
                    $student_password=$res->student_password;
                }
            
            
            if($student_password==$old_password)
            {
                
                $data=array(
                    'student_id'=>$id,
                    'student_password'=>$new_password
                );
               $this->Students_model->reset_password($data);
            
              $this->session->set_flashdata('success', 'Password Changed Successfully....!');
                 redirect('student/Dashboard');
               
               
               
              
             }
             else
             {
               
//                 $message="Old Password does not match....!";
                 $this->session->set_flashdata('error', 'Old Password is incorrect....!');
                 redirect('student/Dashboard');
             }
        }
        
           
        }
        
        }
        
        else
        {
           
             redirect('student/Dashboard');          

        }
            
                      
        }
		
    
}



