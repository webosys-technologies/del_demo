
<style type="text/css">

  .modal fade{
    display: block !important;
}
.modal-dialog{
  width: 700px;
      overflow-y: initial !important
}
.modal-body{
  height: 500px;
  overflow-y: auto;
}

</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i><strong> Reports </strong>
        <small>View <?php  ?></small>
      </h1>
      <ol class="breadcrumb" >
        <li><a href="<?php echo base_url(); ?>center/Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li >Manage Student</li>
      </ol>
    </section>
    <form id="table" name="table" action="<?php echo base_url(); ?>center/Reports/print_profiles" method="post">
    <section class="content-header">
    <div class="row">
        <div class="col-md-4">
    <button type="button" class="btn btn-danger" id="print"><i class="glyphicon glyphicon-print"></i> Print Records</button>
    <button type="submit" class="btn btn-danger" ><i class="glyphicon glyphicon-print"></i> Print Profiles</button>
     </div>
        <div class="col-md-4">
          <?php
        $this->load->helper('form');
        $error = $this->session->flashdata('error');
        if($error)
        {
            ?>
            <script>
                alert("<?php echo $error; ?> ");
             </script>
<!--            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $error; ?>                    
            </div>-->
        <?php }?>
            </div>
           </div>
        <br>
     <div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="name">SEARCH</label>
        <input id="myName" class="form-control" type="text" placeholder="Search...">
        </div>
         </div>
         </div>
     
        
      
      
<div id="print">
    <div class="table-responsive">
     <table id="pay" class="table table-striped table-bordered" cellspacing="0" width="100%">
        
      <thead class="thead-dark">
        <tr bgcolor="#338cbf" style="color:#fff">
          <th width=5%>SELECT <input type="checkbox" id="select_all"/> ALL</th>
          <th>ID</th>
          <th>STUDENT NAME</th>
          <th>COURSE</th>
          <th>ADMISSION MONTH</th>
          <th>COURSE START DATE</th>
          <th>ACTION</th>

         </tr>
      </thead>
      <tbody id="myTable">
      
        <?php
          if (isset($student_data)) {
           
          
         foreach($student_data as $res){
             
          $status=$res->student_status; ?>
             <tr > 
                            <td> <input class="checkbox" type="checkbox" name="cba[]"  value="<?php echo $res->student_id; ?>"> </td>
                                        <td><?php echo $res->student_id;?></td>
                                        <td><?php echo $res->student_fname.' '. $res->student_lname; ?></td>
                                        <td><?php echo $res->course_name;?></td>
                                        <td><?php echo $res->student_admission_month;?></td>
                                       <td><?php echo $res->student_course_start_date;?></td>
                                       <td>      
             <button type="button" class="btn btn-info" onclick="view_student(<?php echo $res->student_id;?>)" data-toggle="tooltip" data-placement="bottom" title="View student"><i class="glyphicon glyphicon-eye-open"></i></button>
                                        </td>
                                     
             </tr>
             
              
            
             <?php }}?>



      </tbody>

    </table>
    </div>
        </div>

     
      
    
</section>
</form>   
  </div>


<!-- Bootstrap modal -->
  <div class="modal fade" id="modal_form" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="color:#fff; background-color:#338cbf">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       <center> <h3 class="modal-title">Course Form</h3></center>
      </div>
      <div class="modal-body form">
        <form action="#" name="form_student" id="form" class="form-horizontal">
          <input type="hidden" value="" name="student_id"/>
          <input type="hidden" value="" name="center_id"/>

          <div class="box-body">
                            
              
               <div class="row">
                
                  <div class="col-md-3 col-md-offset-1" >
                     
                      <img id='sprofile_pic' src='' width="100px" hieght="100px" >
                  </div>
                
                   
              </div><br><br>
              
               <div class="row">
                   <div class="col-md-5 col-md-offset-1"> 
                <label for="pincode">Student Name :</label><span id="sfname"></span>&nbsp;<span id="slname"></span>
                   </div>
                                   

                   
                   <div class="col-md-5">                                   
                    <label for="pincode">Course :</label><span id="scourse_name"></span>
                     </div>
               </div>
              <br>
              
               <div class="row">
                   <div class="col-md-5 col-md-offset-1">                                    
                   <label for="pincode">Admission Month :</label><span id="saddmission_month"></span>                                 
                   </div>
                   
                   <div class="col-md-5">                                   
                    <label for="pincode">Course End Date :</label><span id="scourse_end_date"></span>
                     </div>
               </div>
              <br>
              
               <div class="row">
                   <div class="col-md-5 col-md-offset-1">                                    
                   <label for="pincode">Username :</label><span id="susername"></span>                                 
                   </div>
                   
                   <div class="col-md-5">                                   
                    <label for="pincode">Password :</label><span id="spassword"></span>
                     </div>
               </div>
              
              <br>
               <div class="row">
                   <div class="col-md-5 col-md-offset-1">                                    
                   <label for="pincode">Email :</label><span id="semail"></span>                                 
                   </div>
                   
                   <div class="col-md-5">                                   
                    <label for="pincode">Mobile Number :</label><span id="smobile"></span>
                     </div>
               </div>
              
              <br>
               <div class="row">
                   <div class="col-md-5 col-md-offset-1">                                    
                   <label for="pincode">Gender :</label><span id="sgender"></span>                                 
                   </div>
                   
                   <div class="col-md-5 ">                                   
                    <label for="pincode">DOB :</label><span id="sdob"></span>
                     </div>
               </div>
              <br>
              <div class="row">
                   <div class="col-md-5 col-md-offset-1">                                    
                   <label for="pincode">Last Education :</label><span id="slast_education"></span>                                 
                   </div>
                   
                   <div class="col-md-5">                                   
                    <label for="pincode">Address :</label><span id="saddress"></span>
                     </div>
               </div>
              <br>
              <div class="row">
                   <div class="col-md-5 col-md-offset-1">                                    
                   <label for="pincode">City :</label><span id="scity"></span>                                 
                   </div>
                   
                   <div class="col-md-5">                                   
                    <label for="pincode">State :</label><span id="sstate"></span>
                     </div>
               </div>
              
               </div><!-- /.box-body -->
    
        
          </div>
<!--          <div class="modal-footer">
            <button type="button" id="btnSave" onclick="save()"  class="btn btn-success">Save</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>-->
          </form>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div>

     

  <script src="<?php echo base_url('assets/js/validation1.js'); ?>" type="text/javascript"></script>



  <script type="text/javascript">
  $(document).ready( function () 
  {   $("#profiles").hide();
      $('#pay').DataTable();
     
  } );
    var save_method; //for save method string
    var table;

     


$('#print').on('click',function(){
printData();
});

  function printData()
{
   var divToPrint=document.getElementById("pay");
   newWin= window.open("");
   var htmlToPrint = '' +
        '<style type="text/css">' +
        'table th, table td {' +
        'border:0.5px solid #000;' +
        'padding:0.5em;' +
        '}' +
        '</style>';

    htmlToPrint += divToPrint.outerHTML;
   newWin.document.write("<style> td:nth-child(1){display:none;} </style>");
   newWin.document.write("<style> th:nth-child(1){display:none;} </style>");

   newWin.document.write("<style> td:nth-child(7){display:none;} </style>");
   newWin.document.write("<style> th:nth-child(7){display:none;} </style>");


   newWin.document.write(htmlToPrint);
   newWin.print();
   newWin.close();
}



    
      $("#myName").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
  
 
  
  
  
  
       function view_student(id)
    {
      save_method = 'update';
     $('#form')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({

               
        url : "<?php echo site_url('index.php/center/Reports/ajax_edit/')?>/" + id,        

        type: "GET",
               
        dataType: "JSON",
        success: function(data)
        {          
            $('#sfname').html(data.student_fname);
            $('#slname').html(data.student_lname);     
            $('#scourse_name').html(data.course_name);     
            $('#slname').html(data.student_lname);           
            $('#scourse_name').html(data.course_name);           
            $('#semail').html(data.student_email);
            $('#smobile').html(data.student_mobile);
            $('#sgender').html(data.student_gender);
            $('#saddmission_month').html(data.student_payment_date);
            $('#scourse_end_date').html(data.student_course_end_date);
             $('#slast_education').html(data.student_last_education);
            $('#sdob').html(data.student_dob);
              if(data.student_profile_pic)
            {
            $('#sprofile_pic').attr("src", "<?php  echo base_url();?>"+data.student_profile_pic);
             }
             else
             {
               $('#sprofile_pic').attr("src", "<?php echo base_url(); ?>profile_pic/avatar.png");
             }
            $('#susername').html(data.student_username);
            $('#spassword').html(data.student_password);
            $('#sstudent_last_education').html(data.student_last_education);
            $('#saddress').html(data.student_address);  
            $('#scity').html(data.student_city);
            $('#sstate').html(data.student_state);
            $('spincode').html(data.student_pincode);
            
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Student Data'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax 1');
        }
    });
    }

    //select all checkboxes
$("#select_all").change(function(){  //"select all" change 
    var status = this.checked; // "select all" checked status
    $('.checkbox').each(function(){ //iterate all listed checkbox items
        this.checked = status; //change ".checkbox" checked status
    });
});

$('.checkbox').change(function(){ //".checkbox" change 
    //uncheck "select all", if one of the listed checkbox item is unchecked
    if(this.checked == false){ //if this item is unchecked
        $("#select_all")[0].checked = false; //change "select all" checked status to false
    }
    
    //check "select all" if all checkbox items are checked
    if ($('.checkbox:checked').length == $('.checkbox').length ){ 
        $("#select_all")[0].checked = true; //change "select all" checked status to true
    }
});


    
   </script>


 </aside>

