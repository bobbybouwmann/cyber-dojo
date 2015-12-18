<?php

use App\Anagrams\Anagram;

class AnagramTest extends PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_finds_all_the_anagrams_for_one_letter()
    {
        $anagram = new Anagram('a');

        $this->assertEquals(['a'], $anagram->results());
    }

    /** @test */
    public function it_finds_all_the_anagrams_for_a_two_word()
    {
        $anagram = new Anagram('ab');

        $this->assertEquals(['ab', 'ba'], $anagram->results());
    }

//    /** @test */
    public function it_finds_all_the_anagrams_for_three_letter_word()
    {
        $anagram = new Anagram('hey');

        $this->assertEquals(['hey', 'hye', 'ehy', 'eyh', 'yeh', 'yhe'], $anagram->results());
    }

//    /** @test */
    public function it_finds_all_the_anagrams_for_a_four_letter_word()
    {
        $expected = [
            'biro',
            'bior',
            'brio',
            'broi',
            'boir',
            'bori',
            'ibro',
            'ibor',
            'irbo',
            'irob',
            'iobr',
            'iorb',
            'rbio',
            'rboi',
            'ribo',
            'riob',
            'roib',
            'robi',
            'obir',
            'obriv',
            'oibr',
            'oirb',
            'orbi',
            'orib',
        ];

        $this->assertEquals($expected, (new Anagram('biro')));
    }
}
