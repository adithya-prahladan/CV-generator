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
    if (!empty($_FILES['profile_image']['name'])) {
        $targetDir = "uploads/";
        $image = $targetDir . basename($_FILES["profile_image"]["name"]);
        echo $image;
        if (!move_uploaded_file($_FILES["profile_image"]["tmp_name"], $image)) {
            echo "Error uploading image.";
            exit;
        }
    }
    $tmp_value = 1;
    $stmt = $conn->prepare("INSERT INTO resumes (user,name, email, phone, address, profile, experience, education, skills, languages, certifications, hobbies, projects, `references`, about, image,tmp) VALUES (?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?)");
    $stmt->bind_param("sssssssssssssssss",$user, $name, $email, $phone, $address, $profile, $experience, $education, $skills, $languages, $certifications, $hobbies, $projects, $references, $about, $image,$tmp_value);

    $stmt->execute();


    $stmt->close();
    $conn->close();

    $skillsArray = explode(',', $skills);
    $languagesArray = explode(',', $languages);
    $hobbiesArray = explode(',', $hobbies);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Profile Template</title>
  <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.6.3/css/all.css'>
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Nunito|Cutive+Mono|Open+Sans'>
  <link rel="stylesheet" href="./style.css">
</head>
<body>
<div id="inner-nav"></div>
    <div id="container">
        <div id="profile">
            <div id="image">
                <img id="profile-photo" src="<?php echo !empty($image) ? $image : 'default-image.jpg'; ?>" alt="Profile Image">
                <a href="#"><i class="fas fa-pen stroke-transparent"></i></a>
            </div>
            <p id="name"><?php echo $name; ?><br><span id="email"><?php echo $email; ?></span></p>
            <p id="designation"><?php echo $profile; ?><br><span id="college"><?php echo $address; ?></span></p>
            <div id="social-links"><a href="#"><i class="fab fa-facebook-f stroke-transparent"></i></a><a><i class="fab fa-twitter stroke-transparent"></i></a><a><i class="fab fa-linkedin-in stroke-transparent"></i></a><a><i class="fab fa-github stroke-transparent"></i></a></div>
            <hr width="100%">
            <div id="about">
                <p style="display:inline;">About</p>
                <a href="#"><i class="fas fa-pen stroke-transparent-blue"></i></a>
            </div>
            <p id="year-graduation">Experience<br><strong><?php echo $experience; ?></strong></p>
            <p id="education">Education<br><strong><?php echo $education; ?></strong></p>
            <p id="more-about">About<br><span><?php echo $about; ?></span></p>
            <p id="telephone">Phone<br><strong><?php echo $phone; ?></strong></p>
        </div>
        <div id="info-cards">
            <div class="card">
                <p><i class="fas fa-briefcase stroke-transparent"></i>&nbsp;&nbsp;&nbsp;Experience</p>
                <p><?php echo $experience; ?></p>
            </div>
            <div class="card">
                <p><i class="fas fa-graduation-cap stroke-transparent"></i>&nbsp;&nbsp;&nbsp;Skills</p>
                <ul>
                    <?php foreach ($skillsArray as $skill): ?>
                        <li><p class="tags"><?php echo htmlspecialchars(trim($skill)); ?></p></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="card">
                <p><i class="fas fa-language stroke-transparent"></i>&nbsp;&nbsp;&nbsp;Languages</p>
                <ul>
                    <?php foreach ($languagesArray as $language): ?>
                        <li><p class="tags"><?php echo htmlspecialchars(trim($language)); ?></p></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="card">
                <p><i class="fas fa-heart stroke-transparent"></i>&nbsp;&nbsp;&nbsp;Hobbies</p>
                <ul>
                    <?php foreach ($hobbiesArray as $hobby): ?>
                        <li><p class="tags"><?php echo htmlspecialchars(trim($hobby)); ?></p></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="card">
                <p><i class="fas fa-folder stroke-transparent"></i>&nbsp;&nbsp;&nbsp;Projects</p>
                <p><?php echo $projects; ?></p>
            </div>
            <div class="card">
                <p><i class="fas fa-users stroke-transparent"></i>&nbsp;&nbsp;&nbsp;References</p>
                <p><?php echo $references; ?></p>
            </div>
        </div>
    </div>
</body>
</html>