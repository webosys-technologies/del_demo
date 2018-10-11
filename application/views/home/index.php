<style>
    .owl-carousel .owl-item
    {
        max-height:470px;
    }
</style>


<script>
// Set the date we're counting down to
var countDownDate = new Date("Oct 19, 2018 00:00:00").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

    // Get todays date and time
    var now = new Date().getTime();
    
    // Find the distance between now and the count down date
    var distance = countDownDate - now;
    
    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
    // Output the result in an element with id="demo"
  $("#days").html(days);
  $("#hrs").html(hours);
  $("#mins").html(minutes);
  $("#secs").html(seconds);
    
    // If the count down is over, write some text 
    if (distance < 0) {
        clearInterval(x);
        document.getElementById("demo").innerHTML = "EXPIRED";
    }
}, 1000);
</script>
	<!-- Hero section -->
	<section class="hero-section">
		<div class="hero-slider owl-carousel">
			<div class="hs-item set-bg" data-setbg="<?php echo base_url() ?>assets/images/a.jpg">
<!--				<div class="hs-text">
					<div class="container">
						<div class="row">
							<div class="col-lg-8">
								<div class="hs-subtitle">Award Winning UNIVERSITY</div>
								<h2 class="hs-title">An investment in knowledge pays the best interest.</h2>
								<p class="hs-des">Education is not just about going to school and getting a degree. It's about widening your<br> knowledge and absorbing the truth about life. Knowledge is power.</p>
								<div class="site-btn">GET STARTED</div>
							</div>
						</div>
					</div>
				</div>-->
			</div>
			<div class="hs-item set-bg" data-setbg="<?php echo base_url() ?>assets/images/b.jpg">
<!--				<div class="hs-text">
					<div class="container">
						<div class="row">
							<div class="col-lg-8">
								<div class="hs-subtitle">Award Winning UNIVERSITY</div>
								<h2 class="hs-title">An investment in knowledge pays the best interest.</h2>
								<p class="hs-des">Education is not just about going to school and getting a degree. It's about widening your<br> knowledge and absorbing the truth about life. Knowledge is power.</p>
								<div class="site-btn">GET STARTED</div>
							</div>
						</div>
					</div>
				</div>-->
			</div>
			<div class="hs-item set-bg" data-setbg="<?php echo base_url() ?>assets/images/c.jpg">
<!--				<div class="hs-text">
					<div class="container">
						<div class="row">
							<div class="col-lg-8">
								<div class="hs-subtitle">Award Winning UNIVERSITY</div>
								<h2 class="hs-title">An investment in knowledge pays the best interest.</h2>
								<p class="hs-des">Education is not just about going to school and getting a degree. It's about widening your<br> knowledge and absorbing the truth about life. Knowledge is power.</p>
								<div class="site-btn">GET STARTED</div>
							</div>
						</div>
					</div>
				</div>-->
			</div>
			<div class="hs-item set-bg" data-setbg="<?php echo base_url() ?>assets/images/d.jpg">
<!--				<div class="hs-text">
					<div class="container">
						<div class="row">
							<div class="col-lg-8">
								<div class="hs-subtitle">Award Winning UNIVERSITY</div>
								<h2 class="hs-title">An investment in knowledge pays the best interest.</h2>
								<p class="hs-des">Education is not just about going to school and getting a degree. It's about widening your<br> knowledge and absorbing the truth about life. Knowledge is power.</p>
								<div class="site-btn">GET STARTED</div>
							</div>
						</div>
					</div>
				</div>-->
			</div>
		</div>
	</section>
	<!-- Hero section end -->


	<!-- Counter section  -->
	<section class="counter-section">
		<div class="container">
             
                    <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="counter-content">
                            <h2>Why Delto?</h2>
                    <p>DELTO is E-Learning Training Organization provides various e-Learning training programs for the students. The main aim of organization is to provide latest & updated knowledge of various applications of computer to the student.</p>
                    </div>
                        </div>
                    </div>    

                    
			<div class="row">
				<div class="col-lg-7 col-md-6">
					<div class="big-icon">
						<i class="fa fa-graduation-cap"></i>
					</div>
					<div class="counter-content">
						<h2>OFFER: 30% Discount on Order with Minimum 10 Student</h2>
						<p><i class="fa fa-calendar-o"></i>Use coupen code: DELTO30 </p>
					</div>
				</div>
				<div class="col-lg-5 col-md-6">
                                    <br>
                                    <table width='80%'>
                                        <tr>
                                            <th><h4 id='days' style='color: white; font-weight:bold;'></h4></th>   
                                            <th><h4 id='hrs' style='color: white; font-weight:bold;'></h4></th>   
                                            <th><h4 id='mins' style='color: white; font-weight:bold;'></h4></th>   
                                            <th><h4 id='secs' style='color: white; font-weight:bold;'></h4></th>   
                                        </tr>
                                         <tr >
                                            <th><h4 style='color: white; font-weight:bold;'>Days</h4></th>
                                            <th><h4 style='color: white; font-weight:bold;'>Hrs</h4></th>   
                                            <th><h4 style='color: white; font-weight:bold;'>Mins</h4></th>   
                                            <th><h4 style='color: white; font-weight:bold;'>secs</h4></th>   
                                        </tr>
                                    </table>
<!--					<div class="counter">
						<div class="counter-item"><h4>20</h4>Day</div>
						<div class="counter-item"><h4>08</h4>Hrs</div>
						<div class="counter-item"><h4>40</h4>Mins</div>
						<div class="counter-item"><h4>56</h4>secs</div>
					</div>-->
				</div>
			</div>
		</div>
	</section>
	<!-- Counter section end -->


	<!-- Services section -->
	<section class="service-section spad">
		<div class="container services">
			<div class="section-title text-center">
				<h3>OUR SERVICES</h3>
				<p>We provides the opportunity to prepare for life</p>
			</div>
			<div class="row">
				<div class="col-lg-4 col-sm-6 service-item">
					<div class="service-icon">
						<img src="<?php echo base_url() ?>assets/home/img/services-icons/1.png" alt="1">
					</div>
					<div class="service-content">
						<h4>24 X 7 Support</h4>
						<p>Connect with the Delto team. Help is available from Delto 24/7.</p>
					</div>
				</div>
				<div class="col-lg-4 col-sm-6 service-item">
					<div class="service-icon">
						<img src="<?php echo base_url() ?>assets/home/img/services-icons/2.png" alt="1">
					</div>
					<div class="service-content">
						<h4>E-Learning Videos</h4>
						<p>We Provide the best quality courses topics videos with clear voice.Easy to understand and Each and Every Topics manages in proper sequence.</p>
					</div>
				</div>
				<div class="col-lg-4 col-sm-6 service-item">
					<div class="service-icon">
						<img src="<?php echo base_url() ?>assets/home/img/services-icons/3.png" alt="1">
					</div>
					<div class="service-content">
						<h4>Certificate For Student</h4>
						<p>Student will get the DELTO Certification with authorised signature after successfully completed desired course with grade system.</p>
					</div>
				</div>
				<div class="col-lg-4 col-sm-6 service-item">
					<div class="service-icon">
						<img src="<?php echo base_url() ?>assets/home/img/services-icons/4.png" alt="1">
					</div>
					<div class="service-content">
						<h4>Exam System</h4>
						<p>We manage the Online Examination System with good User Interface.Student can get Get a result and Exam Review after finish Exam.</p>
					</div>
				</div>
				<div class="col-lg-4 col-sm-6 service-item">
					<div class="service-icon">
						<img src="<?php echo base_url() ?>assets/home/img/services-icons/5.png" alt="1">
					</div>
					<div class="service-content">
						<h4>Batches Schedule</h4>
						<p>Center can easily manage students batches schedule according to comfirt time.</p>
					</div>
				</div>
				<div class="col-lg-4 col-sm-6 service-item">
					<div class="service-icon">
						<img src="<?php echo base_url() ?>assets/home/img/services-icons/6.png" alt="1">
					</div>
					<div class="service-content">
						<h4>Manage Sub centers</h4>
						<p>Center can create multiple Sub Centers as a branches to add there students</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Services section end -->

	
	<!-- Enroll section -->
	<section class="enroll-section spad set-bg" data-setbg="<?php echo base_url() ?>assets/home/img/enroll-bg.jpg">
		<div class="container">
			<div class="row">
				<div class="col-lg-5">
					<div class="section-title text-white">
						<h3>STUDENT ENROLLMENT</h3>
						<p>Get started with us to explore the exciting</p>
					</div>
					<div class="enroll-list text-white">
						<div class="enroll-list-item">
							<span>1</span>
                                                        <h5><a href="<?php echo base_url();?>center/Index">Center Signup</a></h5>
							<p>Click center signup and fill necessary data for the form.After submiting verify account using mobile or email id as you provide.</p>
						</div>
						<div class="enroll-list-item">
							<span>2</span>
							<h5><a href="<?php echo base_url();?>center/Index/login">Center Login</a></h5>
							<p>Click the login button and Get Login using Email and Password.</p>
						</div>
						<div class="enroll-list-item">
							<span>3</span>
							<h5>Add Student</h5>
							<p>After successfully login click to add student.Fill Up student Information and click Save Button.</p>
						</div>
                                            <div class="enroll-list-item">
							<span>4</span>
							<h5>Make Payment</h5>
							<p>After Adding Student successfully.Checkmark student name and click make payment to get students login detail.</p>
						</div>
					</div>
				</div>
				<div class="col-lg-6 offset-lg-1 p-lg-0 p-4">
					<img src="<?php echo base_url() ?>assets/home/img/encroll-img.jpg" alt="">
				</div>
			</div>
		</div>
	</section>
	<!-- Enroll section end -->


	<!-- Courses section -->
	<section class="courses-section spad">
		<div class="container">
			<div class="section-title text-center">
				<h3>OUR COURSES</h3>
				<p>Building a better world, one course at a time</p>
			</div>
                    
                    <div class="row">
			      <!-- item -->
      <div class="col-md-4 text-center"> 
    <div class="box-item">
    <i class="circle"><img src="<?php echo base_url(); ?>assets/images/2.png" alt="" /></i>
        <h3>Tally</h3>
        <p>Tally is an accounting program that lets you track and manage all of your accounts, sales, debts, and everything else related to the running of your business. </p>
     </div>
     </div>
      <!-- end: --> 
      
      <!-- item -->
      <div class="col-md-4 text-center">
    <div class="box-item">
    <i class="circle"> <img src="<?php echo base_url(); ?>assets/images/office.png" width="60px;" height="60px;" alt="" /></i>
        <h3>MS-Office</h3>
        <p>Microsoft Office is a suite of desktop productivity applications that is designed specifically to be used for office or business use.</p>
        
    </div>
     </div>
      <!-- end: --> 
     
      
       <div class="col-md-4 text-center">
    <div class="box-item">
    <i class="circle"> <img src="<?php echo base_url(); ?>assets/images/dtp.jpg" width="60px;" height="60px;" alt="" /></i>
        <h3>DTP</h3>
        <p>Desktop publishing (abbreviated DTP) is the creation of documents using page layout skills on a personal computer for print. Desktop publishing software can generate layouts and produce typographic text and images comparable to traditional typography and printing.</p>
      </div>
     </div>
      
                    </div>
<!--			<div class="row">
				 course item 
				<div class="col-lg-4 col-md-6 course-item">
					<div class="course-thumb">
						<img src="<?php echo base_url() ?>assets/home/img/course/1.jpg" alt="">
						<div class="course-cat">
							<span>BUSINESS</span>
						</div>
					</div>
					<div class="course-info">
						<div class="date"><i class="fa fa-clock-o"></i> 22 Mar 2018</div>
						<h4>Certificate Course in Writing<br>for a Global Market</h4>
						<h4 class="cource-price">$100<span>/month</span></h4>
					</div>
				</div>
				 course item 
				<div class="col-lg-4 col-md-6 course-item">
					<div class="course-thumb">
						<img src="<?php echo base_url() ?>assets/home/img/course/2.jpg" alt="">
						<div class="course-cat">
							<span>Marketing</span>
						</div>
					</div>
					<div class="course-info">
						<div class="date"><i class="fa fa-clock-o"></i> 22 Mar 2018</div>
						<h4>Google AdWords: Get More<br> Customers with Search Marketing </h4>
						<h4 class="cource-price">$150<span>/month</span></h4>
					</div>
				</div>
				 course item 
				<div class="col-lg-4 col-md-6 course-item">
					<div class="course-thumb">
						<img src="<?php echo base_url() ?>assets/home/img/course/3.jpg" alt="">
						<div class="course-cat">
							<span>DESIGN</span>
						</div>
					</div>
					<div class="course-info">
						<div class="date"><i class="fa fa-clock-o"></i> 22 Mar 2018</div>
						<h4>The Ultimate Drawing Course<br> Beginner to Advanced</h4>
						<h4 class="cource-price">$180<span>/month</span></h4>
					</div>
				</div>
				 course item 
				<div class="col-lg-4 col-md-6 course-item">
					<div class="course-thumb">
						<img src="<?php echo base_url() ?>assets/home/img/course/4.jpg" alt="">
						<div class="course-cat">
							<span>DATABASE</span>
						</div>
					</div>
					<div class="course-info">
						<div class="date"><i class="fa fa-clock-o"></i> 22 Mar 2018</div>
						<h4>Ultimate MySQL Bootcamp: Go from SQL Beginner to Expert</h4>
						<h4 class="cource-price">$150<span>/month</span></h4>
					</div>
				</div>
				 course item 
				<div class="col-lg-4 col-md-6 course-item">
					<div class="course-thumb">
						<img src="<?php echo base_url() ?>assets/home/img/course/5.jpg" alt="">
						<div class="course-cat">
							<span>PROGRAM</span>
						</div>
					</div>
					<div class="course-info">
						<div class="date"><i class="fa fa-clock-o"></i> 22 Mar 2018</div>
						<h4>Web Developer Bootcamp<br>Make web  applications</h4>
						<h4 class="cource-price">$250<span>/month</span></h4>
					</div>
				</div>
				 course item 
				<div class="col-lg-4 col-md-6 course-item">
					<div class="course-thumb">
						<img src="<?php echo base_url() ?>assets/home/img/course/6.jpg" alt="">
						<div class="course-cat">
							<span>BUSINESS</span>
						</div>
					</div>
					<div class="course-info">
						<div class="date"><i class="fa fa-clock-o"></i> 22 Mar 2018</div>
						<h4>How to Start an Amazon<br>FBA Store on a Tight Budget</h4>
						<h4 class="cource-price">$150<span>/month</span></h4>
					</div>
				</div>
			</div>-->
		</div>
	</section>
	<!-- Courses section end-->


	<!-- Fact section -->
	<section class="fact-section spad set-bg" data-setbg="<?php echo base_url() ?>assets/home/img/fact-bg.jpg">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-lg-3 fact">
					<div class="fact-icon">
						<i class="ti-crown"></i>
					</div>
					<div class="fact-text">
						<h2>2</h2>
						<p>YEARS</p>
					</div>
				</div>
				<div class="col-sm-6 col-lg-3 fact">
					<div class="fact-icon">
						<i class="ti-briefcase"></i>
					</div>
					<div class="fact-text">
                                            <?php $center=$this->Centers_model->getall(); ?>
                                                <h2><?php if(isset($center)){ echo count($center)+500; } else { echo "0"; } ?></h2>
						<p>CENTERS</p>
					</div>
				</div>
				<div class="col-sm-6 col-lg-3 fact">
					<div class="fact-icon">
						<i class="ti-user"></i>
					</div>
					<div class="fact-text">
                                            <?php $student=$this->Students_model->getall_students_no(); ?>
                                            <h2><?php if(isset($student)){ echo $student+1000; }else{ echo "0"; }?></h2>
						<p>STUDENTS</p>
					</div>
				</div>
				<div class="col-sm-6 col-lg-3 fact">
					<div class="fact-icon">
						<i class="ti-pencil-alt"></i>
					</div>
					<div class="fact-text">
						<?php $course=$this->Courses_model->getall_courses(); ?>
                                                <h2><?php if(isset($course)){ echo count($course); } else { echo "0"; } ?></h2>
						<p>COURSES</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Fact section end-->


	<!-- Event section -->
<!--	<section class="event-section spad">
		<div class="container">
			<div class="section-title text-center">
				<h3>OUR EVENTS</h3>
				<p>Our department  initiated a series of events</p>
			</div>
			<div class="row">
				<div class="col-md-6 event-item">
					<div class="event-thumb">
						<img src="<?php echo base_url() ?>assets/home/img/event/1.jpg" alt="">
						<div class="event-date">
							<span>24 Mar 2018</span>
						</div>
					</div>
					<div class="event-info">
						<h4>The dos and don'ts of writing a personal<br>statement for languages</h4>
						<p><i class="fa fa-calendar-o"></i> 08:00 AM - 10:00 AM <i class="fa fa-map-marker"></i> Center Building, Block A</p>
						<a href="" class="event-readmore">REGISTER <i class="fa fa-angle-double-right"></i></a>
					</div>
				</div>
				<div class="col-md-6 event-item">
					<div class="event-thumb">
						<img src="<?php echo base_url() ?>assets/home/img/event/2.jpg" alt="">
						<div class="event-date">
							<span>22 Mar 2018</span>
						</div>
					</div>
					<div class="event-info">
						<h4>University interview tips:<br>confidence won't make up for flannel</h4>
						<p><i class="fa fa-calendar-o"></i> 08:00 AM - 10:00 AM <i class="fa fa-map-marker"></i> Center Building, Block A</p>
						<a href="" class="event-readmore">REGISTER <i class="fa fa-angle-double-right"></i></a>
					</div>
				</div>
			</div>
		</div>
	</section>-->
	<!-- Event section end -->


	<!-- Gallery section -->
	<div class="gallery-section">
		<div class="gallery">
			<div class="grid-sizer"></div>
			<div class="gallery-item gi-big set-bg" data-setbg="<?php echo base_url() ?>assets/home/img/gallery/1.jpg">
				<a class="img-popup" href="<?php echo base_url() ?>assets/home/img/gallery/1.jpg"><i class="ti-plus"></i></a>
			</div>
			<div class="gallery-item set-bg" data-setbg="<?php echo base_url() ?>assets/home/img/gallery/2.jpg">
				<a class="img-popup" href="<?php echo base_url() ?>assets/home/img/gallery/2.jpg"><i class="ti-plus"></i></a>
			</div>
			<div class="gallery-item set-bg" data-setbg="<?php echo base_url() ?>assets/home/img/gallery/3.jpg">
				<a class="img-popup" href="<?php echo base_url() ?>assets/home/img/gallery/3.jpg"><i class="ti-plus"></i></a>
			</div>
			<div class="gallery-item gi-long set-bg" data-setbg="<?php echo base_url() ?>assets/home/img/gallery/5.jpg">
				<a class="img-popup" href="<?php echo base_url() ?>assets/home/img/gallery/5.jpg"><i class="ti-plus"></i></a>
			</div>
			<div class="gallery-item gi-big set-bg" data-setbg="<?php echo base_url() ?>assets/home/img/gallery/8.jpg">
				<a class="img-popup" href="<?php echo base_url() ?>assets/home/img/gallery/8.jpg"><i class="ti-plus"></i></a>
			</div>
			<div class="gallery-item gi-long set-bg" data-setbg="<?php echo base_url() ?>assets/home/img/gallery/4.jpg">
				<a class="img-popup" href="<?php echo base_url() ?>assets/home/img/gallery/4.jpg"><i class="ti-plus"></i></a>
			</div>
			<div class="gallery-item set-bg" data-setbg="<?php echo base_url() ?>assets/home/img/gallery/6.jpg">
				<a class="img-popup" href="<?php echo base_url() ?>assets/home/img/gallery/6.jpg"><i class="ti-plus"></i></a>
			</div>
			<div class="gallery-item set-bg" data-setbg="<?php echo base_url() ?>assets/home/img/gallery/7.jpg">
				<a class="img-popup" href="<?php echo base_url() ?>assets/home/img/gallery/7.jpg"><i class="ti-plus"></i></a>
			</div>
		</div>
	</div>
	<!-- Gallery section -->


	<!-- Blog section -->
<!--	<section class="blog-section spad">
		<div class="container">
			<div class="section-title text-center">
				<h3>LATEST NEWS</h3>
				<p>Get latest breaking news & top stories today</p>
			</div>
			<div class="row">
				<div class="col-xl-6">
					<div class="blog-item">
						<div class="blog-thumb set-bg" data-setbg="<?php echo base_url() ?>assets/home/img/blog/1.jpg"></div>
						<div class="blog-content">
							<h4>Parents who try to be their children’s best friends</h4>
							<div class="blog-meta">
								<span><i class="fa fa-calendar-o"></i> 24 Mar 2018</span>
								<span><i class="fa fa-user"></i> Owen Wilson</span>
							</div>
							<p>Integer luctus diam ac scerisque consectetur. Vimus dot euismod neganeco lacus sit amet. Aenean interdus mid vitae sed accumsan...</p>
						</div>
					</div>
				</div>
				<div class="col-xl-6">
					<div class="blog-item">
						<div class="blog-thumb set-bg" data-setbg="<?php echo base_url() ?>assets/home/img/blog/2.jpg"></div>
						<div class="blog-content">
							<h4>Graduations could be delayed as external examiners</h4>
							<div class="blog-meta">
								<span><i class="fa fa-calendar-o"></i> 23 Mar 2018</span>
								<span><i class="fa fa-user"></i> Owen Wilson</span>
							</div>
							<p>Integer luctus diam ac scerisque consectetur. Vimus dot euismod neganeco lacus sit amet. Aenean interdus mid vitae sed accumsan...</p>
						</div>
					</div>
				</div>
				<div class="col-xl-6">
					<div class="blog-item">
						<div class="blog-thumb set-bg" data-setbg="<?php echo base_url() ?>assets/home/img/blog/3.jpg"></div>
						<div class="blog-content">
							<h4>Private schools adopt a Ucas style application system</h4>
							<div class="blog-meta">
								<span><i class="fa fa-calendar-o"></i> 24 Mar 2018</span>
								<span><i class="fa fa-user"></i> Owen Wilson</span>
							</div>
							<p>Integer luctus diam ac scerisque consectetur. Vimus dot euismod neganeco lacus sit amet. Aenean interdus mid vitae sed accumsan...</p>
						</div>
					</div>
				</div>
				<div class="col-xl-6">
					<div class="blog-item">
						<div class="blog-thumb set-bg" data-setbg="<?php echo base_url() ?>assets/home/img/blog/4.jpg"></div>
						<div class="blog-content">
							<h4>Cambridge digs in at the top of university league table</h4>
							<div class="blog-meta">
								<span><i class="fa fa-calendar-o"></i> 23 Mar 2018</span>
								<span><i class="fa fa-user"></i> Owen Wilson</span>
							</div>
							<p>Integer luctus diam ac scerisque consectetur. Vimus dot euismod neganeco lacus sit amet. Aenean interdus mid vitae sed accumsan...</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>-->
	<!-- Blog section -->


	

