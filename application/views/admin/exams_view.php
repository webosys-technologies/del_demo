


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i><strong> Results </strong>
        <small>View <?php  ?></small>
      </h1>
      <ol class="breadcrumb" >
        <li><a href="<?php echo base_url(); ?>center/Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li >Results</li>
      </ol>
    </section>
    <form id="table" name="table" action="<?php echo base_url(); ?>center/Orders/selected_mem" method="post">
    <section class="content-header">
    <div class="row">
    <div class="col-md-4">
    <button type="button" class="btn btn-danger" id="print" ><i class="glyphicon glyphicon-print"></i> Print</button>

    </div>
    
        <div class="col-md-6">
         <?php
        $this->load->helper('form');
        $error = $this->session->flashdata('error');
        if($error)
        {
            ?>
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $error; ?>                    
            </div>
        <?php }?>
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="col-md-4">
    <div class="form-group" >
            <label for="name">SEARCH</label>
        <input id="myName" class="form-control" type="text" placeholder="Search..." >
        </div>
            </div>
    </div>           
    
<div id="print">
    <div class="table-responsive">
     <table id="pay" class="table table-bordered" cellspacing="0" width="100%" height="150px">
      <thead class="thead-dark">
        <tr bgcolor="#338cbf" style="color:#fff">
          
          <th>ID</th>
          <th width="150px">NAME</th>
          <th>CENTER NAME</th>
          <th>EXAM NAME</th>
          <th>COURSE</th>
          <th width="100px">DATE</th>
          <th >TOTAL MARKS</th>
          <th>STATUS</th>
          <th width="100px">ACTION</th>

         </tr>
      </thead>
      <tbody id="myTable">
          
        <?php
          if (isset($exam_data)) {
            
          
         foreach($exam_data as $res){
          $status=$res->exam_result; ?>
             <tr <?php if($status == 'pass') { ?> bgcolor="#61F48B" <?php }else { ?> bgcolor="red" <?php } ?>>

                                        <td><?php echo $res->exam_id;?></td>
                                        <td><?php echo $res->student_fname.' '. $res->student_lname; ?></td>
                                        <td><?php echo $res->center_name; ?></td>
                                        <td></td>
                                        <!--<td><?php echo $res->exam_name; ?></td>-->
                                        <td><?php echo $res->course_name;?></td>
                                       <td><?php echo $res->exam_date;?></td>
                                       <td><?php echo $res->exam_obtain_marks;?></td>
                                       <td><?php echo $res->exam_result; ?></td>
                                       <td></td>
                                      
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

     
    function printData()
{
   var divToPrint=document.getElementById("pay");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}

$('#print').on('click',function(){
printData();
})

function create_passcode(id)
{

  $.ajax({
        url : "<?php echo site_url('index.php/center/Login_detail/create_passcode')?>/" + id,        
        type: "POST",
               
        dataType: "JSON",
        success: function(data)
        {
          location.reload();
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
          alert('Error while creating passcode');
        }
      });
}
    
   </script>


 </aside>

