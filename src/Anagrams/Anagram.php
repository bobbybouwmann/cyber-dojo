<?php

// Write a program to generate all potential
// anagrams of an input string.
//
// For example, the potential anagrams of "biro" are

// biro bior brio broi boir bori
// ibro ibor irbo irob iobr iorb
// rbio rboi ribo riob roib robi
// obir obri oibr oirb orbi orib

namespace App\Anagrams;

class Anagram
{
    public $results = [];

    public function __construct($word = '')
    {
        $this->results = $this->permute($word);
    }

    /**
     * Get the results.
     *
     * @return array
     */
    public function results()
    {
        return $this->results;
    }

    /**
     * Find the permutation (anagram) of a string.
     *
     * @param $string
     *
     * @return array
     */
    protected function permute($string)
    {
        $letters = is_string($string) ? str_split($string) : $string;

        if (count($letters) === 1) {
            return $letters;
        }

        $result = [];

        foreach ($letters as $key => $letter) {
            foreach ($this->permute(array_diff_key($letters, [$key => $letter])) as $diff) {
                $result[] = $letter . $diff;
            }
        }

        return $result;
    }
}
