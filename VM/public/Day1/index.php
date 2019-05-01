<?php

// include 'Vehicle.php';
// include 'Plane.php';
// include 'Car.php';
// include 'Bike.php';

spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});


$plane = new Plane();
$car = new Car();
$bike = new Bike();

?>

<ul>
  <li>Plane: Speed: <?php echo $plane->speed($plane->getSpeed()) ?>. <?php echo $plane->canFly($plane->getFly()) ?>
. Max passengers: <?php echo $plane->maxPassengers($plane->getPassengers()) ?>
  </li>
  <li>Car: Speed: <?php echo $car->speed($car->getSpeed()) ?>. <?php echo $car->canFly($car->getFly()) ?>
. Max passengers: <?php echo $car->maxPassengers($car->getPassengers()) ?>
  </li>
  <li>Plane: Speed: <?php echo $bike->speed($bike->getSpeed()) ?>. <?php echo $bike->canFly($bike->getFly()) ?>
. Max passengers: <?php echo $bike->maxPassengers($bike->getPassengers()) ?>
  </li>
</ul>

