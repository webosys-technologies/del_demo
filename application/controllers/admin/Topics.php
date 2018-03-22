
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Topics extends CI_Controller {


	 public function __construct()
	 	{
	 		parent::__construct();
		        $this->load->helper(array('form', 'url','file'));
	 		$this->load->model('Topics_model');
                        $this->load->model('Courses_model');
                         $this->load->model('User_model');
                         $this->load->library('image_lib');
                      
	 	}

	public function index()
    {
        $user_LoggedIn=$this->session->userdata('user_LoggedIn');
        if(isset($user_LoggedIn) || $user_LoggedIn == TRUE)
        {
        
		$data['topics']=$this->Topics_model->getall_topics();
                $data['courses']=$this->Courses_model->getall_courses();
                $uid=$this->session->userdata('user_id');
                $result['user_info']=$this->User_model->get_user_by_id($uid);
       
            $this->load->view('admin/header',$result);
		$this->load->view('admin/topic_view',$data);
		$this->load->view('admin/footer');

        }
        else
        {
            redirect('admin/index/login');
        }
    
    }
	
	public function topic_add()
		{

			$course_id=$this->input->post('course_id');
			$topic_name=$this->input->post('name');
			$topic_description=$this->input->post('topic_description');
			$topic_video_play_time=$this->input->post('time');
			$topic_status=$this->input->post('status');
                      
                      
                       
          
                        $config['upload_path'] = './videos'; # check path is correct
                       $config['max_size'] = '1024000';
                       $config['allowed_types'] = 'mp4|avi|3gp|flv|'; # add video extenstion on here
                       $config['overwrite'] = FALSE;
                       $config['remove_spaces'] = TRUE;
                    

                     
                       
                         for($i=0;$i<sizeof($topic_name);$i++)
                        {
                              $date=date('Y-m-d');
                              $data = array(
                                        'topic_name' => $topic_name[$i],
                                        'course_id' => $course_id[$i],
                                        'topic_description'=>$topic_description[$i],
                                        'topic_created_at' => $date,
                                        'topic_created_by' => 'admin',
                                        'topic_status' => 1,
                                        'topic_video_play_time'=>$topic_video_play_time[$i]
				); 
                              $topic_id = $this->Topics_model->topic_add($data);
                             

                       $config['file_name'] = $topic_id; //video_name in folder with extension          
                       $this->load->library('upload', $config);
                       $this->upload->initialize($config);
                           
                       
                       
                       
                         if (!$this->upload->do_upload('video')) # form input field attribute
                       {
                         echo json_encode(array("error" => "Video is not uploaded."));                          
                       }
                       else
                       {
                            $ext= explode(".",$this->upload->data('file_name'));  
                           $video_name =$topic_id.".".end($ext);   //video name as path in db                        
                           $video_path='videos/'.str_replace(' ','_',$video_name);                           
                          
			$data1 = array(
                                        'topic_video_path'=>$video_path                                       
			           	);  
                        $this->Topics_model->topic_update(array('topic_id' => $topic_id), $data1);
			
                         echo json_encode(array("status" => TRUE));
                         
                           
                       }
                        }
                                         

                       
		}
		public function ajax_edit($id)
		{
			$data = $this->Topics_model->get_by_id($id);



			echo json_encode($data);
		}
                
                public function delete_topic_video($id)
                {
                      $res=$this->Topics_model->get_by_id($id);
                        if(file_exists($res->topic_video_path))
                        {
                        unlink($res->topic_video_path);
                        }
                        $this->Topics_model->delete_topic_video($id);
                        echo json_encode(array("status" => TRUE));
                }

		public function topic_update()
            {                   
                        $topic_id=$this->input->post('id');
                        $course_id=$this->input->post('course_id');
			$topic_name=$this->input->post('name');
			$topic_description=$this->input->post('topic_description');
			$topic_video_play_time=$this->input->post('time');
                        $topic_status=$this->input->post('status');
			                                         
          
                        $config['upload_path'] = './videos'; # check path is correct
                       $config['max_size'] = '1024000';
                       $config['allowed_types'] = 'mp4|avi|3gp|flv|'; # add video extenstion on here
                       $config['overwrite'] = FALSE;
                       $config['remove_spaces'] = TRUE;
                   
                        $topic=$this->Topics_model->get_video($topic_id);
                           if(isset($_FILES['video']['name']) && !empty($_FILES['video']['name']))
                           {
                            if(isset($topic->topic_video_path))
                            {
                                if(file_exists($topic->topic_video_path))
                                {
                                 unlink($topic->topic_video_path);
                                }
                            }
                           }
                           
                           $date=date('Y-m-d');
                           $data1 = array(
                                        'topic_name' => $topic_name,
                                        'course_id' => $course_id,
                                        'topic_description'=>$topic_description,
                                        'topic_created_by' => 'admin',
                                        'topic_status' => $topic_status,
                                        'topic_video_play_time'=>$topic_video_play_time
				);
                         
			 $this->Topics_model->topic_update(array('topic_id' => $topic_id), $data1);
                       
                           
                       
                     

                       $config['file_name'] = $topic_id; //video_name in folder with extension                       
                       $this->load->library('upload', $config);                      
                       $this->upload->initialize($config);                     
                                 
                       
                         if (!$this->upload->do_upload('video')) # form input field attribute
                       {
                        echo json_encode(array("error" => "Video is not uploaded."));  
                       }
                       else
                       {
                           
                            $ext= explode(".",$this->upload->data('file_name'));  
                           $video_name =$topic_id.".".end($ext);   //video name as path in db                        
                           $video_path='videos/'.str_replace(' ','_',$video_name);                          
                                                      
			    $data = array(                                      
                                        'topic_video_path'=>$video_path                                       
				         );
                         
			$insert = $this->Topics_model->topic_update(array('topic_id' => $topic_id), $data);
                       
                         echo json_encode(array("status" => TRUE));  
                       }
                        
                       
                         
                        

                    
	}

	public function topic_delete($id)
	{		
                $topic=$this->Topics_model->get_video($id);
                if(isset($topic->topic_video_path))
                {
                    if(file_exists($topic->topic_video_path))
                    {
                     unlink($topic->topic_video_path);
                    }
                }
                $this->Topics_model->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}
        
               
        public function products()
{       
    $this->load->library('upload');
    $dataInfo = array();
    $files = $_FILES;
    $cpt = count($_FILES['video']['name']);
    for($i=0; $i<$cpt; $i++)
    {           
        $_FILES['video']['name']= $files['video']['name'][$i];
        $_FILES['video']['type']= $files['video']['type'][$i];
        $_FILES['video']['tmp_name']= $files['video']['tmp_name'][$i];
        $_FILES['video']['error']= $files['video']['error'][$i];
        $_FILES['video']['size']= $files['video']['size'][$i];    

        $this->upload->initialize($this->set_upload_options());
        $this->upload->do_upload();
        $dataInfo[] = $this->upload->data();
    }

   
}

private function set_upload_options()
{   
    //upload an image options
    $config = array();
    $config['upload_path'] = './videos';
    $config['allowed_types'] = 'mp4|avi|jpg';
    $config['max_size']      = '120000';
    $config['overwrite']     = FALSE;

    return $config;
}



}
