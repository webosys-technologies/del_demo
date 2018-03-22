<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Delto | Center System Log in</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <script src="<?php echo base_url(); ?>assets/js/jQuery-2.1.4.min.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
   </head>
<script src="<?php echo base_url("assets/js/validation1.js"); ?>">
</script>

<script type="text/javascript">
    function stoppedTyping(){
         var alpha=$("#email").val();
        if(alpha.length > 0) { 
            document.getElementById('submit').disabled = false; 
        } else { 
            document.getElementById('submit').disabled = true;
        }
    }
   
    
    
    
function checkemail()
    {
       
        $('#myModal')[0].reset();
        
          
         var email_value=$("#email").val();
         $("#otp_email").val(email_value);
        
      var url;
     
        url = "<?php echo base_url('/center/Index/resetPasswordUser')?>";
        
          
       // ajax adding data to database
          $.ajax({
              
              
            
            type: "POST",
            url : url,
            data: $('#form').serialize(),
//            dataType: "JSON",
                
            success: function(json)
            {
                
            //    $('#form')[0].reset();
                               
                 
                var obj = jQuery.parseJSON(json);
                if(obj['status']==true)
                {
                     $('#form').hide();
                     $('#demo').show();
                     
             //   alert('success');                   
                }
                else
                {
                    location.reload();
                    alert(obj['status']);
                   // $('#error').html("wrong");
                  // alert('email id is not valid');
                }


               
                
               //if success close modal and reload ajax table
               
             // $("#myModal").modal("show");
             // location.reload();// for reload a page
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
    }
    </script>

  <body class="login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="#"><b>Delto</b><br>Center System</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Forgot Password</p>
        <?php $this->load->helper('form'); ?>
        <div class="row">
            <div class="col-md-12">
                <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
            </div>
        </div>
        
        <?php
        $this->load->helper('form');
        $error = $this->session->flashdata('error');
        $send = $this->session->flashdata('send');
        $notsend = $this->session->flashdata('notsend');
        $unable = $this->session->flashdata('unable');
        $invalid = $this->session->flashdata('invalid');
        if($error)
        {
            ?>
            <div class="alert alert-danger alert-dismissable" id="error">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $this->session->flashdata('error'); ?>                    
            </div>
        <?php }
        

        if($send)
        {
            ?>
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $send; ?>                    
            </div>
        <?php }

        if($notsend)
        {
            ?>
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $notsend; ?>                    
            </div>
        <?php }
        
        if($unable)
        {
            ?>
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $unable; ?>                    
            </div>
        <?php }

        if($invalid)
        {
            ?>
            <div class="alert alert-warning alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $invalid; ?>                    
            </div>
        <?php } ?>
        
        <form action="#" name="form_student" id="form" method="post" >
          <div class="form-group has-feedback">
            <input type="email" class="form-control" id="email" onkeyup="stoppedTyping()" placeholder="Email" name="center_email" required /><span class="text-danger" id="email_err"></span>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
            <!--<span class="text-danger"><?php echo form_error('center_email'); ?></span>-->
          
          <div class="row">
            <div class="col-xs-8">
            </div><!-- /.col -->
            <div class="col-xs-4">
                <button type="button" id="submit" disabled onclick="checkemail()" data-toggle="collapse" data-target=""  value="" class="btn btn-primary btn-block btn-flat">Submit</button>
         
            
            </div><!-- /.col -->
             
          </div>
             
            <div id="a"></div>
        </form>
        
        
        
        <div id="demo" class="collapse">
                  
            <form id="myModal"  role="dialog" action="<?php echo base_url(); ?>center/Index/reset_password" method="post">
            
        <div class="row">
                     <div class="form-group has-feedback">
                         <span id="success" style="color:#047F15">OTP is successfully sent to email..</span>
                               <div class="col-md-12 ">
<!--					<label for="name">Enter OTP TO Signup</label><span style="color:red">*</span>-->
                                    <b>Email:</b><input class="form-control" name="email" id="otp_email" readonly  type="text"/><span class="text-danger" id="email_err"></span>
				
                                </div>
                        </div>
            
                    <div class="col-md-12 ">
                                
<!--					<label for="name">Enter OTP TO Signup</label><span style="color:red">*</span>-->
					<b>OTP:</b><input class="form-control" name="otp" id="otp" placeholder="Enter OTP" maxlength="6" required="" value="" type="text"/><span class="text-danger" id="otp_err"></span>
			                
                        </div>
         
                      <div class="col-md-12 ">
                         <b>New Password:</b> <input type="password" class="form-control" id="password" placeholder="New Password" name="center_password" required /><span class="text-danger" id="password_err"></span>
                         <span class="text-danger"><?php echo form_error('center_password'); ?></span>
                      </div>
         
                       <div class="col-md-12 ">
                          <b>Confirm New Password:</b> <input type="password" class="form-control" id="cpassword" placeholder="Confirm New Password" name="center_cpassword" required /><span class="text-danger" id="cpassword_err"></span>
                          <span class="text-danger"><?php echo form_error('center_cpassword'); ?></span>
                       </div>
                     
                           
                </div><br>
         <div class="row">
             
                 <div class="col-md-offset-5 ">
                       
            <button type="Submit" name="submit" class="btn btn-primary">Submit</button>
                        
                    </div>
           
                </div>
                   
              
                 
                </form>
                 
                 </div>
        
        
        
        <a href="<?php echo base_url() ?>center/Index/login">Login</a><br>
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
    
    
    
    
    
    
    
    
    
    
    
    
    
<!--    <form class="modal fade" id="myModal"  role="dialog" action="<?php echo base_url(); ?>center/Index/otp_verify" method="post">
    <div class="modal-dialog">
    <?php $email="hello1" ?>
       Modal content
      <div class="modal-content">
        <div class="panel-heading">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">OTP is send to your email...please check it.</h4>
        </div>
        <div class="row">
                     <div class="col-md-offset-3 col-md-6 col-md-offset-3">
                                <div class="form-group">
					<label for="name">Enter OTP TO Signup</label><span style="color:red">*</span>
                                    <b>Email:</b><input class="form-control" name="email" id="otp_email" placeholder="" readonly  type="text"/><span class="text-danger" id="email_err"></span>
				
                                </div>
                        </div>
            
                    <div class="col-md-offset-3 col-md-6 col-md-offset-3">
                                <div class="form-group">
					<label for="name">Enter OTP TO Signup</label><span style="color:red">*</span>
					<b>OTP:</b><input class="form-control" name="otp" id="otp" placeholder="Enter OTP" maxlength="6" required="" value="" type="text"/><span class="text-danger" id="otp_err"></span>
				
                                </div>
                        </div>
                    
                </div>
        
           
                <div class="row">
                    <div class="col-md-offset-5">
                         <div class="form-group">
            <button type="Submit" name="submit" class="btn btn-primary">Submit</button>
        </div>
                    </div></div>
      </div>
      
    </div>
  </form>
    -->
         
    

    <script src="<?php echo base_url(); ?>assets/js/jQuery-2.1.4.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
  </body>
</html>