<!DOCTYPE html>

<body oncontextmenu="return false">
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

                $("#myVideo").attr("controlsList", "nodownload");
//                $('#video').hide();
                
               $('#myVideo').bind('contextmenu', function(e) {    //prevent right click on video
                return false;
                 });
                 
               
    
          
//    document.getElementById('myVideo').addEventListener('ended',myHandler,false);
//    function myHandler(e) {
//       
//
//        
//    }
   
   
          $(document).keydown(function(e){
    if(e.which === 123){
 
       return false;
 
    }
 
});


    }
    );
   
 
    function myFunction()
    {
                var id=$("#topic_id").val();
                
        
         $.ajax({
        url : "<?php echo site_url('index.php/student/Topics/update_play_time/')?>/" + id,        
        type: "GET",
               
        dataType: "JSON",
        success: function(data)
        {        

////          alert("ajax success: "+data.status);
//       if(data.errors)
//           {
//              
//               $("#play_over").html(data.errors);
//               $('#error').show();
//                $('#video').hide(); 
//           }
//           else{
//          $("#remaining_play_time").html(data.remaining_play_time);
//         
//           }
            location.reload();

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            ('Error get data from ajax 2');
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
          
               foreach ($topics as $topic) {
                  
                   if($topic->topic_status==1)
                   {
                       $topic_ids[$topic->topic_id]=$topic->topic_video_play_time;
                    $i++;
                    
                    ?>
             <!--<input type="text" value="<?php echo $topic->topic_id;?>" name="top_id" formaction="<?php echo base_url();?>Topics/topic/<?php echo $topic->topic_id;?>">-->
             <a href="<?php echo base_url();?>student/Topics/topic/<?php echo $topic->topic_id;?>" id="topic<?php echo $topic->topic_id; ?>"><?php echo $i.'. '.$topic->topic_name;?></a>
                         
         
         
              <?php     }
               }
               }?></li>
         
       
         <?php 
         if(isset($play_time))
         {
//             print_r($play_time);           
             foreach($play_time as $play)
             {
               
                if (array_key_exists($play->topic_id,$topic_ids))
                {
                 if($play->remaining_play_time<$topic_ids[$play->topic_id] && $play->remaining_play_time>=1)
                 {?>
                     <script>
                        
                    document.getElementById("topic<?php echo $play->topic_id;?>").style.color = "#07df07";
               
                </script>
            <?php 
                }
            
                    if($play->remaining_play_time==0)
                    {?>
                <script>                        
                    document.getElementById("topic<?php echo $play->topic_id;?>").style.color = "#ff0000";
                </script>
                <?php                        
                    }
               }
         }
         }
             ?>
         
      
      </ul><br>
      </div>
     </div>
             </section>
         <!--</div>-->
         <?php if(isset($topic_id) && isset($topic_video_path) ){ ?>
      <div  id="video">
          
      <section class="col-md-8 connectedSortable">
          <div class="box box-solid bg-green-gradient"> 
         
              
         <div class="box-header">           
              <!--<div class="box-title">-->  
                   <div class="row"> 
                       
                  <div class="col-md-9" id="topic_name"><h3 class="box-title"><i class="fa fa-video-camera"></i> <?php echo $topic_name;?></h3></div>
                  <div class="col-md-offset-2">Left Views :<span id="remaining_play_time"><?php echo $remaining_play_time;?></span></div>
                  </div>
                  <!--</div>-->
             </div>
       <div class="table-responsive" id="table">
      <div class="box-footer text-black">
           
                     
                          <table    cellspacing="0" width="100%">                          
                   
        
            <tr><td >       
                    <input type="hidden" id="topic_id" value="<?php echo $topic_id;?>">
<!--           <video id="myVideo" onclick="pauseVid()" src="" width="100%" target="_blank" controls ontimeupdate="time_update(this)" />
               Your browser does not support this type of video.
                </video>-->
            <video id="myVideo"  class="video-js" controls  width="640" height="420" data-setup="{}" onended="myFunction()">
           <source src="<?php echo base_url().$topic_video_path;?>" type='video/mp4'>
            </video>
           </td></tr>
             
            
            
        <tr><td>
                <small><span id="topic_description"><?php echo $topic_description;?></span></small>
                <!--<span id="time"></span>-->
         </td></tr>
            </table>   
             
  </div>
       
      </div>
              </div>
          

          </section>
          <?php } ?>
           <?php if(isset($errors)){ ?>
      <h2 id="play_over">
          <?php echo $errors; ?>
       </h2>
             <?php } ?>
   </div>
         
         
         
         
       
       </div>  
             
   </section>
       </section>
  </div> 
     


  
  </body>
</html>

