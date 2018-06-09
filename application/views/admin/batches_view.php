

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i><strong> Batch Management</strong>
        <small>Add, Edit, Delete <?php  ?></small>
      </h1>
      <ol class="breadcrumb" >
        <li><a href="<?php echo base_url(); ?>center/Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li >Batch</li>
      </ol>
    </section><br>
    <form id="table" name="table" action="" method="post">
    <section class="content-header">
    <div class="row">
    <div class="col-md-4">
    <button type="button" class="btn btn-primary" onclick="add_batch()"><i class="glyphicon glyphicon-plus"></i> Add Batch</button>
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
          
          <th>ID</th>
          
          <th>BATCH NAME</th>
          <th>CENTER NAME</th>
          <th>BATCH TIME</th>
          <th>CREATED AT</th>
          <th>STATUS</th>

          <th style="width:100px;">ACTION
          </th>
        </tr>
      </thead>
      <tbody id="myTable">
          
        <?php
          if (isset($batch_data)) {
            
          
         foreach($batch_data as $res){
          $status=$res->batch_status; ?>
          <tr>
                                        <td><?php echo $res->batch_id;?></td>
                                        <td><?php echo $res->batch_name; ?></td>
                                        <td><?php echo $res->center_name; ?></td>
                                        
                                        <td><?php echo $res->batch_time; ?></td>
                                       <td><?php echo $res->batch_created_at;?></td>
                                       <td>
                                           <?php 
                                       if($status==1)
                                       {
                                           echo "Active";
                                       }
                                       else 
                                       {
                                           echo "Not Active";
                                       }
                                       ?></td>
                                       <td>
  
                  <button type="button" class="btn btn-success" onclick="edit_batch(<?php echo $res->batch_id; ?>)" data-toggle="tooltip" data-placement="bottom" title="Edit Batch" ><i class="glyphicon glyphicon-pencil"></i></button>
                  <!--<button type="button" class="btn btn-info" onclick="view_sub_center(<?php echo $res->batch_id; ?>)" data-toggle="tooltip" data-placement="bottom" title="View Sub Center"><i class="glyphicon glyphicon-eye-open"></i></button>-->
                  <button type="button" class="btn btn-danger" onclick="delete_batch(<?php echo $res->batch_id;?>)" data-toggle="tooltip" data-placement="bottom" title="Delete Batch" ><i class="glyphicon glyphicon-trash"></i></button>


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
    
    
    function add_batch()
    {
      save_method = 'add';
      $('#form')[0].reset(); // reset form on modals
      $('#modal_form').modal('show'); // show bootstrap modal
      $('.modal-title').text('Add Batch'); // Set Title to Bootstrap modal title  
      $("#center_name_error").html("");
              $("#batch_name_error").html("");
              $("#time_error").html("");
    }

    function edit_batch(id)
    {
      save_method = 'update';
     $('#form')[0].reset(); // reset form on modals
              $("#center_name_error").html("");
              $("#batch_name_error").html("");
              $("#time_error").html("");
      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('index.php/admin/Batches/ajax_edit/')?>/" + id,        
        type: "GET",
               
        dataType: "JSON",
        success: function(data)
        {        
//                     $("#append_city").remove();
            $('[name="batch_id"]').val(data.batch_id);
            $('#center_id').val(data.center_id);
            $('[name="batch_name"]').val(data.batch_name);
            $('[name="batch_time"]').val(data.batch_time);
            $('[name="status"]').val(data.batch_status);
                  
                                  
                     
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Batch'); // Set title to Bootstrap modal title
            

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax 1');
        }
    });
    }
    
    function view_batch(id)
    {
      save_method = 'update';
     $('#form')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('index.php/admin/Batches/ajax_edit/')?>/" + id,        
        type: "GET",
               
        dataType: "JSON",
        success: function(data)
        {          
            $('#batch_name').html(data.batch_name);
            $('#center_name').html(data.center_name); 
            $('#batch_time').html(data.batch_time); 
            $('#created_at').html(data.batch_created_at);
           
            $('#modal_form2').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Sub Center Data'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax 1');
        }
    });
    }

    function form_validation() {        
        if ($("#center_id").val() == ""){
            $("#center_name_error").html("Please Select Center Name");
          }else{
              var name="true";
              $("#center_name_error").html("");
          }
         
          if ($("#batch_name").val() == ""){
            $("#batch_name_error").html("Please Enter Batch Name");
//         return false;
          }else{
              var batch="true";
              $("#batch_name_error").html("");
          }
          
          if ($("#batch_time").val() == ""){
             $("#time_error").html("Please Enter Batch Time");
//         return false;
          }else{
                 var time="true";         
                   $("#time_error").html("");
          }
          
             
         
          
          if(name=="true" && batch=="true" && time=="true")
          {
             return true;
        }else{
            return false;
        }
    }




    function save()
    {
        var val=form_validation();
        if(val)
        {
        var data = new FormData(document.getElementById("form"));
      var url;
      if(save_method == 'add')
      {
        url = "<?php echo site_url('index.php/admin/Batches/batch_add')?>";
      }
      else
      {
        url = "<?php echo site_url('index.php/admin/Batches/batch_update')?>";
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
               if(json.error)
               {
                   $("#batch_name_error").html(json.error);
               }else{
               $('#modal_form').modal('hide');
              location.reload();// for reload a page
               }
            
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data in student');
            }
        });
        }
    }

    function delete_batch(id)
    {
      if(confirm('Are you sure delete this data?'))
      {
          
        // ajax delete data from database
          $.ajax({
            url : "<?php echo site_url('index.php/center/Batches/batch_delete')?>/"+id,
            type: "POST",
            //dataType: "JSON",
            success: function(data)
            {
               
               location.reload();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });

      }
    }

    function demo_view()
    {
         $('#demo_form').modal('show'); // show bootstrap modal
          $('.modal-title1').text('This is Demo Version');
      $('.modal-title2').text('You can not ADD,EDIT,DELETE');

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
       <center> <h3 class="modal-title"></h3></center>
      </div>
         <form action="#" name="form_batches" id="form2" class="form-horizontal">
      <div class="modal-body form">
       
          <input type="hidden" value="" name="batch _id"/>
          <input type="hidden" value="" name="center_id"/>

          <div class="box-body">
          
               <div class="row">
                   <div class="col-md-5 col-md-offset-1"> 
                <label for="pincode">Batch Name :</label><span id="sfname"></span>
                   </div>           
                   <div class="col-md-5">                                   
                    <label for="pincode">Batch Time :</label><span id="scenter_name"></span>
                     </div>
               </div>
              <br>
              
               <div class="row">
                   <div class="col-md-5 col-md-offset-1">                                    
                   <label for="pincode">Created At :</label><span id="created_at"></span>                                 
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
        <center><h3 class="modal-title"></h3></center>
      </div>
        <form action="#" name="form_student" id="form" class="form-horizontal">
      <div class="modal-body form">
          <!--<input type="hidden" value="" name="center_id"/>-->
         <input type="hidden" value="" name="batch_id"/>
          <div class="box-body">
               
                            <div class="row">
                                <div class="col-md-5 ">                                
                                    <div class="form-group">
                                        <label for="fname">Batch Name</label>
                                        <input type="text" class="form-control required" id="batch_name" name="batch_name" maxlength="128"   style="text-transform:uppercase" required>
                                    </div>
                                    <span id="batch_name_error" style="color:red"></span>
                                </div>
                               <div class="col-md-5 col-md-offset-1 ">
                                    <div class="form-group">
                                        <label for="lname">Center Name</label>
                                        <select name="center_id" id="center_id" class="form-control required" required>
                                            <option value="">--Select Center--</option>   
                                            <?php 
                                            foreach($data as $center )
                                            { 
                                              if ($center->center_status==1)
                                                  {                                                
                                              echo '<option value="'.$center->center_id.'">'.$center->center_name.'</option>';
                                            }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                   <span id="center_name_error" style="color:red"></span>
                                </div>
                             

                            </div>   
              
                          <div class="row">
                              
                              <div class="col-md-5  ">
                                    <div class="form-group">
                                        <label for="lname">Batch Time</label>
                                        <input type="time" class="form-control required email" id="batch_time"  name="batch_time" maxlength="128"  style="text-transform:uppercase" required>
                                    </div>
                                  <span id="time_error" style="color:red"></span>
                                </div>
                                <div class="col-md-5 col-md-offset-1 ">                                
                                    <div class="form-group">
                                        <label for="fname">Status</label>
                                        <select class="form-control" name="status">
                                            <option value="1">Active</option>
                                            <option value="0">Not Active</option>
                                        </select>
                                    </div> 
                                    </div>
                               
                          </div>
         
                        </div><!-- /.box-body --> 
        
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


