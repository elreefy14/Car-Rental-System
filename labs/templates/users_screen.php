    <div class="col-md-6 text-center">
        <h1>all reservation within a specified period</h1>
        <form action="users_screen.php" method="post">
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
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];        
     //connect to database
     $databaseConnexion = new PDO('mysql:host=localhost;dbname=car-rental-system', 'root','');
     //we need to join reservation table with car table and user table to get all the info we need in period of time start_date and end_date
     $results = $databaseConnexion->prepare('SELECT *
        FROM ((reservation
        INNER JOIN car ON car.car_id = reservation.car_id)
        INNER JOIN user ON user.user_id = reservation.user_id) WHERE reservation.reserve
        BETWEEN :start_date AND :end_date');
        
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
                "<h5 class=\"text-$color\" >model_year : $model_year </h5>"; ?><?=
                "<h5 class=\"text-$color\" >brand : $brand </h5>"; ?> <?=
                "<h5 class=\"text-$color\" >model : $model </h5>"; ?> <?=
                "<h5 class=\"text-$color\" >color : $color </h5>"; ?> <?=
                "<h5 class=\"text-$color\" >plate_id : $plate_id </h5>"; ?>
                <?= "<h5 class=\"text-$color\" >user : $fname $lname </h5>"; ?> <?=
                "<h5 class=\"text-$color\" >age : $age </h5>"; ?> <?=
                "<h5 class=\"text-$color\" >gender : $gender </h5>"; ?>
                <?= "<h5 class=\"text-$color\" >reserve : $reserve </h5>"; ?> 
            </div>
        </div>
        _____________________________________________________
    </div>
<?php } ?>
</div>

