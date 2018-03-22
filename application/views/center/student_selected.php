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
    <section class="content-header">

    <form id="table" name="table" action="<?php echo base_url(); ?>center/Orders/payment" method="post">
    
    <div class="table-responsive">
    <table id="table_id" class="table table-bordered" cellspacing="0" width="100%">
      <thead class="thead-dark">
        <tr bgcolor="#338cbf" style="color:#fff">
          <th>ID</th>
          <th>Name</th>
          <th>Course</th>
          <th>Mobile</th>
          <th>Created At</th>
          <th>Course Fees</th>
          <th>Book Price</th>
          <th>Total</th>


          <th style="width:125px;">Action
          </p></th>
        </tr>
      </thead>
      <tbody id="tagContainer">
        <?php
          if (isset($student_data)) {
            
          
         foreach($student_data as $res){
          $price=0;
          $status=$res->student_status; ?>
             <tr class="tagWrapper" <?php if($status != 1) { ?> class="bg-danger" <?php } ?> >
                            <td><?php echo $res->student_id;?></td>
                                        <td><?php echo $res->student_fname.' '. $res->student_lname; ?></td>
                                        <td><?php echo $res->course_name;?></td>
                                       <td><?php echo $res->student_mobile;?></td>
                                       <td><?php echo $res->student_created_at;?></td>
                                       <td><?php echo $res->course_fees; ?></td>
                                       <td><?php if ($res->student_book == 1) {
                                         $price=$res->book_price;
                                         echo $price;
                                       }else{ echo $price ; } ?></td>
                                       <td><?php $total=$res->course_fees+$price;
                                       echo $total; ?> </td>

                                       <td>
                  <button type="button" class="btn btn-danger" onclick="" data-dismiss="" ><i class="glyphicon glyphicon-trash"></i></button>


                </td>
              </tr>
              
             <?php 

                $sum[]=$total;
              }}?>



      </tbody>

    </table>
    </div>
    <?php 
    $amt=array();
    $sid=array();
    foreach ($student_data as $key) {
      $sid[]=$key->student_id;
    } 
    $amt=array_sum($sum);
    $student=count($sid);
    ?><div class="form-group">
    <div class="row">
    <div class="col-md-offset-5 col-md-4 "><label class="control-label">Total Amount for <?php echo $student; ?> selected students is</label></div>
    <div class="col-md-2"><input class="form-control" type="text" name="amount" value="<?=$amt; ?>" readonly ></div>
    <input type="hidden" name="student" value="<?php echo $student; ?>">
    </div>
  </div>
     <div class="row">
        <div class="col-md-2">
          <a href="<?php echo base_url(); ?>center/Student" class="btn btn-primary" >Previous</a>
        </div>
        <div class="col-md-2 col-md-offset-8">
          <button type="submit" class="btn btn-warning" id="payment"  ><i class="glyphicon glyphicon-plus"></i>Proceed to Payment</button>
   
     </div>
     </div>

</form>

  </div>
  </section>


<script type="text/javascript">
  $(function() {
    $("#tagsContainer").on('click', ".tagDelete", function() {
        var $deleteButton = $(this).attr('disabled', true),
            $wrapper = $deleteButton.closest(".tagWrapper"),
            $tag = $wrapper.find('.tag');
        $.ajax({
            url: "links/livesearch.php"
            data: {
                action: 'tagdelete',
                tag: $tag.text(),
                //other params here, eg. to identify the user and the context of the deletion
            },
            success: function(data, textStatus, jqXHR) {
                $wrapper.remove();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                $deleteButton.attr('disabled', false),
                //display error message?
            }
        });
    });
});

</script>