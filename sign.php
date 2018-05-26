



<!DOCTYPE html>
<html>
<head>
	
    
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Sign Up</title>
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


<div class="row">
<div class="col-sm-8">
<div class="form-group log">
<form action="action.php" name="f1" method="POST">

<label for="email">Email</label>
<input type="email" name="email" class="form-control" placeholder="Enter Email" required><br>
<label for="username">Username</label>
<input type="text" name="uname" class="form-control" placeholder="Enter Username" required><br>
<label for="password">Password</label>
<input type="password" class="form-control"  name="password" placeholder="Enter Password" required><br>

<button type="submit" class="btn btn-success">Sign Up</button><br><br><br><br><br><br>
	

</form>
</div>
</div>

<div class="col-sm-4">

</div>
</div>
<?php

include("footer.php");

?>
</div>

</body>
</html>


