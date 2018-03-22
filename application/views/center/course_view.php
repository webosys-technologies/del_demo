<!DOCTYPE html>
<html>

  <body>


  <div class="content-wrapper">
      <section class="content-header">
      <h1>
        <i class="fa fa-book"></i><strong> Courses</strong>
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>center/Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section><br>
      <section class="content ">
    

    <div class="form-group" style="width:350px" >
            <label for="name">SEARCH</label>
        <input id="myName" class="form-control" type="text" placeholder="Search..." >
        </div>
    <div class="table-responsive">
    <table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
        <tr bgcolor="#338cbf" style="color:#fff" >
					<th>ID</th>
          <th>COURSE NAME</th>
          <th>DURATION</th>
          <th>COURSE FEES</th>
          <th>REEXAM FEES</th>
          <th>STATUS</th>

        </tr>
      </thead >
      <tbody id="myTable">
				<?php foreach($courses as $course){?>
				     <tr>
                                        <td><?php echo $course->course_id;?></td>
                                        <td><?php echo $course->course_name;?></td>
                                        <td><?php echo $course->course_duration.' '.'Month';?></td>
                                       <td><?php echo $course->course_fees;?></td>
                                       <td><?php echo $course->course_reexam_fees; ?></td>
                                       <td>
                                           <?php 
                                       if($course->course_status==1)
                                       {
                                           echo "Active";
                                       }
                                       else 
                                       {
                                           echo "Not Active";
                                       }
                                       ?></td>
                     
				      </tr>
				     <?php }?>



      </tbody>

    </table>
  </div>
</section>
  </div>

<script type="text/javascript">
  $(document).ready( function () {
      $('#table_id').DataTable();
  } );
    var save_method; //for save method string
    var table;

    $("#myName").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });

</script>