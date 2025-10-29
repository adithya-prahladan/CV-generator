<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Log In</title>
  <link rel="stylesheet" type="text/css" href="log_files/style.css">
</head>
<?php
session_start();
$conn=mysqli_connect("localhost","root","","minibase");
if(isset($_POST['login']))
{
	$e=$_POST['email'];
	$p=$_POST['pass'];
	$data=mysqli_query($conn,"select * from login where email_id='$e' and password='$p' ");
	$res=mysqli_fetch_array($data);
	if(!empty($res[0]))
	{
		if($res['type']=='Admin')
		{
			$_SESSION['user_name']=$res['user_name'];
      $_SESSION['email_id']=$e;
			$_SESSION['password']=$p;
			header("location:admin.html");
		}
		elseif($res['type']=='New User')
		{
			$_SESSION['user_name']=$res['user_name'];
      $_SESSION['email_id']=$e;
			$_SESSION['password']=$p;
			header("location:user_login.html");
		}
		else
		{
			echo "<script>alert('Invalid email or password')</script>";
		}
	}
	else
	{
    echo "<script>alert('Invalid email or password')</script>";

	}
}
?>
<body>
  <div class="wrapper">
    <div class="form-wrapper sign-in">
      <form action="" method="post">
        <h2>Sign-in</h2>
        <div class="input-group">
          <input type="text" name="email" required>
          <label for="">Email</label>
        </div>
        <div class="input-group">
          <input type="password" name="pass"  minlength="8" required>
          <label for="">Password</label>
        </div>
        <button type="submit" name="login">Login</button>
        <div class="signUp-link">
          <p>Don't have an account? <a href="sign_index.php" class="signUpBtn-link">Sign Up</a></p>
          <p>Back to <a href="index.html" class="signUpBtn-link">Home</a></p>
        </div>
      </form>
    </div>
  </div>
  <script src="index_files/script.js"></script>
  <!-- code by helpme_coder -->
</body>
</html>