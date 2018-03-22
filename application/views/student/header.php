
<html>
  <head>
    <meta charset="UTF-8">
    <title>Student|Dashboard</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <!-- FontAwesome 4.3.0 -->
    <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    
     <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
      
    <!-- FontAwesome 4.3.0 -->
    <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
     
    <link href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.css')?>" rel="stylesheet">
 <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />  
 <!--<script src="<?php echo base_url("assets/js/jquery-3.2.1.min.js");?>"></script>-->
  
  <script src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>"></script>
   
    
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.3.min.js"></script>

 

    
    <style>
         
    	.active{
    		 /*text-align: center;*/
                color: red;
    	}
        
/*        .active{
        color:blue;
        font-size: 15px;
        }*/
        
        
        button {
    border: 0;
    padding: 0;
    display: inline;
    background: none;
    text-decoration: underline;
    color: blue;
}
button:hover {
    cursor: pointer;
}

#center{
    font-size: 20px;
    color:white;
     padding-left:10cm;
    padding-top:15px;
}
    

           
    
    </style>
    <!-- jQuery 2.1.4 -->
 
    <!--<script src="<?php echo base_url(); ?>assets/js/jQuery-2.1.4.min.js"></script>-->
     <script type="text/javascript" src="assets/js/jquery-3.2.1.min.js"></script>
     
      
   
  </head>
  <script>
$(document).ready(function(){
    $("button").click(function(){
        $("h1, h2, p").addClass("blue");
        $("div").addClass("important");
    });
    
     $("#color").click(function(){
        $("#color").addClass("active");
        alert("hello");
        
    });
    
   //    alert("hello");
});
</script>
 
   <script>
      
      $(document).ready(function(){
         // $( "#color" ).addClass( "active" );
          alert("hello");
//           $("#color").click(function(){
//      //  $("#color").addClass("active");
//      alert("hello");
        
//    });
    
});

    window.open("https://www.w3schools.com", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=400,height=400");
      
      
    function getUrl()
    {
        return window.open ("<?php echo base_url();?>student/Exams","mywindow","status=1,toolbar=0","_blank");
    }

 function window()
   {
     //  window.location=document.getElementById('foo').href;
    
      window.open ("<?php echo base_url();?>student/exams","mywindow","status=1,toolbar=0");
  }     
     
 

</script>
  
  <body class="skin-blue sidebar-mini">
    <div class="wrapper">
      
      <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo base_url(); ?>student/Dashboard" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>DELT</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>DELTO</b></span>
        </a>
        
        
        
        
         <?php
        $this->load->helper('form');
        $error = $this->session->flashdata('error');
        
       
        
        if($error)
        {
            ?>
        <script>
            var error="<?php echo $error; ?>";
        alert(error);
        
       
        </script>
         
        
        
        <?php }
        $success = $this->session->flashdata('success');
        if($success)
        {
            ?>
            <script>
            var success="<?php echo $success; ?>";
        alert(success);
        </script>
        
       


       <?php }
        if(false)
        {?>
             <script>
            alert("error");
        </script>
       <?php     
        }
        ?>
        
        
        
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>   
          </a>
          <label id="center"><?php
          if(isset($center_names))
          { 
              foreach($center_names as $center_name)
              {
                echo $center_name->center_name;
              }
          
          }
          ?></label>
        
              
      
          
          <?php
          if(isset($data))
          {
              
              
               foreach ($data as $res) {
                   
                   
                   
                 $info=array(
		 	'student_fname'=>$res->student_fname,
                        'student_lname'=>$res->student_lname,
                        'student_email'=>$res->student_email,
                        'student_mobile'=>$res->student_mobile,
                        'student_gender'=>$res->student_gender,
                        'student_dob'=>$res->student_dob,
                        'student_address'=>$res->student_address,
                        'student_city'=>$res->student_city,
                        'student_state'=>$res->student_state,
                        'student_pincode'=>$res->student_pincode,
                        'student_profile_pic'=>$res->student_profile_pic);
		 }	
          }
          
        
       
		 	
          ?>
          
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo base_url();?><?php echo $info['student_profile_pic']?>" class="user-image" alt="User Image"/>
                  <span class="hidden-xs"><?php echo $info['student_fname']."&nbsp;".$info['student_lname'];?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?php echo base_url();?><?php echo $info['student_profile_pic']?>" class="img-circle" alt="User Image" />
                    <p><?php echo $info['student_fname']."&nbsp;".$info['student_lname'];?>
                     
                      <small> <?php echo 'Student'; ?></small>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <button type="button" class="btn btn-default btn-flat" data-toggle="modal" data-target="#myModal"><i class="fa fa-key"></i> Change Password</button>
                    </div>
                     
                    <div class="pull-right">
                      <a href="<?php echo base_url(); ?>student/Index/signout" class="btn btn-default btn-flat"><i class="fa fa-sign-out"></i> Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
        
       
        
        
        <form class="modal fade" id="myModal" role="dialog" action="<?php echo base_url(); ?>student/index/reset_password" method="post">
   
            <div class="modal-dialog">
     
      <!-- Modal content-->
      <div class="modal-content">
         
          <div style="background-color:#338cbf" class="panel-heading">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <center><h4 class="modal-title" style="color:white">Reset Password</h4></center>
        </div>
                    <div class="row">
                    <div class="col-md-offset-3 col-md-6 col-md-offset-3">
                                <div class="form-group">

				<label for="subject">Enter Old Password</label><span style="color:red">*</span>
					<input class="form-control" name="student_old_password" id="old_password" required="" minlength="8" placeholder="Enter Old password" type="password" /><span class="text-danger" id="old_password_err"></span>
					<span class="text-danger"><?php echo form_error('center_password'); ?></span>	
                                </div>
                        
                                <div class="form-group">
				<label for="subject">Enter New Password</label><span style="color:red">*</span>
					<input class="form-control" name="student_new_password" id="password" required="" minlength="8" placeholder="Enter New Password" type="password" /><span class="text-danger" id="password_err"></span>
					<span class="text-danger"><?php echo form_error('center_password'); ?></span>	
                                </div> 
                        
                                  <div class="form-group">
				<label for="subject">Confirm New Password</label><span style="color:red">*</span>
					<input class="form-control" name="student_confirm_password" id="cpassword" required="" minlength="8" placeholder="Confirm New Password" type="password" /><span class="text-danger" id="cpassword_err"></span>
					<span class="text-danger"><?php echo form_error('center_password'); ?></span>	
                                  </div> 
                       
               
                   
                         <div class="form-group">
            <button type="Submit" name="submit" class="btn btn-primary">Reset Password</button>
        </div>
                         </div>
                    
      </div>
      </div>
      
    </div>
        </form>     
        
        
        
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
              <a href="<?php echo base_url(); ?>student/Dashboard">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span></i>
              </a>
            </li>
          

          
            
<!--            <li class="treeview">
            <a data-toggle="collapse" href="#collapse1"><i class="fa fa-book"></i>Topics 
            <i class="fa fa-angle-down pull-right"></i></a>
          <ul>   
              <div id="collapse1" class="panel-collapse collapse" >
       <?php 
              if(isset($topics))
                  $i=0;
          {
//              print_r($topics);
               foreach ($topics as $topic) {
                   if($topic->topic_status==1)
                   {
                    $i++;
                   ?>
         
           
                  <a href="<?php echo base_url(); ?>student/Topics/topic/<?php echo $topic->topic_id;?>" id="color"><?php echo $i.'.'.$topic->topic_name;?></a><br>
                         
       
          <?php }
             
               }
               }?>
            </div>
            </ul>
            </li>-->
                
            

           
            <li class="treeview">
                <a href="<?php echo base_url();?>student/Topics/show_topics" >
                <i class="fa fa-book"></i>
                <span>Topics</span>
              </a>
<!--               <a href="javascript:document.location.href=getUrl();">Click here</a>
               <a href="#" onClick="document.location.href=getUrl();">Click me</a>-->
            </li>
          
            <li class="treeview">
                <a href="#"  onclick="getUrl()" >
                <i class="fa fa-upload"></i>
                <span>Exams</span>
              </a>

            </li>
             <li class="treeview">
                <a href="<?php echo base_url();?>student/Exam_Reviews" >
                <i class="fa fa-files-o"></i>
                <span>Exam Reviews</span>
              </a>
            </li>

           
            
            <li class="treeview">
                <a href="<?php echo base_url();?>student/Reports" >
                <i class="fa fa-files-o"></i>
                <span>Reports</span>
              </a>
            </li>
             <li class="treeview">
                 <a href="<?php echo base_url();?>student/Profile" >
                <i class="fa fa-child"></i>
                <span>Manage profile</span>
              </a>
            </li>
          
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
      
      
      <!DOCTYPE html>


<!--<style>
video {
    width: 50%;
    height: 500px;
}
</style>-->
      <div class="content-wrapper" hidden="" id="video_view">
      <div class="panel-group">
    
     <div class="panel panel-default">
      
      
      <section class="content-header">
      <h1>
        Videos
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>student/Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Videos</li>
      </ol>
    </section>
         <script>
              $(document).ready(function(){
//    console.log($("video"));
var vid = document.getElementById("myVideo"); 

function playVid() { 
    vid.play(); 
} 

function pauseVid() { 
    vid.pause(); 
}
//    $('#myvideo').get(0).play();
    }
    );
      
             </script>
     
   
  </div> 
     
    </div>
    
  </div>
  

      

  
 


      
      
      
    

