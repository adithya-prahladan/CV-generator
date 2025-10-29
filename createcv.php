<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cv_style.css">
    <title>CV Crest</title>

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
<body data-bs-spy="scroll" data-bs-target="#navbar-example2" tabindex="0">
<header id="nav" class="site-header position-fixed text-white bg-dark">
<div class="container ">
    <nav id="navbar-example2" class="navbar navbar-expand-lg py-2">
        <a class="navbar-brand" href="./index.html">CV Crest</a>


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
  </header><br><br>
  <h2>Create Your Resume</h2>
    <div class="container1">
        
        <form action="tmp1/tmp1.php" method="post" enctype="multipart/form-data">
            <label for="name">Full Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="phone">Phone:</label>
            <input type="tel" id="phone" maxlength="10" name="phone" required>

            <label for="address">Address:</label>
            <textarea id="address" name="address" rows="2" required></textarea>

            <label for="profile">Profile Summary:</label>
            <textarea id="profile" name="profile" rows="4"></textarea>

            <label for="experience">Work Experience:</label>
            <textarea id="experience" name="experience" rows="5" required></textarea>

            <label for="education">Education:</label>
            <textarea id="education" name="education" rows="5" required></textarea>

            <label for="skills">Skills (comma-separated):</label>
            <input type="text" id="skills" name="skills" required>

            <label for="languages">Languages (comma-separated):</label>
            <input type="text" id="languages" name="languages" required>

            <label for="certifications">Certifications:</label>
            <textarea id="certifications" name="certifications" rows="4"></textarea>

            <label for="hobbies">Hobbies & Interests (comma-separated):</label>
            <input type="text" id="hobbies" name="hobbies">

            <label for="projects">Projects:</label>
            <textarea id="projects" name="projects" rows="5"></textarea>

            <label for="references">References:</label>
            <textarea id="references" name="references" rows="4"></textarea>

            <label for="about">About:</label>
            <textarea id="about" name="about" rows="3"></textarea>

            <label for="profile_image">Profile Image:</label>
            <input type="file" id="profile_image" name="profile_image" accept="image/*"><br><br>

            <button type="submit">Generate Resume</button>
        </form>
    </div>
</body>
</html>
