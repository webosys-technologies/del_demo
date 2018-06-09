     <!--<div class="container-fluid">-->
  <div class="row content">
    <div class="col-sm-3 sidenav">
      <h4>TOPICS</h4>
      <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="#section1">Home</a></li>
        <li> <?php 
              if(isset($topics))
                  $i=0;
          {
//              print_r($topics);
               foreach ($topics as $topic) {
                   if($topic->topic_status==1)
                   {
                    $i++;
                   ?>
         
           <tr><td>
                  <a href="#" onclick="start_video(<?php echo $topic->topic_id;?>)" id=""><?php echo $i.'.'.$topic->topic_name;?></a><br>
                         
          </td> </tr>
          <?php }
             
               }
               }?></li>
        
      </ul><br>
         </div>
      
      <div class="col-sm-9">
      <span class=" pull-right">
        <a style="color:black" href="<?php echo base_url(); ?>student/Dashboard"><i class="fa fa-dashboard"></i> Home</a>
        <small>-</small>Topics</span>
      
      <h4><small>Video</small></h4>
      <hr>
       <video id="myVideo" onclick="pauseVid()" src="dfg.mp4" width="63%" height="50%" target="_blank" controls controlsList="nodownload">
  Your browser does not support this type of video.
                </video>
      
      </div>
  </div>
         <!--</div>-->
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         <!DOCTYPE html>


<style>


a:hover {
    color:blue;
    background:#D6DBDF;
}

</style>
  <div class="content-wrapper">
      <div class="panel-group">
    
     <div class="panel panel-default">
      
      
      <section class="content-header">
      <h1>
        Topics
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>student/Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Topics</li>
      </ol>
    </section>
         <script>
              $(document).ready(function(){
//                  window.stop();
                
                $('#video').hide();
//    console.log($("video"));
var vid = document.getElementById("myVideo"); 

function playVid() { 
    vid.play(); 
} 

 document.getElementById('myVideo').addEventListener('ended',myHandler,false);
    function myHandler(e) {
        var id=$("#topic_id").val();
        
         $.ajax({
        url : "<?php echo site_url('index.php/student/Topics/update_play_time/')?>/" + id,        
        type: "GET",
               
        dataType: "JSON",
        success: function(data)
        {        

          alert("ajax success: "+data.status);
       if(data.errors)
           {
              
               $("#play_over").html(data.errors);
               $('#error').show();
                $('#video').hide(); 
           }
           else{
          $("#remaining_play_time").html(data.remaining_play_time);
//          location.reload();
           }

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            ('Error get data from ajax 2');
        }
    });
        
    }
   

function pauseVid() { 
    vid.pause(); 
}
//    $('#myvideo').get(0).play();
    }
    );
    
    
    function start_video(id)
    {
     
      $.ajax({
        url : "<?php echo site_url('index.php/student/Topics/topic/')?>/" + id,        
        type: "GET",
               
        dataType: "JSON",
        success: function(data)
        {        

//            $('#play_over').hide(); 
           if(data.errors)
           {
               $("#play_over").html(data.errors);
               $('#error').show();
                $('#video').hide(); 
           }
           else
           {
            $("#topic_id").attr("value", data.topic['topic_id']);
            $('#error').hide();
            $("#remaining_play_time").html(data.topic['remaining_play_time']);
            $("#myVideo").attr("src", "<?php echo base_url();?>"+data.topic['topic_video_path']);
            $("#topic_name").html(data.topic['topic_name']);
            $("#topic_description").html(data.topic['topic_description']);
            $('#video').show(); 
        }

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            ('Error get data from ajax 1');
        }
    });
    }

        
             </script>
             
             
             
             
             
             
      <section class="content">

           
 
  <div class="row">
    <div class="col-md-3" style="" id="topics">
        <table>
          <?php 
              if(isset($topics))
                  $i=0;
          {
//              print_r($topics);
               foreach ($topics as $topic) {
                   if($topic->topic_status==1)
                   {
                    $i++;
                   ?>
         
           <tr><td>
                  <a href="#" onclick="start_video(<?php echo $topic->topic_id;?>)" id=""><?php echo $i.'.'.$topic->topic_name;?></a><br>
                         
          </td> </tr>
          <?php }
             
               }
               }?>
    </table>
    </div>
    <div class="col-md-9" style="" id="video">
                     
          <!--<div class="comtainer">-->           
          <div class="row">
              <div class="col-md-6"><h2 id="topic_name"></h2></div>
          </div>
          <div class="row">
              <div class="col-md-6"></div>
        <div class="col-md-6"><label style="color:green">View Left :</label><span id="remaining_play_time"></span></div>
        </div>
           <!--<div class="embed-responsive embed-responsive-4by3">-->
           <input type="text" id="topic_id" value="" hidden>
            <video id="myVideo" onclick="pauseVid()" src="" width="63%" height="50%" target="_blank" controls controlsList="nodownload">
  Your browser does not support this type of video.
                </video>
          <!--</div>--><br>
         <span id="topic_description"></span>
   
              
  </div>
       <div class="col-md-9" style="" id="error">
      <h2 id="play_over">
       </h2>
          </div>
</div>
             
   </section>
   
  </div> 
     
    </div>
    
  </div>
  

    

  
  </body>
</html>

