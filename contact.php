
<?php
	include('connection.php');
	error_reporting(0);
	$name=$_POST['name'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$subject=$_POST['subject'];
	$message=$_POST['message'];
	
	$sql="insert into contact(`name`,`email`,`phone`,`subject`,`message`)values('$name','$email','$phone','$subject','$message')";
	mysqli_query($sql);
	if(mysqli_query($conn,$sql))
	{
	
	
	}
	else
	{
	echo "<script type='text/javascript'>alert('Something went wrong')</script>";
	}
?>
<html>
<head>
<link rel="stylesheet" href="contact.css">
</head>
<body>
<div id="loginborder">
	</div>
	<div id="heading">
		<h1> FreeDr Services</h1>
	</div>
	<div id="afterheading">
		<h1> www.FreeDr.com</h1>
	</div>
<div id="content">
Thanks for Contacting with us!
Our team will contact you shortly.
</div>
</body>
</html>
