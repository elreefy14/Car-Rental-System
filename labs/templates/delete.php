<?php
$servername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "car-rental-system";

$car_id = $GET['id'];

// Create connection
$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
if ($conn->
query("DELETE FROM car WHERE car_id = '$car_id'") === TRUE) {
  echo "<script>
    window.location.href='admin_control_panal.php';
    alert('record deleted successfully'); 
           </script>";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();







?>
