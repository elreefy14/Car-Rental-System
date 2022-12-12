<form action="advanced_search.php" method="get">
        <div class="input-group">
          <input type="text" class="form-control" name="search" placeholder="Search for...">
          <span class="input-group-btn">
            <button class="btn btn-default" type="submit">Go!</button>
          </span>
         </div><!-- /input-group -->   
      </form>



<?php 
$servername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "car-rental-system";
// Create connection
$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

//join reservation and result and user and store result in array $results
$results = $conn->query("SELECT * FROM reservation INNER JOIN car ON reservation.car_id = car.car_id INNER JOIN user ON reservation.user_id = user.user_id");
//for loop to show all in array $results in table
//randomly generate 3 results


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
                <?= "<h5 class=\"text-$color\" >pick_up : $pick_up </h5>"; ?> 
                <?= "<h5 class=\"text-$color\" >return_date : $return_date </h5>"; ?>
                <?= "<h5 class=\"text-$color\" >reserve : $reserve </h5>"; ?>     
              </div>
        </div>
        _____________________________________________________
    </div>
<?php } ?>
</div>

