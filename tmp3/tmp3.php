<?php
include '../db.php';
session_start();
$user=$_SESSION['email_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $address = htmlspecialchars($_POST['address']);
    $profile = nl2br(htmlspecialchars($_POST['profile']));
    $experience = nl2br(htmlspecialchars($_POST['experience']));
    $education = nl2br(htmlspecialchars($_POST['education']));
    $skills = htmlspecialchars($_POST['skills']);
    $languages = htmlspecialchars($_POST['languages']);
    $certifications = nl2br(htmlspecialchars($_POST['certifications']));
    $hobbies = htmlspecialchars($_POST['hobbies']);
    $projects = nl2br(htmlspecialchars($_POST['projects']));
    $references = nl2br(htmlspecialchars($_POST['references']));
    $about = nl2br(htmlspecialchars($_POST['about']));
    
    // Upload profile image
    if (!empty($_FILES['profile_image']['name'])) {
        $targetDir = "uploads/";
        $image = $targetDir . basename($_FILES["profile_image"]["name"]);
        if (!move_uploaded_file($_FILES["profile_image"]["tmp_name"], $image)) {
            echo "Error uploading image.";
            exit;
        }
    } else {
        $image = ''; // Default if no image is uploaded
    }

    // Insert data into the database
    $tmp_value = 3; // Temporary value for testing
    $stmt = $conn->prepare("INSERT INTO resumes (user, name, email, phone, address, profile, experience, education, skills, languages, certifications, hobbies, projects, `references`, about, image, tmp) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssssssssssss",$user, $name, $email, $phone, $address, $profile, $experience, $education, $skills, $languages, $certifications, $hobbies, $projects, $references, $about, $image, $tmp_value);
    $stmt->execute();
    $stmt->close();
    $conn->close();

    // Exploding skills, languages, hobbies into arrays for processing or display
    $skillsArray = explode(',', $skills);
    $languagesArray = explode(',', $languages);
    $hobbiesArray = explode(',', $hobbies);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Sample Resume</title>
  <link rel="stylesheet" href="./style.css">
</head>
<body>

<div class="container">
  <div class="header">
    <div class="full-name">
      <span class="first-name"><?php echo $name; ?></span>
    </div>
    <div class="contact-info">
      <span class="email">Email: </span>
      <span class="email-val"><?php echo $email; ?></span>
      <span class="separator"></span>
      <span class="phone">Phone: </span>
      <span class="phone-val"><?php echo $phone; ?></span>
    </div>
    
    <div class="about">
      <span class="position">Front-End Developer</span>
      <span class="desc"><?php echo $profile; ?></span>
    </div>
  </div>

  <div class="details">
    <div class="section">
      <div class="section__title">Experience</div>
      <div class="section__list">
        <div class="section__list-item">
          <div class="left">
            <div class="name">KlowdBox</div>
            <div class="addr">San Fr, CA</div>
            <div class="duration">Jan 2011 - Feb 2015</div>
          </div>
          <div class="right">
            <div class="name">Fr developer</div>
            <div class="desc"><?php echo $experience; ?></div>
          </div>
        </div>
      </div>
    </div>

    <div class="section">
      <div class="section__title">Education</div>
      <div class="section__list">
        <div class="section__list-item">
          <div class="left">
            <div class="name">Sample Institute of technology</div>
            <div class="addr">San Fr, CA</div>
            <div class="duration">Jan 2011 - Feb 2015</div>
          </div>
          <div class="right">
            <div class="name">Fr developer</div>
            <div class="desc"><?php echo $education; ?></div>
          </div>
        </div>
      </div>
    </div>

    <div class="section">
      <div class="section__title">Skills</div>
      <div class="skills">
        <?php foreach (explode(',', $skills) as $skill): ?>
          <div class="skills__item">
            <div class="name"><?php echo $skill; ?></div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>

    <div class="section">
      <div class="section__title">Projects</div>
      <div class="section__list">
        <div class="section__list-item">
          <div class="name"><?php echo $projects; ?></div>
        </div>
      </div>
    </div>

    <div class="section">
      <div class="section__title">Hobbies</div>
      <div class="section__list">
        <div class="section__list-item">
          <div class="name"><?php echo $hobbies; ?></div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
</body>
</html>
