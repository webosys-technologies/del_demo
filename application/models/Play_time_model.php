<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


defined('BASEPATH') OR exit('No direct script access allowed');

class Play_time_model extends CI_Model
{

	var $table = 'play_time';


	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

        public function update_play_time($id)
        {
        $where=array('student_id'=>$id);
        $data=array('remaining_play_time'=>'3');
        
        $this->db->update($this->table,$data,$where);
        return true;
        }
        
        public function getall_topics()
        {
//        $this->db->from('topics');
//        $query=$this->db->get();
        
            $query=$this->db->from('topics as tp')
            ->join('courses as crs', 'crs.course_id=tp.course_id', 'LEFT')
            ->get();
           
        return $query->result();
        }


	public function get_by_id($id)
	{
		$this->db->from($this->table);
		$this->db->where('topic_id',$id);
		$query = $this->db->get();

		return $query->row();
	}
        
         public function check_played($sid,$tid)
        {
                $this->db->from($this->table); 
                 $array = array('student_id' => $sid, 'topic_id' => $tid);   
                $this->db->where($array); 
                $query=$this->db->get();
                $query1=$query->result();
                
                foreach($query1 as $q)
                {
                    $played=$q->played;
                    $remaining_play_time=$q->remaining_play_time;
                }
                
                $this->db->from('topics'); 
                $this->db->where( 'topic_id',$tid); 
                $query_new=$this->db->get();
                $query_new1=$query_new->result();
                
               
                
                foreach($query_new1 as $que)
                {
                    $play_time=$que->topic_video_play_time;
                }
                if($remaining_play_time==0)
                {
                    return $result=array('play'=>false,'remaining_play_time'=>$remaining_play_time);
                }
                else
                {
                    return $result=array('play'=>true,'remaining_play_time'=>$remaining_play_time);
                }
                
        }
        
      
        public function check_id($sid,$tid)
        {
                $this->db->from($this->table);
                $array = array('student_id' => $sid, 'topic_id' => $tid);   
                $this->db->where($array); 
		$query = $this->db->get();   
              
                
                 if($query->num_rows()>0)
                 {
                     return true;
                 }
                 else
                 {
                     return false;
                 }
        }
        
         public function insert_playtime($sid,$tid)
        {
             
              $this->db->from('topics'); 
                $this->db->where('topic_id',$tid); 
                $query_new=$this->db->get();
                $query_new1=$query_new->result();
                
               
                
                foreach($query_new1 as $que)
                {
                    $play_time=$que->topic_video_play_time;
                }
             
             
             $data=array(
                        'student_id'=>$sid,  
                        'topic_id'=>$tid,
                        'played'=>0,
                        'remaining_play_time'=>$play_time
             );
               
             $result=$this->db->insert($this->table,$data);
             
             
             
             
             return $play_time;
        }
        
        public function update_playtime($sid,$tid)
        {
            
             $this->db->from($this->table);
                $array = array('student_id' => $sid, 'topic_id' => $tid);   
                $this->db->where($array); 
		$query = $this->db->get(); 
                $result=$query->result();
               
                foreach($result as $res)
                {
                   $remaining_time=$res->remaining_play_time;
                   $played=$res->played;        
                }
                
                $this->db->from('topics'); 
                $this->db->where( 'topic_id',$tid); 
                $query_new=$this->db->get();
                $query_new1=$query_new->result();
                           
                foreach($query_new1 as $que)
                {
                    $play_time=$que->topic_video_play_time;
                }
                
                
                        
                
                
                $remaining_play_time=$remaining_time-1;
                $played_vid=$played+1;
                
                            
                
        $data = array(
        'student_id' => $sid,
        'topic_id' => $tid,
                    );

        $update=array('remaining_play_time'=>$remaining_play_time,
                       'played'=>$played_vid);
               $this->db->where($data);
              $new_update=$this->db->update($this->table, $update);
              
              
               if($remaining_play_time==0)
                {
                    return array('status'=>false);
                }
             else
              {
                  return array('status'=>true,'remaining_play_time'=>$remaining_play_time);
              }
            
                
        
        }
        
        public function topics_data($id)
        {
            $this->db->from('students as stud');
            $this->db->join('topics as top', 'stud.course_id=top.course_id', 'LEFT');
            $this->db->where('stud.student_id',$id);
            $query = $this->db->get();
           
           return $query->result();
        }
        
        public function course_data($id)
        {
           $this->db->from('students as stud');
            $this->db->join('courses as top', 'stud.course_id=top.course_id', 'LEFT');
            $this->db->where('stud.student_id',$id);
            $query = $this->db->get();
           
           return $query->result();  
        }
        
        public function students_topic($sid)
        {
          $this->db->from($this->table);
          $this->db->where('student_id',$sid);
          $query=$this->db->get();
          return $query->result();
        }
        
        public function play_time($id,$topics)
        {
             foreach($topics as $top)
            {
              $this->db->from('play_time');
              $this->db->where('student_id',$id);
              $this->db->where('topic_id',$top->topic_id);
              $query=$this->db->get();
              $played=$query->row();
              if(isset($played->topic_id))
              {
                  $data[]=array('topic_id'=>$top->topic_id,
                                'remaining_play_time'=>$played->remaining_play_time);                            
              }
              else
              {
                  $data[]=array('topic_id'=>$top->topic_id,
                                'remaining_play_time'=>$top->topic_video_play_time);                         
              }
              
              }
              return $data;
        }
        
        public function update_stud_play_time($data,$where)
	{
//		$this->db->set($data);
                $this->db->where($where);
                $this->db->update($this->table,$data); 
//                return true;
	}

}
