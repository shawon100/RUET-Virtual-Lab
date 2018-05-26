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


<!DOCTYPE html>
<html>
<head>
  
    
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Standings</title>
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
<div class=""><h3 style="text-align:center;">Standings</h3></div>
</div>

<div class="col-sm-1">

</div>

<div class="col-sm-1">
  
</div>

</div>




<div class="row cspace">
<div class="col-sm-1">
</div>
<div class="col-sm-9">
  <div class="table-responsive">
    <table class="table">
    <thead>
    <tr>
     <th>Rank</th>
     <th>Name</th>
     <th>Total Solved</th>
     <th>Total Points</th>
     <th>Submission</th>
    </tr>
    </thead>
    <tbody>



<?php


if(isset($_GET['id']))
{
  $conid=$_GET['id'];
  

/*$sql="SELECT sname,SUM(status) AS Solved FROM ( SELECT * FROM submission WHERE cid='$conid' AND status='1'  GROUP BY  pbname,sname )T1 GROUP BY sname

UNION ALL

SELECT * FROM  (SELECT sname, SUM(status) As Solved  FROM submission WHERE cid='$conid' GROUP BY  sname)T2  HAVING Solved='0'
ORDER BY `Solved`  DESC ";*/

$sql="SELECT sname, SUM(status) As Solved, SUM(point) As Points FROM submission Where cid='$conid' GROUP BY sname ORDER BY Points DESC";

$send=mysqli_query($con,$sql);
$i=0;
while($row=mysqli_fetch_array($send))
{
  $i++;
  echo "<tr><td>$i</td><td><a href=\"profile.php?user=$row[sname]\">$row[sname]</a></td><td>$row[Solved]</td><td>$row[Points]</td><td><a href=\"contestsubmission.php?id=$conid&show=$row[sname]\"><div class=\"btn btn-primary btn-xs\">Show</td></tr>";
}

  echo "</tbody>
</table>
</div><br><br><br><br><br>";

 

}
?>
</div>

<div class="col-sm-2">

</div>
</div>
</div>
<br><br><br>

<?php

include("footer.php");

?>




</body>
</html>












