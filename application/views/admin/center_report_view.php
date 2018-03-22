
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i><strong>Center Reports </strong>
        <small>View <?php  ?></small>
      </h1>
      <ol class="breadcrumb" >
        <li><a href="<?php echo base_url(); ?>admin/Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li >Center Report</li>
      </ol>
    </section><br>
    <form id="table" name="table" action="<?php echo base_url(); ?>admin/Reports/center_print_profiles" method="post">
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
          <th>NAME</th>
          <th>CENTER</th>
          <th>MOBILE</th>
          <th>CITY</th>
          <th>CREATED AT</th>
          <th>ACTION</th>

         </tr>
      </thead>
      <tbody id="myTable">
          
        <?php
          if (isset($center_data)) {
            
          
         foreach($center_data as $res){
          $status=$res->center_status; ?>
             <tr > 
                            <td> <input class="checkbox" type="checkbox" name="cba[]"  value="<?php echo $res->center_id; ?>"> </td>
                                        <td><?php echo $res->center_id;?></td>
                                        <td><?php echo $res->center_fname.' '. $res->center_lname; ?></td>
                                        <td><?php echo $res->center_name;?></td>
                                        <td><?php echo $res->center_mobile;?></td>                                        
                                        <td><?php echo $res->center_city;?></td>
                                       <td><?php echo $res->center_created_at;?></td>
                                       <td>      
             <button type="button" class="btn btn-info" onclick="view_center(<?php echo $res->center_id;?>)" data-toggle="tooltip" data-placement="bottom" title="View student"><i class="glyphicon glyphicon-eye-open"></i></button>
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
      <div class="modal-header"  style="color:#fff; background-color:#338cbf" >
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <center><h3 class="modal-title">Course Form</h3></center>
      </div>
      <div class="modal-body form">
        <form action="#" name="form_student" id="form" class="form-horizontal">
          <input type="hidden" value="" name="center_id"/>

          <div class="box-body">
                            
              
              
              
               <div class="row">
                   <div class="col-md-6"> 
                <label for="pincode"> Name :</label><span id="cfname"></span>&nbsp;<span id="clname"></span>
                   </div>
                                   

                   
                   <div class="col-md-6">                                   
                    <label for="pincode">Center :</label><span id="ccenter_name"></span>
                     </div>
               </div>
              <br>
              
               <div class="row">
                   <div class="col-md-6">                                    
                   <label for="pincode">Email :</label><span id="cemail"></span>                                 
                   </div>
                   
                   <div class="col-md-6">                                   
                    <label for="pincode">Password :</label><span id="cpassword"></span>
                     </div>
               </div>
              <br>
              
               <div class="row">
                   <div class="col-md-6">                                    
                   <label for="pincode">Mobile :</label><span id="cmobile"></span>                                 
                   </div>
                   
                   <div class="col-md-6">                                   
                    <label for="pincode">Gender :</label><span id="cgender"></span>
                     </div>
               </div>
              
              <br>
               <div class="row">
                   <div class="col-md-6">                                    
                   <label for="pincode">Date Of Birth :</label><span id="cdob"></span>                                 
                   </div>
                   
                   <div class="col-md-6">                                   
                    <label for="pincode">Created At :</label><span id="ccreated_at"></span>
                     </div>
               </div>
              
              <br>
               <div class="row">

                   <div class="col-md-6">                                   
                    <label for="pincode">Address :</label><span id="caddress"></span>
                     </div>
                     
                   <div class="col-md-6">                                    
                   <label for="pincode">State :</label><span id="cstate"></span>                                 
                   </div>
                   
               </div>
              <br>
              <div class="row">
                   <div class="col-md-6">                                    
                   <label for="pincode">City :</label><span id="ccity"></span>                                 
                   </div>
                   
                   <div class="col-md-6">                                   
                    <label for="pincode">Pincode :</label><span id="cpincode"></span>
                     </div>
               </div>
              <br>
              
              
              
                       
        
        
        
        
        
              
              
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

   newWin.document.write("<style> td:nth-child(8){display:none;} </style>");
   newWin.document.write("<style> th:nth-child(8){display:none;} </style>");


   newWin.document.write(htmlToPrint);
   newWin.print();
   newWin.close();
}

$('#print').on('click',function(){
printData();
})



 
  
  
  
  
       function view_center(id)
    {
      save_method = 'update';
     $('#form')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({

               
        url : "<?php echo site_url('index.php/admin/Reports/center_ajax_edit/')?>/" + id,        

        type: "GET",
               
        dataType: "JSON",
        success: function(data)
        {          
            $('#cfname').html(data.center_fname);
            $('#clname').html(data.center_lname);     
            $('#ccenter_name').html(data.center_name);     
            $('#cemail').html(data.center_email);
            $('#cmobile').html(data.center_mobile);
            $('#cgender').html(data.center_gender);
            $('#cdob').html(data.center_dob);
            $('#cpassword').html(data.center_password);
            $('#caddress').html(data.center_address);  
            $('#ccity').html(data.center_city);
            $('#cstate').html(data.center_state);
            $('#ccreated_at').html(data.center_created_at);
            $('#cpincode').html(data.center_pincode);
            
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Center Data'); // Set title to Bootstrap modal title

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

