  <?php if(!defined('BASEPATH')) exit('No direct script access allowed');



class Orders extends CI_Controller
{
  function __construct()
  {
    parent::__construct();

        $this->load->model('Students_model');
        $this->load->model('Courses_model');
        $this->load->model('Centers_model');
        $this->load->model('Orders_model');
        $this->load->model('Order_details_model');
        
        
            $this->load->helper('url');


  }
  function index()
  {
    $center_LoggedIn=$this->session->userdata('center_LoggedIn');

        if(isset($center_LoggedIn) || $center_LoggedIn == TRUE)
        {

            $id=$this->session->userdata('center_id');
            $data['orders']=$this->Orders_model->get_all_id($id);
              $result['data']=$this->Centers_model->get_by_id($id);           
              $this->load->view('center/header',$result);
            $this->load->view('center/orders_view',$data);
            $this->load->view('center/footer');


        }
        else{
          redirect('center/index/login');
        }
    
  }

  function ajax_edit($id)
    {
            $data = $this->Order_details_model->get_id($id);
            
         
            echo json_encode($data);
    }

	function selected_mem()
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
           
            $this->session->set_userdata($data);     
          $center_id=$this->session->userdata('center_id');
           $result['data']=$this->Centers_model->get_by_id($center_id);           
             $this->load->view('center/header',$result);
          $this->load->view('center/student_selected',$data);
          $this->load->view('center/footer');
        } 
        else{
           $this->session->set_flashdata('error','please select at least one student...!');
          redirect('center/student/index');
        }

        }
        else
        {
            $this->load->view('center/login');
        }
        
    }

    

    


    function payment()
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
        'order_name' => "Admission",
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
        $product_info="Admission";
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

    // function test($data)
    // {

    // }



    
}



 ?>