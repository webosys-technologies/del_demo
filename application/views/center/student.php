
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
#pay{
  overflow-x: auto;
}
#box{
    /*padding:100px,0px;*/
    width:100px;
    height:100px;
    background-color:lightgrey;
    text-align:center;
   
}
p{
    padding:30px 0px;
}
#img{
    display:none;
}
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i><strong> Student Management</strong>
        <small>Add, Edit, Delete <?php  ?></small>
      </h1>
      <ol class="breadcrumb" >
        <li><a href="<?php echo base_url(); ?>center/Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li >Manage Student</li>
      </ol>
    </section><br>
    <form id="table" name="table" action="<?php echo base_url(); ?>center/Orders/selected_mem" method="post">
    <section class="content-header">
    <div class="row">
    <div class="col-md-4">
    <button type="button" class="btn btn-primary" onclick="demo_view()"><i class="glyphicon glyphicon-plus"></i> Add Student</button>
       <button type="button" class="btn btn-warning" id="payment" onclick="demo_view1()" ><i class="fa fa-inr"></i> Make Payment</button>
    </div>
            <div class="col-md-6">
         <?php
        $this->load->helper('form');
        $success = $this->session->flashdata('success');
        if($success)
        {
            ?>
            
        <div class="alert alert-success alert-dismissible" data-auto-dismiss="5000">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success!</strong> <?php echo $success; ?> 
  </div>
        <?php }?>
             
              <?php
        $this->load->helper('form');
        $error = $this->session->flashdata('error');
        if($error)
        {
            ?>           
        <div class="alert alert-danger alert-dismissible" data-auto-dismiss="2000">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Error!</strong> <?php echo $error; ?> 
  </div>
        <?php }?>
             
             
       
        </div>
    </div>
    <br>
    <div class="form-group" style="width:350px" >
            <label for="name">SEARCH</label>
        <input id="myName" class="form-control" type="text" placeholder="Search..." >
        </div>
    
    
   <div id="print">
    <div class="table-responsive">
        
    <table id="pay" class="table table-bordered" cellspacing="0" width="100%">
        
      <thead class="thead-dark">
        <tr bgcolor="#338cbf" style="color:#fff">
          <th width=5%>SELECT <input type="checkbox" id="select_all"/> ALL</th>          
          <th>ID</th>
          <th width=10%>PICTURE</th>
          <th>NAME</th>
          <th>COURSE</th>
          <th>BATCH</th>
          <th>BOOK</th>
          <th>CREATED AT</th>
          <th>STATUS</th>

          <th style="width:150px;">ACTION
          </th>
        </tr>
      </thead>
      <tbody id="myTable">
          
        <?php
          if (isset($student_data)) {
            
          
         foreach($student_data as $res){
          $status=$res->student_status; ?>
             <tr <?php if($status == 1) { ?> style="background-color:#61F48B "  <?php }elseif ($status == 2) { ?> style="background-color:#ec5858; " <?php  } ?> >
                            <td><input  <?php if($status == 0) { ?> class="checkbox" <?php } ?>
                              type="checkbox" name="cba[]"  value="<?php echo $res->student_id; ?>"
                              <?php if($status == 1 || $status == 2) { ?> disabled <?php } ?> ></td>
                                        <td><?php echo $res->student_id;?></td>
                                        <td><img src="<?php echo base_url(); ?><?php if (!empty($res->student_profile_pic)){ echo "profile_pic/avatar.png"; }else{echo "profile_pic/avatar.png";}?>" class="avatar img-responsive"  width="40px" height="30px"></td>
                                        <td><?php echo $res->student_fname.' '. $res->student_lname; ?></td>
                                        <td><?php echo $res->course_name;?></td>
                                       <td><?php echo $res->batch_name;?></td>
                                       <td><?php echo $res->book_name;?></td>
                                       <td><?php echo $res->student_created_at;?></td>
                                       <td>
                                           <?php 
                                       if($status==1)
                                       {
                                           echo "Active";
                                       }
                                       elseif ($status == 2) {
                                          
                                          echo "Completed";
                                        } 
                                      else
                                       {
                                           echo "Not Active";
                                       }
                                       ?></td>
                                       <td>
  
                  <button type="button" class="btn btn-success" id="id_for_book" value="<?php echo $res->course_id; ?>" onclick="demo_view()" data-toggle="tooltip" data-placement="bottom" title="Edit Student" ><i class="glyphicon glyphicon-pencil"></i></button>
                  <button type="button" class="btn btn-info" onclick="view_student(<?php echo $res->student_id ?>)" data-toggle="tooltip" data-placement="bottom" title="View Student"><i class="glyphicon glyphicon-eye-open"></i></button>
                  <button type="button" class="btn btn-danger" onclick="demo_view()" data-toggle="tooltip" data-placement="bottom" title="Delete Student" ><i class="glyphicon glyphicon-trash"></i></button>


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

  <script src="<?php echo base_url('assets/js/validation1.js'); ?>" type="text/javascript"></script>



  <script type="text/javascript">
  $(document).ready( function () {
      
 function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#profile_pic').attr('src', e.target.result);
            
        }

        reader.readAsDataURL(input.files[0]);
    }
}



var _URL = window.URL || window.webkitURL;
$("#img").change(function (e) {
    var file, img;
    if ((file = this.files[0])) {
    var xyz=this;
       
        img = new Image();
        img.onload = function () { 
            
            if(this.height>1200 || this.width>1920 || file.size>7340032)
            {
                $('#profile_pic').attr('src',"");
                  $("#img_error").html("please upload image less than 7 mb or Dimenssion 1920*1200");
                  $("#img").val("");
                  $("#box").show();
                  $("#img_error").show(); 
             }
            else
            {
                                
                  $("#box").hide();
               $("#img_error").hide();      
                        readURL(xyz);       
                  $("#img_box").show();
            }
           
        };
        img.src = _URL.createObjectURL(file);
    }
});
           
      
      $('#pay').DataTable();
           
  } );
    var save_method; //for save method string
    var table;

     
     
     
     
     
   function remove_profile_pic(id)
   {
        if(confirm("are you sure you want to delete profile photo?"))
     {
               $.ajax({
            url : "<?php echo site_url('index.php/center/Student/profile_pic_delete')?>/"+id,
            type: "POST",
            //dataType: "JSON",
            success: function(data)
            {
               
               location.reload();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting photo');
            }
        });
        }
     
   }

 
$("#myName").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
    
    
    function add_student()
    {
      save_method = 'add';
      $('#form')[0].reset(); // reset form on modals
      $('#modal_form').modal('show'); // show bootstrap modal
      $('.modal-title').text('Add Student'); // Set Title to Bootstrap modal title
      $("#img_box").hide();
      $("#box").show();
      $('#remove_pic').hide();

//       $("#book_id").html("");
        $('#course_id').attr("disabled",false);
        $('#book_id').attr("disabled",false);


    }

    function edit_student(id)
    {
      save_method = 'update';
     $('#form')[0].reset(); // reset form on modals

              $("#book_id").html("");

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('index.php/center/Student/ajax_edit/')?>/" + id,        
        type: "GET",
               
        dataType: "JSON",
        success: function(data)
        {        
         
//                     $("#append_city").remove();
            $('[name="student_id"]').val(data.student_id);
            $('[name="center_id"]').val(data.center_id);
            $('[name="sub_center_id"]').val(data.sub_center_id);
            $('[name="course_id"]').val(data.course_id);         
             $("#book_id").append('<option id="book_n" value="'+ data.book_id +'">' + data.book_name + '</option>');          
            $('[name="batch_id"]').val(data.batch_id);
              // alert($("#book_"+data.book_id).val());
            $('[name="student_fname"]').val(data.student_fname);
            $('[name="student_lname"]').val(data.student_lname);
            $('[name="student_email"]').val(data.student_email);
            $('[name="student_mobile"]').val(data.student_mobile);
            $('[name="student_gender"]').val(data.student_gender);
            $('[name="student_dob"]').val(data.student_dob);
            $('[name="student_last_education"]').val(data.student_last_education);
            $('[name="student_address"]').val(data.student_address);  
            $('[name="student_city"]').val(data.student_city);
            $('[name="student_status"]').val(data.student_status);
            if(data.student_profile_pic)
            {
                $('#remove_pic').show();
                $('#remove_pic').attr("onclick","remove_profile_pic("+data.student_id+")");
            }
           else
           {
                $('#remove_pic').hide();
           }
//             $("#city").append('<option value="'+ data.student_city +'" id="append_city">' + data.student_city + '</option>');
            $('[name="student_state"]').val(data.student_state);
            $('[name="student_pincode"]').val(data.student_pincode);
            $('#profile_pic').attr("src", "<?php echo base_url();?>"+data.student_profile_pic);
            
            if(data.student_profile_pic)
            {
                 $("#box").hide();
            $("#img_box").show();            
            }
            else
            {
                $("#img_box").hide(); 
                $("#box").show();
            }
            
            if(data.student_status >= 1)
            {
              $('#course_id').attr("disabled",true);
              $('#book_id').attr("disabled",true);

            }else{ 
              $('#course_id').attr("disabled",false);
              $('#book_id').attr("disabled",false);
             }
            
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Student'); // Set title to Bootstrap modal title
            

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax 1');
        }
    });
    }
    
    function view_student(id)
    {
      save_method = 'update';
     $('#form')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('index.php/center/Student/ajax_edit/')?>/" + id,        
        type: "GET",
               
        dataType: "JSON",
        success: function(data)
        {          
            $('#sfname').html(data.student_fname);
            $('#slname').html(data.student_lname); 
            $('#scourse_name').html(data.course_name);
            $('#semail').html(data.student_email);
            $('#smobile').html(data.student_mobile);
            $('#sgender').html(data.student_gender);
            $('#saddmission_month').html(data.student_admission_month);
            $('#scourse_end_date').html(data.student_course_end_date);
            $('#slast_education').html(data.student_last_education);
            if(data.student_profile_pic)
            {
            $('#sprofile_pic').attr("src", "<?php  echo base_url();?>"+data.student_profile_pic);
             }
             else
             {
               $('#sprofile_pic').attr("src", "<?php echo base_url(); ?>profile_pic/avatar.png");
             }
//            $('#remove_pic').attr("onclick","remove_profile_pic("+data.student_id+")");
            $('#sdob').html(data.student_dob);
            $('#susername').html(data.student_username);
            $('#spassword').html(data.student_password);
            $('#sstudent_last_education').html(data.student_last_education);
            $('#saddress').html(data.student_address);  
            $('#scity').html(data.student_city);
            $('#sstate').html(data.student_state);
            $('#spincode').html(data.student_pincode);
            
            $('#modal_form2').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Student Data'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax 1');
        }
    });
    }


         

    
    function save()
    {

  

      var data = new FormData(document.getElementById("form"));

      var url;
      if(save_method == 'add')
      {
        url = "<?php echo site_url('index.php/center/Student/student_add')?>";
      }
      else
      {
        url = "<?php echo site_url('index.php/center/Student/student_update')?>";
      }

       // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
            async: false,
            processData: false,
            contentType: false,            
            data: data,
            dataType: "JSON",
            success: function(json)
            {
                // if(data.error!=='true')
                // {
                //     alert(data.error);
                // }
                    alert("Data Save Successfully...!"); 
               //if success close modal and reload ajax table
               $('#modal_form').modal('hide');
              location.reload();// for reload a page
             
            
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data in student');
            }
        });
    }

    function delete_student(id)
    {
      if(confirm('Are you sure delete this data?'))
      {
        // ajax delete data from database
          $.ajax({
            url : "<?php echo site_url('index.php/center/Student/student_delete')?>/"+id,
            type: "POST",
            //dataType: "JSON",
            success: function(data)
            {
                alert("Deleted successfully");  
               location.reload();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });

      }
    }





    $(document).ready(function () {

     $("#course_id").change(function() {


   var el = $(this) ;
              $("#book_id").html("");


var id=el.val();
          if(id>0)
          {
      $.ajax({
       url : "<?php echo site_url('index.php/center/Student/show_book')?>/" + id,        
       type: "GET",
              
       dataType: "JSON",
       success: function(data)
       {
        
          $.each(data,function(i,row)
          {
           
              $("#book_id").append('<option value="'+ row.book_id +'">' + row.book_name + '</option>');
          }
          );
       },
       error: function (jqXHR, textStatus, errorThrown)
       {
         alert('Error...!');
       }
     });
     }
    
 });

   });



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
    
    function demo_view()
    {
         $('#demo_form').modal('show'); // show bootstrap modal
          $('.modal-title1').text('This is Demo Version');
      $('.modal-title2').text('You can not ADD,EDIT,DELETE');

    }
    
    function demo_view1()
    {
         $('#demo_form').modal('show'); // show bootstrap modal
          $('.modal-title1').text('This is Demo Version');
      $('.modal-title2').text('You can not make Payment');

    }


 
    
     
  </script>
  
   <!-- Bootstrap modal -->
  <div class="modal fade" id="demo_form" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="color:#fff; background-color:#FF5733" >
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <center><h3 class="modal-title1"></h3></center>
         <center><h3 class="modal-title2"></h3></center>
      </div>
        
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div>
  
  <!-- Bootstrap modal -->
  <div class="modal fade" id="modal_form2" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="color:#fff; background-color:#338cbf">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       <center> <h3 class="modal-title">Course Form</h3></center>
      </div>
         <form action="#" name="form_student" id="form2" class="form-horizontal">
      <div class="modal-body form">
       
          <input type="hidden" value="" name="student_id"/>
          <input type="hidden" value="" name="center_id"/>

          <div class="box-body">
                            
              
              
              <div class="row">
                
                  <div class="col-md-3 col-md-offset-1"  >
                      <!--<img src="<?php echo base_url(); ?><?php if (!empty($res->student_profile_pic)){echo $res->student_profile_pic;} else{echo "profile_pic/avatar.png";}?>" class="avatar img-responsive"  width="100px" height="100px">-->
                      <img id='sprofile_pic' src='' width="100px" hieght="100px" >
                  </div><br><br>    
                   
              </div>
            
              <br>
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
                   
                   <div class="col-md-5">                                   
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

          </form>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div>
  
  
  


  <!-- Bootstrap modal -->
  <div class="modal fade" id="modal_form" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="color:#fff; background-color:#338cbf">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <center><h3 class="modal-title">Course Form</h3></center>
      </div>
        <form action="#" name="form_student" data-async data-target="#modal_form" id="form" class="form-horizontal">
      <div class="modal-body form">
          <input type="hidden" value="" name="student_id"/>
          <input type="hidden" value="" name="center_id"/>

          <div class="box-body">
               <div class="row">
                <div class="col-md-3 col-md-offset-1">
                <div id="box" hidden><p>width*height 1920*1200</p></div>
                  <div class="col-md-3" hidden id="img_box">
                      <img id='profile_pic'  src='' width="100px" hieght="100px" >                      
                  </div>
                </div>           
              </div><br>
                <div class="row">
                    <div class="col-md-offset-1">
                    <button id='remove_pic' value="" onclick="" class="btn btn-danger">Remove Profile Photo</button>
                   </div>
                    </div><br>
                        <div class="row">
                                <div class="col-md-5 col-md-offset-1">                                
                                    <div class="form-group">
                                        <label for="">Sub-Center Name</label><span style="color:red">*</span>
                                           <select name="sub_center_id" class="form-control required" required>
                                                <option value="">--Select Sub Center--</option>
                                            <?php 
                                            foreach($sub_center_data as $center)
                                            { 
                                              if ($center->sub_center_status==1)
                                                  {                                                
                                              echo '<option value="'.$center->sub_center_id.'">'.$center->sub_center_name.'</option>';
                                            }
                                            }
                                            ?>
                                        </select>
                                        </div>                                    
                                </div>
                            <div class="col-md-5 col-md-offset-1">                                
                                    <div class="form-group">
                                        <label for="">Batch Name</label>
                                           <select name="batch_id" class="form-control required" required>
                                              <option value="">--Select Batch--</option>  
                                            <?php 
                                            foreach($batches as $bat)
                                            { 
                                              if ($bat->batch_status==1)
                                                  {                                                
                                              echo '<option value="'.$bat->batch_id.'">'.$bat->batch_name.'&nbsp;&nbsp;&nbsp;('.$bat->batch_time.')</option>';
                                            }
                                            }
                                            ?>
                                        </select>
                                        </div>                                    
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5 col-md-offset-1">                                
                                    <div class="form-group">
                                        <label for="fname">Course</label><span style="color:red">*</span>
                                           
                                           <select name="course_id" id="course_id" class="form-control required" required >
                                                <option value="">--Select Course--</option>
                                            <?php 
                                            foreach($courses as $row)
                                            { 

                                              if ($row->course_status==1) {
                                                
                                              echo '<option value="'.$row->course_id.'">'.$row->course_name.'</option>';
                                            }
                                            }
                                            ?>
                                        </select>

                                        </div>
                                    
                                </div>
                                <div class="col-md-5 col-md-offset-1">
                                    <div class="form-group">
                                        <label for="lname">Book</label><span style="color:red">*</span>
                                        <select name="book_id" class="form-control required" id="book_id" required>
                                            <option>--Select Book--</option>
                                        </select>
                                      <span class="text-danger" id="lname_err"></span>
                                    </div>
                                </div>
                                
                            </div>
                    
<!--                     <div class="row">
                                <div class="col-md-5 col-md-offset-1 ">                                
                                    <div class="form-group">
                                        <label for="fname">Apply Coupon Code</label>
                                        <input type="text" class="form-control required" id="coupon_code" name="coupon_code" maxlength="128"  required>
                                        <span class="text-danger" id="fname_err"></span>

                                    </div>
                                    
                                </div>
                    </div>-->
                            <div class="row">
                                <div class="col-md-5 col-md-offset-1  ">                                
                                    <div class="form-group">
                                        <label for="fname">First Name</label><span style="color:red">*</span>
                                        <input type="text" class="form-control required" id="fname" name="student_fname" maxlength="128"   style="text-transform:uppercase" required>
                                        <span class="text-danger" id="fname_err"></span>

                                    </div>
                                    
                                </div>
                                <div class="col-md-5 col-md-offset-1 ">
                                    <div class="form-group">
                                        <label for="lname">Last Name</label><span style="color:red">*</span>
                                        <input type="text" class="form-control required email" id="lname"  name="student_lname" maxlength="128"  style="text-transform:uppercase" required>
                                      <span class="text-danger" id="lname_err"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5 col-md-offset-1">
                                    <div class="form-group">
                                        <label for="email">E-mail</label>
                                        <input type="email" class="form-control required" id="email"  name="student_email" maxlength="128" required>
                                        <span class="text-danger" id="email_err"></span>
                                    </div>
                                </div>
                                <div class="col-md-5 col-md-offset-1">
                                    <div class="form-group">
                                        <label for="mobile">Mobile Number</label><span style="color:red">*</span>
                                        <input type="text" class="form-control required digits" id="mobile" name="student_mobile" maxlength="10" required>
                                       <span class="text-danger" id="mobile_err"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                
                                <div class="col-md-5 col-md-offset-1">
                                    <div class="form-group">
                                        <label for="gender">Gender</label><span style="color:red">*</span>
                                        <select class="form-control required" id="gender" name="student_gender" required>
                                            <option value="0">Select Gender</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>
                                </div> 
                                <div class="col-md-5 col-md-offset-1">
                                    <div class="form-group">
                                        <label for="dob">Date Of Birth</label><span style="color:red">*</span>
                                        <input type="date" class="form-control required digits" id="dob" name="student_dob" maxlength="10" required>
                                    </div>
                                </div>   
                            </div>
                            <div class="row">
                                <div class="col-md-5 col-md-offset-1">
                                    <div class="form-group">
                                        <label for="last_education">Last Education</label>
                                        <input type="text" class="form-control required" id="last_education"  name="student_last_education" maxlength="128" required>
                                    </div>
                                </div>
                                <div class="col-md-5 col-md-offset-1 ">
                                    <div class="form-group">
                                        <label for="address">Address</label><span style="color:red">*</span>
                                        <textarea class="form-control required " id="address" name="student_address" maxlength="128" required></textarea>
                                    </div>
                                </div>
                            </div>

              
              
                             <div class="row">
                                 <div class="col-md-5 col-md-offset-1" >
                                <div class="form-group">
                                <label for="text">State</label><span style="color:red">*</span>
                                <select name="student_state" id="state" class="form-control">
                                    <option value="">-- Select State --</option>
                                  <option value="Maharashtra">Maharashtra</option>
                                </select>
                                </div>
                                </div>
                                <div class="col-md-5 col-md-offset-1 ">                            
                                <div class="form-group">
                                <label for="text">City</label><span style="color:red">*</span>
                                <select class="form-control" id="city_name" name="student_city">
                                  <option value="">-- Select City --</option>
                                 <?php 
                                            foreach($cities as $row)
                                            { 
                                              echo '<option value="'.$row->city_name.'">'.$row->city_name.'</option>';
                                            }
                                            ?>
                                  <!--<option id="city_names"></option>-->
                                </select>
                                </div>
                                </div>
                            </div>
              
                            <div class="row">
                                <div class="col-md-5 col-md-offset-1">
                                    <div class="form-group">
                                        <label for="pincode">Pincode</label><span style="color:red">*</span>
                                        <input type="text" class="form-control required" id="pincode"  name="student_pincode" maxlength="6" required>
                                        <span class="text-danger" id="pincode_err"></span>
                                    </div>
                                </div>
                                <div class="col-md-5 col-md-offset-1">
                                      <div class="form-group ">
                                          <label for="state">Profile Picture</label><span style="color:red">*</span>  <br>
                                           <label id="file_label" class="btn btn-info">
                                          <input type = "file" name ="img" id="img" accept="image/*" />
                                          Choose Image
                                           </label>
                                               <br>
                                          <span id="img_error" style="color:red"></span>
                                      </div>
                                </div>
                                <input type="hidden" name="student_status">
                            </div>
                        </div><!-- /.box-body -->
    
        
          </div>
          <div class="modal-footer">
            <button type="submit" id="btnSave" onclick="save()"  class="btn btn-success">Save</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
          </form>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  <!-- End Bootstrap modal -->

<!-- for Payment view -->



</aside>
<div class="control-sidebar-bg"></div>

