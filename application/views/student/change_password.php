<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo base_url("assets/bootstrap/css/bootstrap.min.css");?>">
  <script src="<?php echo base_url("assets/js/jquery-3.2.1.min.js");?>"></script>
  <script src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>"></script>
   
</head>

 <script>
         $(document).ready(function(){
    // Show the Modal on load
    $("#myModal").modal("show");
    
    // Hide the Modal
   
});
        </script>

<body>


 
  <!-- Trigger the modal with a button -->
 

  <!-- Modal -->
  <form class="modal fade" id="myModal" role="dialog" action="<?php echo base_url(); ?>center/index" method="post">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="panel-heading">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">OTP is send to your email...please check it.</h4>
        </div>
        <div class="row">
                    <div class="col-md-offset-3 col-md-6 col-md-offset-3">
                                <div class="form-group">
<!--					<label for="name">Enter OTP TO Signup</label><span style="color:red">*</span>-->
					<input class="form-control" name="otp" id="otp" placeholder="Enter OTP" maxlength="6" required="" type="text"/><span class="text-danger" id="otp_err"></span>
				
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
  


</body>
</html>

    </div>
  </form>