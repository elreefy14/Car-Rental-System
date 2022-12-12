<?php
$servername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "car-rental-system";
//get data from form
$car_id = $_POST['car_id'];
$pick_up = $_POST['pick_up_date'];
$return_date = $_POST['return_date'];




// Create connection
$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}



//insert to table reservation user_id car_id reserve =now() pick_up  return_date 
$sql = "INSERT INTO reservation (user_id, car_id, reserve, pick_up, return_date)
VALUES ('1', '$car_id', now(), now(), '$return_date')";

//if insert is successfull print message
if ($conn->
query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}






?>