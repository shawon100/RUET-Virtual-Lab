<?php
$u=0;
if(isset($_SESSION['un']))
{
  $username=$_SESSION['un'];
  $u=1;

}




?>


<!DOCTYPE html>
<html>
<head>
  
    
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Home</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="css/vlab.css">
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
        <script src="js/vendor/jquery-1.12.0.min.js"></script>
        <script src="bootstrap-3.3.7/js/bootstrap.min.js" </script>
        <script src="bootstrap-3.3.7/js/bootstrap.js" </script>
        <script src="js/jquery.nivo.slider.js" type="text/javascript"></script>





<script type="text/javascript">
$(window).load(function() {
  $('#slider').nivoSlider({
    effect:'random',
    slices:10,
    animSpeed:500,
    pauseTime:5000,
    startSlide:0, //Set starting Slide (0 index)
    directionNav:false,
    directionNavHide:false, //Only show on hover
    controlNav:false, //1,2,3...
    controlNavThumbs:false, //Use thumbnails for Control Nav
    pauseOnHover:true, //Stop animation while hovering
    manualAdvance:false, //Force manual transitions
    captionOpacity:0.8, //Universal caption opacity
    beforeChange: function(){},
    afterChange: function(){},
    slideshowEnd: function(){} //Triggers after all slides have been shown
  });
});
</script>



</head>
<body>

  <div class="row">
  <div class="col-sm-12">
  <div id="custom-bootstrap-menu" class="navbar navbar-default " role="navigation">
  <center><span class="ht"><img src="img/ruet.png" width="50px" height="50px"/></span><span class="ht">RUET Virtual LAB</span></center>
    <div class="container-fluid">
        <div class="navbar-header "><a class="navbar-brand " href="home.php"></a>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-menubuilder"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse navbar-menubuilder">
            <ul class="nav navbar-nav navbar-left">
                <li class="space2"><a href="home.php">Home</a>
                <li class="space2"><a href="compiler.php">Lab Compiler</a>
                <li class="space2" class="dropdown" class="dropdown"><a href="" class="dropdown-toggle"  data-toggle="dropdown">Lab Practice<b class="caret"></b></a>
                    <ul class="dropdown-menu" role="menu">
                        <li class="space2"><a href="archive.php">Sample Problems</a>
                        </li>
                    </ul>
                </li>
                <li class="space2" class="dropdown" class="dropdown"><a href="" class="dropdown-toggle"  data-toggle="dropdown">Lab Archive <b class="caret"></b></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="contest.php?tag=c">C Lab</a>
                        </li>
                        <li><a href="contest.php?tag=oop">OOP Lab</a>
                        </li>
                        <li><a href="/contact">Algorithm Lab</a>
                        </li>
                        <li><a href="/contact">Data Structure Lab</a>
                        </li>
                        <li><a href="contest.php?tag=analytical">Analytical Programming Lab</a></li>
                    </ul>
                </li>
                <?php
                  if($u==1)
                  {
                    echo "<li class=\"space2\"><a href=\"profile.php?user=$username\">$username</a>";
                    echo "<li class=\"space2\"><a href=\"logout.php\">Log Out</a>";
                  }
                  else
                  {
                    echo "<li class=\"space2\"><a href=\"login.php\">Sign In</a>";
                    echo "<li class=\"space2\"><a href=\"sign.php\">Sign UP</a>";
                  }
                ?>
               
            </ul>
        </div>
    </div>
</div>
</div>
</div>
<div class="row">
<div class="col-sm-12">
<div class="template clear">
        <div id="slider">
            <a href="#"><img  src="images/slideshow/programming.jpg" class="img-responsive" width="1224px" alt="nature 1" title="Virtual Lab Automatic Judges Code And Show Result" /></a>
            <a href="#"><img src="images/slideshow/p2.jpg" class="img-responsive"  width="1224px alt="nature 2" title="Updated C/C++ And Java Compiler" /></a>
            <a href="#"><img  src="images/slideshow/p3.jpg" class="img-responsive" width="1224px alt="nature 3" title="Lab Archives And Efficient Lab Exam Engine" /></a>
            <a href="#"><img  src="images/slideshow/p4.jpg" class="img-responsive" width="1224px alt="nature 4" title="Teachers Can Manage Their Lab Easily" /></a>
        </div>

</div>
</div>
<br><br>
<script type="text/javascript">
  $(window).scroll(function() {
  $(".slideanim").each(function(){
    var pos = $(this).offset().top;

    var winTop = $(window).scrollTop();
    if (pos < winTop + 600) {
      $(this).addClass("slide");
    }
  });
});
</script>
</body>
</html>