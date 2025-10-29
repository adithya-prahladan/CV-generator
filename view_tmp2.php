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
  <title>Live Resume Concept</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="tmp2/style.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script> <!-- Include html2pdf.js -->
</head>
<body>
<button><a href="viewcv.php" class="btn btn-primary btn-lg px-4 me-md-2">Back</a></button>
<div class="wrapper clearfix">
  <div class="left">
    <div class="name-hero">
      <div class="me-img">
        <!-- You can add an image here if needed -->
      </div>
      <div class="name-text">
        <h1><?php echo htmlspecialchars($resume['name']); ?></h1>
        <p><?php echo htmlspecialchars($resume['address']); ?></p>
        <p><?php echo htmlspecialchars($resume['email']); ?></p>
        <p><?php echo htmlspecialchars($resume['phone']); ?></p>
      </div>
    </div>
  </div>

  <div class="right">
    <div class="inner">
      <section>
        <h1>Profile</h1>
        <p><?php echo nl2br(htmlspecialchars($resume['profile'])); ?></p>
      </section>

      <section>
        <h1>Experience</h1>
        <p><?php echo nl2br(htmlspecialchars($resume['experience'])); ?></p>
      </section>

      <section>
        <h1>Education</h1>
        <p><?php echo nl2br(htmlspecialchars($resume['education'])); ?></p>
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
        <p><?php echo nl2br(htmlspecialchars($resume['certifications'])); ?></p>
      </section>

      <section>
        <h1>Hobbies</h1>
        <ul class="skill-set">
          <?php foreach ($hobbiesArray as $hobby) { echo "<li>" . htmlspecialchars(trim($hobby)) . "</li>"; } ?>
        </ul>
      </section>

      <section>
        <h1>Projects</h1>
        <p><?php echo nl2br(htmlspecialchars($resume['projects'])); ?></p>
      </section>

      <section>
        <h1>References</h1>
        <p><?php echo nl2br(htmlspecialchars($resume['references'])); ?></p>
      </section>

      <section>
        <h1>About</h1>
        <p><?php echo nl2br(htmlspecialchars($resume['about'])); ?></p>
      </section>



      <!-- Add the download button -->
      <button id="downloadResumeBtn">Download as PDF</button>
    </div>
  </div>
</div>

<script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script>
  document.getElementById('downloadResumeBtn').addEventListener('click', function() {
    const element = document.querySelector('.wrapper'); // Selecting the wrapper div to download

    document.getElementById('downloadResumeBtn').style.display = 'none'; // Hide the button during the download

    html2pdf()
      .from(element)
      .save('<?php echo htmlspecialchars($resume['name']); ?>_resume.pdf')
      .then(function() {
        document.getElementById('downloadResumeBtn').style.display = 'block'; // Show the button again after the download
      });
  });
</script>

</body>
</html>
