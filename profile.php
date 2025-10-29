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
  <?php
  session_start();
  $conn=mysqli_connect("localhost","root","","minibase");
$e=$_SESSION['email_id'];
$data=mysqli_query($conn,"select * from login where email_id='$e'");
$res=mysqli_fetch_array($data);
?>
</head>

<body data-bs-spy="scroll" data-bs-target="#navbar-example2" tabindex="0" >

<header id="nav" class="site-header position-fixed text-white bg-dark">
    <nav id="navbar-example2" class="navbar navbar-expand-lg py-2">

      <div class="container ">

        <a class="navbar-brand" href="profile.php">Profile</a>


        <button class="navbar-toggler text-white" type="button" data-bs-toggle="offcanvas"
          data-bs-target="#offcanvasNavbar2" aria-controls="offcanvasNavbar2" aria-label="Toggle navigation"><ion-icon
            name="menu-outline" style="font-size: 30px;"></ion-icon></button>

        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar2"
          aria-labelledby="offcanvasNavbar2Label">
          <div class="offcanvas-body">
            <ul class="navbar-nav align-items-center justify-content-end align-items-center flex-grow-1 ">
              <li class="nav-item">
              <a href="user_login.html" class="btn btn-primary btn-lg px-4 me-md-2">Back</a>
              </li>
            </ul>

          </div>
        </div>


      </div>
    </nav>
  </header>

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

									<form method="POST" action="#" id="contactForm" name="contactForm" class="contactForm">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">User name :
													<input type="text" class="form-control" name="username"  value="<?php echo $res['user_name'];?>" readonly>
												</div>
											</div>
											<br><br>
											<div class="col-md-12"> Email ID
												<div class="form-group">
													<input type="email" class="form-control" name="email" value="<?php echo $res['email_id'];?>" readonly><br><br>
												</div>
											</div>
											<br><br>
										</div>
									</form>
                                    <br><br>

						</div>
					</div>
				</div>
                
           <br><br> <a href="profile_edit.php" class="btn btn-primary btn-lg px-4 me-md-2">Edit Profile</a>
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

