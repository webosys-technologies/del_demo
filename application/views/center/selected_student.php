
<style type="text/css">

  .modal fade{
    display: block !important;
}

.modal-dialog{
  width: 600px;
      overflow-y: initial !important
}

.modal-body{
  height: 330px;
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
.form-control1
{
    
    height: 34px;
    padding: 6px 3px;
    font-size: 13px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 4px;
}
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i><strong>Student Management</strong>
        <small>Control Panel</small>
      </h1>
      <ol class="breadcrumb" >
        <li><a href="<?php echo base_url(); ?>center/Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li >Student Management</li>
      </ol>
    </section><br>
    <form id="table" name="table" action="<?php echo base_url(); ?>center/Orders/payment" method="post">
    <section class="content-header">
    <div class="row">
    
               <div class="col-md-6 col-md-offset-3">
        <!--  <?php
        $this->load->helper('form');
        if($success)
        {
            ?>
            
        <div class="alert alert-success alert-dismissible" data-auto-dismiss="5000">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success!</strong> <?php echo $success; ?> 
  </div>
        <?php }?>
             
              <?php
        if($error)
        {
            ?>           
        <div class="alert alert-danger alert-dismissible" data-auto-dismiss="5000">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Error!</strong> <?php echo $error; ?> 
  </div>
        <?php }?>     -->
       
        </div>
    </div>
    <br>
    
    
   <div id="print">
    <div class="table-responsive">
        
    <table id="pay" class="table table-bordered" cellspacing="0" width="100%">
        
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
          </th>
        </tr>
      </thead>
      <tbody id="myTable">
          
        <?php
          if (isset($student_data)) {
            
          
         foreach($student_data as $res){
          $status=$res->student_status; ?>
          <tr class="tagWrapper" <?php if($status != 1) { ?> class="bg-danger" <?php } ?> >
                            <td><?php echo $res->student_id;?></td>
                                        <td><?php echo $res->student_fname.' '. $res->student_lname; ?></td>
                                        <td><?php echo $res->course_name;?></td>
                                       <td><?php echo $res->student_mobile;?></td>
                                       <td><?php echo $res->student_created_at;?></td>
                                       <td><?php echo 'RS.'. $res->course_fees; ?></td>
                                       <td><?php echo 'RS.'. $res->book_price ; ?></td>
                                       <td><?php $total=$res->course_fees+$res->book_price;
                                       echo $total; ?> </td>

                                       <td>
                  <button type="button" class="btn btn-danger" onclick="code1()"  data-dismiss="" ><i class="glyphicon glyphicon-trash"></i></button>


                </td>
              </tr>
             <?php 
                $sum[]=$total;
                $crs[]=$res->course_fees;

           }}?>



      </tbody>

    </table>
    </div>
        </div>

         <?php 
    $amt=array();
    $sid=array();
    foreach ($student_data as $key) {
      $sid[]=$key->student_id;
    } 
    $amt=array_sum($sum);
    $student=count($sid);
    $course_amount=array_sum($crs);
        $this->load->helper('form');        
    
        $success = $this->session->flashdata('success');
        $error = $this->session->flashdata('error');


    ?>

    <input type="hidden" name="student"  value="<?php echo $student; ?>">
    <input type="hidden" name="course" value="<?php echo $course_amount ; ?>">
    <row>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="row">&nbsp;</div>
            <div class="row">&nbsp;</div>
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-12"></div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                    <input class="form-control1" type="text" placeholder="Enter Coupen Code" name="coupon_code"  id="coupon_code">
                     <button type="button" name="apply"  id="apply" value="Apply" class="btn btn-info">Apply</button>          
                     </div>
                     <font id="msg"></font>
                </div> 
                <div class="col-md-3 col-sm-3 col-xs-12"></div>
            </div>
            
            <div class="row">
                &nbsp;
            </div>
            
            <div class="row">
                &nbsp;
            </div>
            
            <a href="<?php echo base_url(); ?>center/Student" class="btn btn-primary" >Previous</a>
       

        </div>
        <!--Section Left end-->
        
        <!--Section right start-->
        
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-12"></div>  
                 <div class="col-md-3 col-sm-3 col-xs-12">Total Amount</div>  
                 <div class="col-md-3 col-sm-3 col-xs-12"><?php echo "RS.".$amt; ?></div>
                 <input class="form-control" type="hidden" value="<?php echo $amt ; ?>" name="amount" readonly>

            </div>
            
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-12"></div>  
                 <div class="col-md-3 col-sm-3 col-xs-12">GST</div>  
                 <div class="col-md-3 col-sm-3 col-xs-12"><?php echo "RS.0"; ?></div>
                 <input class="form-control" type="hidden" value="<?php echo "0"; ?>" name="gst" readonly>

            </div>
            
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-12"></div>  
                 <div class="col-md-3 col-sm-3 col-xs-12"> Offer Discount</div>  
                 <div class="col-md-3 col-sm-3 col-xs-12"><span id="discount"><?php  echo "- RS.0"; ?></span>
                 <input class="form-control" type="hidden" value="<?php echo "0"; ?>" name="discount" readonly>
                 </div>
            </div>
                      
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-12"></div>  
                <div class="col-md-3 col-sm-3 col-xs-12" style="border-top:1px solid #DBD8D7; "> <label style="margin-top: 10px;" class="form-label">Net Payable Amount</label></div>  
                 <div class="col-md-3 col-sm-3 col-xs-12" style="border-top:1px solid #DBD8D7;">
                     <div style="margin-top: 10px;">
                         <label><span id="payable_amount"><?php echo "RS.".$amt; ?></span></label>
                        <input class="form-control" type="hidden" name="payable_amount" value="<?=$amt; ?>" readonly>
                    </div>
                 </div>
            </div>
            
            <div class="row">
                &nbsp;
            </div>
            
            
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-12"></div>  
                <div class="col-md-3 col-sm-3 col-xs-12"> <button type="button" class="btn btn-warning" id="payment" onclick="demo_view()" ><i class="glyphicon glyphicon-plus"></i>Proceed to Payment</button></div>  
                 <div class="col-md-3 col-sm-3 col-xs-12"></div>
            </div>
            
        </div>
    </row>
    
    

   
      
    
</section>
</form>
    
    
    
  </div>




  <script type="text/javascript">
  $(document).ready( function () {   

  $('#apply').click(function(){
    
     var textboxvalue = $('input[name=coupon_code]').val();
     var amount = $('input[name=course]').val();
     var student = $('input[name=student]').val();
     var total_amount = $('input[name=amount]').val();

        $.ajax(
        {
            type: "POST",
            url: '<?php echo site_url('index.php/center/Orders/get_coupon')?>',
            data: {txt1: textboxvalue,amt: amount,std: student},
            dataType : "JSON",
            success: function(data)
            {
               
      
              if(data.msg)
              {
                $("#msg").html(data.msg);
                $("#msg").attr('color','red');

              }else{
              var amt = total_amount-data.discount;             

             $('#discount').html('-RS.'+data.discount);
            $('#payable_amount').html('RS.'+amt);
            $('[name="discount"]').val(data.discount);
            $('[name="payable_amount"]').val(amt);
                $("#msg").html(data.success);
                $("#msg").attr('color','green');
              

          }
          

            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error  data in coupon');
            }
        });



  });       
      
  } );

 function demo_view()
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
  
  
  

</aside>


