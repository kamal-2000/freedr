<?php
include('db.php');
error_reporting(0);
/*if (isset($_GET["reset_token"]) && isset($_GET["email"]) && isset($_GET["action"]) 
&& ($_GET["action"]=="reset") && !isset($_POST["action"])){*/
  $reset_token = $_GET["reset_token"];
  $email = $_GET["email"];
  $query = mysqli_query($con,
  "SELECT * FROM `testing` WHERE `email`='".$email."';"
  );
  $row = mysqli_num_rows($query);
  if ($row==""){
  $error .= '<h2>Invalid Link</h2>
<p>The link is invalid/expired. Either you did not copy the correct link
from the email, or you have already used the key in which case it is 
deactivated.</p>
<p><a href="http://localhost/kamal/forgetpasswordmail/reset-password.php">
Click here</a> to reset password.</p>';
 }else{
  $row = mysqli_fetch_assoc($query);
  
  if ($row->reset_token == $reset_token){
  ?>
  <br />
  <html>
  <head>
		<title>Password Recovery-FreeDr.com</title>
<link rel='stylesheet' href='passwordrecovery.css' type='text/css' media='all' />
<script src="https://kit.fontawesome.com/9841871939.js" crossorigin="anonymous"></script>
  </head>
  </body>
  
  <div id="loginborder">
</div>
<div id="heading">
<h1> FreeDr Services</h1>
</div>
<div id="afterheading">
<h1> www.FreeDr.com</h1>
</div>
<div id="resetborder">
<div class="resetlisticons">
	<ul>
	<center>
	<li><a><i class="fas fa-key"></i></a></li>
	</center>
	</ul>
	</div>
  <form method="post" action="" name="update">
  <input type="hidden" name="action" value="update" />
  <br /><br />
  <h2><label><strong>Enter New Password</strong></label></h2><br />
  <center><input type="password" name="new_password" id="inputbox" required /></center>
  <br /><br />
  <input type="hidden" name="email" value="<?php echo $email;?>"/>
  <input type="submit" class="button" value="Reset Password" />
  </form>
  </div>
  </body>
  </html>
<?php
}else{
$error .= "<h2>Link Expired</h2>
<p>The link is expired. You are trying to use the expired link which 
as valid only 24 hours (1 days after request).<br /><br /></p>";
            }
      }
if($error!=""){
  echo "<div class='error'>".$error."</div><br />";
  } 
//} // isset email key validate end
 
 
if(isset($_POST["email"]) && isset($_POST["action"]) &&
 ($_POST["action"]=="update")){
$error="";
$new_password = mysqli_real_escape_string($con,$_POST[new_password]);
$email = $_POST["email"];
  if($error!=""){
echo "<div class='error'>".$error."</div><br />";
}else{
mysqli_query($con,
"UPDATE testing SET password='$new_password' WHERE email='$email';");

 
 
echo '<div class="error"><h3>Congratulations! Your password has been updated successfully.</h3>
<p><a href="https://localhost/kamal/forgetpasswordmail/loginmain.php">
Click here</a> to Login.</p></div><br />';
   } 
}
?>