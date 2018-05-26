<?php

session_start();

if(!isset($_SESSION["un"]))
{
  header("Location:login.php");
}

if(isset($_SESSION['un']))
{
  $username=$_SESSION['un'];
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
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
        <script src="js/vendor/jquery-1.12.0.min.js"></script>
        <script src="bootstrap-3.3.7/js/bootstrap.min.js" </script>
        <script src="bootstrap-3.3.7/js/bootstrap.js" </script>
        <script src="js/jquery.nivo.slider.js" type="text/javascript"></script>
        <style>
          code {
        background-color: #EEEEEE;
        font-family: Consolas,Menlo,Monaco,Lucida Console,Liberation Mono,DejaVu Sans Mono,Bitstream Vera Sans Mono,Courier New,monospace,serif;
         white-space: pre;
       }
      pre {
        background-color: #EEEEEE;
        font-family: Consolas,Menlo,Monaco,Lucida Console,Liberation Mono,DejaVu Sans Mono,Bitstream Vera Sans Mono,Courier New,monospace,serif;
        margin-bottom: 10px;
        max-height: 600px;
        overflow: auto;
        padding: 5px;
        width: auto;
        white-space: pre;
      }



    </style>






</head>
<body>
<div class="main">
<?php

include("header.php");

?>


<div class="row log">
<div class="col-sm-10">
<div class=""><h3 style="text-align:center;">Show Code</h3></div>
</div>

<div class="col-sm-1">

</div>

<div class="col-sm-1">
  
</div>

</div>




<div class="row cspace">
<div class="col-sm-8">

<?php



require_once("config.php");

if(isset($_GET['nm']))
{
$data=$_GET['nm'];
$get=$_GET['id'];
}



$show="SELECT * FROM code WHERE id='$get'";

$sq=mysqli_query($con,$show);

echo "Submitted By : $data<br><br>";

while($row=mysqli_fetch_array($sq))
{
	echo("Submit Id: $row[id]<br><br><textarea id='div' class=\"form-control\" rows=\"50\" cols=\"40\">$row[source_code]</textarea>");
}



?>


</div>

<div class="col-sm-4">

</div>
</div>
</div><br><br><br>

<?php

include("footer.php");

?>

</div>

</body>
</html>