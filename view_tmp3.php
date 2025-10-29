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

<?php
// Initialize variables with fetched data, add checks for undefined values
$address = isset($resume['address']) ? $resume['address'] : 'Not Provided';
$email = isset($resume['email']) ? $resume['email'] : 'Not Provided';
$phone = isset($resume['phone']) ? $resume['phone'] : 'Not Provided';
$profile = isset($resume['profile']) ? $resume['profile'] : 'Not Provided';
$experience = isset($resume['experience']) ? $resume['experience'] : 'Not Provided';
$education = isset($resume['education']) ? $resume['education'] : 'Not Provided';
$certifications = isset($resume['certifications']) ? $resume['certifications'] : 'Not Provided';
$projects = isset($resume['projects']) ? $resume['projects'] : 'Not Provided';
$references = isset($resume['references']) ? $resume['references'] : 'Not Provided';
$about = isset($resume['about']) ? $resume['about'] : 'Not Provided';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Sample Resume</title>
  <link rel="stylesheet" href="tmp3/style.css">
</head>
<body>
<button class ="left-button" ><a href="viewcv.php">Back</a></button>
<div class="container">
  <div class="resumeContent" id="resumeContent">
    <div class="header">
      <div class="full-name">
        <span class="first-name"><?php echo htmlspecialchars($resume['name']); ?></span>
      </div>
      <div class="contact-info">
        <span class="email">Email: </span>
        <span class="email-val"><?php echo $email; ?></span>
        <span class="separator"></span>
        <span class="phone">Phone: </span>
        <span class="phone-val"><?php echo $phone; ?></span>
      </div>
      
      <div class="about">
       
        <span class="desc"><?php echo $profile; ?></span>
      </div>
    </div>

    <div class="details">
      <div class="section">

        <div class="section__list">
          <div class="section__list-item">
            <div class="left">
            <div class="section__title">Experience</div>
              <div class="desc"><?php echo $experience; ?></div>
            </div>
            <div class="right">
              
      <div class="section">
        <div class="section__title">Skills</div>
        <div class="skills">
          <?php foreach ($skillsArray as $skill): ?>
            <div class="skills__item">
              <div class="name"><?php echo htmlspecialchars(trim($skill)); ?></div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>

            </div>
          </div>
        </div>
      </div>

      <div class="section">
        <div class="section__list">
          <div class="section__list-item">
            <div class="left">
            <div class="section__title">Education</div>
            <div class="desc"><?php echo $education; ?></div> 
            </div>
          </div>
        </div>
      </div>

     

      <div class="section">
        <div class="section__title">Certifications</div>
        <div class="section__list">
          <div class="section__list-item">
            <div class="desc"><?php echo $certifications; ?></div>
          </div>
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
          <?php foreach ($hobbiesArray as $hobby): ?>
            <div class="section__list-item">
              <div class="name"><?php echo htmlspecialchars(trim($hobby)); ?></div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>

      <div class="section">
        <div class="section__title">References</div>
        <div class="section__list">
          <div class="section__list-item">
            <div class="desc"><?php echo $references; ?></div>
          </div>
        </div>
      </div>

      <div class="section">
        <div class="section__title">About</div>
        <div class="section__list">
          <div class="section__list-item">
            <div class="desc"><?php echo $about; ?></div>
          </div>
        </div>
      </div>
    </div>

    <button id="downloadResumeBtn">Download as PDF</button>
    
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
<script>
document.getElementById('downloadResumeBtn').addEventListener('click', function() {
    console.log("Download button clicked!");
    const element = document.getElementById('resumeContent');
    
    document.getElementById('downloadResumeBtn').style.display = 'none';

    html2pdf()
        .from(element)
        .set({
            filename: '<?php echo htmlspecialchars($resume['name']); ?>_resume.pdf',
            margin: [10, 10, 10, 10],
        })
        .save()
        .then(function() {
            document.getElementById('downloadResumeBtn').style.display = 'block';
        })
        .catch(function(err) {
            console.log('Error generating PDF:', err);
            document.getElementById('downloadResumeBtn').style.display = 'block';
        });
});
</script>

</body>
</html>
