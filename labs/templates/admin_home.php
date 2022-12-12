<div class="col-md-6 text-center">
        <h1>The status of all cars on a specific day.</h1>
        <form action="admin_home.php" method="post">
            <div class="input-group">
                <input type="text" class="form-control" name="specific_date" placeholder="specific date">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="submit">Go!</button>
                </span>
            </div><!-- /input-group -->
        </form>
    

<div class="row">
    <?php 

// CREATE TABLE car
// (
//     car_id int not null ,
//     brand varchar(50) ,
//     model varchar(50) ,
//     model_year int ,
//     color varchar(50) ,
//     status varchar(50) ,
//     PRIMARY KEY(car_id)
// );
// CREATE TABLE status
// (
//     statusId int not null ,
//     car_id int ,
//     state varchar(50) ,
//     status_date datetime ,
//     PRIMARY KEY(statusId)
// );
// CREATE TABLE payment
// (
//     paymentNo int not null ,
//     date datetime ,
//     status varchar(50) ,
//     method varchar(50) ,
//     PRIMARY KEY(paymentNo)
// );
// CREATE TABLE `user`
// (
//     user_id int not null ,
//     fname varchar(50) ,
//     lname varchar(50) ,
//     age int,
//     gender varchar(50) ,
//     PRIMARY KEY(user_id)
// );
// CREATE TABLE reservation
// (
//     rno int not null ,
//     user_id int ,
//     car_id int ,
//     paymentNo int,
//     reserve datetime ,
//     pick_up datetime ,
//     return_date datetime ,
//     PRIMARY KEY(rno)
// );
    $specific_date = $_POST['specific_date'];
     //connect to database
     $databaseConnexion = new PDO('mysql:host=localhost;dbname=car-rental-system', 'root','');
     //we need to join car table with status table and user table to get all the info we need in specific_date
        $results = $databaseConnexion->prepare("SELECT * FROM car INNER JOIN status ON car.car_id = status.car_id WHERE status_date = :specific_date");
        
           $results->execute(array(
               'specific_date' => $specific_date,
           ));
           $results = $results->fetchAll();
         //use sql query to inser rando values into user table
    
foreach ($results as $result) { ?>
    <div class="col-md-3 text-center">
        <div class="panel panel-default">
            <div class="panel-body">
                
              
                <img src="<?= $result['pic'] ?>" class="img-responsive" style="height: 160px;"/>
                <?php
                $car_id = $result['car_id'];
                $state = $result['state'];
                $status_date = $result['status_date'];
                ?>

                <?=
                "<h5 class=\"text-$color\" >status_date : $status_date </h5>"; ?>    <?=
                "<h5 class=\"text-$color\" >state : $state </h5>"; ?><?=
                "<h5 class=\"text-$color\" >car_id : $car_id </h5>";
?>

            </div>
        </div>
        _____________________________________________________
    </div>
<?php } ?>
</div>

