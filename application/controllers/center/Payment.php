<?php         

defined('BASEPATH') OR exit('No direct script access allowed');

 class Payment extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Payment_model');  
        $this->load->model('Centers_model');  
        $this->load->model('Courses_model');  
        $this->load->model('Orders_model');
        $this->load->model('Order_details_model');
        $this->load->model('Students_model');
        $this->load->model('Coupons_model');
        $this->load->model('System_model');
       // $this->load->view('center/header');
        

    }

    public function index()
    {
      $center_LoggedIn=$this->session->userdata('center_LoggedIn');

        if(isset($center_LoggedIn) || $center_LoggedIn == TRUE)
        {

    $id=$this->session->userdata('center_id');
    $data['payment']=$this->Payment_model->get_by_center_id($id);
            $result['system']=$this->System_model->get_info();
    $result['data']=$this->Centers_model->get_by_id($id);           
    $this->load->view('center/header',$result);
    $this->load->view('center/payment_view',$data);
    $this->load->view('center/footer',$result);
        }
        else{
          redirect('center/index/login');
        }
    } 

	public function status() {
       $status = $this->input->post('status');
      if (empty($status)) {
            redirect('center/student');
        }
       
         $firstname = $this->input->post('firstname');
        $amount = $this->input->post('amount');
        $txnid = $this->input->post('txnid');
        $posted_hash = $this->input->post('hash');
        $key = $this->input->post('key');
        $productinfo = $this->input->post('productinfo');
        $email = $this->input->post('email');
        $mobile=$this->input->post('phone');
        $pg=$this->input->post('PG_TYPE');
        $bank=$this->input->post('bank_ref_num');
        $id=$this->input->post('payuMoneyId');
        $center_id=$this->input->post('udf1');
        $order_id=$this->input->post('udf2');
        $coupon_code=$this->input->post('udf3');
        $error=$this->input->post('error');


        $salt = "KejTc6CuIJ"; //  Your salt
        $add = $this->input->post('additionalCharges');
        If (isset($add)) {
            $additionalCharges = $this->input->post('additionalCharges');
            $retHashSeq = $additionalCharges . '|' . $salt . '|' . $status . '|||||||||||' . $email . '|' . $firstname . '|' . $productinfo . '|' . $amount . '|' . $txnid . '|' . $key;
        } else {

            $retHashSeq = $salt . '|' . $status . '|||||||||||' . $email . '|' . $firstname . '|' . $productinfo . '|' . $amount . '|' . $txnid . '|' . $key;
        }
         //$data['hash'] = hash("sha512", $retHashSeq);
          $pay['amount'] = $amount;
          $pay['merchant_order_id'] = $txnid;
         // $data['posted_hash'] = $posted_hash;
         
         // $data['additionalCharges']=$add;
          $pay['center_id']=$center_id;
          $pay['order_id']=$order_id;
          $pay['name']=$firstname;
          $pay['email']=$email;
          $pay['mobile']=$mobile;
          $pay['payment_gateway']=$pg;
          $pay['bank_ref_num']=$bank;
          $pay['payment_id']=$id;
          $pay['payment_status']=$status;
          $pay['payment_at']=date('Y-m-d');


          if(isset($status)){
                 $result=$this->Payment_model->addpayment($pay);
                 if ($result)
                 {
                  $this->Orders_model->update_order($order_id);
                    if($status)
                    {
                       $pay['error']=$error;
                       $pay['coupon_code']=$coupon_code;
                       $pay['productinfo']=$productinfo;

                      $this->Order_details($pay);
                    }
                    $id=$this->session->userdata('center_id');
                    $res['data']=$this->Centers_model->get_by_id($id);

                    $this->session->set_userdata($pay);

                    redirect('center/Payment/test');
                    
                    // $this->load->view('center/header',$res);
                    // $this->load->view('center/status',$pay);
                    // $this->load->view('center/footer');
                 }
         }
         else{
              $this->load->view('center/student'); 
         }

     
    }
   function Order_details($data)
    {
      $stud_data=$this->session->userdata('student_data');

      foreach ($stud_data as $key )
      {
          $pass['student_id']=$key->student_id;
          $pass['course_id']=$key->course_id;
          $course_fees=$key->course_fees;
          $reexam_fees=$key->course_reexam_fees;
          $student_email=$key->student_email;
          $order_id=$data['order_id'];
          $center_id=$data['center_id'];
          $status=$data['payment_status'];
            $price=$key->book_price;


          if ($data['productinfo'] == 'Reexam') 
          {
            $amt=$reexam_fees;
            $total=$reexam_fees;
          }
          else{
              $amt=$course_fees;
          $total=$course_fees+$price;

            }


          $pass['student_fname']=$key->student_fname;

          $order = array(
            'order_id' =>$order_id ,
            'center_id' =>$center_id,
            'student_id' =>$pass['student_id'],
            'course_id' => $pass['course_id'],
            'od_course_fees' =>$amt,
            'od_book_price' =>$price,
            'od_total_amount' =>$total,
            'order_detail_status'=>$status ,

          );
          
            $coupon=$data['coupon_code'];
            

          $res=$this->Order_details_model->addorder($order);
          if($res)
          {
            if ($status == 'success') {
              
              if (!empty($coupon)) {
             $coupon_data=$this->Coupons_model->get_coupon($coupon);
              $limit=$coupon_data->coupon_limit-1;
              $data=array('coupon_limit' => $limit );

              $this->Coupons_model->coupon_update(array('coupon_code' =>$coupon ),$data);
              }


             $this->login_create($pass);

              
            }
          }
      }

    }

    function login_create($pass)
    {
      $res=$this->Courses_model->course_by_id($pass['course_id']);
      foreach ($res as $key) {
      // echo $dur=$key->course_duration;
      }
       $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
             $password = array(); 
             $alpha_length = strlen($alphabet) - 1; 
             for ($i = 0; $i < 8; $i++) 
             {
                 $n = rand(0, $alpha_length);
                 $password[] = $alphabet[$n];
             }
             $pwd= implode($password); 
             
             $result=$this->Students_model->get_id($pass['student_id']);

             if (empty($result->student_username))
             {     

      $data = array('student_admission_month' => date('M-Y'),
                    'student_admission_date' => date('Y-m-d '),
                    'student_username' =>strtolower($pass['student_fname']).$pass['student_id'] ,
                    'student_password' =>$pwd ,
                    'student_status' =>'1' );
             $this->Students_model->student_update(array('student_id'=>$pass['student_id']),$data);

           }else{

            $data=array('student_exam_passcode' => "");
             $this->Students_model->student_update(array('student_id'=>$pass['student_id']),$data);

           }



    }

    function test()
    {
      $center_LoggedIn=$this->session->userdata('center_LoggedIn');

        if(isset($center_LoggedIn) || $center_LoggedIn == TRUE)
        {
          $data = array(
                'name' => $this->session->userdata('name'),
                'email' => $this->session->userdata('email'),
                'mobile' => $this->session->userdata('mobile'),
                'amount' => $this->session->userdata('amount'),
                'payment_status' => $this->session->userdata('payment_status'),
                'error'=>$this->session->userdata('error'),
                 );
                
              $id=$this->session->userdata('center_id');
            $result['system']=$this->System_model->get_info();
                $result['data']=$this->Centers_model->get_by_id($id);           
              $this->load->view('center/header',$result);
                $this->load->view('center/status',$data);
                $this->load->view('center/footer',$result);
              
        }
        else{
          redirect('center/index/login');
        }
      }


    
   }

   ?>