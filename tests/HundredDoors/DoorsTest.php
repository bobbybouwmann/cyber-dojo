<?php

use App\HundredDoors\Doors;

class DoorsTest extends PHPUnit_Framework_TestCase
{
    /** @test */
    public function check_if_the_hallway_has_100_doors()
    {
        $doors = new Doors();

        $this->assertCount(100, $doors->doors());
    }

    /** @test */
    public function check_the_first_door()
    {
        $this->walkDoorsAndCheckStateForDoor(true, 1);
    }

    /** @test */
    public function check_the_second_door()
    {
        $this->walkDoorsAndCheckStateForDoor(false, 2);
    }

    /** @test */
    public function check_the_third_door()
    {
        $this->walkDoorsAndCheckStateForDoor(false, 3);
    }

    /** @test */
    public function check_the_fourth_door()
    {
        $this->walkDoorsAndCheckStateForDoor(true, 4);
    }

    /** @test */
    public function check_the_sixteenth_door()
    {
        $this->walkDoorsAndCheckStateForDoor(true, 16);
    }

    /** @test */
    public function check_the_forty_second_floor()
    {
        $this->walkDoorsAndCheckStateForDoor(false, 42);
    }

    /** @test */
    public function check_the_hundredth_door()
    {
        $this->walkDoorsAndCheckStateForDoor(true, 100);
    }

    /**
     * Walk through the doors and check the state of a certain door.
     *
     * @param $state
     * @param $door
     */
    protected function walkDoorsAndCheckStateForDoor($state, $door)
    {
        $doors = new Doors();
        $doors->walk();

        if ($state) {
            $this->assertTrue($doors->door($door));
        } else {
            $this->assertFalse($doors->door($door));
        }
    }
}