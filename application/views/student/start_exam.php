<script type="text/javascript">
$(document).ready(function(){
    //$('#modal1').hide(); 
   // setTimeout(function(){ set(); }, 3000);
     // f1();
     $("#modal1").show();
});
// function set()
//    {
//   // alert("set");
//    // setTimeout(function(alert("hello")),3000);
//   $('#modal1').show();
//    setTimeout(function(){ location.reload(); }, 3000);
//       
//    }


    
     var tim;
       
        var min = 1;
        var sec = 5;
        var f = new Date();
        function f1() {
            f2();
          //  document.getElementById("starttime").innerHTML = "Your started your Exam at " + f.getHours() + ":" + f.getMinutes();
             
          
        }
        function f2() {
            if (parseInt(sec) > 0) {
                sec = parseInt(sec) - 1;
                document.getElementById("showtime").innerHTML = "Your Left Time  is :"+min+" Minutes ," + sec+" Seconds";
                tim = setTimeout("f2()", 1000);
            }
            else {
                if (parseInt(sec) == 0) {
                   
                    if (parseInt(min) >= 1) {
                     sec = 10;
                     min = parseInt(min) - 1;
                     
                     f2();
                       
                    }
                    else {
                     clearTimeout(tim);
                    // location.reload();
                     //   location.href = "<?php echo base_url();?>student/profile";
                     f1();
                   //  $('#clk').trigger('click');
                   //  document.getElementById('linkToClick').click();
                 //   window.location.href = $('#next').attr('href');
                  //  document.getElementById('next').click();
                 //  jQuery('#modal2').click();
                       
                    }
                }
               
            }
        }
        
        
        function answer(id)
    {
//      save_method = 'update';
//     $('#form')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('index.php/student/Exams/start_exam/')?>/" + id,        
        type: "GET",
               
        dataType: "JSON",
        success: function(data)
        {          

            $('[name="student_id"]').val(data.student_id);
            $('[name="center_id"]').val(data.center_id);
            $('[name="course_id"]').val(data.course_id);
            $('[name="student_fname"]').val(data.student_fname);
            $('[name="student_lname"]').val(data.student_lname);
            $('[name="student_email"]').val(data.student_email);
            $('[name="student_mobile"]').val(data.student_mobile);
            $('[name="student_gender"]').val(data.student_gender);
            $('[name="student_dob"]').val(data.student_dob);
            $('[name="student_last_education"]').val(data.student_last_education);
            $('[name="student_address"]').val(data.student_address);  
            $('[name="student_city"]').val(data.student_city);
            $('[name="student_state"]').val(data.student_state);
            $('[name="student_pincode"]').val(data.student_pincode);
            
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Student'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax 1');
        }
    });
    }
    

 
</script>
<div class="content-wrapper">
<div class="panel-group">    
     <div class="panel panel-default">
      <section class="content-header">
      <h1>
        Exam
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>student/Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">exam</li>
      </ol>
      </section>
         <br/>
      
             
         <hr>
     <section class="content" id="mode">
       
        <form action="<?php echo base_url(); ?>student/Exams/result" method="post" >
          
       <?php if(isset($questions))
       {
           $i=1;
           
           foreach($questions as $question)
       {
           ?>
        <label>Q<?php echo $i++;?>) <?php echo $question->question_name;?></label><br/>
        <!--<label class="custom-control custom-radio">-->
   
       a) <input type="radio" name="ans<?php echo $question->question_id;?>" value="<?php echo $question->question_option_a;?>"><?php echo $question->question_option_a;?><br/>
       b) <input type="radio" name="ans<?php echo $question->question_id;?>" value="<?php echo $question->question_option_b;?>"> <?php echo $question->question_option_b;?><br/>
       c) <input type="radio" name="ans<?php echo $question->question_id;?>" value="<?php echo $question->question_option_c;?>"><?php echo $question->question_option_c;?><br/>
       d) <input type="radio" name="ans<?php echo $question->question_id;?>" value="<?php echo $question->question_option_d;?>"><?php echo $question->question_option_d;?><br/>
       <!--</label>-->
   
       
     
       <br/><br/>
       <button type="button" id="modal2" onclick="answer(<?php echo $question->question_id;?>)"  class="btn btn-warning">Next</button>
       <?php
      // break;
       }
       
       }?>
        <div id="starttime"></div><br />
            <div id="endtime"></div><br />
            <div id="showtime"></div>
        
       <p id="modal1">hello</p>
       
           <!--<a class="btn btn-default btn-flat"  href="google.com" id="next" >GOOGLE</a>-->
           <a onclick="f12()" href="javascript:void(0);" id="next">hyper</a>
       </form>
     </section>
         
</div>
   
         </div>
 
     </div>
    
   
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="<?php echo base_url('assets/jquery/jquery-3.1.0.min.js')?>"></script>
  <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>
  <script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
  <script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>
  <script src="<?php echo base_url('assets/js/jquery.validate.min.js')?>"></script>

    
  



<script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->

