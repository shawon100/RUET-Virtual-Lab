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

$admin='shawon';

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

include("header.php");

?>



<div class="row log">
<div class="col-sm-10">
<?php

if(isset($_GET['user']))
{

   $username=$data;
}



?>
<div class=""><h3 style="text-align:center;"><?php  echo"$username's  Profile"; ?></h3></div>
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
<div class="col-sm-2">
</div>
<div class="col-sm-6 pbs">

<div class="ym">
 <div class="pc">Information</div>
  
   
   <table class="table">
    <tr class="success"><td>Name : <?php echo("$row[name]") ?></td></tr>
    <tr class="info"><td>Email : <?php echo("$row[email]") ?></td></tr>
    <tr class="danger"><td>Occupation : <?php echo("$row[status]") ?></td></tr>
    <?php

     if($data==$_SESSION['un'])
     {
        echo "<tr class=\"warning\"><td><a href=\"edit.php?name=$username\">Edit Profile</a></td></tr>";
     }

    ?>
    
    </table>
  </div>

    <?php

     if($data==$_SESSION['un']  && $_SESSION['un']==$admin)
     {
          echo " 
          <div class=\"ym\">
    <div class=\"pc\">Dashboard</div>
  
   
   <ul class=\"nav nav-pills nav-stacked\">
    <li role=\"presentation\" class=\"active\"><a href=\"setcontest.php\">Create Lab </a></li>
    <li role=\"presentation\"><a href=\"setcontestproblem.php\">Create Lab Question</a></li>
    <li role=\"presentation\"><a href=\"setproblem.php\">Create Practice Question</a></li>
    <li role=\"presentation\"><a href=\"allsubmission.php?name=$username\">My Submission</a></li>
  </ul></div>";



          
     }
     else if($row['status']=='teacher')
     {
         echo " 
          <div class=\"ym\">
    <div class=\"pc\">Dashboard</div>
  
   
   <ul class=\"nav nav-pills nav-stacked\">
    <li role=\"presentation\" class=\"active\"><a href=\"setcontest.php\">Create Lab </a></li>
    <li role=\"presentation\"><a href=\"setcontestproblem.php\">Create Lab Question</a></li>
    <li role=\"presentation\"><a href=\"setproblem.php\">Create Practice Question</a></li>
    <li role=\"presentation\"><a href=\"allsubmission.php?name=$username\">My Submission</a></li>
    </ul></div>";
     }
   ?>

<!--<div class="ym">
 <div class="pc">Dashboard</div>
  
   
   <ul class="nav nav-pills nav-stacked">
    <li role="presentation" class="active"><a href="setcontest.php">Create Contest</a></li>
    <li role="presentation"><a href="setcontestproblem.php">Create Contest Problem</a></li>
    <li role="presentation"><a href="setproblem.php">Create Archive Problem</a></li>
    <li role="presentation"><a href="allsubmission.php?name=<?php ; ?>">My Submission</a></li>
  </ul>
  
 <ul class="nav nav-pills nav-stacked ">
    <li class="active"><a data-toggle="pill" href="#home">Profile</a></li>
    <li><a data-toggle="pill" href="#menu1">Submission</a></li>
    <li><a data-toggle="pill" href="#menu2">Statistics</a></li>
  
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <?php

       //echo"<br><br><br>";
       //echo "Name: $data<br>";

      ?>
      
    </div>
    <div id="menu1" class="tab-pane fade">
     <?php
        //echo"<br><br><br>";
       //echo "Name: $user<br>";
       ?>
    </div>
    <div id="menu2" class="tab-pane fade">
       <?php
        //echo"<br><br><br>";
       //echo "Name: $user<br>";
       ?>
    </div>
    
  </div>
</div>-->






</div>

<div class="col-sm-4">

</div>
</div>
<br><br><br>

<?php

include("footer.php");

?>
</div>


</body>
</html>
