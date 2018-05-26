<?php

session_start();
date_default_timezone_set("Asia/Dhaka");
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
        <title>All Submission</title>
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
<div class=""><h3 style="text-align:center;">All Submission</h3></div>
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
     <th>ID</th>
     <th>Name</th>
     <th>Problem Name</th>
     <th>Verdict</th>
     <th>Points</th>
    </tr>
    </thead>
    <tbody>



<?php


error_reporting(0);
if(isset($_POST['id']))
{
  $cid=$_POST['id'];
  $uo=$_POST['result'];
  $pname=$_POST['pb'];
  $nid=$_POST['mid'];
  $conid=$r4['id'];
  $result=$_POST['vd'];
  
}

$ch=1;

if(isset($_GET['id']) && !isset($_GET['show']))
{
  $conid=$_GET['id'];
   $ch=0;
   error_reporting(0);
   $per_page=30;

  if(isset($_GET['page']))
  {
    $page=$_GET['page'];
  }
  else
  {
    $page=1;
  }

  $start=($page-1)*$per_page;




   $show="SELECT * FROM submission WHERE cid='$conid' ORDER BY sid DESC limit $start,$per_page";

   
   $sts=mysqli_query($con,$show);



while($row=mysqli_fetch_array($sts))
{

  if($row['verdict']=="Accepted")
  {
     echo "<tr><td>$row[sid]</td><td><a href=\"profile.php?user=$row[sname]\">$row[sname]</a></td><td><a href=\"details.php?name=$row[pbname]&cod=$conid\">$row[pbname]</a></td><td><div class=\"btn btn-success btn-xs\">$row[verdict]</div></td><td>$row[point]</td></tr>";
  }
  else if($row['verdict']=="Time Limit Exceed")
  {
     echo "<tr><td>$row[sid]</td><td><a href=\"profile.php?user=$row[sname]\">$row[sname]</a></td><td><a href=\"details.php?name=$row[pbname]&cod=$conid\">$row[pbname]</a></td><td><div class=\"btn btn-primary btn-xs\">$row[verdict]</div></td><td>$row[point]</td></tr>";
  }
  else
  {
     echo "<tr><td>$row[sid]</td><td><a href=\"profile.php?user=$row[sname]\">$row[sname]</a></td><td><a href=\"details.php?name=$row[pbname]&cod=$conid\">$row[pbname]</a></td><td><div class=\"btn btn-danger btn-xs\">$row[verdict]</div></td><td>$row[point]</td></tr>";
  }
}

  echo "</tbody>
</table>
</div>";

  $psql="SELECT * FROM submission WHERE cid='$conid' ORDER BY sid DESC";
  $sn=mysqli_query($con,$psql);
  $total_rows=mysqli_num_rows($sn);
  $total_page=ceil($total_rows/$per_page);
  $c="active";

  echo "<div class=\"contain con\"><ul class=\"pagination\"><li><a href=\"contestsubmission.php?id=$conid&page=1\">First Page</a></li>";

  for ($i=1; $i <$total_page ; $i++) {
      
    if($page==$i)
    {
      $c="active";
        }
        else
        {
          $c="";
        }
    echo "<li class=\"$c\"><a href=\"contestsubmission.php?id=$conid&page=$i\">$i</a></li>";
  }


  echo "<li><a href=\"contestsubmission.php?id=$conid&page=$total_page\">Last Page</a></li></ul></div>";


}



if(isset($_GET['id']) && isset($_GET['show']))
{
  $conid=$_GET['id'];
  $suser=$_GET['show'];
   $ch=0;
   error_reporting(0);
   $per_page=30;

  if(isset($_GET['page']))
  {
    $page=$_GET['page'];
  }
  else
  {
    $page=1;
  }

  $start=($page-1)*$per_page;




   $show="SELECT * FROM submission WHERE cid='$conid' AND sname='$suser' ORDER BY sid DESC limit $start,$per_page";

   
   $sts=mysqli_query($con,$show);
   $detect=mysqli_num_rows($sts);



while($row=mysqli_fetch_array($sts))
{

  if($row['verdict']=="Accepted")
  {
     echo "<tr><td>$row[sid]</td><td><a href=\"profile.php?user=$row[sname]\">$row[sname]</a></td><td><a href=\"details.php?name=$row[pbname]&cod=$conid\">$row[pbname]</a></td><td><div class=\"btn btn-success btn-xs\">$row[verdict]</div></td><td>$row[point]</td></tr>";
  }
  else if($row['verdict']=="Time Limit Exceed")
  {
     echo "<tr><td>$row[sid]</td><td><a href=\"profile.php?user=$row[sname]\">$row[sname]</a></td><td><a href=\"details.php?name=$row[pbname]&cod=$conid\">$row[pbname]</a></td><td><div class=\"btn btn-primary btn-xs\">$row[verdict]</div></td><td>$row[point]</td></tr>";
  }
  else
  {
     echo "<tr><td>$row[sid]</td><td><a href=\"profile.php?user=$row[sname]\">$row[sname]</a></td><td><a href=\"details.php?name=$row[pbname]&cod=$conid\">$row[pbname]</a></td><td><div class=\"btn btn-danger btn-xs\">$row[verdict]</div></td><td>$row[point]</td></tr>";
  }
}

  echo "</tbody>
</table>
</div><br><br>";

 echo "<div class=\"alert alert-success\">$suser's Total Submission=$detect</div>";

  $psql="SELECT * FROM submission WHERE cid='$conid' AND sname='$suser' ORDER BY sid DESC";
  $sn=mysqli_query($con,$psql);
  $total_rows=mysqli_num_rows($sn);
  $total_page=ceil($total_rows/$per_page);
  $c="active";

  echo "<div class=\"contain con\"><ul class=\"pagination\"><li><a href=\"contestsubmission.php?id=$conid&page=1\">First Page</a></li>";

  for ($i=1; $i <$total_page ; $i++) {
      
    if($page==$i)
    {
      $c="active";
        }
        else
        {
          $c="";
        }
    echo "<li class=\"$c\"><a href=\"contestsubmission.php?id=$conid&page=$i\">$i</a></li>";
  }


  echo "<li><a href=\"contestsubmission.php?id=$conid&page=$total_page\">Last Page</a></li></ul></div>";


}



if(isset($_POST['id']))
{

  

    $sqlp="SELECT * FROM element WHERE pbid='$cid'";

    $sqp=mysqli_query($con,$sqlp);

    $rowp=mysqli_fetch_array($sqp);



   $conid=$rowp['id'];

   $q3="SELECT * FROM rapl_oj_contest WHERE id='$conid'";
    $sq3=mysqli_query($con,$q3);

      $q4="SELECT TIME_FORMAT(end_at,'%H') end_at FROM rapl_oj_contest  ORDER BY date_on DESC";
       $q5="SELECT TIME_FORMAT(end_at,'%i') end_at FROM rapl_oj_contest  ORDER BY date_on DESC";
        $q6="SELECT TIME_FORMAT(end_at,'%s') end_at FROM rapl_oj_contest  ORDER BY date_on DESC";


      $sq4=mysqli_query($con,$q4);
      $sq5=mysqli_query($con,$q5);
      $sq6=mysqli_query($con,$q6);
      

      
   
  while($rowp=mysqli_fetch_array($sq3))
    {
      $d=date("Y-m-d");
      $t=date("H:i:s");
      $m=$rowp['start_at'];


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
      
      $en=$rowp['end_at'];


      $seconds = strtotime($en) - strtotime($m);
      $ss= strtotime($en) - strtotime($t);
      $min=intval($seconds/60);
      $sec=intval($seconds%60);
      $hr=intval($min/60);
      $m=intval($min%60);

      $total_time=(($h*60+$mt)*60)+$scnd;
      $point=(200/$seconds)*$total_time;
      $cpoint=sprintf('%0.2f', $point);




      //$h hour $mt miniute $scnd second
     

 
      

     
      


     
      /*echo(" <a href=\"save.php?name=$row[table_name]\">$row[table_name]</a><br><br>");*/
     }

$query="SELECT output FROM element WHERE pbid='$cid'";
$quo="SELECT * FROM element WHERE pbid='$cid'";
$sq=mysqli_query($con,$query);
$sq1=mysqli_query($con,$quo);
$r3=mysqli_fetch_array($sq);
$r4=mysqli_fetch_array($sq1);

$ao=$r3['output'];
$to=$r4['uoutput'];
$conid=$r4['id'];
$proname=$r4['pbname'];
$count=0;
$mpoint=0.00;
$ignore=0;
//var_dump($uo);
//var_dump($ao);

$checkq="SELECT * FROM submission WHERE pbname='$proname' AND cid='$conid' AND sname='$username' AND status='1'";
$scheckq=mysqli_query($con,$checkq);
$detect=mysqli_num_rows($scheckq);
if($detect>=1)
{
   
     $ignore=1;
   
}
else
{
   $ignore=0;
}

  if($result!="lt")
  {
   
    if($result=="e")
    {
      $result="Compilation Error";
      $count=0;
      $mpoint=$mpoint-5.00;
    }
    else if(strcmp($uo,$ao)==0)
    {
      //echo "Accepted";
      $result="Accepted";
      $count=1;
      $mpoint=$point;
    }
    else
    {
     //echo "Wrong Answer";
      $result="Wrong Answer";
      $count=0;
      $mpoint=$mpoint-5.00;
    }
  }
  else
  {
     $result="Time Limit Exceed";
     $count=0;
     $mpoint=$mpoint-5.00;
  }


   $per_page=30;

  if(isset($_GET['page']))
  {
    $page=$_GET['page'];
  }
  else
  {
    $page=1;
  }

  $start=($page-1)*$per_page;





if($ignore==0)
{
   $sql="INSERT INTO submission VALUES('$nid','$username','$result','$pname','$conid','$count','$mpoint')";
   $stq=mysqli_query($con,$sql);
}
else
{
   echo "
<script type=\"text/javascript\">
  alert('You have already got accepted!');
</script>";
}

$show="SELECT * FROM submission WHERE cid='$conid' ORDER BY sid DESC limit $start,$per_page";

$sts=mysqli_query($con,$show);

/*$tsub="SELECT * FROM submission WHERE pbname='$proname' AND cid='$conid' AND sname='$username'";
$stsub=mysqli_query($con,$tsub);
$detect=mysqli_num_rows($stsub);*/


while($row=mysqli_fetch_array($sts))
{

  if($row['verdict']=="Accepted")
  {
     echo "<tr><td>$row[sid]</td><td><a href=\"profile.php?user=$row[sname]\">$row[sname]</a></td><td><a href=\"details.php?name=$row[pbname]&cod=$conid\">$row[pbname]</a></td><td><div class=\"btn btn-success btn-xs\">$row[verdict]</div></td><td>$row[point]</td></tr>";
  }
  else if($row['verdict']=="Time Limit Exceed")
  {
     echo "<tr><td>$row[sid]</td><td><a href=\"profile.php?user=$row[sname]\">$row[sname]</a></td><td><a href=\"details.php?name=$row[pbname]&cod=$conid\">$row[pbname]</a></td><td><div class=\"btn btn-primary btn-xs\">$row[verdict]</div></td><td>$row[point]</td></tr>";
  }
  else
  {
     echo "<tr><td>$row[sid]</td><td><a href=\"profile.php?user=$row[sname]\">$row[sname]</a></td><td><a href=\"details.php?name=$row[pbname]&cod=$conid\">$row[pbname]</a></td><td><div class=\"btn btn-danger btn-xs\">$row[verdict]</div></td><td>$row[point]</td></tr>";
  }


}

   echo "</tbody>
</table>
</div>";
  
  $psql="SELECT * FROM submission WHERE cid='$conid' ORDER BY sid DESC";
  $sn=mysqli_query($con,$psql);
  $total_rows=mysqli_num_rows($sn);
  $total_page=ceil($total_rows/$per_page);
  $c="active";

  echo "<div class=\"contain con\"><ul class=\"pagination\"><li><a href=\"contestsubmission.php?id=$conid&page=1\">First Page</a></li>";

  for ($i=1; $i <$total_page ; $i++) {
      
    if($page==$i)
    {
      $c="active";
    }
        else
        {
          $c="";
        }
    echo "<li class=\"$c\"><a href=\"contestsubmission.php?id=$conid&page=$i\">$i</a></li>";
  }


  echo "<li><a href=\"contestsubmission.php?id=$conid&page=$total_page\">Last Page</a></li></ul></div>";

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
</div>


</body>
</html>
