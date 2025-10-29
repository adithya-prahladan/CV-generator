<?php
include 'db.php';

$resume_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$sql = "SELECT * FROM resumes WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $resume_id);
$stmt->execute();
$result = $stmt->get_result();
$resume = $result->fetch_assoc();
if($resume['tmp']==1){
    header("location:view_tmp1.php?id=$resume_id");
}elseif($resume['tmp']==2){
    header("location:view_tmp2.php?id=$resume_id");
}elseif($resume['tmp']==3){
    header("location:view_tmp3.php?id=$resume_id");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($resume['name']); ?>'s Resume</title>
    <link rel="stylesheet" href="cv_style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
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
    <div class="container1 resume-container" id="resumeContent">
        <div class="resume-header">
            <h1><?php echo htmlspecialchars($resume['name']); ?></h1>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($resume['email']); ?> | <strong>Phone:</strong> <?php echo htmlspecialchars($resume['phone']); ?></p>
            <p><strong>Address:</strong> <?php echo nl2br(htmlspecialchars($resume['address'])); ?></p>
        </div>

        <?php if (!empty($resume['profile'])) { ?>
        <div class="section">
            <h2>Profile Summary</h2>
            <p><?php echo nl2br(htmlspecialchars($resume['profile'])); ?></p>
        </div>
        <?php } ?>

        <div class="section">
            <h2>Work Experience</h2>
            <p><?php echo nl2br(htmlspecialchars($resume['experience'])); ?></p>
        </div>

        <div class="section">
            <h2>Education</h2>
            <p><?php echo nl2br(htmlspecialchars($resume['education'])); ?></p>
        </div>

        <div class="section">
            <h2>Skills</h2>
            <?php 
                $skillsArray = explode(',', $resume['skills']);
                echo '<ul class="skills-list">';
                foreach ($skillsArray as $skill) {
                    echo '<li>' . htmlspecialchars(trim($skill)) . '</li>';
                }
                echo '</ul>';
            ?>
        </div>

        <div class="section">
            <h2>Languages</h2>
            <?php 
                $languagesArray = explode(',', $resume['languages']);
                echo '<ul class="languages-list">';
                foreach ($languagesArray as $language) {
                    echo '<li>' . htmlspecialchars(trim($language)) . '</li>';
                }
                echo '</ul>';
            ?>
        </div>

        <?php if (!empty($resume['certifications'])) { ?>
        <div class="section">
            <h2>Certifications</h2>
            <p><?php echo nl2br(htmlspecialchars($resume['certifications'])); ?></p>
        </div>
        <?php } ?>

        <?php if (!empty($resume['hobbies'])) { ?>
        <div class="section">
            <h2>Hobbies & Interests</h2>
            <?php 
                $hobbiesArray = explode(',', $resume['hobbies']);
                echo '<ul class="hobbies-list">';
                foreach ($hobbiesArray as $hobby) {
                    echo '<li>' . htmlspecialchars(trim($hobby)) . '</li>';
                }
                echo '</ul>';
            ?>
        </div>
        <?php } ?>

        <?php if (!empty($resume['projects'])) { ?>
        <div class="section">
            <h2>Projects</h2>
            <p><?php echo nl2br(htmlspecialchars($resume['projects'])); ?></p>
        </div>
        <?php } ?>

        <?php if (!empty($resume['references'])) { ?>
        <div class="section">
            <h2>References</h2>
            <p><?php echo nl2br(htmlspecialchars($resume['references'])); ?></p>
        </div>
        <?php } ?>

        <!-- Button to trigger the PDF download (will be hidden for the PDF generation) -->
        <button id="downloadResumeBtn">Download as PDF</button>
    </div>

    <script>
    document.getElementById('downloadResumeBtn').addEventListener('click', function() {
        const element = document.getElementById('resumeContent');
        
        // Hide the download button before generating the PDF
        document.getElementById('downloadResumeBtn').style.display = 'none';

        // Use html2pdf to generate the PDF with styles intact
        html2pdf()
            .from(element)
            .save('<?php echo htmlspecialchars($resume['name']); ?>_resume.pdf')
            .then(function() {
                // Show the download button again after the PDF is generated
                document.getElementById('downloadResumeBtn').style.display = 'block';
            });
    });
    </script>
</body>
</html>

<?php
// Close the database connection
$stmt->close();
$conn->close();
?>
