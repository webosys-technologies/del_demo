<!Doctype html>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Student Management
        <small>Control Panel</small>
      </h1>
      <ol class="breadcrumb" >
        <li><a href="<?php echo base_url(); ?>center/Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Manage Student</li>
      </ol>
    </section>
    <br><br>
    <form id="table" name="table" action="<?php echo base_url(); ?>center/Results/payment" method="post">
    <section class="content-header">
    
    <div class="table-responsive">
    <table id="table_id" class="table table-bordered" cellspacing="0" width="100%">
      <thead class="thead-dark">
        <tr bgcolor="#338cbf" style="color:#fff">
          <th>ID</th>
          <th>Name</th>
          <th>Course</th>
          <th>Mobile</th>
          <th>City</th>
          <th>Created At</th>
          <th>Reexam fees</th>

          <th style="width:125px;">Action
          </th>
        </tr>
      </thead>
      <tbody id="tagContainer">
        <?php
          if (isset($student_data)) {
            
          
         foreach($student_data as $res){
          $status=$res->student_status; ?>
             <tr class="tagWrapper" <?php if($status != 1) { ?> class="bg-danger" <?php } ?> >
                            <td><?php echo $res->student_id;?></td>
                                        <td><?php echo $res->student_fname.' '. $res->student_lname; ?></td>
                                        <td><?php echo $res->course_name;?></td>
                                       <td><?php echo $res->student_mobile;?></td>
                                       <td><?php echo $res->student_city;?></td>
                                       <td><?php echo $res->student_created_at;?></td>
                                       <td><?php echo $res->course_reexam_fees; ?></td>
                                       <td>
                  <button type="button" class="btn btn-danger" onclick="" data-dismiss="" ><i class="glyphicon glyphicon-trash"></i></button>


                </td>
              </tr>
             <?php }}?>



      </tbody>

    </table>
    </div>
  </section>
    <?php 
    $amt=array();
    $sid=array();
    foreach ($student_data as $key) {
      $sid[]=$key->student_id;
      $amt[]=$key->course_reexam_fees;
    } 
    $total=array_sum($amt);
    $student=count($sid);
    ?><div class="form-group">
    <div class="row">
    <div class="col-md-offset-5 col-md-4 "><label class="control-label">Total Amount for <?php echo $student; ?> selected students is</label></div>
    <div class="col-md-2"><input class="form-control" type="text" name="amount" value="<?=$total; ?>" readonly ></div>
    <input type="hidden" name="student" value="<?php echo $student; ?>">
    </div>
  </div>

    <div class="col-md-offset-10">
      <button type="button" class="btn btn-warning" id="payment" onclick="demo_viewi()"   ><i class="glyphicon glyphicon-plus"></i>Proceed to Payment</button>
    </div>
</form>
  </div>


<script type="text/javascript">
  function demo_viewi()
    {
      // alert();
         $('#demo_form').modal('show'); // show bootstrap modal
          $('.modal-title1').text('This is Demo Version');
      $('.modal-title2').text('You can not make Payment');

    }

//   $(function() {
//     $("#tagsContainer").on('click', ".tagDelete", function() {
//         var $deleteButton = $(this).attr('disabled', true),
//             $wrapper = $deleteButton.closest(".tagWrapper"),
//             $tag = $wrapper.find('.tag');
//         $.ajax({
//             url: "links/livesearch.php"
//             data: {
//                 action: 'tagdelete',
//                 tag: $tag.text(),
//                 //other params here, eg. to identify the user and the context of the deletion
//             },
//             success: function(data, textStatus, jqXHR) {
//                 $wrapper.remove();
//             },
//             error: function(jqXHR, textStatus, errorThrown) {
//                 $deleteButton.attr('disabled', false),
//                 //display error message?
//             }
//         });
//     });
// });


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