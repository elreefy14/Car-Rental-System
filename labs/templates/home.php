<form action="search.php" method="get">
        <div class="input-group">
          <input type="text" class="form-control" name="search" placeholder="Search for...">
          <span class="input-group-btn">
            <button class="btn btn-default" type="submit">Go!</button>
          </span>
         </div><!-- /input-group -->   
      </form>


<?php function getColor($stock) {
    $color = 'danger';

    if($stock > 50){
        $color = 'success';
    } else if($stock > 20) {
        $color = 'warning';
    }

    return $color;
}
?>
<div class="row">
    <?php 
    //connect to database
    $databaseConnexion = new PDO('mysql:host=localhost;dbname=car-rental-system', 'root','');
    $cars = $databaseConnexion->prepare('SELECT * from car');
    $cars->execute();
    $cars = $cars->fetchAll();

    foreach ($cars as $car) { ?>
        <div class="col-md-3 text-center">
            <div class="panel panel-default">
                <div class="panel-body">
                    
                  
                    <img src="<?= $car['pic'] ?>" class="img-responsive" style="height: 160px;"/>
                    <?php
                    $car_id = $car['car_id'];
                    $brand = $car['brand'];
                    $model = $car['model'];
                    $color = $car['color'];
                    $plate_id = $car['plate_id'];
                    $model_year = $car['model_year'];

                    ?>

                    <?=
                    
                    "<h5 class=\"text-$color\" >car_id : $car_id </h5>"; ?> <?=
                    "<h5 class=\"text-$color\" >model_year : $model_year </h5>"; ?><?=
                    "<h5 class=\"text-$color\" >brand : $brand </h5>"; ?> <?=
                    "<h5 class=\"text-$color\" >model : $model </h5>"; ?> <?=
                    "<h5 class=\"text-$color\" >color : $color </h5>"; ?> <?=
                    "<h5 class=\"text-$color\" >plate_id : $plate_id </h5>"; ?>
                    <form action="rent.php" method="post">
                        <input type="hidden" name="car_id" value="<?= $car['car_id'] ?>">
                        pick up date:  <input type="date" name="pick_up_date" placeholder="pick up date">
                        return date:  <input type="date" name="return_date" placeholder="return date">
                        <button type="submit" class="btn btn-primary">Rent</button>

            
                    </form>
                </div>
            </div>
            _____________________________________________________
        </div>
    <?php } ?>
</div>