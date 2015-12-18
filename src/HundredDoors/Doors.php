<?php

// 100 doors in a row are all initially closed. You make
// 100 passes by the doors. The first time through, you
// visit every door and toggle the door (if the door is
// closed, you open it; if it is open, you close it).
// The second time you only visit every 2nd door (door
// #2, #4, #6, ...). The third time, every 3rd door
// (door #3, #6, #9, ...), etc, until you only visit
// the 100th door.

namespace App\HundredDoors;

class Doors
{
    protected $doors;

    public function __construct()
    {
        $this->doors = array_fill(0, 100, false);
    }

    /**
     * Walk past all the doors.
     */
    public function walk()
    {
        for ($i = 1; $i <= 100; $i++) {
            $root = sqrt($i);

            $state = ($root == ceil($root)) ? true : false;

            $this->doors[$i - 1] = $state;
        }
    }

    /**
     * Get all the doors.
     *
     * @return array
     */
    public function doors()
    {
        return $this->doors;
    }

    /**
     * Get the door my it's number.
     *
     * @param $number
     *
     * @return mixed
     */
    public function door($number)
    {
        return $this->doors[$number - 1];
    }
}