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

    // Handle image upload
    if (!empty($_FILES['profile_image']['name'])) {
        $targetDir = "./uploads/";
        $image = $targetDir . basename($_FILES["profile_image"]["name"]);
        if (!move_uploaded_file($_FILES["profile_image"]["tmp_name"], $image)) {
            echo "Error uploading image.";
            exit;
        }
    } else {
        // Set default image if none uploaded
        $image = "uploads/default-image.jpg";
    }

    // Insert data into the database
    $tmp_value = 1; // This is a temporary value, you can modify it as needed
    $stmt = $conn->prepare("INSERT INTO resumes (user,name, email, phone, address, profile, experience, education, skills, languages, certifications, hobbies, projects, `references`, about, image, tmp) 
                            VALUES (?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssssssssssss",$user, $name, $email, $phone, $address, $profile, $experience, $education, $skills, $languages, $certifications, $hobbies, $projects, $references, $about, $image, $tmp_value);
    $stmt->execute();
    $stmt->close();
    $conn->close();

    // Process skill, language, hobby arrays
    $skillsArray = explode(',', $skills);
    $languagesArray = explode(',', $languages);
    $hobbiesArray = explode(',', $hobbies);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title> Resume</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="./style.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
</head>
<body>
<div class="wrapper clearfix">
  <div class="left">
    <div class="name-hero">
      <div class="me-img">
      </div>
      <div class="name-text">
        <h1><?php echo $name; ?></h1>
        <p><?php echo $address; ?></p>
        <p><?php echo $email; ?></p>
        <p><?php echo $phone; ?></p>
      </div>
    </div>
  </div>

  <div class="right">
    <div class="inner">
      <section>
        <h1>Profile</h1>
        <p><?php echo $profile; ?></p>
      </section>

      <section>
        <h1>Experience</h1>
        <p><?php echo $experience; ?></p>
      </section>

      <section>
        <h1>Education</h1>
        <p><?php echo $education; ?></p>
      </section>

      <section>
        <h1>Skills</h1>
        <ul class="skill-set">
          <?php foreach ($skillsArray as $skill) { echo "<li>" . htmlspecialchars(trim($skill)) . "</li>"; } ?>
        </ul>
      </section>

      <section>
        <h1>Languages</h1>
        <ul class="skill-set">
          <?php foreach ($languagesArray as $language) { echo "<li>" . htmlspecialchars(trim($language)) . "</li>"; } ?>
        </ul>
      </section>

      <section>
        <h1>Certifications</h1>
        <p><?php echo $certifications; ?></p>
      </section>

      <section>
        <h1>Hobbies</h1>
        <ul class="skill-set">
          <?php foreach ($hobbiesArray as $hobby) { echo "<li>" . htmlspecialchars(trim($hobby)) . "</li>"; } ?>
        </ul>
      </section>

      <section>
        <h1>Projects</h1>
        <p><?php echo $projects; ?></p>
      </section>

      <section>
        <h1>References</h1>
        <p><?php echo $references; ?></p>
      </section>

      <section>
        <h1>About</h1>
        <p><?php echo $about; ?></p>
      </section>

    </div>
  </div>
</div>
<script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
</body>
</html>
