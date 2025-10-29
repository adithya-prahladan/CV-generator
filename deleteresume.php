<?php
$id=$_GET['id'];
$conn=mysqli_connect("localhost","root","","minibase");
$data=mysqli_query($conn,"delete from resumes where id='$id'");
header("location:viewcv.php");
?>