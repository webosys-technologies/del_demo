<!DOCTYPE html>






<!-- Modal -->
<div id="id01" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-top">
      <header class="w3-container w3-theme-l1"> 
        <span onclick="document.getElementById('id01').style.display='none'"
        class="w3-button w3-display-topright">×</span>
        <h5>Oh snap! We just showed you a modal..</h5>
        <h5>Because we can <i class="fa fa-smile-o"></i></h5>
      </header>
      <div class="w3-padding">
        <p>Cool huh? Ok, enough teasing around..</p>
        <p>Go to our <a class="w3-btn" href="/w3css/default.asp">W3.CSS Tutorial</a> to learn more!</p>
      </div>
      <footer class="w3-container w3-theme-l1">
        <p>Modal footer</p>
      </footer>
    </div>
</div>
<div class="container">
<div class="w3-row-padding w3-center w3-margin-top">
    <center><h4 class="orange"><b>DEMO LOGIN DETAILS</b></h4></center><br>
<div class="w3-third">
  <div class="w3-card w3-container" style="min-height:460px">
  <h4 class="blue"><b>Center Login Detail</b></h4><br>
  <i class="fa fa-user w3-margin-bottom w3-text-theme" style="font-size:120px; color:#32a6c3 !important;"></i>
 <p><h5><b>Username</b></h5></p>
  <p>dnyansankul@gmail.com</p>
  <p><h5><b>Password</b></h5></p>
  <p>12345678</p>
  <p><h5><b>URL</b></h5></p>
  <a href="http://delto.in/demo/center/index/login" target="_blank">http://delto.in/demo/center/index/login</a>
  </div>
</div>

<div class="w3-third">
  <div class="w3-card w3-container" style="min-height:460px">
  <h4 class="blue"><b>Student Login Detail</b></h4><br>
   <i class="fa fa-user w3-margin-bottom w3-text-theme" style="font-size:120px; color:#32a6c3 !important;"></i>
  <p><h5><b>Username</b></h5></p>
  <p>suraj@webosys.com</p>
  <p><h5><b>Password</b></h5></p>
  <p>ZI1axcMm</p>
  <p><h5><b>URL</b></h5></p>
  <a href="http://delto.in/demo/student/index" target="_blank">http://delto.in/demo/student/index</a>
  </div>
</div>

<div class="w3-third">
  <div class="w3-card w3-container" style="min-height:460px">
      <h4 class="blue"><b>Student Login Detail</b></h4><br>
   <i class="fa fa-user w3-margin-bottom w3-text-theme" style="font-size:120px; color:#32a6c3 !important;"></i>
  <p><h5><b>Username</b></h5></p>
  <p>pawan@webosys.com</p>
  <p><h5><b>Password</b></h5></p>
  <p>RDSNh7Cy</p>
  <p><h5><b>URL</b></h5></p>
  <a href="http://delto.in/demo/student/index" target="_blank">http://delto.in/demo/student/index</a>
  </div>
</div>
    
</div><br>
<center><a href="<?php echo base_url()?>" class="btn btn-info"> BACK </a></center>
</div>



<br>





<!-- Script for Sidebar, Tabs, Accordions, Progress bars and slideshows -->
<script>
// Side navigation
function w3_open() {
    var x = document.getElementById("mySidebar");
    x.style.width = "100%";
    x.style.fontSize = "40px";
    x.style.paddingTop = "10%";
    x.style.display = "block";
}
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
}

// Tabs
function openCity(evt, cityName) {
  var i;
  var x = document.getElementsByClassName("city");
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";
  }
  var activebtn = document.getElementsByClassName("testbtn");
  for (i = 0; i < x.length; i++) {
      activebtn[i].className = activebtn[i].className.replace(" w3-dark-grey", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " w3-dark-grey";
}

var mybtn = document.getElementsByClassName("testbtn")[0];
mybtn.click();

// Accordions
function myAccFunc(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}

// Slideshows
var slideIndex = 1;

function plusDivs(n) {
slideIndex = slideIndex + n;
showDivs(slideIndex);
}

function showDivs(n) {
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = x.length} ;
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  
  }
  x[slideIndex-1].style.display = "block";  
}

showDivs(1);

// Progress Bars
function move() {
  var elem = document.getElementById("myBar");   
  var width = 5;
  var id = setInterval(frame, 10);
  function frame() {
    if (width == 100) {
      clearInterval(id);
    } else {
      width++; 
      elem.style.width = width + '%'; 
      elem.innerHTML = width * 1  + '%';
    }
  }
}
</script>


