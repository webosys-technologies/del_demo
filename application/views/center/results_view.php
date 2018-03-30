


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
    </section><br>
    <form id="table" name="table" action="<?php echo base_url(); ?>center/Results/selected_member" method="post">
    <section class="content-header">
    <div class="row">
    <div class="col-md-4">
    <button type="button" class="btn btn-danger" id="print" ><i class="glyphicon glyphicon-print"></i> Print</button>
       <!--<button type="submit" class="btn btn-warning" id="payment"  ><i class="fa fa-inr"></i> Make Payment</button>-->
    <button type="button" onclick="demo_version()" class="btn btn-warning"  ><i class="fa fa-inr"></i> Make Payment</button>


    </div>
    
        
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
            
        <?php }?>
        </div>
    </div>
    <br/>
    <div class="form-group" style="width:350px" >
            <label for="name">SEARCH</label>
        <input id="myName" class="form-control" type="text" placeholder="Search..." >
        </div>
           
    
<div id="print">
    <div class="table-responsive">
     <table id="pay" class="table table-bordered" cellspacing="0" width="100%">
      <thead class="thead-dark">
        <tr bgcolor="#338cbf" style="color:#fff">
          <th width="5%">SELECT  <input type="checkbox" id="select_all"/> ALL</th>
          <th>ID</th>
          <th width="150px">NAME</th>
          <th>EXAM NAME</th>
          <th>COURSE</th>
          <th width="100px">DATE</th>
          <th >TOTAL MARKS</th>
          <th>RESULT</th>
          <th width="100px">ACTION</th>

         </tr>
      </thead>
      <tbody id="myTable">
          
        <?php
          if (isset($exam_data)) {
            
          
         foreach($exam_data as $res){
          $status=$res->exam_result; ?>
             <tr <?php if($status == 'pass') { ?> style="background-color:#61F48B; "  <?php }else { ?> style="background-color:     #ec5858; "  <?php } ?>>
                                        <td><input <?php if($status != 'pass') { ?> class="checkbox" <?php } ?>
                                         type="checkbox" name="cba[]"  value="<?php echo $res->student_id; ?>"
                                           <?php if($status == 'pass') { ?> disabled <?php } ?> ></td>
                                        <td><?php echo $res->exam_id;?></td>
                                        <td><?php echo $res->student_fname.' '. $res->student_lname; ?></td>
                                        <td><?php echo $res->exam_type; ?></td>
                                        <td><?php echo $res->course_name;?></td>
                                       <td><?php echo $res->exam_date;?></td>
                                       <td><?php echo $res->exam_obtain_marks;?></td>
                                       <td><?php echo $res->exam_result; ?></td>
                                       <td>                                            
             <button type="button" class="btn btn-info" onclick="view_result(<?php echo $res->exam_id; ?>)" data-toggle="tooltip" data-placement="bottom" title="View Result"><i class="glyphicon glyphicon-eye-open"></i></button>
                                       </td>
                                      
             </tr>
             <?php }}?>



      </tbody>

    </table>
    </div>
        </div>
    
    <!-- Bootstrap modal -->
  <div class="modal fade" id="modal_form" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="color:#fff; background-color:#338cbf">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <center><h3 class="modal-title">Result View</h3></center>
      </div>
        
                
      <div class="modal-body form">
       <div class="table-responsive ">
              <table id="result" class="table table-bordered table-striped" cellspacing="0" width="100%">
                  <!--<tr bgcolor="#338cbf" style="color:#fff">-->
          <tr> <th align="center" bgcolor="#d2d6de" style="color:#fff">Exam Report</th> <td align="center" bgcolor="#338cbf" style="color:#fff">Marks</td></tr>        
         <tr> <th align="center" >Total Questions</th> <td align="center" id="total_questions"></td></tr>
         <tr><th align="center" >Correct Answer</th> <td align="center" id="correct_ans"></td> </tr>
          <tr><th align="center" >Wrong Answer</th> <td align="center" id="wrong_ans"></td></tr>
          <tr><th align="center" >Marks Obtain</th> <td align="center" id="marks_obtain"></td></tr>
          <tr><th align="center" >Total Marks</th> <td align="center" id="out_of"></td> </tr>
           <tr><th align="center" >Result</th> <td align="center" id="exm_res"></td> </tr>
        
                 
         </table>
              </div>
          </div>
         
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
      
     <div class="modal fade" id="demo_form1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="color:#fff; background-color:#FF5733" >
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <center><h3 class="modal-title1">This is Demo Version</h3></center>
         <center><h3 class="modal-title2">You can not make payment</h3></center>
      </div>
        
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
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

     function demo_version()
     {
        $('#demo_form1').modal('show'); 
     }
     
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

   newWin.document.write("<style> td:nth-child(9){display:none;} </style>");
   newWin.document.write("<style> th:nth-child(9){display:none;} </style>");


   newWin.document.write(htmlToPrint);
   newWin.print();
   newWin.close();
}

$('#print').on('click',function(){
printData();
})



 function view_result(id)
    {
     
      $.ajax({
        url : "<?php echo site_url('index.php/center/Results/view_result/')?>/" + id,        
        type: "GET",
               
        dataType: "JSON",
        success: function(data)
        {        
         
                              if(data.result=="pass")
                               {
                                   $('#exm_res').html('<span style="color:#32CD32">'+data.result+'</span>');
                               }
                               else
                               {
                                   $('#exm_res').html('<span style="color:red">'+data.result+'</span>');
                               }
                               $('#total_questions').html(data.total_que);
                               $('#marks_obtain').html(data.marks_obtain);
                               $('#out_of').html(data.total_que);
                               $('#correct_ans').html(data.correct_ans);
                               $('#wrong_ans').html(data.wrong_ans);  
                               
                               $("#modal_form").modal("show");
                              
                             

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            ('Error get data from ajax 1');
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

