<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url','date'));
		$this->load->library(array('session', 'form_validation', 'email'));
		$this->load->database();
		     
                
	}
       
    
	public function index2()
	{
           

//                 foreach($this->Centers_model->center_result_by_where(array('center_status'=>1)) as $center)
//                 {
//                    $this->student_login_detail_center($center->center_id,$center->center_email);
//                 }
		$this->load->view('home');     

	}
        
       


        public function demo2()
        {
            $this->load->view('demo');
           
        }
        public function help2()
        {
            $this->load->view('help');
        }
        
        public function index()
	{
	 $this->load->view('home/home_header');          
         $this->load->view('home/index');
         $this->load->view('home/home_footer');
         
        }
        public function about()
	{
        $this->load->view('home/home_header');          
	$this->load->view('home/about');
        $this->load->view('home/home_footer');

	}

	public function course()
	{
        $this->load->view('home/home_header'); 
	$this->load->view('home/course');
        $this->load->view('home/home_footer');

	}

	public function contact()
	{
        $this->load->view('home/home_header');
        $this->load->view('home/contact');
        $this->load->view('home/home_footer');
	}
        
        public function demo()
        {
            $this->load->view('home/home_header');
            $this->load->view('home/demo');
            $this->load->view('home/home_footer'); 
        }
        public function help()
        {
            $this->load->view('home/home_header');
            $this->load->view('home/help');
            $this->load->view('home/home_footer'); 
        }

        public function show_cities($id)
        {
        	$this->load->model('Cities_model');
        	$cities=$this->Cities_model->getall_cities($id);
        	echo json_encode($cities);
        }
        
          public function win()
        {
        	$this->load->view('home/win');
        }
        
        public function query()
        {
            $this->Batches_model->query();
//            redirct('Home/index');
        }
        
        public function add_subscriber()
        {
              
            if($this->check_email($this->input->post('email')))
            {
            $res=$this->Subscriber_model->insert_data(array('sub_email'=>$this->input->post('email'),
                                                        'sub_created_at'=>date('Y-m-d'),
                                                        'sub_status'=>'1',
                                                        ));
            if($res)
            {
                $this->subscriber_email($this->input->post('email'));
                echo json_encode(array('status'=>true));
            }
            }else{
                echo json_encode(array('email_err'=>'Already Subscribed'));
            }
            
        }
        
         public function subscriber_email($email)
        {
            $headers = "From: info@delto.in";
                    $headers .= ". DELTO-Alert" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                    $to = $email;
                    $subject = "Subscription Email";

                    $txt = '<html>
                            <body>
                            <span>Hello ,</span><br><br>
                            <p>You Have Successfully Subscribe to Delto.Now you will get alert, notification ,Offer Information to this( '.$email.' ) subscribe Email.</p><br><br>
                            <span>Thank You</span>
                            </body>
                            </html>';
                              
                                              
                                            
                 
                       $success=  mail($to,$subject,$txt,$headers); 
        }
        
        public function check_email($email)
        {
         
            $res=$this->Subscriber_model->getall(array('sub_email'=>$email),'row');
            
                      
            if($res)
            {
                return false;
            }else{
                return true;
            }
        }
        
        
            function contact_email()
    {    
                   
                              
                    $headers = "From: ".$this->input->post('email');
                    $headers .= ". DELTO-Query" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                    $to = 'info@delto.in';
                    $subject = "Delto Query";

                    $txt = '<html>
                               <body>
                               <span><b>Name: </b></span><span>'.$this->input->post('name').'</sapn><br>
                               <span><b>Mobile: </b></span><span>'.$this->input->post('mobile').'</sapn><br>
                                   <p>'.$this->input->post('subject').'</p>
                               </body>
                            </html>';
                              
                                              
                                            
                 
                       $success=  mail($to,$subject,$txt,$headers); 
                       if($success)
                       {
                           redirect('Home/contact');
                       }  else {
                           redirect('Home/contact');
                       }
//                   
    }
    
    function test()
    {
                $myXMLData =
        "<?xml version='1.0' encoding='UTF-8'?>
        <note>
        <to>Tove</to>
        <from>Jani</from>
        <heading>Reminder</heading>
        <body>Don't forget me this weekend!</body>
        </note>";

        $xml=simplexml_load_string($myXMLData) or die("Error: Cannot create object");
        print_r($xml);
        foreach ($xml as $x)
        {
            echo $x.'<br>';
        }
        $abc=$this->Students_model->getall_students();
        print_r($abc);
        foreach ($abc as $a)
        {
            echo $a->student_fname;
        }
        
        $var=array(array('name'=>'suraj',
                   'mobile'=>'78945652'));
        
               print_r($var);
               foreach($var as $z)
               {
                   echo $z;
               }
    }
    
    function student_login_detail_center($center_id,$center_email)
    {
         $stud_data=$this->Students_model->get_result_by_where(array('center_id'=>$center_id,
                                                         'student_course_start_date'=>'0000-00-00',
                                                         'student_status'=>'1'));
          if(!empty($stud_data))
           {
          $headers = "From: info@delto.in";
                    $headers .= ". DELTO-Alert" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                    $to = $center_email;
                    $subject = "Student Login Information";

                    $txt = '<html>
                              <body>
                              <table>
                              </table>
                              </body>
                            </html>';
                 
                $success=  mail($to,$subject,$txt,$headers); 
            }  
    }
    
    
}

//maven install on enclipse
