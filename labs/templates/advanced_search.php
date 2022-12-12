<?php
$servername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "car-rental-system";
//get data from form
$model_year = $_POST['model_year'];
$color = $_POST['color'];

// Create connection
$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$search=$_GET['search'];

  $cars = $conn->query("SELECT * FROM car INNER JOIN reservation ON car.car_id = reservation.car_id INNER JOIN user ON reservation.user_id = user.user_id 
  WHERE brand LIKE '%$search%' OR model LIKE '%$search%' OR plate_id LIKE '%$search%' OR model_year LIKE '%$search%' OR color LIKE '%$search%' OR fname LIKE '%$search%' OR lname LIKE '%$search%' OR age LIKE '%$search%' OR pick_up LIKE '%$search%'");

  //if there is no result print message
  if ($cars->num_rows == 0) {
    echo "<script>  
    alert('no result found'); 
           </script>";
  }
  //if there is result print table with result
  else {
    echo "<table class='table table-striped table-hover'>
    <thead>
      <tr>
        <th>brand</th>
        <th>model</th>
        <th>plate_id</th>
        <th>model_year</th>
        <th>color</th>
        <th>status</th>
        <th>fname</th>
        <th>lname</th>
        <th>age</th>
        <th>reserve</th>
        

   
      </tr>
    </thead>
    <tbody>";
    while ($row = $cars->fetch_assoc()) {
      echo "<tr>
      <td>" . $row['brand'] . "</td>
      <td>" . $row['model'] . "</td>
      <td>" . $row['plate_id'] . "</td>
      <td>" . $row['model_year'] . "</td>
      <td>" . $row['color'] . "</td>
      <td>" . $row['state'] . "</td>
      <td>" . $row['fname'] . "</td>
      <td>" . $row['lname'] . "</td>
      <td>" . $row['age'] . "</td>
      <td>" . $row['reserve'] . "</td>
     
      </tr>";
    }
    echo "</tbody>
    </table>";
  }
  
$conn->close();
      ?>