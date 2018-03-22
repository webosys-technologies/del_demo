<!DOCTYPE html>


<style>


a:hover {
    color:blue;
    background:#D6DBDF;
}

@media (min-width: 768px){
  #left {
    position: relative;
    top: 0px;
    bottom: 0;
    left: 0;
    height:75%;
    width: 100%;
    overflow-y: scroll; 
  }
}

</style>
  <div  class="content-wrapper">
        <section class="content-header">
      <h1>
        Topics
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>student/Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Topics</li>
      </ol>
      
      <section class="content" >

         <script>
              $(document).ready(function(){

                
                $('#video').hide();
                
               $('#myVideo').bind('contextmenu', function(e) {    //prevent right click on video
                return false;
                 });

   window.onbeforeunload = function() {
        return "Dude, are you sure you want to leave? Think of the kittens!";  //show dialog before reload and close
    }
    
    var vid = document.getElementById("myVideo");
vid.ontimeupdate = function() {myFunction1()};
function myFunction1() {
 
    document.getElementById("time").innerHTML = vid.currentTime;
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

//          alert("ajax success: "+data.status);
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
//               alert(data.topic['topic_video_path']);
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
         
             <div class="row content">
             <section class="col-md-4 sidenav" >
      
                 
                 <div class="box box-solid bg-green-gradient"   >
                 
                  <div class="box-header">
              <i class="fa fa-book"></i>

              <h3 class="box-title">Topics</h3>
             </div>
                 
                 
                 
                 
           <div class="box-footer text-black" id="left">       
                 
      <ul class="nav nav-pills nav-stacked" >
         
         <li id="topic_font"> <?php 
              if(isset($topics))
                  $i=0;
          {
//              print_r($topics);
               foreach ($topics as $topic) {
                   if($topic->topic_status==1)
                   {
                    $i++;
                   ?>
         
           <a href="#" onclick="start_video(<?php echo $topic->topic_id;?>)" id=""><?php echo $i.'. '.$topic->topic_name;?></a>
                         
         
          <?php }
             
               }
               }?></li>
         
      
      </ul><br>
      </div>
     </div>
             </section>
         <!--</div>-->
      <div  id="video">
      <section class="col-md-8 connectedSortable">
          <div class="box box-solid bg-green-gradient"> 
         
         <div class="box-header">
              <i class="glyphicon glyphicon-film"></i>

              <h3 class="box-title">Video</h3>
             </div>
       <div class="table-responsive" id="table">
      <div class="box-footer text-black">
           
                     
                          <table    cellspacing="0" width="100%"> 
                              <tr><td><h2 id="topic_name"></h2></td></tr>
                   
        <tr><td><label style="color:green">View Left :</label><span id="remaining_play_time"></span></td></tr>
            <tr><td >       
           <input type="text" id="topic_id" value="" hidden>
           <video id="myVideo" onclick="pauseVid()" src="" width="100%" target="_blank" controls ontimeupdate="time_update(this)" controlsList="nodownload" />
               Your browser does not support this type of video.
                </video>
           </td></tr>
             
            
            
        <tr><td>
                <small><span id="topic_description"></span></small>
                <!--<span id="time"></span>-->
         </td></tr>
            </table>   
             
  </div>
       
      </div>
              </div>
          

          </section>
   </div>
         <div class="" style="" id="error">
      <h2 id="play_over">
       </h2>
          </div>
         
         
       
       </div>  
             
          
             
             
   </section>
       </section>
  </div> 
     


  
  </body>
</html>

