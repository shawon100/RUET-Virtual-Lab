<?php

require_once("config.php");

$user=$_POST['uname'];
$email=$_POST['email'];
$password=$_POST['password'];
$password=md5($password);

$query="INSERT into user(name,pass,status,email) VALUES('$user','$password','user','$email')";
$sq=mysqli_query($con,$query);



if($sq)
{
	header("Location:login.php");
}
else
{
	echo("Failed<br>");
}






?>