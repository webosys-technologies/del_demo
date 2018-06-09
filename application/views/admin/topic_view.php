<!DOCTYPE html>
<html>
    <head>
        <style>
        .btn-bs-file{
    position:relative;
}
.btn-bs-file input[type="file"]{
    position: absolute;
    top: -9999999;
    filter: alpha(opacity=0);
    opacity: 0;
    width:0;
    height:0;
    outline: none;
    cursor: inherit;
}
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
      <section class="content-header">
      <h1>
       <strong> Topics</strong>
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>admin/Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Topics</li>
      </ol>
          

    </section>
    <br>
      <section class="content">
          <div class="row">
              <div class="col-md-4">
    <button class="btn btn-primary" onclick="add_topic()" data-toggle="tooltip" data-placement="bottom" title="Add Topic"><i class="glyphicon glyphicon-plus"></i> Add Topic</button>
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
    <br />
    <br />
    <div class="form-group" style="width:350px" >
            <label for="name">SEARCH</label>
        <input id="myName" class="form-control" type="text" placeholder="Search..." >
        </div>
    <div class="table-responsive">
    <table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead bgcolor="#338cbf" style="color:#fff">
        <tr>
					<th>ID</th>
					<th>TOPIC NAME</th>
					<th>COURSE NAME</th>
                                        <th width="95px">PLAY TIME </th>
					<th width="110px">CREATED AT</th>
                                        <th width="110px">CREATED BY</th>
                                        <th>STATUS</th>

          <th style="width:110px;">ACTION
          </p></th>
        </tr>
      </thead>
      <tbody id="myTable">
				<?php 
//                               echo "<pre>";
//                               print_r($topics);
                                foreach($topics as $topic){?>
				     <tr>
                                        <td><?php echo $topic->topic_id;?></td>
                                        <td><?php echo $topic->topic_name;?></td>
                                        <td><?php echo $topic->course_name;?></td>
                                        <td><?php echo $topic->topic_video_play_time;?></td>
                                       <td><?php echo $topic->topic_created_at;?></td>
                                       <td><?php echo $topic->topic_created_by;?></td>
                                       <td>
                                           <?php 
                                       if($topic->topic_status==1)
                                       {
                                           echo "Active";
                                       }
                                       else 
                                       {
                                           echo "Not Active";
                                       }
                                       ?></td>
                                       <td>
									<button class="btn btn-success" onclick="edit_topic(<?php echo $topic->topic_id;?>)" data-toggle="tooltip" data-placement="bottom" title="Edit Topic" ><i class="glyphicon glyphicon-pencil" ></i></button>
									<button class="btn btn-danger" onclick="delete_topic(<?php echo $topic->topic_id;?>)" data-toggle="tooltip" data-placement="bottom" title="Delete Topic"><i class="glyphicon glyphicon-remove"></i></button>


								</td>
				      </tr>
				     <?php }?>



      </tbody>

    </table>
    </div>
        
</section>
  </div>
      
      

  <script type="text/javascript">


    $(document).ready(function(){
            var i = 1;
            $('#add').click(function(){
                i++;
                $('#dynamic_field').append('<tr id="row'+i+'"><td><div class="form-body"><div class="form-group"><label class="control-label col-md-3">      Course Name</label><div class="col-md-9"><select name="course_id[]" class="form-control"><?php foreach($courses as $row){echo '<option value="'.$row->course_id.'">'.$row->course_name.'</option>'; }?></select></div></div><div class="form-group"><label class="control-label col-md-3">Topic Name</label><div class="col-md-9"><input name="name[]" placeholder="Topic Name" class="form-control" type="text"></div></div><div class="form-group"><label class="control-label col-md-3">Topic Description</label><div class="col-md-9"><textarea class="form-control" name="topic_description[]"   rows="4" cols="40" ></textarea></div></div>       <div class="form-group"><label  class="control-label col-md-3">Upload Video</label><div class="col-md-9"><input type="file" id="file" name="video1"><span id="file1"></span></div></div>   <div class="form-group"><label class="control-label col-md-3">Topic Path</label><div class="col-md-9"><input name="path[]"  class="form-control" placeholder="Topic Path" type="text" ></div></div>   <div class="form-group"><label class="control-label col-md-3">Topic Play Time</label><div class="col-md-3"><input name="time[]"  class="form-control" type="number" ></div></div> <div class="form-group"><label class="control-label col-md-3">Status</label><div class="col-md-9"><select name="status[]" class="form-control"><option value="1">Active</option><option value="0">Not Active</option></select> </div></div></td></td><td><button name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
            });

            $(document).on('click','.btn_remove', function(){
                var button_id = $(this).attr("id");
                $("#row"+button_id+"").remove();
            });

            
        });

  $(document).ready( function () {
     
     $('#table_id').DataTable();
      
 
    });    

  $("#myName").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
    
    
    //here first get the contents of the div with name class copy-fields and add it to after "after-add-more" div class.
      $(".add-more").click(function(){ 
          var html = $(".copy-fields").html();
          $(".after-add-more").after(html);
      });
//here it will remove the current value of the remove button which has been pressed
      $("body").on("click",".remove",function(){ 
          $(this).parents(".control-group").remove();
      });
    
     

    var save_method; //for save method string
    var table;


    function add_topic()
    {
      save_method = 'add';
      $('#form')[0].reset(); // reset form on modals
      $('#add_form').modal('show'); // show bootstrap modal
      $('.modal-title').text('Add Topic'); // Set Title to Bootstrap modal title
    }

    function edit_topic(id)
    {
      save_method = 'update';
      $('#form2')[0].reset(); // reset form on modals
        $('#vid_box').hide();
      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('index.php/admin/Topics/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="id"]').val(data.topic_id);
            $('[name="name"]').val(data.topic_name);
            $('[name="topic_path"]').val(data.topic_video_path);
            $('[name="course_id"]').val(data.course_id);
            $('[name="topic_description"]').val(data.topic_description);
            $('[name="time"]').val(data.topic_video_play_time);
            $('[name="status"]').val(data.topic_status);
            if(data.topic_video_path)
            {
                $('#vid_box').show();
            $('#edit_vid').attr('src',"<?php echo base_url();?>"+data.topic_video_path);
             $('#remove_vid').attr("onclick","remove_topic_video("+data.topic_id+")");
             }
             
            $('#edit_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Topics'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax 1');
        }
    });
    }
    
    
    
    function remove_topic_video(id)
   {
        if(confirm("are you sure you want to Topic Video?"))
     {
               $.ajax({
            url : "<?php echo site_url('index.php/admin/Topics/delete_topic_video')?>/"+id,
            type: "POST",
            //dataType: "JSON",
            success: function(data)
            {
               if(data.status)
               {
                   alert("Video Deleted Successfully...!");
               }
               location.reload();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting photo');
            }
        });
        }
     
   }



    function save()
    {
       
       
        
      var url;
      if(save_method == 'add')
      {
           var data = new FormData(document.getElementById("form"));
          url = "<?php echo site_url('index.php/admin/Topics/topic_add')?>";
      }
      else
      {
           var data = new FormData(document.getElementById("form2"));
        url = "<?php echo site_url('index.php/admin/Topics/topic_update')?>";
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
            success: function(data)
            {
                if(data.error)
                {
                    alert(data.error);
                }
                if(data.status=="true")
                {
              alert("Data Updated successfully..!!");
                }
               //if success close modal and reload ajax table
               $('#edit_form').modal('hide');
              location.reload();// for reload a page
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
    }

    function delete_topic(id)
    {
      if(confirm('Are you sure delete this data?'))
      {
        // ajax delete data from database
          $.ajax({
            url : "<?php echo site_url('index.php/admin/Topics/topic_delete')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
               alert("Topic deleted successfully.");  
               location.reload();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });

      }
    }

    
    
    
    
  </script>


  <!-- Bootstrap modal -->
  <div class="modal fade" id="add_form" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="color:#fff; background-color:#338cbf">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       <center> <h3 class="modal-title">Topics Form</h3></center>
       
      </div>
      <div class="modal-body form">
        <form action="#" name="form_topic" id="form" enctype="" class="form-horizontal">
            <table class="table" id="dynamic_field">
              <tr>
                <td>
          <input type="hidden" value="" name="id[]"/>
          <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3">Course Name</label>
              <div class="col-md-9">
                <select name="course_id[]" class="form-control">
                    <!--<option value="0">Select Course</option>-->
                <?php 
                foreach($courses as $row)
                { 
                  echo '<option value="'.$row->course_id.'">'.$row->course_name.'</option>';
                }
                ?>
            </select>
              </div>
            </div>
            
            <div class="form-group">
              <label class="control-label col-md-3">Topic Name</label>
              <div class="col-md-9">
                <input name="name[]" placeholder="Topic Name" class="form-control" type="text">
              </div>
            </div>             
            
               <div class="form-group">
              <label class="control-label col-md-3">Topic Description</label>
              <div class="col-md-9">
              <textarea class="form-control" name="topic_description[]"   rows="4" cols="40" ></textarea>
              </div>
              </div>
              <div class="form-group">
              <label  class="control-label col-md-3">Upload Video</label>
              <div class="col-md-9">
              <input type="file" id="file" name="video"><span id="file1"></span>
              </div>
              </div>
              
              <div class="form-group">
              <label class="control-label col-md-3">Topic Path</label>
              <div class="col-md-9">
                <input name="path[]" placeholder="Topic Path" value="" class="form-control" type="text">
              </div>
            </div> 
              
                <div class="form-group">
              <label class="control-label col-md-3">Topic Play Time</label>
              <div class="col-md-3">
                <input name="time[]"  class="form-control" type="number" >
              </div>
<!--               <div class="col-md-9">

              <div class="progress">
              <div class="bar"></div >
              <div class="percent">0%</div >
              </div></div>-->
            </div> 
             
              
              <div class="form-group">
              <label class="control-label col-md-3">Status</label>
              <div class="col-md-9">
                  <select name="status[]" class="form-control">
                      <option value="1">Active</option>
                      <option value="0">Not Active</option>
                  </select>
              </div>
            </div>
              </div>
            </td>
                   

          </tr>
        </table>   
      
        </form>
          
           
          <div class="modal-footer">
            <button type="button" name="add" id="add" class="btn btn-success">Add More</button>
            <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
              </div>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  
  <!-- End Bootstrap modal -->
  
     
 <div class="modal fade" id="edit_form" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="color:#fff; background-color:#338cbf" >
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <center><h3 class="modal-title">Topics Form</h3></center>
       
      </div>
      <div class="modal-body form">
        <form action="#" name="form_topic" id="form2" enctype="multipart/form-data" class="form-horizontal">
            
          <input type="hidden" value="" name="id"/>
          
          
          <div class="form-body">
              
              <div class="row" id="vid_box">
           <div class="col-md-4 col-md-offset-4">
          <!-- small box -->
          <video src="" id="edit_vid" width="100%"></video>
          <div class="small-box">
                     
            <a href="#" id="remove_vid" class="small-box-footer"><span style="color:red">Remove Video<i class="fa fa-arrow-circle-right"></i></span></a>
          </div>
        </div>
              </div>
              
            <div class="form-group">
              <label class="control-label col-md-3">Course Name</label>
              <div class="col-md-9">
                <select name="course_id" class="form-control">
                    <!--<option value="0">Select Course</option>-->
                <?php 
                foreach($courses as $row)
                { 
                  echo '<option value="'.$row->course_id.'">'.$row->course_name.'</option>';
                }
                ?>
            </select>
              </div>
            </div>
            
            <div class="form-group">
              <label class="control-label col-md-3">Topic Name</label>
              <div class="col-md-9">
                <input name="name" placeholder="Topic Name" class="form-control" type="text">
              </div>
            </div>             
            
               <div class="form-group">
              <label class="control-label col-md-3">Topic Description</label>
              <div class="col-md-9">
              <textarea class="form-control" name="topic_description"   rows="4" cols="40" ></textarea>
              </div>
              </div>
              <div class="form-group">
              <label  class="control-label col-md-3">Upload Video</label>
              <div class="col-md-9">
              <input type="file" id="file" name="video"><span id="file1"></span>
              </div>
              </div>
               <div class="form-group">
              <label class="control-label col-md-3">Topic Path</label>
              <div class="col-md-9">
                <input name="topic_path" placeholder="Topic Path" value="" class="form-control" type="text">
              </div>
            </div> 
              
                <div class="form-group">
              <label class="control-label col-md-3">Topic Play Time</label>
              <div class="col-md-3">
                <input name="time"  class="form-control" type="number" >
              </div>
                           
              </div> 
             
              
              <div class="form-group">
              <label class="control-label col-md-3">Status</label>
              <div class="col-md-9">
                  <select name="status" class="form-control">
                      <option value="1">Active</option>
                      <option value="0">Not Active</option>
                  </select>
              </div>
            </div>
              </div>
            
      
        </form>
          
           
          <div class="modal-footer">
              
            <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
             </div> 
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
   
  <!-- End Bootstrap modal -->
  </body>


         
      