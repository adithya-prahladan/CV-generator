<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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

  <!-- nav bar start  -->
  <header id="nav" class="site-header position-fixed text-white bg-dark">
    <nav id="navbar-example2" class="navbar navbar-expand-lg py-2">

      <div class="container ">
        
<h3>List of Resumes</h3>
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
  <?php
// Include database connection
include 'db.php';
session_start();
$user=$_SESSION['email_id'];


// Fetch all resumes from the database
$sql = "SELECT * FROM resumes where user='$user'  ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Resumes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .table-containerr {
            width: 100%;
            overflow-x: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ccc;
            padding: 7px;
            text-align: left;
        }
        th {
            background-color: #1AA090;
            color: white;
        }
        .view-button {
            text-decoration: none;
            color: #fff;
            background-color: #1AA090;
            padding: 2px 10px;
            border-radius: 5px;
        }
    </style>
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&amp;subset=devanagari,latin-ext" rel="stylesheet">
        
        <!-- title of site -->
        

        <link rel="stylesheet" href="home_files/css/bootstrap.min.css">
		
		<!-- bootsnav -->
        
        <!--style.css-->
        <link rel="stylesheet" href="home_files/css/style.css">
        
        <!--responsive.css-->
</head>
<body>

<br><br>
   
    <div class="table-containerr">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Profile Summary</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo htmlspecialchars($row['name']); ?></td>
                            <td><?php echo htmlspecialchars($row['email']); ?></td>
                            <td><?php echo htmlspecialchars($row['phone']); ?></td>
                            <td><?php echo htmlspecialchars($row['profile']); ?></td>
                            <td><?php echo $row['created_at']; ?></td>
                            <td>
                                <a href="view_resume_details.php?id=<?php echo $row['id']; ?>" class="view-button">View</a><br>
                                <a href="editresume.php?id=<?php echo $row['id']; ?>" class="view-button">Edit</a>
                                <a href="deleteresume.php?id=<?php echo $row['id']; ?>" class="view-button">Delete</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7">No resumes found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <?php
    // Close database connection
    $conn->close();
    ?>
</body>
</html>

  <script src="home_files/js/jquery-1.11.0.min.js"></script>
  <script src="home_files/js/script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>
</body>

</html>