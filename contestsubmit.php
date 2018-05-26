<?php

session_start();
require_once("config.php");
require_once("connection.php");

if(!isset($_SESSION['un']))
{
	header("Location:login.php");
}
if(isset($_SESSION['un']))
{
	$username=$_SESSION['un'];
}
?>



<?php

$c=0;

if(isset($_GET['id']))
{
   $problemid=$_GET['id'];
   $c=1;
}

$sql="SELECT * FROM element WHERE pbid='$problemid' ";

$sq=mysqli_query($con,$sql);

$row=mysqli_fetch_array($sq);




//echo "<textarea  style=\"display:none;\" name=\"in\" 

?>

<!DOCTYPE html>
<html>
<head>
  
    
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Submit</title>
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

include("header.php");

?>


<div class="row log">
<div class="col-sm-10">
<div class=""><h3 style="text-align:center;">Submit Code</h3></div>
</div>

<div class="col-sm-1">

</div>

<div class="col-sm-1">
  
</div>

</div>




<div class="row cspace">
<div class="col-sm-8">
<div class="form-group">
<form action="pcompile.php" name="f2" method="POST">
<label for="language">Choose Language</label>


<select class="form-control" name="language">
<option value="c">C</option>
<option value="cpp">C++</option>
<option value="cpp11">C++11</option>
<option value="java">Java</option>
<option value="python2.7">Python2</option>
<option value="python3.2">Python2</option>

</select><br><br>

<?php

    if($c==1)
    {
       //echo "<input type=\"hidden\" name=\"pbn\" value=\"$problem\">";
    	echo "<input type=\"hidden\" name=\"id\" value=\"$problemid\">";
    }
    else
    {
    	echo"<label for=\"pp\">Enter Problem ID</label><br>";
    	//echo "<input class=\"form-control\" type=\"text\" name=\"pbn\">";
    	echo "<input class=\"form-control\" type=\"text\" name=\"id\">";
    }

 ?>

<label for="ta">Write Your Code</label>
<textarea class="form-control" name="src" rows="10" cols="50"></textarea><br><br>
<input type="hidden" name='pbn' value="<?php echo $row['pbname']; ?>">
<input type="submit" class="btn btn-success" value="Submit"><br><br><br>


</form>


</div>

<div class="col-sm-4">

</div>
</div>
</div>
<br><br><br>

<?php

include("footer.php");

?>


</div>



</body>

</html>