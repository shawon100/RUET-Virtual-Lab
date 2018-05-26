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
        <link rel="stylesheet" href="css/vlab.css">
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>







</head>
<body>
<div class="main">

 <!-- <div class="row">
  <div class="col-sm-12">
  <nav class="navbar navbar-inverse navbar-fixed-top nbar">
    <div class="navbar-header">
      <a class="navbar-brand lspace" href="home.php">RUET OJ</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="space"><a href="compiler.php"><i class="fa fa-code ispace"></i>Compiler</a></li>
      <li class="space"><a href="archive.php"><i class="fa fa-archive ispace"></i>Problem Archive</a></li>
      <li class="space"><a href="contest.php"><i class="fa fa-cogs ispace"></i>Contests</a></li>
      <li class="space"><a href="code.php"><i class="fa fa-check-square ispace"></i>Debug</a></li>
      <li class="lgspace space"><a href="profile.php?user=<?php echo("$username"); ?>"><i class="fa fa-user ispace"></i><?php echo("$username"); ?></a></li>
      <li class="space"><a href="logout.php"><i class="fa fa-power-off ispace"></i>Logout</a></li>
      
    </ul>
  
</nav>
</div>
</div>-->

<?php

require_once("header.php");

?>
<br><br>
<div class="row cspace2 slideanim">
<div class="col-sm-7">
<!--<div class="form-group">
<form action="compile.php" name="f2" method="POST">
<label for="lang">Choose Language</label>

<select class="form-control" name="language">
<option value="c">C</option>
<option value="cpp">C++</option>
<option value="cpp11">C++11</option>
<option value="java">Java</option>


</select><br><br>

<label for="ta">Write Your Code</label>
<textarea class="form-control" name="code" rows="10" cols="50"></textarea><br><br>
<label for="in">Enter Your Input</label>
<textarea class="form-control" name="input" rows="10" cols="50"></textarea><br><br>
<input type="submit" class="btn btn-success" value="Run Code"><br><br><br>


</form>

<!--<script>
"use strict";
function submitForm(oFormElement)
{
  var xhr = new XMLHttpRequest();
  var display=document.getElementById('div');
  xhr.onload = function(){ display.innerHTML=xhr.responseText; }
  xhr.open (oFormElement.method, oFormElement.action, true);
  xhr.send (new FormData (oFormElement));
  return false;
}
</script>-->
<!--<label for="out">Output</label>
<textarea id='div' class="form-control" name="output" rows="10" cols="50"></textarea><br><br>-->
<!-- Container (Services Section) -->
<div id="services" class="container-fluid text-center">
  <h2>SERVICES</h2>
  <h4>What we offer</h4>
  <br>
  <div class="row slideanim">
    <div class="col-sm-6">
      <a href="compiler.php"><span class="fa fa-code logo-small"></span>
      <h4>Compiler</h4>
      <p>Our Virtual Lab Supports C/C++ And Java Compiler</p>
      </a>
    </div>
    <div class="col-sm-6">
       <a href="archive.php"><span class="fa fa-archive logo-small"></span>
      <h4>Lab Practice</h4>
      <p>Our Virtual Lab Provides Practice Problems Of CSE Labs</p>
      </a>
    </div>
    </div>
    <br><br><br><br>
  <div class="row slideanim">
    <div class="col-sm-6">
       <a href="contest.php"><span class="fa fa-cogs logo-small"></span>
      <h4>Lab Tests</h4>
      <p>Our Virtual Lab Judges Codes And Gives Perfect Result</p>
      </a>
    </div>
    <div class="col-sm-6">
       <a href="profile.php?user=<?php echo"$username" ?>"><span class="fa fa-check-square logo-small"></span>
      <h4>Lab Manager</h4>
      <p>Teachers Can Manages Their Lab Any Time</p>
      </a>
    </div>
  </div>




</div>
</div><br><br><br>

<div class="col-sm-5">
    <div style="margin-left:30px" class="pb">Recent And Upcoming Labs</div>

<?php

require_once("connection.php");
date_default_timezone_set("Asia/Dhaka");

$q3="SELECT * FROM rapl_oj_contest ORDER BY date_on DESC LIMIT 0,2";
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

     


      

     
      


     
      /*echo(" <a href=\"save.php?name=$row[table_name]\">$row[table_name]</a><br><br>");*/
        if($row['date_on']==$d && $seconds>=0 && $ss>=0 )
        {
             echo("<div class=\"xmm\">Lab Name: <a href=\"contestproblem.php?name=$row[cname]\">$row[cname]</a><br><br>Lab Date: $row[date_on] <br><br>Start Time: $row[start_at]<br><br>End Time: $row[end_at] <br><br> Status: <b>Running</b> <br><br>Time Remaining:  $h hour $mt miniute $scnd second <br><br></div>");
         }
         else if($d>$row['date_on'] || ($d==$row['date_on'] && $t>$en))
         {
            echo("<div class=\"xmm\">Lab Name: <a href=\"contestproblem.php?name=$row[cname]\">$row[cname]</a><br><br>Lab Date:  $row[date_on] <br><br>Start Time: $row[start_at]<br><br>End Time: $row[end_at] <br><br>Status: <b>Finished</b><br><br></div>");
         }
         else
         {
            echo("<div class=\"xmm\">Lab Name: $row[cname]<br><br>Lab Date:  $row[date_on] <br><br>Start Time: $row[start_at]<br><br>End Time: $row[end_at] <br><br>Status: <b>Not Started Yet</b><br><br></div>");
         }
    }




?>
  
</div>
</div>
<br><br><br><br><br><br>
<?php

require_once("footer.php");

?>
</div>
</body>
</html>


