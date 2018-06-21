
<!doctype html>

<html lang="en-gb" class="no-js">
<!--<![endif]-->
<!DOCTYPE html>
<html lang="en">

<head>
  <title>DELTO (Dnyansankul E-Learning Training Organization)</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/styles.css" />

<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/isotope.css" media="screen" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/fancybox/jquery.fancybox.css" type="text/css" media="screen" />
<link href="<?php echo base_url(); ?>assets/css/animate.css" rel="stylesheet" media="screen">
<!-- Owl Carousel Assets -->
<link href="<?php echo base_url(); ?>assets/js/owl-carousel/owl.carousel.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/styles.css" />
<!-- Font Awesome -->
<link href="<?php echo base_url(); ?>assets/font/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style type="text/css">
  #head {
  margin: 30px;
  background-color: #ffffff;
  
  opacity: 0.6;
  filter: alpha(opacity=60); /* For IE8 and earlier */
}

  #mainNav a {
  font-weight: bold;
  color: black;
}
 #d i {
  font-weight: bold;
  color: black;
}
</style>
</head>
<body>
<header class="header" >
  <div class="container" >
    <nav class="navbar navbar-inverse" role="navigation" id="head" >
      <div class="navbar-header" id="d">
     <button type="button" id="nav-toggle" class="navbar-toggle " data-toggle="collapse" data-target="#main-nav"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        <a href="#" class="navbar-brand scroll-top logo  animated bounceInLeft"><img src="<?php echo base_url()?>assets/images/delto_logo.PNG" width="100px"></a> </div>
      <!--/.navbar-header-->
      <div id="main-nav" class="navbar-collapse collapse ">
        <ul class="nav navbar-nav" id="mainNav">
          <li class="active" id="firstLink"><a href="#home" class="scroll-link">Home</a></li>
          <li><a href="#aboutUs" class="scroll-link">About Us </a></li>
          <li><a href="<?php echo base_url(); ?>center/index/login" class="scroll-link">Center Login</a></li>          
          <li><a href="<?php echo base_url(); ?>student/index" class="scroll-link">Student Login</a></li>
          <li><a href="<?php echo base_url(); ?>center/index" class="scroll-link">Center SignUp</a></li>    
          <li><a href="#contactUs" class="scroll-link">Contact Us</a></li>
          <li><a href="<?php echo base_url();?>Home/demo" class="scroll-link">Demo</a></li>
        </ul>
      </div>
      <!--/.navbar-collapse--> 
    </nav>
    <!--/.navbar--> 
  </div>

  <!--/.container--> 
</header>
<div id="top"></div>
<section id="home">
<div class="banner-container"> 
    <div id="carousel" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carousel" data-slide-to="0" class="active"></li>
    <li data-target="#carousel" data-slide-to="1" ></li>
    <li data-target="#carousel" data-slide-to="2"></li>
    <li data-target="#carousel" data-slide-to="3"></li>
  </ol>
  <!-- Carousel items -->
  <div class="carousel-inner">
    <div class="item active"><img src="<?php echo base_url(); ?>assets/images/a.jpg" alt="banner" width="100%" /></div>
    <div class="item"><img src="<?php echo base_url(); ?>assets/images/b.jpg" alt="banner" width="100%" /></div>
    <div class="item"><img src="<?php echo base_url(); ?>assets/images/c.jpg" alt="banner" width="100%"/></div>
    <div class="item"><img src="<?php echo base_url(); ?>assets/images/d.jpg" alt="banner" width="100%"/></div>
  </div>
  
  <!-- Carousel nav -->
  <a class="carousel-control left" href="#carousel" data-slide="prev">&lsaquo;</a>
  <a class="carousel-control right" href="#carousel" data-slide="next">&rsaquo;</a>
</div>
  
  </div>
  <div class="container hero-text2">        
    <div class="col-md-9">
    <h2>Why Delto?</h2>
     <p>DELTO is E-Learning Training Organization provides various e-Learning training programs for the students. The main aim of organization is to provide latest & updated knowledge of various applications of computer to the student.</p>   
    </div>  
    <div class="col-md-3">
  <a class="btn btn-apply" href="<?php echo base_url();?>center/index"><i class="fa fa-play-circle"></i>Center SignUp</a>  
    </div>
  </div>  
</section>
<section id="Features" class="page-section colord">
  <div class="container">
    <div class="row"> 
      <!-- item -->
      <div class="col-md-3 text-center"> 
    <div class="box-item">
    <i class="circle"><img src="<?php echo base_url(); ?>assets/images/5.png" alt="" /></i>
        <h3>Tally</h3>
        <p>Tally is an accounting program that lets you track and manage all of your accounts, sales, debts, and everything else related to the running of your business. </p>
      </div>
     </div>
      <!-- end: --> 
      
      <!-- item -->
      <div class="col-md-3 text-center">
    <div class="box-item">
    <i class="circle"> <img src="<?php echo base_url(); ?>assets/images/1.png" alt="" /></i>
        <h3>MS-Office</h3>
        <p>Microsoft Office is a suite of desktop productivity applications that is designed specifically to be used for office or business use.</p>
      </div>
     </div>
      <!-- end: --> 
      
      <!-- item -->
      <!-- <div class="col-md-3 text-center">
    <div class="box-item">
    <i class="circle"> <img src="<?php echo base_url(); ?>assets/images/2.png" alt="" /></i>
        <h3>Events</h3>
        <p>Nullam ac rhoncus sapien, non gravida purus. Alinon elit imperdiet congue. Integer ultricies sed elit impe.</p>
      </div>
     </div> -->
      <!-- end: --> 
      
      <!-- item -->
      <!-- <div class="col-md-3 text-center">
    <div class="box-item">
    <i class="circle"> <img src="<?php echo base_url(); ?>assets/images/3.png" alt="" /></i>
        <h3>Latest News</h3>
        <p>Nullam ac rhoncus sapien, non gravida purus. Alinon elit imperdiet congue. Integer elit imperdiet conempus.</p>
      </div>
      <!-- end:-->
     </div> 
    </div>
  </div>
  <!--/.container--> 
</section>
<section id="aboutUs">
  <div class="container">
    <div class="heading text-center"> 
      <!-- Heading -->
      <h2>About Us</h2>
      <!--<p>At lorem Ipsum available, but the majority have suffered alteration in some form by injected humour.</p>-->
    </div>
    <div class="row feature design">
      <div class="area1 columns left">
<!--        <h3>Our Design tells about quality</h3>
        <p>Lorem ipsum dolor sit amet, ea eum labitur scsstie percipitoleat fabulas complectitur deterruisset at pro. Odio quaeque reformidans est eu, expetendis intellegebat has ut, viderer invenire ut his. Has molestie percipit an. Falli volumus efficiantur sed id, ad vel noster propriae. Ius ut etiam vivendo, graeci iudicabit constituto at mea. No soleat fabulas prodesset vel, ut quo solum dicunt.
          Nec et jority have suffered alteration. </p>
        <p>Odio quaeque reformidans est eu, expetendis intellegebat has ut, viderer invenire ut his. Has molestie percipit an. Falli volumus efficiantur sed id, ad vel noster propriae. Ius ut etiam vivendo, graeci iudicabit constituto at mea. No soleat fabulas prodesset vel, ut quo solum dicunt.
          Nec et amet vidisse mentitumsstie percipitoleat fabulas. </p>
          <a href="#" class="btn">Request Quote</a>-->
<h2 style="color: black">DELTO (Dnyansankul E-Learning Training Organization)</h2>

<p>DELTO is E-Learning Training Organization provides various e-Learning training programs for the students. The main aim of organization is to provide latest & updated knowledge of various applications of computer to the student.</p>
<p>DELTO provide a training of various applications in such a manner that your organization conduct & provide training of computer applications to the student. A training flow & syllabus has been covered as per your requirement. </p>
<p>Many of your organizations suffering problem of well-developed and knowledgeable teaching staff. Many times due to technical or personal problem, staff is absent for provide training to the student. Or due to some personal problem students are absent for lecture and staff has to repeat lecture again. For these types of various reasons, DELTO found a solution and provide e-Learning Videos for various computer applications which are helpful for Staff and Students also.</p>
<p>Once a student is registered for specific course with DELTO, he can learn all the topics of that specific course step by step through videos. These videos are completely developed by DELTO in Marathi regional language so that student can easily understand the topic.</p>
<p>After completing the training of that particular course, Student can give online exam for that course. If student get passing grade, he will be awarded by DELTO by giving certificate for that course.</p>
      </div>
      <div class="area2 columns feature-media right"> <img src="<?php echo base_url(); ?>assets/images/about-img.jpg" alt="" width="100%"> </div>
    </div>
    <div class="row dataTxt"> 
            <!-- <div class="col-md-4 col-sm-6">
              <h3>Our Education</h3>
              <p>Lorem ipsum dolor consectetursit amet, consectetur adipiscing elit consectetur euismod </p>
                            <p>Lorem ipsum dolor sit amet, ea eum labitur scsstie percipitoleat fabulas complectitur deterruisset at pro. Odio quaeque reformidans est eu, expetendis intellegebat has ut, viderer invenire ut his. Has molestie percipit an. Falli volumus efficiantur sed id, ad vel noster propriae. Ius ut etiam vivendo, graeci iudicabit constituto at mea.</p>
              
              <br>
            </div> -->
            
<!--            <div class="col-md-4 col-sm-6">
              
              <h3>Courses</h3>
              <p>Lorem ipsum dolor consectetursit amet, consectetur adipiscing elit consectetur euismod </p>
                            <ul class="listArrow">
                <li>Lorem ipsum dolor consectetursit amet, consectet</li>
                <li>Has molestie percipit an. Falli volumus efficiantur</li>
                <li>Falli volumus efficiantur sed id, ad vel noster</li>
                <li>Lorem ipsum dolor consectetursit amet, consectetur</li>
                <li>Ius ut etiam vivendo, graeci iudicabit constitutoa</li>
              </ul>
               Accordion starts 
              </div>-->
            <!-- 
            <div class="col-md-4 col-sm-6">
              
              <h3>Latest News</h3>
              <p>Lorem ipsum dolor consectetursit amet, consectetur adipiscing elit consectetur euismod </p>
                            <ul  class="list3">
                <li>Lorem ipsum dolor consectetursit</li>
                <li>Has molestie percipit an Falli</li>
                <li>Falli volumus efficiantur sed id</li>
                <li>Lorem ipsum dolor consectetu</li> 
              </ul>
              </div> -->
                            
              <!-- Accordion starts -->
            
          </div>
  </div>
</section> 
<!-- <section id="work" class="page-section page">
  <div class="container text-center">
    <div class="heading">
      <h2>Events</h2>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa, alias enim placeat earum quos ab.</p>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div id="portfolio">
          <ul class="filters list-inline">
            <li> <a class="active" data-filter="*" href="#">All</a> </li>
            <li> <a data-filter=".photography" href="#">Events</a> </li>
            <li> <a data-filter=".branding" href="#">Games</a> </li>
            <li> <a data-filter=".web" href="#">Science fair</a> </li>
          </ul>
          <ul class="items list-unstyled clearfix animated fadeInRight showing" data-animation="fadeInRight" style="position: relative; height: 438px;">
            <li class="item branding" style="position: absolute; left: 0px; top: 0px;"> 
                       
        <figure class="effect-bubba">
            <img src="<?php echo base_url(); ?>assets/images/work/1.jpg" alt="img02"/>
            <figcaption>
              <h2>B-Events</h2> 
              <a href="<?php echo base_url(); ?>assets/images/work/1.jpg" class="fancybox">View more</a> 
            </figcaption>     
          </figure> 
          
        </li>
        
       
        
        
            <li class="item photography" style="position: absolute; left: 292px; top: 0px;"> 
      <figure class="effect-bubba">
            <img src="<?php echo base_url(); ?>assets/images/work/2.jpg" alt="img02"/>
            <figcaption>
              <h2>B-Events</h2> 
              <a href="<?php echo base_url(); ?>assets/images/work/2.jpg" class="fancybox">View more</a> 
            </figcaption>     
          </figure> 
        </li>
            <li class="item branding" style="position: absolute; left: 585px; top: 0px;"> 
      <figure class="effect-bubba">
            <img src="<?php echo base_url(); ?>assets/images/work/3.jpg" alt="img02"/>
            <figcaption>
              <h2>B-Events</h2> 
              <a href="<?php echo base_url(); ?>assets/images/work/3.jpg" class="fancybox">View more</a> 
            </figcaption>     
          </figure>  
        </li>
            <li class="item photography" style="position: absolute; left: 877px; top: 0px;"> 
      <figure class="effect-bubba">
            <img src="<?php echo base_url(); ?>assets/images/work/4.jpg" alt="img02"/>
            <figcaption>
              <h2>B-Events</h2> 
              <a href="<?php echo base_url(); ?>assets/images/work/4.jpg" class="fancybox">View more</a> 
            </figcaption>     
          </figure>  
        </li>
            <li class="item photography" style="position: absolute; left: 0px; top: 219px;"> 
      <figure class="effect-bubba">
            <img src="<?php echo base_url(); ?>assets/images/work/5.jpg" alt="img02"/>
            <figcaption>
              <h2>B-Events</h2> 
              <a href="<?php echo base_url(); ?>assets/images/work/5.jpg" class="fancybox">View more</a> 
            </figcaption>     
          </figure> 
        </li>
            <li class="item web" style="position: absolute; left: 292px; top: 219px;"> 
      <figure class="effect-bubba">
            <img src="<?php echo base_url(); ?>assets/images/work/6.jpg" alt="img02"/>
            <figcaption>
              <h2>B-Events</h2> 
              <a href="<?php echo base_url(); ?>assets/images/work/6.jpg" class="fancybox">View more</a> 
            </figcaption>     
          </figure> 
        </li>
            <li class="item photography" style="position: absolute; left: 585px; top: 219px;">
      <figure class="effect-bubba">
            <img src="<?php echo base_url(); ?>assets/images/work/7.jpg" alt="img02"/>
            <figcaption>
              <h2>B-Events</h2> 
              <a href="<?php echo base_url(); ?>assets/images/work/7.jpg" class="fancybox">View more</a> 
            </figcaption>     
          </figure> 
        </li>
            <li class="item web" style="position: absolute; left: 877px; top: 219px;">
      <figure class="effect-bubba">
            <img src="<?php echo base_url(); ?>assets/images/work/8.jpg" alt="img02"/>
            <figcaption>
              <h2>B-Events</h2> 
              <a href="<?php echo base_url(); ?>assets/images/work/8.jpg" class="fancybox">View more</a> 
            </figcaption>     
          </figure> 
        </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section> -->
<!--<section id="plans" class="page-section">
  <div class="container">
    <div class="heading text-center"> 
       Heading 
      <h2>Fees</h2>
      <p>At lorem Ipsum available, but the majority have suffered alteration in some form by injected humour.</p>
    </div>
    <div class="row flat">
      <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <ul class="plan plan1">
          <li class="plan-name">Basic </li>
          <li class="plan-price"> <strong>$29</strong> / month </li>
          <li> <strong>5GB</strong> Storage </li>
          <li> <strong>1GB</strong> RAM </li>
          <li> <strong>400GB</strong> Bandwidth </li>
          <li> <strong>10</strong> Email Address </li>
          <li> <strong>Forum</strong> Support </li>
          <li class="plan-action"> <a href="#" class="btn btn-danger btn-lg">Signup</a> </li>
        </ul>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <ul class="plan plan2 featured">
          <li class="plan-name">Standard </li>
          <li class="plan-price"> <strong>$39</strong> / month </li>
          <li> <strong>5GB</strong> Storage </li>
          <li> <strong>1GB</strong> RAM </li>
          <li> <strong>400GB</strong> Bandwidth </li>
          <li> <strong>10</strong> Email Address </li>
          <li> <strong>Forum</strong> Support </li>
          <li class="plan-action"> <a href="#" class="btn btn-danger btn-lg">Signup</a> </li>
        </ul>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <ul class="plan plan3">
          <li class="plan-name">Advanced </li>
          <li class="plan-price"> <strong>$199</strong> / month </li>
          <li> <strong>50GB</strong> Storage </li>
          <li> <strong>8GB</strong> RAM </li>
          <li> <strong>1024GB</strong> Bandwidth </li>
          <li> <strong>Unlimited</strong> Email Address </li>
          <li> <strong>Forum</strong> Support </li>
          <li class="plan-action"> <a href="#" class="btn btn-danger btn-lg">Signup</a> </li>
        </ul>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <ul class="plan plan4">
          <li class="plan-name">Mighty </li>
          <li class="plan-price"> <strong>$999</strong> / month </li>
          <li> <strong>50GB</strong> Storage </li>
          <li> <strong>8GB</strong> RAM </li>
          <li> <strong>1024GB</strong> Bandwidth </li>
          <li> <strong>Unlimited</strong> Email Address </li>
          <li> <strong>Forum</strong> Support </li>
          <li class="plan-action"> <a href="#" class="btn btn-danger btn-lg">Signup</a> </li>
        </ul>
      </div>
    </div>
  </div>
</section>-->
<!--<section id="team" class="page-section">
  <div class="container">
    <div class="heading text-center"> 
       Heading 
      <h2>Management</h2>
      <p>At variations of passages of Lorem Ipsum available, but the majority have suffered alteration..</p>
    </div>
     Team Member's Details 
    <div class="team-content">
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12"> 
           Team Member 
          <div class="team-member pDark"> 
             Image Hover Block 
            <div class="member-img"> 
               Image   
              <img class="img-responsive" src="<?php echo base_url(); ?>assets/images/photo-1.jpg" alt=""> </div>
             Member Details 
            <div class="team-title">
      <h4>John Doe</h4>
             Designation  
            <span class="pos">DEAN</span>
      </div>
            <div class="team-socials"> <a href="#"><i class="fa fa-facebook"></i></a> <a href="#"><i class="fa fa-google-plus"></i></a> <a href="#"><i class="fa fa-twitter"></i></a> <a href="#"><i class="fa fa-dribbble"></i></a> <a href="#"><i class="fa fa-github"></i></a> </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12"> 
           Team Member 
          <div class="team-member pDark"> 
             Image Hover Block 
            <div class="member-img"> 
               Image   
              <img class="img-responsive" src="<?php echo base_url(); ?>assets/images/photo-2.jpg" alt=""> </div>
             Member Details 
            <h4>Larry Doe</h4>
             Designation  
            <span class="pos">Director</span>
            <div class="team-socials"> <a href="#"><i class="fa fa-facebook"></i></a> <a href="#"><i class="fa fa-google-plus"></i></a> <a href="#"><i class="fa fa-twitter"></i></a> <a href="#"><i class="fa fa-dribbble"></i></a> <a href="#"><i class="fa fa-github"></i></a> </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12"> 
           Team Member 
          <div class="team-member pDark"> 
             Image Hover Block 
            <div class="member-img"> 
               Image   
              <img class="img-responsive" src="<?php echo base_url(); ?>assets/images/photo-3.jpg" alt=""> </div>
             Member Details 
            <h4>Ranith Kays</h4>
             Designation  
            <span class="pos">HOD</span>
            <div class="team-socials"> <a href="#"><i class="fa fa-facebook"></i></a> <a href="#"><i class="fa fa-google-plus"></i></a> <a href="#"><i class="fa fa-twitter"></i></a> <a href="#"><i class="fa fa-dribbble"></i></a> <a href="#"><i class="fa fa-github"></i></a> </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12"> 
           Team Member 
          <div class="team-member pDark"> 
             Image Hover Block 
            <div class="member-img"> 
               Image   
              <img class="img-responsive" src="<?php echo base_url(); ?>assets/images/photo-4.jpg" alt=""> </div>
             Member Details 
            <h4>Joan Ray</h4>
             Designation  
            <span class="pos">Finance</span>
            <div class="team-socials"> <a href="#"><i class="fa fa-facebook"></i></a> <a href="#"><i class="fa fa-google-plus"></i></a> <a href="#"><i class="fa fa-twitter"></i></a> <a href="#"><i class="fa fa-dribbble"></i></a> <a href="#"><i class="fa fa-github"></i></a> </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  /.container 
</section>-->

<section id="contactUs" class="contact-parlex">
  <div class="parlex-back">
    <div class="container">
      <div class="row">
        <div class="heading text-center"> 
          <!-- Heading -->
          <h2>Contact Us</h2>
          
 <!--<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered.</p>-->
        </div>
      </div>
      <div class="row mrgn30">
        <!--NOTE: Update your email Id in "contact_me.php" file in order to receive emails from your contact form-->
    <form name="sentMessage" id="contactForm"  novalidate>
      <div class="row">
      <div class="col-md-6" >
    <h3>Contact Form</h3>
    <div class="control-group">
    <div class="controls">
    <input type="text" class="form-control" 
    placeholder="Full Name" id="name" required
    data-validation-required-message="Please enter your name" />
    <p class="help-block"></p>
    </div>
    </div>  
    <div class="control-group">
    <div class="controls">
    <input type="email" class="form-control" placeholder="Email" 
    id="email" required
    data-validation-required-message="Please enter your email" />
    </div>
    </div>  

    <div class="control-group">
    <div class="controls">
    <textarea rows="10" cols="100" class="form-control" 
    placeholder="Message" id="message" required
    data-validation-required-message="Please enter your message" minlength="5" 
    data-validation-minlength-message="Min 5 characters" 
    maxlength="999" style="resize:none"></textarea>
    </div>
    </div>     
    <div id="success"> </div> <!-- For success/fail messages -->
    <button type="submit" class="btn btn-primary pull-right">Send</button><br />
    </div>
    </div>
    </form>
      </div>
    </div>
  </div>
</section>
<footer>
<div class="container">
        <div class="row">
            <div class="col-md-5">
              <div class="col">
                   <h4>Contact us</h4>
                   <ul>
                        <li>DELTO ( Dnyansankul e-Learning Training Organisation )</li>
                        <li>E1/1, State Bank Nagar,</li>
                        <li>Behind Vanaz Co.,</li>
                        <li>Paud RoadKothrud, Pune-411038 </li>
                        <li>Maharashtra </li>
                        <li>Call: 9822280896 </li>
                        <li>Email: info@delto.in / dnyansankul@gmail.com</li>
                    </ul>
                 </div>
            </div>
            
            <!-- <div class="col-md-3">
              <div class="col">
                    <h4>Mailing list</h4>
                    <p>Lorem ipsum dolor sit amet, ea eum labitur scsstie percipitoleat.</p>
                    <form class="form-inline">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Your email address...">
                            <span class="input-group-btn">
                                <button class="btn" type="button">Go!</button>
                            </span>
                        </div>
                    </form>
                </div>
            </div> -->
            
            <div class="pull-right ">
              <div class="col col-social-icons ">
                    <h4>Follow us</h4>
                    <a href="https://www.facebook.com/delto.in"><i class="fa fa-facebook" data-toggle="tooltip" data-placement="bottom" title="Facebook" ></i></a>
                    <a href="#"><i class="fa fa-google-plus" data-toggle="tooltip" data-placement="bottom" title="Google+" ></i></a>
                    <a href="#"><i class="fa fa-youtube-play" data-toggle="tooltip" data-placement="bottom" title="Youtube" ></i></a>
                    <a href="#"><i class="fa fa-flickr" data-toggle="tooltip" data-placement="bottom" title="Flickr" ></i></a>
                    <a href="#"><i class="fa fa-linkedin" data-toggle="tooltip" data-placement="bottom" title="LinkedIn" ></i></a>
                    <a href="#"><i class="fa fa-twitter" data-toggle="tooltip" data-placement="bottom" title="Twitter" ></i></a>
                    <a href="#"><i class="fa fa-skype" data-toggle="tooltip" data-placement="bottom" title="Skype" ></i></a>
                    <a href="#"><i class="fa fa-pinterest" data-toggle="tooltip" data-placement="bottom" title="Pinterest" ></i></a>
                </div>
            </div>

             <!-- <div class="col-md-3">
              <div class="col">
                    <h4>Latest News</h4>
                    <p>
                    Lorem ipsum dolor labitur scsstie per sit amet, ea eum labitur scsstie percipitoleat.
                    <br><br>
                    <a href="#" class="btn">Get Mores!</a>
                    </p>
                </div>
            </div> -->
        </div>
         
    </div>
    
</footer>
<section class="copyright">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 text-center"> Copyright 2018 | All Rights Reserved --   <a href="http://www.webosys.com"> Webosys Technologies</a> </div>
    </div>
    <!-- / .row --> 
  </div>
</section>

<a href="#top" class="topHome"><i class="fa fa-chevron-up fa-2x"></i></a> 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/modernizr-latest.js"></script> 
<script src="<?php echo base_url(); ?>assets/js/jquery-1.8.2.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/js/jquery.isotope.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/js/fancybox/jquery.fancybox.pack.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/js/jquery.nav.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/js/jquery.fittext.js"></script> 
<script src="<?php echo base_url(); ?>assets/js/waypoints.js"></script> 
 <script src="<?php echo base_url(); ?>assets/contact/jqBootstrapValidation.js"></script>
 <script src="<?php echo base_url(); ?>assets/contact/contact_me.js"></script>
<script src="<?php echo base_url(); ?>assets/js/custom.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/js/owl-carousel/owl.carousel.js"></script>

</body>
</html>