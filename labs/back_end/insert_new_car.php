<?php
include_once('../connect.php');

$brand = $_POST['brand'];
$model = $_POST['model'];
$model_year = $_POST['model_year'];
$color = $_POST['color'];
//insert new car to database
function insertNewCar( $brand, $model, $model_year, $color)
{
    global $con;
    $stmt = $con->prepare("INSERT INTO cars (brand, model, model_year, color) VALUES (:car_id, :brand, :model, :model_year, :color)");
    $stmt->execute(array(
        'brand' => $brand,
        'model' => $model,
        'model_year' => $model_year,
        'color' => $color
    ));
    return $stmt->rowCount();
}
insertNewCar($car_id, $brand, $model, $model_year, $color);
//redirect to admin_control_panel.php
header("Location: ../admin_control_panel.php");






?>
