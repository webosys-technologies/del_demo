
<style type="text/css">

  .modal fade{
    display: block !important;
}
.modal-dialog{
  width: 600px;
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
    background-color:#EAEDED;
    text-align:center;
   
}
p{
    padding:30px 0px;
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
    
        <div class="col-md-6">
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
          <th>NAME</th>
          <th>COURSE</th>
          <th style="width:150px;">ACTION
          </th>
        </tr>
      </thead>
      <tbody id="myTable">
          
        <?php
          if (isset($student_data)) {
            
          
         foreach($student_data as $res){
          $status=$res->student_status; ?>
             <tr <?php if($status == 1) { ?> bgcolor="#61F48B" <?php } ?> >
                            <td><input  <?php if($status == 0) { ?> class="checkbox" <?php } ?>
                              type="checkbox" name="cba[]"  value="<?php echo $res->student_id; ?>"
                              <?php if($status == 1) { ?> disabled <?php } ?> ></td>
                                        <td><?php echo $res->student_id;?></td>
                                        
                                        <td><?php echo $res->student_fname.' '. $res->student_lname; ?></td>
                                        <td><?php echo $res->course_name;?></td>                                       
                                       
                                       <td>
  
                  <button type="button" class="btn btn-success" onclick="edit_student(<?php echo $res->student_id; ?>)" data-toggle="tooltip" data-placement="bottom" title="Edit Play Time" ><i class="glyphicon glyphicon-pencil"></i></button>
                  
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
  
 file = input.files[0];
 
 if(file.size>7340032)  //file size bytes
 {
 $("#img_error").html("please upload image less than 7 mb or Dimenssion 1920*1200");
 $("#img").val("");
 $("#img_error").show(); 
}
else
{
     reader.onload = function(e) {
         $("#box").hide();
         $("#img_box").show();
      $('#profile_pic').attr('src', e.target.result);
    }
   $("#img_error").hide(); 
}
   

    reader.readAsDataURL(input.files[0]);
  }
}

$("#img").change(function() {
  readURL(this);
});


           
      
      $('#pay').DataTable();
           
  } );
    var save_method; //for save method string
    var table;

     
     
     
     
 

 
$("#myName").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
  


    function edit_student(id)
    {
        $("#view_left").html("");
      save_method = 'update';
     $('#form')[0].reset(); // reset form on modals
      $("#student_id").val(id);
      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('index.php/admin/Play_time/play_time_edit/')?>/" + id,        
        type: "GET",
               
        dataType: "JSON",
        success: function(data)
        {              
            $.each(data.stud_data,function(i,row)               
               {
                 $("#student_f_name").html(row.student_fname);
                  $("#student_l_name").html(row.student_lname);
                   $("#student_course_name").html(row.course_name);
               }
               );
           
            var num=0;
              $.each(data.topics,function(i,row)               
               {  
                   if(row.topic_status==1)
                   {
                 num++; 
                 $("#topics_id").append('<input name="topic_id[] type="text" value="'+row.topic_id+'" hidden>');
                 $("#view_left").append('<tr><td>'+num+'</td><td>'+ row.topic_name +'</td><td> <input name="remaining_play_time[]" id="topic_'+row.topic_id+'" class="form-control" type="number" value=""></td></tr>');
                    }
               }
               );
       
              $.each(data.play_time,function(i,row)               
               {
                 $("#topic_"+row.topic_id).val(row.remaining_play_time);
               }
               );
                          
             $('#modal_form').modal('show');    
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
        url = "<?php echo site_url('index.php/admin/Play_time/play_time_update')?>";    

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
               alert("Data Save Successfully...!");              
               $('#modal_form').modal('hide');
              location.reload();// for reload a page     
            
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data in student');
            }
        });
        }  
     
  </script>
  
  <!-- Bootstrap modal -->
  <div class="modal fade" id="modal_form" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="color:#fff; background-color:#338cbf">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <center><h3 class="modal-title">Play Time</h3></center>
      </div>
        
        <form action="#" name="form_student" id="form" class="form-horizontal">
      <div class="modal-body form">
              
          <input type="hidden" value="" id="student_id" name="student_id"/>
         <div class="box-body">   
             <div class="row">
            <div class="form-group">
           <div class="col-md-5">
               &nbsp;&nbsp;&nbsp;&nbsp;<label>Name: <span id="student_f_name"></span>&nbsp;<span id="student_l_name"></span></label>
            </div>
              <div class="col-md-5 col-md-offset-2">
                  <label>Course: <span id="student_course_name"></span></label>
                  </div>
            </div>
              </div>               
         <table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
            
             <div id="topics_id">
                 </div>
      <thead>
        <tr bgcolor="#338cbf" style="color:#fff">
         <th>NO</th>
         <th>Topic Name</th>
         <th width="100px">View Left</th>
        </tr>
      </thead>
      <tbody id="view_left">
       
      </tbody>

    </table>                        
       </div>
        </div>
          <div class="modal-footer">
            <button type="button" id="btnSave" onclick="save()"  class="btn btn-success">Save</button>
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

