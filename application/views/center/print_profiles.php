<!Doctype html>
<style>
    td{
        align:center;
    }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Student Profiles
           </h1>
      <ol class="breadcrumb" >
        <li><a href="<?php echo base_url(); ?>center/Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Manage Student</li>
      </ol>
        <br>
          <div class="row">
        <div class="col-md-2">
          <a href="<?php echo base_url(); ?>center/Reports" class="btn btn-primary" >Previous</a>
        </div>
        <div class="col-md-2 col-md-offset-8">
     <button type="button" class="btn btn-danger" id="print"><i class="glyphicon glyphicon-print"></i> Print Profiles</button>
   
     </div>
     </div>
    </section>
    
    
       <br>
    
 
     <div class="table-responsive" id="table">
          <?php
          if (isset($student_data)) {
            
          
         foreach($student_data as $res){
          $status=$res->student_status; 
          ?>
          <div class="row content"  >
              <section class="col-md-3 connectedSortable"></section>
         <section class="col-md-7 connectedSortable">
              <div class="box box-solid"> 
                   <div class="box-footer text-black">
        <table class="table-striped"   cellspacing="0" width="100%">
                      
            
    <tr><img id='sprofile_pic' src='<?php echo base_url()?><?php echo $res->student_profile_pic;?>' width="100px" hieght="100px" ></tr>    
    <tr><td><label for="pincode">Student Name :</label><span id="fname"><?php echo $res->student_fname.' '. $res->student_lname; ?></span><span id="lname"></span></td>
        <td> <label for="pincode">Course :</label><span id="course_name"><?php echo $res->course_name;?></span></td>
    </tr>
    <tr><td><label for="pincode">Course start Date :</label><span id="course_start_date"><?php echo $res->student_course_start_date;?></span>    </td>
        <td><label for="pincode">Course End Date :</label><span id="course_end_date"><?php echo $res->student_course_end_date;?></span></td>
    </tr>
<!--    <tr><td><label for="pincode">Username :</label><span id="username"><?php echo $res->student_username;?></span>  </td>
        <td><label for="pincode">Password :</label><span id="password"><?php echo $res->student_password;?></span></td>
    </tr>-->
    <tr><td><label for="pincode">Email :</label><span id="email"><?php echo $res->student_email;?></span> </td>
        <td><label for="pincode">Mobile Number :</label><span id="mobile"><?php echo $res->student_mobile;?></span></td>
    </tr>
    <tr><td><label for="pincode">Gender :</label><span id="gender"><?php echo $res->student_gender;?></span> </td>
        <td><label for="pincode">DOB :</label><span id="dob"><?php echo $res->student_dob;?></span></td>
    </tr>
    <tr><td> <label for="pincode">Last Education :</label><span id="last_education"><?php echo $res->student_last_education;?></span> </td>
        <td><label for="pincode">Address :</label><span id="address"><?php echo $res->student_address;?></span></td>
    </tr>
    <tr><td><label for="pincode">City :</label><span id="city"><?php echo $res->student_city;?></span>  </td>
        <td><label for="pincode">State :</label><span id="state"><?php echo $res->student_state;?></span></td>
    </tr>
         
    

    </table>
                       </div>
                  </div>
             </section></div>
          <?php }}?>
     </div>
     
     </div>

              
                          
              </div>
               
   
  </div>

  <script src="<?php echo base_url('assets/js/validation1.js'); ?>" type="text/javascript"></script>



  <script type="text/javascript">
     
 function printData()
{
   var divToPrint=document.getElementById("table");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}

$('#print').on('click',function(){
printData();
})
    
    
      
    
   </script>