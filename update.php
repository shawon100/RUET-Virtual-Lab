<?php

session_start();
require_once("config.php");

if(!isset($_SESSION["un"]))
{
	header("Location:login.php");
}

if(isset($_SESSION['un']))
{
	$username=$_SESSION['un'];
}

if(isset($_GET['user']))
{
  $data=$_GET['user'];
}

?>


<!DOCTYPE html>
<html>
<head>
  
    
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Profile</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/style.css">
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
        <script src="js/vendor/jquery-1.12.0.min.js"></script>
        <script src="bootstrap-3.3.7/js/bootstrap.min.js" </script>
        <script src="bootstrap-3.3.7/js/bootstrap.js" </script>
        <script src="js/jquery.nivo.slider.js" type="text/javascript"></script>

        

        
</head>
<body>
<div class="main">
<?php

require_once("header.php");

?>


<div class="row log">
<div class="col-sm-10">
<div class=""><h3 style="text-align:center;"><?php  echo"Update $username's  Profile"; ?></h3></div>
</div>

<div class="col-sm-1">

</div>

<div class="col-sm-1">
  
</div>

</div>

<div class="row cspace">
<div class="col-sm-8">
<?php

if(isset($_POST['name']) || isset($_POST['email'])||isset($_POST['status']))
{
   $name=$_POST['name'];
   $email=$_POST['email'];
   $status=$_POST['status'];

   $sql="UPDATE user SET name='$name', email='$email', status='$status' WHERE name='$username'";
   $send=mysqli_query($con,$sql);
 

   echo "<div style=\"margin-left:250px;\" class=\"alert alert-success\">
  <strong>Your Profile Has Been Updated! Go To Your <a href=\"profile.php?user=$username\">Profile</a></strong>
   </div><br><br><br><br>";


}





?>





  
   
  </div>


<div class="col-sm-4">

</div>
</div>
<br><br><br><br>
<?php

require_once("footer.php");

?>
</div>

</body>
</html>
