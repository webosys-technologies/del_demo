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
        Exam Review
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>student/Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Reports</li>
      </ol>
   
    
      <!--<section class="content" >-->

         <script>
              $(document).ready(function(){

                
                $('#video').hide();
                
               $('#myVideo').bind('contextmenu', function(e) {    //prevent right click on video
                return false;
                 });

//   window.onbeforeunload = function() {
//        return "Dude, are you sure you want to leave? Think of the kittens!";  //show dialog before reload and close
//    }
    
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
    
    
   
    
    function show_review(id)
    { $("#test_review").prop('hidden',true);
      $('#dynamic_field').html("");
            $('#out_of_mark').html("");
            $('#total_mark').html("");
            
      $.ajax({
        url : "<?php echo site_url('index.php/student/Exam_Reviews/show_review/')?>/" + id,        
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
                               $('#tst_review').attr("onclick", 'exm_review('+data.exam_id+')');
                              
                             

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            ('Error get data from ajax 1');
        }
    });
    }


  function exm_review(id)
    {
        $("#test_review").prop('hidden',true);
           $('#dynamic_field').html("");
            $('#out_of_mark').html("");
            $('#total_mark').html("");
      var url;
      
        url = "<?php echo site_url('index.php/student/Exam_Reviews/test_review/')?>"+id;
      

       
          $.ajax({
            url : url,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {

               
               var count=0;
               var total_mark=0;
                             
               $.each(data,function(i,row)
               
               {
//                  alert(row.mark);
                   count++;
                   total_mark=total_mark+parseInt(row.mark);
                   if(row.mark=="1")
                   {
                     $('#dynamic_field').append(             
               '<div class="row"><div class="col-md-7"><label>Q<span>'+ count +'</span>) <span>'+ row.question_name +'</span></label><br/>a) <span>'+ row.question_option_a +'</span><br/> b) <span>'+ row.question_option_b +'</span><br/>c) <span>'+ row.question_option_c +'</span><br/>d) <span>'+ row.question_option_d +'</span></div><label>Correct answer : </label><span style="color:#32CD32">'+ row.correct_ans +'</span><br/><label>Given answer : </label><span style="color:#32CD32">'+ row.given_ans +'</span><br/><label>Mark : </label><span style="color:#32CD32">'+ row.mark +'</span></div><br/><br/>'      
                    );
                   }
                   else
                   {
                      $('#dynamic_field').append(             
               '<div class="row"><div class="col-md-7"><label>Q<span>'+ count +'</span>) <span>'+ row.question_name +'</span></label><br/>a) <span>'+ row.question_option_a +'</span><br/> b) <span>'+ row.question_option_b +'</span><br/>c) <span>'+ row.question_option_c +'</span><br/>d) <span>'+ row.question_option_d +'</span></div><label>Correct answer : </label><span style="color:#32CD32">'+ row.correct_ans +'</span><br/><label>Given answer : </label><span style="color:red">'+ row.given_ans +'</span><br/><label>Mark : </label><span style="color:red">'+ row.mark +'</span></div><br/><br/>'      
                    ); 
                   }
                   
               }
           );              
                              
                              $('#out_of_mark').html(count);
                              $('#total_mark').html(total_mark);
                              $("#test_review").show();
                              

            
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error.......! ');
            }
        });
        
    }
        
             </script>
         
             <div class="row content">
             <section class="col-md-4 sidenav" >
      
                 
                 <div class="box box-solid bg-green-gradient"   >
                 
                  <div class="box-header">
              <i class="fa fa-book"></i>

              <h3 class="box-title">Exams</h3>
             </div>
                 
                 
                 
                 
           <div class="box-footer text-black" id="left">       
             
      <ul class="nav nav-pills nav-stacked" >         
         <li> <?php 
              if(isset($exams))
                 
          {
                   $i=0;
               foreach ($exams as $exam) {
                   if($exam->exam_status==1)
                   {
                   
                   ?>
         
          <a href="#" onclick="show_review(<?php echo $exam->exam_id;?>)" id=""><div class="row"><div class="col-md-7"><?php if($i==0){echo $exam->exam_type;}else{echo $exam->exam_type." ".$i;}?></div><div class="col-md-5"><?php echo $exam->exam_date; ?></div></div></a>
                         
         
          <?php 
          if($i==0)
          {?>
          <script>
              show_review(<?php echo $exam->exam_id;?>);
              </script>
             <?php 
          }
          
          $i++;}
             
               }
               }?></li>  
      
      </ul>              
      </div>
     </div>
             </section>
         <!--</div>-->
      <div  id="exam_review">
      <section class="col-md-8 connectedSortable">
          <div class="box box-solid bg-green-gradient"> 
         
         <div class="box-header">
              <i class="glyphicon glyphicon-film"></i>

              <h3 class="box-title">Exam Reviews</h3>
             </div>
       
      <div class="box-footer text-black">
      <div class="table-responsive">
              <table id="result" class="table table-bordered" cellspacing="0" width="100%">
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
         <div class="pull-right"> <label><a href="#" id="tst_review">Exam Review</a></label></div>
          
          <div id="test_review" hidden="true">
           <div class="row content">
             <section class="col-md-12 connectedSortable">
             <div class="row"><div class="col-md-5"></div><div class="col-md-5"> <h2>Exam Review</h2> </div></div>
        <div id="dynamic_field"></div>
       <label>Total Marks:</label><span id="total_mark"></span> Out of <span id="out_of_mark"></span>
       
             
       </section>
             </div>
              </div>
       </div>
      
              </div>
          </section>
   </div>
        

       </div>      
           
   
             
   </section>
   
  </div> 
     


  
  </body>
</html>

