<!doctype html>
<html lang="en">
  <head>
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Contact us</title>

  <link rel="stylesheet" type="text/css" href="home_files/css/vendor.css">

  <!-- Link Swiper's CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />


  <!-- Link Bootstrap's CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <link rel="stylesheet" href="home_files/style.css">

  <!-- Google Fonts ================================================== -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300;400;500;600;700&display=swap"
    rel="stylesheet">

  <!-- script ================================================== -->
  <script src="home_files/js/modernizr.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</head>
<?php
session_start();
$e=$_SESSION['email_id'];
$conn=mysqli_connect("localhost","root","","minibase");
$data=mysqli_query($conn,"select * from login where email_id='$e'");
$res=mysqli_fetch_array($data);
if(isset($_POST['submit']))
{
	$n=$_POST['username'];
	$pw=$_POST['password'];
	$data=mysqli_query($conn,"update login set user_name='$n', password='$pw' where email_id='$e'");
?>
<script>alert ('UPDATION SUCCESSFUL')</script>
<?php
header("location:profile.php");
}
?>

<body data-bs-spy="scroll" data-bs-target="#navbar-example2" tabindex="0">
 <section id="start">
    <div class="container my-5 py-5">
      <div class="row featurette py-lg-5 ">
        <div class="col-md-5 order-md-1 d-flex">
          <h1 class="text-capitalize  lh-1 mb-3">Edit your profile in<br>CV CREST</h1>
        </div>
        <div class="col-md-7 order-md-2">
          <div class="text-content ps-md-5 mt-4 mt-md-0">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-10 col-md-12">
					<div class="wrapper">
						<div class="row justify-content-center">

									<form method="POST"  action=" " id="contactForm" name="contactForm" class="contactForm">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<input type="text" class="form-control" name="username" value="<?php echo $res['user_name'];?>">
												</div>
											</div>
											<br><br>
											<div class="col-md-12"> 
												<div class="form-group">
													<input type="email" class="form-control" name="email"  value="<?php echo $res['email_id'];?>" readonly>
												</div>
											</div>
											<br><br>
											<div class="col-md-12">
												<div class="form-group">
													<input type="text" class="form-control" name="password" minlength="8" value="<?php echo $res['password'];?>">
												</div>
											</div>
											<br><br>
											<div class="col-md-12">
												<div class="form-group">
													<input type="text" class="form-control" name="re-password" minlength="8" placeholder="Confirm Password">
												</div>
											</div>
											<br><br>
											<button type="submit" name="submit" class="btn btn-primary btn-lg px-4 me-md-2">Save</button><br>
											<a href="user_login.html" class="btn btn-primary btn-lg px-4 me-md-2">Back</a>
										</div>
									</form>
								
						
						</div>
					</div>
				</div>
			</div>
		</div>
	</section><br><br>
          </div>
        </div>
      </div>
    </div>
  </section>

	<script src="contact_file/js/jquery.min.js"></script>
  <script src="contact_file/js/popper.js"></script>
  <script src="contact_file/js/bootstrap.min.js"></script>
  <script src="contact_file/js/jquery.validate.min.js"></script>
  <script src="contact_file/js/main.js"></script>

	</body>
</html>

