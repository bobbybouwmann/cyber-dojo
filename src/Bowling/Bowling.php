<?php

namespace App\Bowling;

use InvalidArgumentException;

class Bowling
{
    /**
     * The number of frames in a game.
     */
    const FRAMES_PER_GAME = 10;

    protected $rolls = [];

    /**
     * Roll a ball.
     */
    public function roll($pins)
    {
        $this->checkForValidRoll($pins);

        $this->rolls[] = $pins;
    }

    public function score()
    {
        $score = 0;
        $roll = 0;

        for ($frame = 1; $frame <= self::FRAMES_PER_GAME; $frame++) {
            if ($this->isStrike($roll)) {
                $score += 10 + $this->strikeBonus($roll);
                $roll += 1;
            } elseif ($this->isSpare($roll)) {
                $score += 10 + $this->spareBonus($roll);
                $roll += 2;
            } else {
                $score += $this->getFrameScore($roll);
                $roll += 2;
            }
        }

        return $score;
    }

    /**
     * Get the default frame score by adding up the two turns in a frame.
     *
     * @param $roll
     *
     * @return mixed
     */
    protected function getFrameScore($roll)
    {
        return $this->rolls[$roll] + $this->rolls[$roll + 1];
    }

    /**
     * Check if the current roll is a strike.
     *
     * @param $roll
     *
     * @return bool
     */
    protected function isStrike($roll)
    {
        return $this->rolls[$roll] == 10;
    }

    /**
     * Check if the current and the next roll are together ten and therefor a spare.
     *
     * @param $roll
     *
     * @return bool
     */
    protected function isSpare($roll)
    {
        return $this->rolls[$roll] + $this->rolls[$roll + 1] == 10;
    }

    /**
     * Get the strike bonus.
     *
     * @param $roll
     *
     * @return mixed
     */
    protected function strikeBonus($roll)
    {
        return $this->rolls[$roll + 1] + $this->rolls[$roll + 2];
    }

    /**
     * Get the spare bonus.
     *
     * @param $roll
     *
     * @return mixed
     */
    protected function spareBonus($roll)
    {
        return $this->rolls[$roll + 2];
    }

    /**
     * Check if the current$roll is valid.
     *
     * @param $pins
     */
    private function checkForValidRoll($pins)
    {
        if ($pins < 0) {
            throw new InvalidArgumentException;
        }
    }
}
