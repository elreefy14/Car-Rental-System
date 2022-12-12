<?php
$servername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "car-rental-system";
//get data from form
$brand = $_POST['brand'];
$model = $_POST['model'];
$plate_id = $_POST['plate_id'];
$model_year = $_POST['model_year'];
$color = $_POST['color'];

// Create connection
$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//isert new car to database and print message if success or fail
//		brand	model	plate_id	model_year	color
if ($conn->
query("INSERT INTO car (brand, model,plate_id, model_year, color) VALUES ('$brand', '$model', '$plate_id','$model_year', '$color')") === TRUE) {
  echo "<script>
    window.location.href='admin_control_panal.php';
    alert('new record created successfully'); 
           </script>";
//navigate to admin_control_panl.php page after 3 seconds
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();

//redirect to admin_control_panel.php


?>
