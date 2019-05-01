<?php

class Bike extends Vehicle
{
    private $speed = 25;

    private $canFly = false;

    private $maxPassengers = 2;

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
