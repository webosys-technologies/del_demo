
<style type="text/css">

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
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="glyphicon glyphicon-facetime-video"></i><strong> Videos </strong>
        <small>View <?php  ?></small>
      </h1>
      <ol class="breadcrumb" >
        <li><a href="<?php echo base_url(); ?>admin/Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li >Video</li>
      </ol>
    </section>
    <section class="content">
        <div class="form-group" style="width:350px" >
            <label for="name">SEARCH</label>
        <input id="search_vid" class="form-control" type="text" placeholder="Search..." >
        </div>
        <div class="row" id="search_area">
              
            <?php if (isset($topics))
            {
               $i=0;
               foreach($topics as $top)
               {
                   
                   if($top->topic_status==1)
                   {
                       $i++;
                   ?>
                <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <?php
          $available=file_exists($top->topic_video_path);
          if($available==1)
          {
          ?>
         
          <video id="myVideo" src="<?php echo base_url(); echo $top->topic_video_path; ?>" width="100%" target="_blank" controls ontimeupdate="time_update(this)" controlsList="nodownload">
               Your browser does not support this type of video.
                </video>
          <div class="small-box bg-aqua">
           
              <span class="small-box-footer"><?php echo substr($top->topic_name,0,35);?></span>
              <center><label><?php echo substr($top->course_name,0,35);?></label></center>
          </div>
                </tbody>
          <?php } else{  ?>
          <label  style="background-color:red">Video is not Available.</label>
          <div class="small-box bg-aqua">
           
              <span class="small-box-footer"><?php echo substr($top->topic_name,0,35);?></span>
              <center><label><?php echo substr($top->course_name,0,35);?></label></center>
          </div>
          <?php } ?>
        </div>  
               <?php
               if($i%4==0)
               {
                   echo "<hr>";
               }
                   }
               }
            }
                ?>
               
            </div>
    </section>
    </div>   
  

<script type="text/javascript">
  $(document).ready( function () {
      
      
      
      $("#search_vid").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#search_area div").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
  } );

  
  
  </script>

     

  