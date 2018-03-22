<!DOCTYPE html>


<!--<style>
video {
    width: 50%;
    height: 500px;
}
</style>-->
  <div class="content-wrapper">
      <div class="panel-group">
    
     <div class="panel panel-default">
      
      
      <section class="content-header">
      <h1>
        Videos
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>student/Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Videos</li>
      </ol>
    </section>
         <script>
              $(document).ready(function(){
//    console.log($("video"));
var vid = document.getElementById("myVideo"); 

function playVid() { 
    vid.play(); 
} 

function pauseVid() { 
    vid.pause(); 
}
//    $('#myvideo').get(0).play();
    }
    );
      
             </script>
      <section class="content">
          <h1>Playtime is Over for this topic video</h1>
             
   </section>
   
  </div> 
     
    </div>
    
  </div>
  

    

  
  </body>
</html>

