<?php

interface transportInfo
{
    public function canFly($canFly);
    public function speed($speed);
    public function maxPassengers($max);
}

abstract class Transport implements transportInfo
{
    public function travelDistance($time, $speed)
    {
        return $time * $speed;
    }
}

// Exercise:
// Based on the classes defined on the exercise 1 now create an abstract class called Transport
// to provide a shared method that returns the travel distance
// based on the time of travel (number of minutes) and the max speed of the transport.
// Create an interface that force all Transports to implement the methods canFly, speed and maxPassengers.
// Modify the existent classes (Plane, Car, and Bike) to use this new additions.
