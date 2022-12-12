    <?php 
    //connect to database
    $servername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "car-rental-system";
//post status from admin_home.php
$state = $_POST['status'];
//post car id from admin_home.php
$car_id = 7;



// Create connection
$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//insert in table status car_id	state status_date=now()
if ($conn->
query("INSERT INTO status (car_id, state, status_date) VALUES ('$car_id', '$state', now())") === TRUE) {
    echo "<script>
   // window.location.href='admin_control_panal.php';
    alert('record updated successfully'); 
           </script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();





    ?>