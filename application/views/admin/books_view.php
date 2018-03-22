

  <div class="content-wrapper">
      <section class="content-header">
      <h1><i class="fa fa-book"></i><strong>  Books</strong>
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>admin/Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Books</li>
      </ol>
    </section>
      <section class="content">
        <br>
        
    
    <button class="btn btn-primary" onclick="add_book()"><i class="glyphicon glyphicon-plus"></i> Add Book</button>
    <br />
    <div class="form-group" style="width:350px" >
            <label for="name">SEARCH</label>
        <input id="myName" class="form-control" type="text" placeholder="Search..." >
        </div>
    <div class="table-responsive">
    <table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
        <tr bgcolor="#338cbf" style="color:#fff" >
					<th>ID</th>
					<th>BOOK NAME</th>
					<th>COURSE NAME</th>
					<th>PRICE</th>
          <th>STATUS</th>

          <th style="width:125px;">ACTION
          </p></th>
        </tr>
      </thead>
      <tbody id="myTable">
				<?php foreach($book as $res){?>
				     <tr>
                                        <td><?php echo $res->book_id;?></td>
                                        <td><?php echo $res->book_name;?></td>
                                        <td><?php echo $res->course_name;?></td>
                                       <td><?php echo $res->book_price;?></td>
                                       <td>
                                           <?php 
                                       if($res->book_status==1)
                                       {
                                           echo "Active";
                                       }
                                       else 
                                       {
                                           echo "Not Active";
                                       }
                                       ?></td>
                                       <td>
									<button class="btn btn-success" onclick="edit_book(<?php echo $res->book_id;?>)"><i class="glyphicon glyphicon-pencil"></i></button>
									<button class="btn btn-danger" onclick="delete_book(<?php echo $res->book_id;?>)"><i class="glyphicon glyphicon-remove"></i></button>


								</td>
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

    function add_book()
    {
      save_method = 'add';
      $('#form')[0].reset(); // reset form on modals
      $('#modal_form').modal('show'); // show bootstrap modal
      $('.modal-title').text('Add Course'); // Set Title to Bootstrap modal title
    }

    function edit_book(id)
    {
      save_method = 'update';
      $('#form')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('index.php/admin/Books/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="id"]').val(data.book_id);
            $('[name="course_id"]').val(data.course_id);
            $('[name="name"]').val(data.book_name);
            $('[name="price"]').val(data.book_price);
            $('[name="status"]').val(data.book_status);
            
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Course'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax 1');
        }
    });
    }



    function save()
    {
      var url;
      if(save_method == 'add')
      {
          url = "<?php echo site_url('index.php/admin/Books/book_add')?>";
      }
      else
      {
        url = "<?php echo site_url('index.php/admin/Books/book_update')?>";
      }

       // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
            data: $('#form').serialize(),
           // dataType: "JSON",
            success: function(data)
            {
              alert('Data added successfully..!!');
               //if success close modal and reload ajax table
               $('#modal_form').modal('hide');
                location.reload();// for reload a page
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
    }

    function delete_book(id)
    {
      if(confirm('Are you sure delete this data?'))
      {
        // ajax delete data from database
          $.ajax({
            url : "<?php echo site_url('index.php/admin/Books/book_delete')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                alert('Record deleted successfully..');  
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
  <div class="modal fade" id="modal_form" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="color:#fff; background-color:#338cbf">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <center><h3 class="modal-title">Course Form</h3></center>
      </div>
      <div class="modal-body form">
        <form action="#" name="form_course" id="form" class="form-horizontal">
          <input type="hidden" value="" name="id"/>
          <div class="form-body">
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
              <label class="control-label col-md-3">Book Name</label>
              <div class="col-md-9">
                <input name="name" placeholder="Book Name" class="form-control" type="text">
              </div>
            </div>
            
            <div class="form-group">
              <label class="control-label col-md-3">Books Price</label>
              <div class="col-md-9">
                <input name="price" placeholder="Book Price" class="form-control" type="text">
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
          </div>
          <div class="modal-footer">
            <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  <!-- End Bootstrap modal -->
