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

?>




<!DOCTYPE html>
<html>
<head>
  
    
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Archive</title>
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
<div class=""><h3 style="text-align:center;">Problem Archive</h3></div>
</div>

<div class="col-sm-1">

</div>

<div class="col-sm-1">
  
</div>

</div>

<div class="row cspace">

<div class="col-sm-2">
</div>

<div class="col-sm-6 pbs">

<?php
require_once("connection.php");

date_default_timezone_set("Asia/Dhaka");

if(isset($_POST['cn']))
{

$contest=$_POST['cn'];
$cid=$_POST['ci'];
$pn=$_POST['pb'];
$des=$_POST['c1'];
$au=$_POST['c2'];
$tc=$_POST['c3'];
$out=$_POST['c4'];


$q2="INSERT into element  VALUES('$cid','$contest','$pn','$des','$au','$tc','$out','','')";
$q3="SELECT * FROM element WHERE cname='$contest'";

$sq2=mysqli_query($con,$q2);
$sq3=mysqli_query($con,$q3);


while($row=mysqli_fetch_array($sq3))
{
  echo("<a href=\"details.php?id=$row[pbid]\"><div class=\"pb\">$row[pbname]</div></a><br>");
}



}
if(isset($_GET['name']))
{
  $n=$_GET['name'];
  $q3="SELECT * FROM element WHERE cname='$n'";

    $r=mysqli_query($con,$q3);

   while($row=mysqli_fetch_array($r))
   {
      echo("<a href=\"details.php?id=$row[pbid]\"><div class=\"pb\">$row[pbname]</div></a><br>");
   }

}





/*require_once("connection.php");

$q6="SELECT table_name FROM information_schema.tables where table_schema='problem' ";

$res=mysqli_query($con,$q6);

while($row=mysqli_fetch_array($res))
{
  error_reporting(0);
  echo '<form action="test.php" method="POST"> <input type="hidden" name="pb" value="' . htmlspecialchars($row[table_name]) . '" /><input type="submit" value=" ' . htmlspecialchars($row[table_name]) .'  "/></form>'."<br>";
}
*/

?>
</div>
<div class="col-sm-3">

<?php


if(isset($_GET['name']))
{
  $n=$_GET['name'];
  $q3="SELECT id FROM element WHERE cname='$n'";

    $r=mysqli_query($con,$q3);

   $r1=mysqli_fetch_array($r);
  
   echo("<a href=\"contestsubmission.php?id=$r1[id]\"><div class=\"btn btn-primary\">Submissions</div></a><br><br>");
    echo("<a href=\"standings.php?id=$r1[id]\"><div class=\"btn btn-primary\"> Standings </div></a><br><br><br>");


  $conid=$r1['id'];

    $q3="SELECT * FROM rapl_oj_contest WHERE id='$conid'";
    $sq3=mysqli_query($con,$q3);

      $q4="SELECT TIME_FORMAT(end_at,'%H') end_at FROM rapl_oj_contest  ORDER BY date_on DESC";
       $q5="SELECT TIME_FORMAT(end_at,'%i') end_at FROM rapl_oj_contest  ORDER BY date_on DESC";
        $q6="SELECT TIME_FORMAT(end_at,'%s') end_at FROM rapl_oj_contest  ORDER BY date_on DESC";


      $sq4=mysqli_query($con,$q4);
      $sq5=mysqli_query($con,$q5);
      $sq6=mysqli_query($con,$q6);
      

      
   
  while($row=mysqli_fetch_array($sq3))
    {
      $d=date("Y-m-d");
      $t=date("H:i:s");
      $m=$row['start_at'];

      $nr=mysqli_fetch_array($sq4);
      $nm=mysqli_fetch_array($sq5);
      $ns=mysqli_fetch_array($sq6);

      $shr=$nr['end_at'];
      $shm=$nm['end_at'];
      $shs=$ns['end_at'];
      $cur=date('H');
      $curm=date('i');
      $curs=date('s');

      $h=$shr-$cur;
      $mt=$shm-$curm;
      $scnd=$shs-$curs;

      if($scnd<0)
      {
         $scnd=$scnd+60;
         $mt=$mt-1;
      }

      if($mt<0)
      {
        $mt=$mt+60;
        $h=$h-1;
      }

      if($h<0)
      {
        $h=$h+24;
      }
      
      $en=$row['end_at'];

      $seconds = strtotime($t) - strtotime($m);
      $ss= strtotime($en) - strtotime($t);
      $min=intval($seconds/60);
      $sec=intval($seconds%60);
      $hr=intval($min/60);
      $m=intval($min%60);


     


      
     
     
    
        if($row['date_on']==$d && $seconds>=0 && $ss>=0 )
        {
             echo("<div style=\"border:1px solid gray;padding:10px;border-radius:5px;\">Lab Name: <a href=\"contestproblem.php?name=$row[cname]\">$row[cname]</a><br><br>Lab  Date: $row[date_on] <br><br>Start Time: $row[start_at]<br><br>End Time: $row[end_at] <br><br> Status: <b>Running</b> <br><br>Time Remaining:  $h hour $mt miniute $scnd second <br><br></div>");
         }
         else if($d>$row['date_on'] || ($d==$row['date_on'] && $t>$en))
         {
            echo("<div style=\"border:1px solid gray;padding:10px;border-radius:5px;\">Lab  Name: <a href=\"contestproblem.php?name=$row[cname]\">$row[cname]</a><br><br>Lab  Date:  $row[date_on] <br><br>Start Time: $row[start_at]<br><br>End Time: $row[end_at] <br><br>Status: <b>Finished</b><br><br></div>");
         }
         else
         {
            echo("<div style=\"border:1px solid gray;padding:10px;border-radius:5px;\">Lab  Name: $row[cname]<br><br>Lab  Date:  $row[date_on] <br><br>Start Time: $row[start_at]<br><br>End Time: $row[end_at] <br><br>Status: <b>Not Started Yet</b><br><br></div>");
         }
    }
}



?>

</div>
<div class="col-sm-1">
</div>
</div>
<br><br><br><br><br><br>

<?php

include("footer.php");

?>
</div>


</body>
</html>