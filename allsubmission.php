<?php

session_start();

require_once("config.php");
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
  $result=$_POST['vd'];
  
}

$ch=1;
echo "$result";
if(!isset($_POST['id']) && !isset($_GET['name']))
{
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




   $show="SELECT * FROM submission ORDER BY sid DESC limit $start,$per_page";

   
   $sts=mysqli_query($con,$show);



while($row=mysqli_fetch_array($sts))
{

  if($row['verdict']=="Accepted")
  {
     echo "<tr><td><a href=\"showcode.php?id=$row[sid]&nm=$row[sname]\">$row[sid]</a></td><td><a href=\"profile.php?user=$row[sname]\">$row[sname]</a></td><td><a href=\"description.php?name=$row[pbname]\">$row[pbname]</a></td><td><div class=\"btn btn-success btn-xs\">$row[verdict]</div></td></tr>";
  }
  else if($row['verdict']=="Time Limit Exceed")
  {
     echo "<tr><td><a href=\"showcode.php?id=$row[sid]&nm=$row[sname]\">$row[sid]</a></td><td><a href=\"profile.php?user=$row[sname]\">$row[sname]</a></td><td><a href=\"description.php?name=$row[pbname]\">$row[pbname]</a></td><td><div class=\"btn btn-primary btn-xs\">$row[verdict]</div></td></tr>";
  }
  else
  {
     echo "<tr><td><a href=\"showcode.php?id=$row[sid]&nm=$row[sname]\">$row[sid]</a></td><td><a href=\"profile.php?user=$row[sname]\">$row[sname]</a></td><td><a href=\"description.php?name=$row[pbname]\">$row[pbname]</a></td><td><div class=\"btn btn-danger btn-xs\">$row[verdict]</div></td></tr>";
  }

}

  echo "</tbody>
</table>
</div>";

  $psql="SELECT * FROM submission ORDER BY sid DESC";
  $sn=mysqli_query($con,$psql);
  $total_rows=mysqli_num_rows($sn);
  $total_page=ceil($total_rows/$per_page);
  $c="active";

  echo "<div class=\"contain con\"><ul class=\"pagination\"><li><a href=\"allsubmission.php?page=1\">First Page</a></li>";

  for ($i=1; $i <$total_page ; $i++) {
      
    if($page==$i)
    {
      $c="active";
        }
        else
        {
          $c="";
        }
    echo "<li class=\"$c\"><a href=\"allsubmission.php?page=$i\">$i</a></li>";
  }


  echo "<li><a href=\"allsubmission.php?page=$total_page\">Last Page</a></li></ul></div>";


}

if(isset($_GET['name']))
{
   $name=$_GET['name'];
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




   $show="SELECT * FROM submission WHERE sname='$name' ORDER BY sid DESC limit $start,$per_page";

   
   $sts=mysqli_query($con,$show);



while($row=mysqli_fetch_array($sts))
{

  if($row['verdict']=="Accepted")
  {
     echo "<tr><td><a href=\"showcode.php?id=$row[sid]&nm=$row[sname]\">$row[sid]</a></td><td><a href=\"profile.php?user=$row[sname]\">$row[sname]</a></td><td><a href=\"description.php?name=$row[pbname]\">$row[pbname]</a></td><td><div class=\"btn btn-success btn-xs\">$row[verdict]</div></td></tr>";
  }
  else if($row['verdict']=="Time Limit Exceed")
  {
     echo "<tr><td><a href=\"showcode.php?id=$row[sid]&nm=$row[sname]\">$row[sid]</a></td><td><a href=\"profile.php?user=$row[sname]\">$row[sname]</a></td><td><a href=\"description.php?name=$row[pbname]\">$row[pbname]</a></td><td><div class=\"btn btn-primary btn-xs\">$row[verdict]</div></td></tr>";
  }
  else
  {
     echo "<tr><td><a href=\"showcode.php?id=$row[sid]&nm=$row[sname]\">$row[sid]</a></td><td><a href=\"profile.php?user=$row[sname]\">$row[sname]</a></td><td><a href=\"description.php?name=$row[pbname]\">$row[pbname]</a></td><td><div class=\"btn btn-danger btn-xs\">$row[verdict]</div></td></tr>";
  }
}

  echo "</tbody>
</table>
</div>";

  $psql="SELECT * FROM submission WHERE sname='$name' ORDER BY sid DESC";
  $sn=mysqli_query($con,$psql);
  $total_rows=mysqli_num_rows($sn);
  $total_page=ceil($total_rows/$per_page);
  $c="active";

  echo "<div class=\"contain con\"><ul class=\"pagination\"><li><a href=\"allsubmission.php?page=1&name=$name\">First Page</a></li>";

  for ($i=1; $i <$total_page ; $i++) {
      
    if($page==$i)
    {
      $c="active";
        }
        else
        {
          $c="";
        }
    echo "<li class=\"$c\"><a href=\"allsubmission.php?page=$i&name=$name\">$i</a></li>";
  }


  echo "<li><a href=\"allsubmission.php?page=$total_page&name=$name\">Last Page</a></li></ul></div>";


}





if(isset($_POST['id']))
{

//var_dump($uo);

//$l=strlen($uo)-2;


//$m=strlen($ao);



//var_dump($ao);

  $cid=$_POST['id'];
  $uo=$_POST['result'];
  $pname=$_POST['pb'];
  $nid=$_POST['mid'];
  $result=$_POST['vd'];
  



$query="SELECT output FROM archieve WHERE id='$cid'";
$sq=mysqli_query($con,$query);
$r3=mysqli_fetch_array($sq);

$ao=$r3['output'];
//var_dump($uo);
//var_dump($ao);


  if($result!="lt")
  {
   
    if($result=="e")
    {
      $result="Compilation Error";
    }
    else if(strcmp($uo,$ao)==0)
    {
      //echo "Accepted";
      $result="Accepted";
    }
    else
    {
     //echo "Wrong Answer";
      $result="Wrong Answer";
    }
  }
  else
  {
     $result="Time Limit Exceed";
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







$sql="INSERT INTO submission VALUES('$nid','$username','$result','$pname') ";
$show="SELECT * FROM submission ORDER BY sid DESC limit $start,$per_page";


$stq=mysqli_query($con,$sql);
$sts=mysqli_query($con,$show);



while($row=mysqli_fetch_array($sts))
{

  if($row['verdict']=="Accepted")
  {
     echo "<tr><td><a href=\"showcode.php?id=$row[sid]&nm=$row[sname]\">$row[sid]</a></td><td><a href=\"profile.php?user=$row[sname]\">$row[sname]</a></td><td><a href=\"description.php?name=$row[pbname]\">$row[pbname]</a></td><td><div class=\"btn btn-success btn-xs\">$row[verdict]</div></td></tr>";
  }
  else if($row['verdict']=="Time Limit Exceed")
  {
     echo "<tr><td><a href=\"showcode.php?id=$row[sid]&nm=$row[sname]\">$row[sid]</a></td><td><a href=\"profile.php?user=$row[sname]\">$row[sname]</a></td><td><a href=\"description.php?name=$row[pbname]\">$row[pbname]</a></td><td><div class=\"btn btn-primary btn-xs\">$row[verdict]</div></td></tr>";
  }
  else
  {
     echo "<tr><td><a href=\"showcode.php?id=$row[sid]&nm=$row[sname]\">$row[sid]</a></td><td><a href=\"profile.php?user=$row[sname]\">$row[sname]</a></td><td><a href=\"description.php?name=$row[pbname]\">$row[pbname]</a></td><td><div class=\"btn btn-danger btn-xs\">$row[verdict]</div></td></tr>";
  }

}

   echo "</tbody>
</table>
</div>";

  $psql="SELECT * FROM submission ORDER BY sid DESC";
  $sn=mysqli_query($con,$psql);
  $total_rows=mysqli_num_rows($sn);
  $total_page=ceil($total_rows/$per_page);
  $c="active";

  echo "<div class=\"contain con\"><ul class=\"pagination\"><li><a href=\"allsubmission.php?page=1\">First Page</a></li>";

  for ($i=1; $i <$total_page ; $i++) {
      
    if($page==$i)
    {
      $c="active";
        }
        else
        {
          $c="";
        }
    echo "<li class=\"$c\"><a href=\"allsubmission.php?page=$i\">$i</a></li>";
  }


  echo "<li><a href=\"allsubmission.php?page=$total_page\">Last Page</a></li></ul></div>";

}
?>




</div>

<div class="col-sm-2">

</div>
</div>
</div>
</div><br><br><br>

<?php

include("footer.php");

?>

</div>

</body>
</html>
