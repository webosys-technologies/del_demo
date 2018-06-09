<!Doctype html>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-credit-card"></i><strong> Payment </strong>
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb" >
        <li><a href="<?php echo base_url(); ?>center/Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Payment</li>
      </ol>
    </section>
    <br>
    <section class="content">

    <div class="form-group" style="width:350px" >
            <label for="name">SEARCH</label>
        <input id="myName" class="form-control" type="text" placeholder="Search..." >
        </div>

    <form id="table" name="table" action="<?php echo base_url(); ?>center/Orders/payment" method="post">
    
    <div class="table-responsive">
    <table id="table_id" class="table table-bordered" cellspacing="0" width="100%">
      <thead class="thead-dark">
        <tr bgcolor="#338cbf" style="color:#fff">
          <th>ID</th>
          <th>ORDER ID</th>
          <th>CENTER</th>
          <th>TRANSCATION ID</th>
          <th>MERCHANT REFRENCE</th>
          <th>BANK REF No</th>
          <th>AMOUNT</th>
          <th>PAYMENT AT</th>
          <th>STATUS</th>

        </tr>
      </thead>
      <tbody id="myTable">
        <?php
          if (isset($payment)) {
            
          
         foreach($payment as $res){ ?>
             <tr>
                            <td><?php echo $res->p_id;?></td>
                                        <td><?php echo $res->order_id ?></td>
                                        <td><?php echo $res->center_name; ?></td>
                                        <td><?php echo $res->payment_id;?></td>
                                       <td><?php echo $res->merchant_order_id;?></td>
                                       <td><?php echo $res->bank_ref_num;?></td>
                                       <td><?php echo $res->amount;?></td>
                                       <td><?php echo $res->payment_at;?></td>
                                       <td><?php echo $res->payment_status;?></td>


                                      
              </tr>
             <?php }}?>



      </tbody>

    </table>
    </div>
    
</form>
  </div>
</section>

<script type="text/javascript">

   $(document).ready( function () {
      
      
      $('#table_id').DataTable();
  } );

    $("#myName").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
  </script>