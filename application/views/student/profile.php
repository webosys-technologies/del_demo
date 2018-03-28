<script>
    function demo_version()
    {
        $('#demo_form').modal('show');
    }
    </script>
<div style="background-color:white"  class="content-wrapper">
     <section class="content-header">
      <h1>
        Profile
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>student/Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Topics</li>
      </ol>
    </section>
    <hr>

     <section class="content">    
        
        
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
                        'student_last_education'=>$res->student_last_education,
                        'student_profile_pic'=>$res->student_profile_pic);
		 }	
          }
          ?>
        
        
	<div class="row">
      <!-- left column -->
      <div class="col-md-3">
        
            <img src="<?php echo base_url();?><?php echo $info['student_profile_pic']?>" class="img-circle" width="150" height="120" alt="avatar">
            <br> &nbsp;&nbsp;
          <!--<input id="files"  type="file">-->
            <h3><?php echo $info['student_fname']." ".$info['student_lname'];?></h3>      
        </div>
      
     
      <div class="col-md-9">
            
          <label> <span class="glyphicon glyphicon-user "></span> Name :</label><?php echo  $info['student_fname']."&nbsp;".$info['student_lname'];?><br>
          <label> <span class="glyphicon glyphicon-envelope"></span> Email :</label><?php echo $info['student_email'];?><br>
          <label> <span class="fa fa-graduation-cap"></span> Education :</label><?php echo $info['student_last_education'];?><br>
          <label> <span class="glyphicon glyphicon-phone"></span> Mobile :</label><?php echo $info['student_mobile'];?><br>
          <label> <i class="fa fa-venus-mars"></i><span> Gender :</span></label><?php echo $info['student_gender'];?><br>
          <label> <span class="fa fa-birthday-cake"></span> DOB :</label><?php echo $info['student_dob'];?><br>
          <label> <span class="glyphicon glyphicon-home"></span> Address :</label><?php echo $info['student_address'];?><br>
<!--          <h4><a href="#" data-toggle="collapse" data-target="#demo">Edit Pofile?</a></h4>-->
<h4><a href="#" onclick="demo_version()">Edit Pofile?</a></h4>
  
               
                   
        </div>
      </div>
            
        
        <div id="demo" class="collapse">
   
      
      
      <div class="row">
	<div class="col-md-offset-3 col-md-6 col-md-offset-3">
		<div class="panel panel-default">
			
			<div class="panel-body">
				<?php $attributes = array("name" => "student_update");
				echo form_open("student/index/update_profile", $attributes);?>
                                <!--<form action="#" name="form_student"  onsubmit="sendotp()" id="form" method="post" >-->
		<div class="row">
                    <div class="col-md-6">
                                <div class="form-group">
					<label for="name">First Name</label>
					<input class="form-control" name="student_fname" id="fname" type="text" readonly=""  value="<?php echo $info['student_fname']; ?>" />
				</div>
                        </div>
                    <div class="col-md-6">
				<div class="form-group">
					<label for="name">Last Name</label>
					<input class="form-control" name="student_lname" id="lname" required="" minlength="2" maxlength="15" readonly="" type="text" value="<?php echo $info['student_lname']; ?>" />
                                </div>
                        </div>
                </div>
                            
                            
                    <div class="row">
                   
                     <div class="col-md-6">
				
				<div class="form-group">
					<label for="email">Username</label>
					<input class="form-control" name="student_email" id="email" required="" type="email" value="<?php echo $info['student_email']; ?>" readonly="" />
                    <span class="text-danger" id="email_err"></span>
					
				</div>
                    </div>
                        
                        
                        <div class="col-md-6" >
                                <div class="form-group">
					<label for="mobile">Mobile</label>
					<input class="form-control" name="student_mobile" id="mobile" required="" minlength="10" maxlength="11" placeholder="Enter Mobile Number" type="text" value="<?php echo set_value('center_mobile'); ?>" />
                    <span class="text-danger" id="mobile_err"></span>
					<span class="text-danger"><?php echo form_error('student_mobile'); ?></span>
				</div>
                                </div>
                        
                    
                    </div>
                                            
                            
                                                                         
                            
                              <div class="form-group">
					<label for="text">Address</label>
                                        <textarea class="form-control" name="student_address"   rows="4" cols="40" >
                                        </textarea>
                                        <span class="text-danger"><?php echo form_error('student_address'); ?></span>
				</div>   
                            

                            
                            <div class="row">
                            <div class="col-md-6" >
                            <div class="form-group">
					<label for="text">Pincode</label>
					<input class="form-control" name="student_pincode" id="pincode" maxlength="6" placeholder="Enter Pincode" type="text" value="<?php echo set_value('center_pincode'); ?>" /><span class="text-danger" id="pincode_err"></span>
					<span class="text-danger"><?php echo form_error('student_pincode'); ?></span>
                            </div>
                                </div>
                            </div>
                            
                            
				<div class="form-group">
					<button name="submit"  type="submit" class="btn btn-success">Save</button>
					<button name="cancel" type="reset" class="btn btn-danger">Cancel</button>
				</div>
                                    <?php echo form_close(); ?>
				<span id="text"></span>
			</div>
		</div>
	</div>
</div>
     

   </div> 
        </section>
    
        <!-- Bootstrap modal -->
  <div class="modal fade" id="demo_form" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="color:#fff; background-color:#FF5733" >
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <center><h3 class="modal-title1">This is Demo Version</h3></center>
         <center><h3 class="modal-title2">You can not ADD,EDIT,DELETE</h3></center>
      </div>
        
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div>
  
</div>
    
        
    



<!--     </div>
     </div>-->
    
  
<!--<script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>-->
 <!--jQuery UI 1.11.4--> 
<!--<script src="<?php echo base_url(); ?>assets/bower_components/jquery-ui/jquery-ui.min.js"></script>-->
 <!--Resolve conflict in jQuery UI tooltip with Bootstrap tooltip--> 
<!--<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>-->

 <!--Morris.js charts--> 
<!--<script src="<?php echo base_url(); ?>assets/bower_components/raphael/raphael.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/morris.js/morris.min.js"></script>
 Sparkline 
<script src="<?php echo base_url(); ?>assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
 jvectormap 
<script src="<?php echo base_url(); ?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
 jQuery Knob Chart 
<script src="<?php echo base_url(); ?>assets/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
 daterangepicker 
<script src="<?php echo base_url(); ?>assets/bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
 datepicker 
<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
 Bootstrap WYSIHTML5 -->
<!--<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>-->
 <!--Slimscroll--> 
<!--<script src="<?php echo base_url(); ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>-->
 <!--FastClick--> 
<!--<script src="<?php echo base_url(); ?>assets/bower_components/fastclick/lib/fastclick.js"></script>-->
 

<!-- AdminLTE dashboard demo (This is only for demo purposes) 
<script src="<?php echo base_url(); ?>assets/dist/js/pages/dashboard.js"></script>
 AdminLTE for demo purposes 
<script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>-->

</body>
</html>

    