
    
<script type="text/javascript">   
     $(document).ready( function () {
      $('#start_exam').hide();
          
        
//        $("#passcode").keyup(function(){
//             $("#submit").prop('disabled', false);
//           
//         });
        
        

 $( window ).unload(function() {
  return "Bye now!";
});      
//ask do you want close the tab.        
    
      
       $("#optiona,#optionb,#optionc,#optiond").click(function(){
            $("#next").prop('disabled', false);
         });
         
                     
      
      
     });
     
     function stop_rightclick()
     {
          $(window).bind('contextmenu', function(e) {    //prevent right click on video
                return false;
                 });
     }
     
 
     
     var i=0;
     var btn;
     var start_exm;
     var tim;
     var submit;
       
        var min = 49;
        var sec = 60;
        var f = new Date();
        function f1() {
             clearInterval(tim);
            f2();
          //  document.getElementById("starttime").innerHTML = "Your started your Exam at " + f.getHours() + ":" + f.getMinutes();
             
          
        }
        function f2() { 
            //
            if (parseInt(sec) > 0) {
                sec = parseInt(sec) - 1;
                document.getElementById("showtime").innerHTML = 'Time :<b style="color:#32CD32">'+min+'</b> Minutes ,<b style="color:#32CD32">' + sec+'</b> Seconds';
                $('#timestamp').val(min+":"+sec);
                tim = setTimeout("f2()", 1000);
            }
            else {
                if (parseInt(sec) == 0) {
                   
                    if (parseInt(min) >= 1) {
                     sec = 60;
                     min = parseInt(min) - 1;
                     
                     f2();
                       
                    }
                    else {
                     clearTimeout(tim);
                     result(true);
                
                       
                    }
                }
               
            }
        }
        
        
        function stop_keyboard()
        {
               $(document) .keydown(function(event){    //stop keyboard for refreshing.
                      event.preventDefault();
                       event.stopPropagation();
                         });
        }
        
        
        function show_passcode() {
    var x = document.getElementById("passcode");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}

   function solved_question()
    {
        

      var url;
      
        url = "<?php echo site_url('index.php/student/Exams/solved_question')?>";
      

       // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
//                alert(data.status);
//                if(data.status)
                {
        for(var m=1;m<=3;m++)
        {
       
      }              
                        var num=1 ;

                    for(var btn=1;btn<=data.count;btn++)
                    {

                    if(btn<=10 && btn>0)
                    {
                  $("#row_1").append('<td><button type="button"  onclick="gen_btn('+btn+')" class="btn btn-default" id="btn_'+btn +'">'+'Q.'+btn+'</button></td>' );
                    }
                     if(btn<=20 && btn>10)
                    {
    $("#row_2").append('<td><button type="button"  onclick="gen_btn('+btn+')" class="btn btn-default" id="btn_'+ btn +'">'+'Q.'+btn+'</button></td>' );
    }
    if(btn<=30 && btn>20)            
    {
    $("#row_3").append('<td><button type="button"  onclick="gen_btn('+btn+')" class="btn btn-default" id="btn_'+ btn +'">'+'Q.'+btn+'</button></td>' );
    }
    if(btn<=40 && btn>30)
    {
    $("#row_4").append('<td><button type="button"  onclick="gen_btn('+btn+')" class="btn btn-default" id="btn_'+ btn +'">'+'Q.'+btn+'</button></td>' );
    }
    if(btn<=50 && btn>40)
    {
    $("#row_5").append('<td><button type="button"  onclick="gen_btn('+btn+')" class="btn btn-default" id="btn_'+ btn +'">'+'Q.'+btn+'</button></td>' );
    }                        
                    }
                               
                }
              

         
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error.......! ');
            }
        });
    }
     
     
     
   
   function result(submit)
    {
        if(submit)
        {
            r=true;
        }
        else
        {
        var r = confirm("Are you sure want to finish the exam...!");
        }
        if(r==true)
        {
        var data = new FormData(document.getElementById("form"));

      var url;
      
        url = "<?php echo site_url('index.php/student/Exams/submit_exam')?>";
      

       // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
            async: false,
            processData: false,
            contentType: false,            
            data: data,
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
                               $('#total_questions').html(data.total_questions);
                               $('#marks_obtain').html(data.exam_result['total_marks']);
                               $('#out_of').html(data.total_questions);
                               $('#correct_ans').html(data.exam_result['correct_ans']);
                               $('#wrong_ans').html(data.exam_result['wrong_ans']);  
                               $("#review").attr("onclick", 'test_review('+ data.test_review_id +')');
                               
                               $("#show_button").hide();
                              $("#start_exam").hide();
                              $("#exam_result").show();
                              if(data.result=="pass")
                              {
                              $("#congratulation").show();
                              }

            
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error.......! ');
            }
        });
    }
    }
    
function start_exam()
{
    start_exm="start_exam";
    var passcode = document.getElementById("passcode").value;
    
    if(passcode){
       
    get_question(passcode);
    }
    else{
        alert("Please Enter Exam Passcode");
    }
}
var p;
  function gen_btn(p)
{   
//    alert("gen");
    btn="gen_btn";
    $('#press_btn').val(btn);
    $('#press_btn_qno').val(p);
    get_question();
}
function prev_btn(p)
{  
//    alert(p);
    btn="prev";
    $('#press_btn').val(btn);
    get_question(p);
}
    function next_btn(p)
{   
//    alert(p);
    btn="next";
    $('#press_btn').val(btn);
    get_question(p);
}

function exit_window()
{
    window.top.close();
}


function get_question(id)
    {

         var data = new FormData(document.getElementById("form"));
         var url;
         if(start_exm=="start_exam")
         {
             start_exm="null";
             url="<?php echo site_url('index.php/student/Exams/start_exam/')?>/"+id;
         }
         else
         {
            
             url="<?php echo site_url('index.php/student/Exams/get_question/')?>/"+id;
         }
                     
                   
      //Ajax Load data from ajax
      $.ajax({
        url : url,        
        type: "POST",
         async: false,
         processData: false,
         contentType: false,            
         data:data,    
        dataType: "JSON",
        success: function(data)
        {      

if(data.passcode_error)
{
    alert(data.passcode_error)
    }
    else
    {
                       if(data.start_exam=="success")
                       {
                            f1();
                           solved_question();
                       }
                       $('#press_btn_qno').val("");
                       $('#exams').hide();
                       $('#start_exam').show();
                       $('#show_button').show();
             
                  if(data.question['qno']=='1')
                  {
                      $("#prev_div").hide();
                      $("#next_div").show();
                      
                  }
                  else
                  {
                      $("#prev_div").show();
                  }
                  if(data.question['qno']==data.no_of_que)
                  {
                      $("#next_div").hide();
                      $("#prev_div").show();
                  }
                  else
                  {
                  $("#next_div").show();
                  }
                  
                 $("#next").attr("onclick", 'next_btn()');
                 $("#prev").attr("onclick", 'prev_btn()');
                 $("#question_id").val(data.question['question_id']);
                  $("#question_num").val(data.question['qno']);
           

            $('#question').html(data.question['question_name']);
            $('#option_a').html(data.question['question_option_a']);
            $('#option_b').html(data.question['question_option_b']);
            $('#option_c').html(data.question['question_option_c']);
            $('#option_d').html(data.question['question_option_d']);
             $('#qno').html(data.question['qno']);
            $('input:radio[id=optiona]').val(data.question['question_option_a']).prop('checked',false);
            $('input:radio[id=optionb]').val(data.question['question_option_b']).prop('checked',false);
            $('input:radio[id=optionc]').val(data.question['question_option_c']).prop('checked',false);
            $('input:radio[id=optiond]').val(data.question['question_option_d']).prop('checked',false);
            
            
             var solved=data.no_of_que-1;
             var qno=data.question['qno'];
           if(data.solved_question)
           {
           for(var n=0;n<=solved;n++)
           {
               if(data.solved_question[n])
               {
                  
                   $("#btn_"+data.solved_question[n]).attr("class","btn btn-success");  //change given answer button color
               } 
              
            }
           }
          
          
          if(data.given_ans!==null)
          {
             
                     //checked radio previous given answer.                              
            if($("#optiona").val()== data.given_ans[qno])    
            {
                $("#optiona").prop('checked',true);
            }
                if($("#optionb").val()== data.given_ans[qno])
                {
                    $("#optionb").prop('checked',true);
                }
                    if($("#optionc").val()== data.given_ans[qno])
                    {
                         $("#optionc").prop('checked',true);
                    }
                        if($("#optiond").val()== data.given_ans[qno])
                        {
                             $("#optiond").prop('checked',true);
                        }
                    }
                            
        

    }
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error.....!');
        }
    });
    }
    
    function test_review(id)
    {
              
      var url;
      
        url = "<?php echo site_url('index.php/student/Exams/test_review/')?>"+id;
      

       // ajax adding data to database
          $.ajax({
            url : url,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
//                           alert("test review");
               
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
               '<div class="row"><div class="col-md-6"><label>Q<span>'+ count +'</span>) <span>'+ row.question_name +'</span></label><br/>a) <span>'+ row.question_option_a +'</span><br/> b) <span>'+ row.question_option_b +'</span><br/>c) <span>'+ row.question_option_c +'</span><br/>d) <span>'+ row.question_option_d +'</span></div><label>Correct answer : </label><span style="color:#32CD32">'+ row.correct_ans +'</span><br/><label>Given answer : </label><span style="color:#32CD32">'+ row.given_ans +'</span><br/><label>Mark : </label><span style="color:#32CD32">'+ row.mark +'</span></div><br/><br/>'      
                    );
                   }
                   else
                   {
                      $('#dynamic_field').append(             
               '<div class="row"><div class="col-md-6"><label>Q<span>'+ count +'</span>) <span>'+ row.question_name +'</span></label><br/>a) <span>'+ row.question_option_a +'</span><br/> b) <span>'+ row.question_option_b +'</span><br/>c) <span>'+ row.question_option_c +'</span><br/>d) <span>'+ row.question_option_d +'</span></div><label>Correct answer : </label><span style="color:#32CD32">'+ row.correct_ans +'</span><br/><label>Given answer : </label><span style="color:red">'+ row.given_ans +'</span><br/><label>Mark : </label><span style="color:red">'+ row.mark +'</span></div><br/><br/>'      
                    ); 
                   }
                   
               }
           );              
                              $("#congratulation").hide();
                              $("#exam_result").hide();
                              $("#test_review").show();
                              $('#out_of_mark').html(count);
                              $('#total_mark').html(total_mark);
                              

            
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error.......! ');
            }
        });
        
    }
    
   </script>
<div style="background-color:white" class="content-wrapper">
<!--<div class="panel-group">    
     <div class="panel panel-default">-->
      <section class="content-header">
      <h1>
        Exam
        <small>Exam panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>student/Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">exam</li>
      </ol>
      </section>
                 
         <hr>
          
          <div class="row" id="congratulation" hidden >
                 
                   <div class="col-md-3"></div>
                   <div class="col-md-6">
                 
                  <img src="<?php echo base_url();?>/profile_pic/congratulation.gif" alt="Flowers">
             
                   </div>
                   </div>
             <div id="exam_result" hidden>
                          
              <div class="row content">
                  <section class="col-md-3 connectedSortable"></section>
              <section class="col-md-6 connectedSortable">
              <!--<h2>Test Result</h2>-->
             
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
              <div class="pull-right">
                  <label> <a href="#" id="review">Review</a></label>
              </div>
              </section>
             </div>
              </div>
         
         <div id="test_review" hidden>
           <div class="row content">
             <section class="col-md-12 connectedSortable">
             <div class="row"><div class="col-md-5"></div><div class="col-md-5"> <h2>Test Review</h2> </div></div>
        <div id="dynamic_field"></div>
       <label>Total Marks:</label><span id="total_mark"></span> Out of <span id="out_of_mark"></span>
       
              <div class="pull-right">
                  <button class="btn btn-warning" onclick="exit_window()">Exit</button>
              </div>
       </section>
             </div>
              </div>
        
     <section class="content" >
          <form action="#" id="start_exam_form" >
        <div id="exams">
        
            <div class="row">
        
            <div class="form-group">
                <div class="col-md-6">
             <label>Enter Examination Passcode 
             <input type="password" name="passcode" id="passcode" class="form-control" required><span class="text-danger" id="passcode_error"></span>
              </label>&nbsp;
             <button type="button" id="submit" onclick="start_exam()"  class="btn btn-primary" >START EXAM</button>
                </div>
                                          
                </div>
                                   
            </div>
            <input type="checkbox" onclick="show_passcode()">Show Passcode
            <br><br>
            <label> <u style="color:#32CD32">Read The Instruction Carefully:</u></label>
            <ul><li>Total number of questions : <b>10</b>.</li>
                    <li> Time alloted : <b>10</b> minutes.</li>
                    <li>Each question carry <b>1</b> mark.</li>
                    <li>Don't start Exam again.</li>
                    <li>DO NOT refresh the page.</li>
                    <li> All the best :-).</li></ul>
      
          </div>
          </form>
         <div class="row content">
            <section class="col-md-12 connectedSortable">
         <div id="start_exam" hidden>
        <!--<form action="#" id="form" >-->
        <div class="row">
            <div class="col-md-9">
            <?php $attributes = array("id" => "form");
				echo form_open("#", $attributes);?>
          
       <?php 
       {
           $i=1;
           
          
       {
           ?>
        <label>Q<span id='qno'></span>) <span id="question"></span></label><br/>
        <!--<label class="custom-control custom-radio">-->
       
        <input type="radio" id="optiona" name="option" value=""> a)<span id="option_a"></span><br/>
        <input type="radio" id="optionb" name="option" value=""> b)<span id="option_b"></span><br/>
        <input type="radio" id="optionc" name="option" value=""> c)<span id="option_c"></span><br/>
        <input type="radio" id="optiond" name="option" value=""> d)<span id="option_d"></span><br/>
       <!--</label>-->
        <input name="question_id" id="question_id" value="" hidden>
        <input name="question_num" id="question_num" value="" hidden>
        <input name="press_btn" id="press_btn" value="" hidden>
       <input name="press_btn_qno" id="press_btn_qno" value="" hidden>
       <input name="timestamp" id="timestamp" value="" hidden>
       </div>
            <div class="col-md-3">
             <div id="showtime"></div>   
            </div>
            </div>
        
     
       <br/><br/>
       <div class="row">
           <div class="col-md-5">
              <table cellspacing="4" cellpadding="4"> 
                  <tr> <td><div id="prev_div"> <button name="prev" type="button" id="prev"  value="prev"  onclick="" class="btn btn-success" ><span> << Prev </span></button></div></td>
                   <td><div id="next_div"><button name="next" type="button" id="next"  value="next"  onclick="" class="btn btn-success"><span>Next >></span></button></div></td></tr>
             </table>
       </div>
           <div class="col-md-5">
             <!--<a href="#show_button" id="solved_question" name="solved_question" value=""  onclick="solved_question()" class="btn btn-default" data-toggle="collapse"><span id="next_label">Solved Questions</span></a>--> 
           </div>
            <div class="col-md-2">
                 <button type="button" id="submit_exam" name="submit_exam" value=""  onclick="result()" class="btn btn-primary" ><span id="next_label">Submit Exam</span></button>
            
                </div>
           </div>
       </div>
        </section>
               </div>
               
<!--        <div class="row">
            <div class="col-md-5">
               
                 
                </div>
            </div>-->
           
            <div id="show_button" class="" hidden>
                <div class="row content">
            <section class="col-md-7 connectedSortable">
             <div class="box box-solid box-info">
              <div class="box-header">
              <i class="fa fa-book"></i>
              <h3 class="box-title">Question Detalis</h3>
             </div>                 
           <div class="box-footer text-black">
               <div class="table-responsive">
             <table  width="100%" cellspacing="1" cellpadding="2">
                      <thead></thead>
                      <tbody id="row_create">
                          <tr id="row_1"></tr>
<!--                          <tr id="row_2"></tr>
                          <tr id="row_3"></tr>
                          <tr id="row_4"></tr>
                          <tr id="row_5"></tr>-->
                          <tr id="row_new"></tr>
                      </tbody>
                  </table>
                   </div>
            </div>
            </div>
            </section>
                    
                    <section class="col-md-5 connectedSortable">
             <div class="box box-solid box-info">
              <div class="box-header">
              <i class="fa fa-book"></i>
              <h3 class="box-title">Instruction</h3>
             </div>                
           <div class="box-footer text-black">       
               <input type="button" name=" ? " value=" ? " class="btn btn-success"> <label>This button indicates the Solved Question.</label>
            <br><br>
            <input type="button" name=" ? " value=" ? " class="btn btn-default"> <label>This button indicates the Unsolved Question.</label>
            </div>
            </div>
            </section>
                    
              </div>
            </div>

           
                        
       <?php
      // break;
       }
       
       } echo form_close(); ?>
             <!--</form>-->
             <!--</div>-->
                
     </section>
           

         
</div>
   
         <!--</div>-->
 
     <!--</div>-->
    

