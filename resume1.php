<?php
// Include database connection
include 'db.php';

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

    // Save data to database
    $stmt = $conn->prepare("INSERT INTO resumes (name, email, phone, address, profile, experience, education, skills, languages, certifications, hobbies, projects, `references`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssssssss", $name, $email, $phone, $address, $profile, $experience, $education, $skills, $languages, $certifications, $hobbies, $projects, $references);

    if ($stmt->execute()) {
        echo "Resume saved successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();

    // Prepare arrays for displaying on the page
    $skillsArray = explode(',', $skills);
    $languagesArray = explode(',', $languages);
    $hobbiesArray = explode(',', $hobbies);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $name; ?>'s Resume</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container resume-container">
        <div class="resume-header">
            <h1><?php echo $name; ?></h1>
            <p><strong>Email:</strong> <?php echo $email; ?> | <strong>Phone:</strong> <?php echo $phone; ?></p>
            <p><strong>Address:</strong> <?php echo $address; ?></p>
        </div>

        <?php if (!empty($profile)) { ?>
        <div class="section">
            <h2>Profile Summary</h2>
            <p><?php echo $profile; ?></p>
        </div>
        <?php } ?>

        <div class="section">
            <h2>Work Experience</h2>
            <p><?php echo $experience; ?></p>
        </div>

        <div class="section">
            <h2>Education</h2>
            <p><?php echo $education; ?></p>
        </div>

        <div class="section">
            <h2>Skills</h2>
            <ul class="skills-list">
                <?php foreach ($skillsArray as $skill) { ?>
                    <li><?php echo htmlspecialchars(trim($skill)); ?></li>
                <?php } ?>
            </ul>
        </div>

        <div class="section">
            <h2>Languages</h2>
            <ul class="languages-list">
                <?php foreach ($languagesArray as $language) { ?>
                    <li><?php echo htmlspecialchars(trim($language)); ?></li>
                <?php } ?>
            </ul>
        </div>

        <?php if (!empty($certifications)) { ?>
        <div class="section">
            <h2>Certifications</h2>
            <p><?php echo $certifications; ?></p>
        </div>
        <?php } ?>

        <?php if (!empty($hobbiesArray)) { ?>
        <div class="section">
            <h2>Hobbies & Interests</h2>
            <ul class="hobbies-list">
                <?php foreach ($hobbiesArray as $hobby) { ?>
                    <li><?php echo htmlspecialchars(trim($hobby)); ?></li>
                <?php } ?>
            </ul>
        </div>
        <?php } ?>

        <?php if (!empty($projects)) { ?>
        <div class="section">
            <h2>Projects</h2>
            <p><?php echo $projects; ?></p>
        </div>
        <?php } ?>

        <?php if (!empty($references)) { ?>
        <div class="section">
            <h2>References</h2>
            <p><?php echo $references; ?></p>
        </div>
        <?php } ?>
    </div>
</body>
</html>
