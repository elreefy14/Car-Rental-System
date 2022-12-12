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
 //search in table car brand model plate_id model_year color store result in $cars
  $cars = $conn->query("SELECT * FROM car WHERE brand LIKE '%$search%' OR model LIKE '%$search%' OR plate_id LIKE '%$search%' OR model_year LIKE '%$search%' OR color LIKE '%$search%'");
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
      <td>" . $row['status'] . "</td>
    </tr>";
    }
    echo "</tbody>
  </table>";
  }
$conn->close();
      ?>