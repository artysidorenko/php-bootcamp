<?php

class Car extends Vehicle
{
    private $speed = 110;

    private $canFly = false;

    private $maxPassengers = 5;

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
