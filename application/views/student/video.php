<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>CodeIgniter User Registration Form Demo</title>
	<link href="assets/bootstrap.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="assets/bootstrap.min.css">
        <script type="text/javascript" src="assets/js/jQuery-2.1.4.min.js"></script>
        <script src="assets/js/jquery-3.2.1.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="content-wrapper">
     <section class="content-header">
      <h1>
        Videos
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
    
    
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="well well-sm">
                <h4><span class="label label-default">Video Topic</span></h4>
                <div class="embed-responsive embed-responsive-16by9">
		<video width="340" height="221" src="<?php echo base_url();?>videos/Introduction to Earth Science.mp4" controls>
  Your browser does not support this type of video.
                </video>
                    
                </div>
                <p>Video Title:</p>
                </div>
            </div>
            
           <div class="col-md-4">
                <div class="well well-sm">
              <h4><span class="label label-default">Video Topic</span></h4>
               <div class="embed-responsive embed-responsive-16by9">
              
		<video width="350" height="221" src="<?php echo base_url();?>videos/Nao Robot.mp4" controls>
  Your browser does not support this type of video.
                </video>
                       
                   </div>
                <p>Video Title:</p>
                </div>
            </div>
            
             <div class="col-md-4">
                <div class="well well-sm">
              <h4><span class="label label-default">Video Topic</span></h4>
               <div class="embed-responsive embed-responsive-16by9">
              
                   <video width="350" height="221" src="<?php echo base_url();?>videos/Top 10 most Amazing Technologies.mp4" controls>
  Your browser does not support this type of video.
                </video>
                       
                   </div>
                <p>Video Title:</p>
                </div>
            </div>
            
            
            
        </div>
                
            
    </div>
  </div>
    
    
     <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>
</body>