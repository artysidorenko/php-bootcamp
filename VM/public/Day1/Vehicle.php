<?php
include '../Day3/Transport.php';


class Vehicle extends Transport
{
    public function speed($speed)
    {
        return "$speed Km/h";
    }

    public function canFly($canFly)
    {
        if ($canFly) {
            return 'It can fly';
        }

        return 'It can not fly';
    }

    public function maxPassengers($max)
    {
        return $max;
    }

}
