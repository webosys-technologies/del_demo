<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
<script>
    
    
var validateEmail = function(elementValue) {
    var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    return emailPattern.test(elementValue);
}


function subscribe() {
       
    var value = $('#email').val();
    var valid = validateEmail(value);
    if (!valid) {
        $("#email_err").html("Invalid Email");    
        return false;
    }else{
        
        var data = new FormData(document.getElementById("subscriber"));
      var url;     
      url = "<?php echo site_url('index.php/Home/add_subscriber')?>";
        
          // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
            async: false,
            processData: false,
            contentType: false,            
            data: data,
            dataType: "JSON",
            success: function(json)
            {   
               if(json.status)
               {
                   $("#email_err").html("");            
               $("#email_success").html("Subscribed Successfully");            
               }
               
               if(json.email_err)
               {
                    $("#email_success").html("");        
                    $("#email_err").html(json.email_err);            
               }
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data in student');
            }
        });
        
        
    }
}
    

function email_val(){
    
     var value = $("#email").val();
//     alert(value);
    var valid = validateEmail(value);

    if (!valid) {
        $("#email").css('color', 'red');
    } else {
        $("#email_err").html("");    
        $("#email").css('color', 'green');
    }
 // play with event
 // use $(this) to determine which element triggers this event
}
</script>

<!-- Newsletter section -->
	<section class="newsletter-section">
		<div class="container">
			<div class="row">
				<div class="col-md-5 col-lg-7">
					<div class="section-title mb-md-0">
					<h3>NEWSLETTER</h3>
					<p>Subscribe and get the latest Update, advice and best offer.</p>
				</div>
				</div>
				<div class="col-md-7 col-lg-5">
					<form class="newsletter" name="subscriber" id="subscriber" action="" method="post">
                                            <input type="text" name="email" id="email" onkeyup="email_val()" placeholder="Enter your email">
                                            <button type="button" class="site-btn" onclick="subscribe()">SUBSCRIBE</button>
                                               
					</form>
                                     <span style="color:red" id="email_err"></span><span style="color:green" id="email_success"></span>
				</div>
			</div>
		</div>
	</section>
	<!-- Newsletter section end -->	
	<!-- Footer section -->
	<footer class="footer-section">
		<div class="container footer-top">
			<div class="row">
				<!-- widget -->
				<div class="col-sm-6 col-lg-3 footer-widget">
					<div class="about-widget">
						<img style="width:116px;" src="<?php echo base_url() ?>assets/images/delto_logo.png" alt="">
						<!--<p>orem ipsum dolor sit amet, consecter adipiscing elite. Donec minos varius, viverra justo ut, aliquet nisl.</p>-->
						<div class="social pt-1" style="font-size: 30px;">
							<a href=""><i class="fa fa-twitter-square"></i></a>
							<a href="https://www.facebook.com/delto.in/" target="_blank"><i class="fa fa-facebook-square"></i></a>
							<a href=""><i class="fa fa-google-plus-square"></i></a>
							<a href=""><i class="fa fa-linkedin-square"></i></a>
							<a href=""><i class="fa fa-rss-square"></i></a>
						</div>
					</div>
                                    <br>
                                    <span style="color:white">Visitor Count</span><br><br>
                                    <a href="http://www.reliablecounter.com" target="_blank"><img src="https://www.reliablecounter.com/count.php?page=webosys.com/del&digit=style/plain/6/&reloads=0" alt="" title="" border="0"></a><br /><a href="http://www.lapshock.com/compare-laptops" target="_blank" style="font-family: Geneva, Arial; font-size: 9px; color: #330010; text-decoration: none;">compare laptops</a>
				</div>
				<!-- widget -->
				<div class="col-sm-6 col-lg-3 footer-widget">
                                    
					<h6 class="fw-title">USEFUL LINK</h6>
					<div class="dobule-link">
						<ul>
                                                    <li><a href="<?php echo base_url();?>Home/index">Home</a></li>
							<li><a href="<?php echo base_url();?>Home/about">About us</a></li>
							<li><a href="">Services</a></li>
							<li><a href="">Events</a></li>
							<li><a href="">Features</a></li>
						</ul>
						<ul>
							<li><a href="">Policy</a></li>
							<li><a href="">Term</a></li>
							<li><a href="<?php echo base_url();?>Home/help">Help</a></li>
							<li><a href="">FAQs</a></li>
							<li><a href="">Site map</a></li>
						</ul>
					</div>
				</div>
				<!-- widget -->
				<div class="col-sm-2 col-lg-1 footer-widget">
<!--					<h6 class="fw-title">RECENT POST</h6>
					<ul class="recent-post">
						<li>
							<p>Snackable study:How to break <br> up your master's degree</p>
							<span><i class="fa fa-clock-o"></i>24 Mar 2018</span>
						</li>
						<li>
							<p>Open University plans major <br> cuts to number of staff</p>
							<span><i class="fa fa-clock-o"></i>24 Mar 2018</span>
						</li>
					</ul>-->
				</div>
				<!-- widget -->
				<div class="col-sm-10 col-lg-5 footer-widget">
					<h6 class="fw-title">CONTACT</h6>
					<ul class="contact">
                                            <li><p><i class="fa fa-map-marker"></i> DELTO ( Dnyansankul e-Learning Training Organisation ),<br> E1/1, State Bank Nagar,
                                        Behind Vanaz Co.,
                                        Paud Road, Kothrud, Pune-411038, 
                                        Maharashtra</p></li>
						<li><p><i class="fa fa-phone"></i> 09822280896 / 09822342224 </p></li>
						<li><p><i class="fa fa-envelope"></i> info@delto.in / dnyansankul@gmail.com</p></li>
						<li><p><i class="fa fa-clock-o"></i> Monday - Saturday, 08:00AM - 08:00 PM</p></li>
					</ul>
                                        
                                       
                                        
                                        
				</div>
			</div>
		</div>
		<!-- copyright -->
		<div class="copyright">
			<div class="container">
				<p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> <a target="_blank" href="http://webosys.com/">Webosys Technologies</a> All rights reserved 
                                    <!--| This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>-->
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
			</div>		
		</div>
	</footer>
	<!-- Footer section end-->



	<!--====== Javascripts & Jquery ======-->
	<script src="<?php echo base_url('assets/home/js/jquery-3.2.1.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/home/js/owl.carousel.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/home/js/jquery.countdown.js'); ?>"></script>
	<script src="<?php echo base_url('assets/home/js/masonry.pkgd.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/home/js/magnific-popup.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/home/js/main.js'); ?>"></script>
	
</body>
</html>