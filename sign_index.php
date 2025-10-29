<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up</title>
  <link rel="stylesheet" type="text/css" href="log_files/style.css">
</head>
<?php
$conn=mysqli_connect("localhost","root","","minibase");
if(isset($_POST['signup']))
{
	$n=$_POST['uname'];
	$e=$_POST['email'];
	$p=$_POST['pword'];
	$data=mysqli_query($conn,"insert into login(user_name,email_id,password,type)values('$n','$e','$p','New User')");
?>
<script>alert('Registration Successfull . Login Now')</script>
<?php	
}
?>
<body>
  <div class="wrapper">
    <div class="form-wrapper sign-in">
      <form action=" " method="post">
        <h2>Sign-Up</h2>
        <div class="input-group">
          <input type="text" name="uname" required>
          <label for="">Username</label>
        </div>
        <div class="input-group">
            <input type="text" name="email" required>
            <label for="">Email</label>
          </div>
        <div class="input-group">
          <input type="password" name="pword"  minlength="8" required>
          <label for="">Password</label>
        </div>
        <div class="remember">
          <label><input type="checkbox"> Remember me</label>
        </div>
        <button type="submit" name="signup">Sign Up</button>
        <div class="signUp-link">
          <p>Already have an account? <a href="login_index.php" class="signUpBtn-link">Log In</a></p>
          <p>Back to<a href="index.html" class="signUpBtn-link"> Home</a></p>
        </div>
      </form>
    </div>
  </div>
  <script src="index_files/script.js"></script>
  <!-- code by helpme_coder -->
</body>
</html>