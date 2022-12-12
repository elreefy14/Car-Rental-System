<div class="col-md-6 text-center">
        <h1>all reservation within a specified period</h1>
        <form action="admin_reservation.php" method="post">
            <div class="input-group">
                <input type="text" class="form-control" name="user_id" placeholder="user id">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="submit">Go!</button>
                </span>
            </div><!-- /input-group -->
        </form>
    

<div class="row">
    <?php 
    $user_id = $_POST['user_id'];
     //connect to database
     $databaseConnexion = new PDO('mysql:host=localhost;dbname=car-rental-system', 'root','');
     //we need to join reservation table with car table and user table to get all the info we need in period of time user_id and end_date
     $results = $databaseConnexion->prepare('SELECT *
     FROM ((reservation
     INNER JOIN car ON car.car_id = reservation.car_id)
     INNER JOIN user ON user.user_id = reservation.user_id)
     WHERE user.user_id = :user_id' );
        
           $results->execute(array(
               'user_id' => $user_id,
           ));
           $results = $results->fetchAll();
         //use sql query to inser rando values into user table
    
foreach ($results as $result) { ?>
    <div class="col-md-3 text-center">
        <div class="panel panel-default">
            <div class="panel-body">
                              
                <img src="<?= $result['pic'] ?>" class="img-responsive" style="height: 160px;"/>
                <?php
                $brand = $result['brand'];
                $model = $result['model'];
                $color = $result['color'];
                $plate_id = $result['plate_id'];
                $model_year = $result['model_year'];
                //user info 
                $fname = $result['fname'];
                $lname = $result['lname'];
                $age = $result['age'];
                $gender = $result['gender'];
                //reservation info
                $reserve = $result['reserve'];
                $pick_up = $result['pick_up'];
                $return_date = $result['return_date'];
                ?>

                <?=
                "<h5 class=\"text-$color\" >model : $model </h5>"; ?> <?=
                "<h5 class=\"text-$color\" >plate_id : $plate_id </h5>"; ?>
                <?= "<h5 class=\"text-$color\" >user name : $fname $lname </h5>"; ?> <?=
                "<h5 class=\"text-$color\" >age : $age </h5>"; ?> <?=
                "<h5 class=\"text-$color\" >gender : $gender </h5>"; ?>
            </div>
        </div>
        _____________________________________________________
    </div>
<?php } ?>
</div>

