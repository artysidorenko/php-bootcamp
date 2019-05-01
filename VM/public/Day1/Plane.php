<?php

class Plane extends Vehicle
{
    private $speed = 900;

    private $canFly = true;

    private $maxPassengers = 650;

    function getSpeed()
    {
        return $this->speed;
    }

    function getFly()
    {
      return $this->canFly;
    }

    function getPassengers()
    {
      return $this->maxPassengers;
    }

}

?>