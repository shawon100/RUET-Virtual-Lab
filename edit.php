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

<?php

$sql="SELECT * FROM user WHERE name='$username'";
$send=mysqli_query($con,$sql);
$row=mysqli_fetch_array($send);



?>


<div class="row cspace">
<div class="col-sm-8">


  
   <form action="update.php" method="POST">
   <label for="ta">Name</label>
   <input type="text" name="name" value="<?php echo("$row[name]")  ?>" class="form-control"><br><br>
   <label for="ta">Email</label>
   <input type="text" name="email" value="<?php echo("$row[email]")  ?>" class="form-control"><br><br>
   <label for="ta">Status</label>
   <input type="text" name="status" value="<?php echo("$row[status]")  ?>" class="form-control"><br><br>
   <input type="submit" class="btn btn-success" value="Update">

   </form>
  </div>


<div class="col-sm-4">

</div>
</div>
<br><br><br>

<?php

require_once("footer.php");

?>
</div>

</body>
</html>
