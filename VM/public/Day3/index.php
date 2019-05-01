<?php

spl_autoload_register(function ($class_name) {
    include '../Day1/' . $class_name . '.php';
});

$plane = new Plane();
$car = new Car();
$bike = new Bike();

?>

<p> test time: 24 hours </p>

<ul>
  <li>Plane: Speed: <?php echo $plane->speed($plane->getSpeed()) ?>. <?php echo $plane->canFly($plane->getFly()) ?>
. Max passengers: <?php echo $plane->maxPassengers($plane->getPassengers()) ?>.
  24H travel distance: <?php echo $plane->travelDistance(24, $plane->getSpeed()) ?> Km.
  </li>
  <li>Car: Speed: <?php echo $car->speed($car->getSpeed()) ?>. <?php echo $car->canFly($car->getFly()) ?>
. Max passengers: <?php echo $car->maxPassengers($car->getPassengers()) ?>.
  24H travel distance: <?php echo $car->travelDistance(24, $car->getSpeed()) ?> Km.
  </li>
  <li>Plane: Speed: <?php echo $bike->speed($bike->getSpeed()) ?>. <?php echo $bike->canFly($bike->getFly()) ?>
. Max passengers: <?php echo $bike->maxPassengers($bike->getPassengers()) ?>.
  24H travel distance: <?php echo $bike->travelDistance(24, $bike->getSpeed()) ?> Km.
  </li>
</ul>