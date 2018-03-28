<?php 

class Results extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Students_model');
		$this->load->model('Exams_model');
		$this->load->model('Centers_model');
    $this->load->model('Orders_model');
	}

	public function index()
	{
      $center_LoggedIn=$this->session->userdata('center_LoggedIn');

        if(isset($center_LoggedIn) || $center_LoggedIn == TRUE)
        {
            $id=$this->session->userdata('center_id');
        	
        	$data['exam_data']=$this->Exams_model->get_by_center_id($id);
              $result['data']=$this->Centers_model->get_by_id($id);           
              $this->load->view('center/header',$result);
            $this->load->view('center/results_view',$data);
            $this->load->view('center/footer');


        }
        else{
          redirect('center/index/login');
        }

	}

  public function selected_member()
  {
     $center_LoggedIn = $this->session->userdata('center_LoggedIn');

        
        if(isset($center_LoggedIn) || $center_LoggedIn == TRUE)
        {
            $checked=$this->input->post('cba');
        $id=array();
        if($checked)
        {
          foreach ($checked as $check ) {
            $id[]=$check;
          }
            $data['student_data'] = $this->Students_model->get_multiple_id($id);
           //$this->status($data);
            $this->session->set_userdata($data);
     
          $center_id=$this->session->userdata('center_id');
           $result['data']=$this->Centers_model->get_by_id($center_id);           
             $this->load->view('center/header',$result);
          $this->load->view('center/reexam_payment',$data);
          $this->load->view('center/footer');
        } 
        else{
           $this->session->set_flashdata('error','please select at least one student...!');
          
          redirect('center/Results/index');
        }

        }
        else
        {
            $this->load->view('center/login');
        }
  }


  public  function payment()
    {      

       $id=$this->session->userdata('center_id');
       $fname=$this->session->userdata('center_fname');
       $lname=$this->session->userdata('center_lname');
       $email=$this->session->userdata('center_email');
       $mobile=$this->session->userdata('center_mobile');
       $center_name=$this->session->userdata('center_name');
      $amount=$this->input->post('amount');
      $student=$this->input->post('student');

      $order=array(
        'center_id' => $id,
        'order_name' => "Reexam",
        'order_amount' => $amount,
        'student_qty' => $student,
        'order_date' =>date('Y-m-d'),
        'order_status' => "pending"
      );
      $res=$this->Orders_model->order($order);
      if ($res) {
        
      
        $customer_name=$fname;
        $customer_email=$email;
        $customer_mobile=$mobile;
        $product_info="Reexam";
        //$customer_address=$e;

       $MERCHANT_KEY = "O9h9G1PC"; //change  merchant with yours
          $SALT = "KejTc6CuIJ";  //change salt with yours 
          $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
          //optional udf values 
          $udf1 = $id;
          $udf2 = $res;
          $udf3 = '';
          $udf4 = '';
          $udf5 = '';
          
           $hashstring = $MERCHANT_KEY . '|' . $txnid . '|' . $amount . '|' . $product_info . '|' . $customer_name . '|' . $customer_email . '|' . $udf1 . '|' . $udf2 . '|' . $udf3 . '|' . $udf4 . '|' . $udf5 . '||||||' . $SALT;
           $hash = strtolower(hash('sha512', $hashstring));
           
         $success = base_url() . 'center/payment/status';  
          $fail = base_url() . 'center/payment/status';
          $cancel = base_url() . 'center/student';
          
          
           $data = array(
              'mkey' => $MERCHANT_KEY,
              'tid' => $txnid,
              'hash' => $hash,
              'amount' => $amount,           
              'firstname' => $customer_name,
              'productinfo' => $product_info,
              'email' => $customer_email,
              'phone' => $customer_mobile,
              'udf1' => $udf1,
              'udf2' =>$udf2,
              'no_of_student'=>$student,
              'center_name' =>$center_name,
              'service_provider' => ".payu_paisa", //for live change action  https://secure.payu.in
              'success' => $success,
              'failure' => $fail,
              'cancel' => $cancel            
          );
           
          $result['data']=$this->Centers_model->get_by_id($id);           
             $this->load->view('center/header',$result);
              $this->load->view('center/payu_view',$data);
                 $this->load->view('center/footer');
          

        }
        else
        {
          echo "order table insertion issue";
        }

   }     
   
   
    public function view_result($exam_id)
        {
           $student_LoggedIn = $this->session->userdata('student_LoggedIn');
             if(isset($student_LoggedIn) || $student_LoggedIn == TRUE)
        {
            
        		 
             $data=array('exam_id'=>$exam_id,
                         );
              $exam_result=$this->Exams_model->get_result_by_id($data);
             
              $correct_ans=0;
              $wrong_ans=0;              
              $total_que=10;
              $total_mark=10;
                          
              foreach($exam_result as $res)
              {
                  $marks_obtain=$res->exam_obtain_marks;
                  $result=$res->exam_result;
                  if($res->mark==1)
                  {
                     
                    $correct_ans++;  
                  }
                  else
                  {
                    $wrong_ans++;  
                  }
              }
             
        	
            echo json_encode(array('correct_ans'=>$correct_ans,
                                'wrong_ans'=>$wrong_ans,
                                'result'=>$result,
                                'total_que'=>$total_que,
                                'total_mark'=>$total_mark,
                                'marks_obtain'=>$marks_obtain));
                  
        }
        else
        {
             $this->load->view('student/login');
        }  
        }

        function test()
        {

            $id=$this->session->userdata('center_id');
          
              $result['data']=$this->Centers_model->get_by_id($id);
          //$this->load->view('center/header',$result);
          $this->load->view('center/test');
          //$this->load->view('center/footer');

        }

}

 ?>