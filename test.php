<!DOCTYPE html>
<html>
<head>
	<title>Test Case</title>

</head>
<body>
<form action="case.php" method="POST" name="f2">

<b>User Code</b><br>
<?php


require_once("connection.php");


$table=$_POST['pb'];



$jc="SELECT * from $table";
$sjc=mysqli_query($con,$jc);

/*$row=mysqli_fetch_array($sjc))
	
$string=$row[value];*/
	


?>


<textarea name="uc" rows="20" cols="60">
	

</textarea><br>


 <textarea style="display:;" name="tu" rows="10" cols="30"><?php while($row=mysqli_fetch_array($sjc)){echo("$row[value]");}?></textarea><br><br>






<b>User Output</b><br>
 <textarea name="ta" rows="10" cols="30"></textarea><br><br>
 <input type="submit" value="Check">
 </form>
</body>
</html>