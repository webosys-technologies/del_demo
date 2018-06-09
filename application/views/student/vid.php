<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<title>Player</title>
<!--<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />-->
  <!-- Chang URLs to wherever Video.js files will be hosted -->
 
  <!-- video.js must be in the <head> for older IEs to work. -->
  <script src="<?php echo base_url();?>assets/js/video.js"></script>
<link href="<?php echo base_url();?>assets/css/video-js.css" rel="stylesheet" type="text/css"></link>
  <!-- Unless using the CDN hosted version, update the URL to the Flash SWF -->
  <script>
    videojs.options.flash.swf = "video-js.swf";
  </script>
<script type="text/javascript" src="<?php echo base_url();?>js/hdwplayer.js"></script>
<style>
#iframe1
            {
                height:   100%;
                left:     0px;
                position: absolute;
                top:      0px;
                width:    100%;
            }
</style>

</head>
<body>
    <object>
   <embed type="application/x-mplayer2" 
name="mediaplayer1" autoplay="false" autostart="false" 
width="900" height="600" loop="false" controls="false" 
allowFullscreen="True" 
src="<?php echo base_url();?>videos/1.avi"></embed>
</object>

</body>
</html>