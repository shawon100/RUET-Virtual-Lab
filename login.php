<?php

session_start();

if(isset($_SESSION["un"]))
{
  header("Location:home.php");
}





?>




<!DOCTYPE html>
<html>
<head>
  
    
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Sign In</title>
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
<div class="row">
<div class="col-sm-8">
<div class="form-group log">
<form action="process.php" name="f1" method="POST">

<label for="username">Username</label>
<input type="text" name="un" class="form-control" placeholder="Enter Username" required><br>
<label for="password">Password</label>
<input type="password" class="form-control"  name="ps" placeholder="Enter Password" required><br>

<button type="submit" class="btn btn-success">Sign In</button><br><br>
  

</form>
</div>
</div>

<div class="col-sm-4">

</div>
</div>
<br><br><br><br>

<div class="container">
<div class="row">
<div class="col-sm-9">
<?php

if(isset($_GET['value']))
{
   
   echo "<div style=\"margin-left:300px;\" class=\"alert alert-danger\">
  <strong>Sign in Failed!</strong>  Wrong Username And Password
   </div><br>";
    
}






?>
</div>
<div class="col-sm-3">
</div>
</div>
</div><br><br><br>

<?php

include("footer.php");

?>

</div>

</body>
</html>


