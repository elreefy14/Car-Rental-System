<div class="col-md-6 text-center">
        <h1>Daily payments within specific period. </h1>
        <form action="admin_payment.php" method="post">
            <div class="input-group">
            <input type="text" class="form-control" name="start_date" placeholder="start date">
                <input type="text" class="form-control" name="end_date" placeholder="end date">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="submit">Go!</button>
                </span>
            </div><!-- /input-group -->
        </form>

<div class="row">
    <?php 

// CREATE TABLE car
// (
//     method int not null ,
//     brand varchar(50) ,
//     model varchar(50) ,
//     model_year int ,
//     color varchar(50) ,
//     status varchar(50) ,
//     PRIMARY KEY(method)
// );
// CREATE TABLE status
// (
//     statusId int not null ,
//     method int ,
//     status varchar(50) ,
//     date datetime ,
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
//     method int ,
//     paymentNo int,
//     reserve datetime ,
//     pick_up datetime ,
//     return_date datetime ,
//     PRIMARY KEY(rno)
// );
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];        
 //connect to database
 $databaseConnexion = new PDO('mysql:host=localhost;dbname=car-rental-system', 'root','');
 //we need to join reservation table with car table to get all the info we need in period of time start_date and end_date
    $results = $databaseConnexion->prepare('SELECT *
    FROM payment
    WHERE payment.date BETWEEN 
    :start_date AND :end_date');
        
            $results->execute(array(
                'start_date' => $start_date,
                'end_date' => $end_date
            ));
            $results = $results->fetchAll();
            //use sql query to inser rando values into user table
foreach ($results as $result) { ?>
    <div class="col-md-3 text-center">
        <div class="panel panel-default">
            <div class="panel-body">
                
              
                <img src="<?= $result['pic'] ?>" class="img-responsive" style="height: 160px;"/>
                <?php
                $method = $result['method'];
                $status = $result['status'];
                $date = $result['date'];
                ?>

                <?=
                "<h5 class=\"text-$color\" >date : $date </h5>"; ?>    <?=
                "<h5 class=\"text-$color\" >status : $status </h5>"; ?><?=
                "<h5 class=\"text-$color\" >method : $method </h5>";
?>

            </div>
        </div>
        _____________________________________________________
    </div>
<?php } ?>
</div>

