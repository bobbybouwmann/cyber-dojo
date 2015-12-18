<?php

use App\Bowling\Bowling;

class BowlingTest extends PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_tests_only_misses()
    {
        $bowling = new Bowling();

        $this->rollTimes($bowling, 20, 0);

        $this->assertEquals(0, $bowling->score());
    }

    /** @test */
    public function it_tests_one_pin_per_turn()
    {
        $bowling = new Bowling();

        $this->rollTimes($bowling, 20, 1);

        $this->assertEquals(20, $bowling->score());
    }

    /** @test */
    public function it_tests_one_spare_bonus()
    {
        $bowling = new Bowling();

        $this->rollSpare($bowling);

        $bowling->roll(5); // Double the score because of the spare.

        $this->rollTimes($bowling, 17, 0);

        $this->assertEquals(20, $bowling->score());
    }

    /** @test */
    public function it_tests_one_strike_bonus()
    {
        $bowling = new Bowling();

        $this->rollStrike($bowling);

        $bowling->roll(4); // Double the score because of the strike.
        $bowling->roll(5); // Double the score because of the strike.

        $this->rollTimes($bowling, 17, 0);

        $this->assertEquals(28, $bowling->score());
    }

    /** @test */
    public function it_tests_a_perfect_game()
    {
        $bowling = new Bowling();

        $this->rollTimes($bowling, 12, 10);

        $this->assertEquals(300, $bowling->score());
    }

    /** @test */
    public function it_throws_an_exception_for_an_invalid_score()
    {
        $bowling = new Bowling();

        $this->setExpectedException('InvalidArgumentException');

        $bowling->roll(-1);
    }

    protected function rollTimes(Bowling $bowling, $count, $pins)
    {
        for ($i = 0; $i < $count; $i++) {
            $bowling->roll($pins);
        }
    }

    protected function rollSpare(Bowling $bowling, $first = 2, $second = 8)
    {
        $bowling->roll($first);
        $bowling->roll($second);
    }

    protected function rollStrike(Bowling $bowling)
    {
        $bowling->roll(10);
    }
}
