<?php
include 'db.php';

$resume_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$sql = "SELECT * FROM resumes WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $resume_id);
$stmt->execute();
$result = $stmt->get_result();
$resume = $result->fetch_assoc();

$stmt->close();
$conn->close();

// Convert skills, languages, and hobbies to arrays if they exist in the database as comma-separated strings
$skillsArray = !empty($resume['skills']) ? explode(',', $resume['skills']) : [];
$languagesArray = !empty($resume['languages']) ? explode(',', $resume['languages']) : [];
$hobbiesArray = !empty($resume['hobbies']) ? explode(',', $resume['hobbies']) : [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Profile Template</title>
  <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.6.3/css/all.css'>
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Nunito|Cutive+Mono|Open+Sans'>
  <link rel="stylesheet" href="tmp1/style.css"> <!-- Your custom template style -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script> <!-- Include html2pdf.js -->
</head>
<body>
<div id="inner-nav"></div>
<div id="resumeContent">
  <div id="container">
    <div id="profile">
      <p id="name"><?php echo htmlspecialchars($resume['name']); ?><br><span id="email"><?php echo htmlspecialchars($resume['email']); ?></span></p>
      <p id="designation"><?php echo htmlspecialchars($resume['profile']); ?><br><span id="college"><?php echo htmlspecialchars($resume['address']); ?></span></p>

      <hr width="100%">
      <div id="about">
        <p style="display:inline;">About</p>
      </div>
      <p id="year-graduation">Experience<br><strong><?php echo htmlspecialchars($resume['experience']); ?></strong></p>
      <p id="education">Education<br><strong><?php echo htmlspecialchars($resume['education']); ?></strong></p>
      <p id="more-about">About<br><span><?php echo htmlspecialchars($resume['about']); ?></span></p>
      <p id="telephone">Phone<br><strong><?php echo htmlspecialchars($resume['phone']); ?></strong></p>
    </div>

    <div id="info-cards">
      <div class="card">
        <p><i class="fas fa-briefcase stroke-transparent"></i>&nbsp;&nbsp;&nbsp;Experience</p>
        <p><?php echo htmlspecialchars($resume['experience']); ?></p>
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
        <p><?php echo htmlspecialchars($resume['projects']); ?></p>
      </div>
      <div class="card">
        <p><i class="fas fa-users stroke-transparent"></i>&nbsp;&nbsp;&nbsp;References</p>
        <p><?php echo htmlspecialchars($resume['references']); ?></p>
      </div>
      <button id="downloadResumeBtn">Download as PDF</button>
    </div>
  </div>
</div>

<script>
  document.getElementById('downloadResumeBtn').addEventListener('click', function() {
    const element = document.getElementById('resumeContent');
    
    document.getElementById('downloadResumeBtn').style.display = 'none';

    html2pdf()
      .from(element)
      .save('<?php echo htmlspecialchars($resume['name']); ?>_resume.pdf')
      .then(function() {
        document.getElementById('downloadResumeBtn').style.display = 'block';
      });
  });
</script>
</body>
</html>
