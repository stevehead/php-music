<?php

use Stevehead\Music\Pitch;

class PitchTest extends PHPUnit_Framework_TestCase
{
    public function testFrequencyToNoteMethod()
    {
        $this->assertEquals(81, Pitch::frequencyToNote(880));
        $this->assertEquals(57, Pitch::frequencyToNote(220));
    }

    public function testNoteToFrequencyMethod()
    {
        $this->assertEquals(880, Pitch::noteToFrequency(81));
        $this->assertEquals(220, Pitch::noteToFrequency(57));
    }

    public function testNoteToNoteNameMethod()
    {
        $this->assertEquals('C', Pitch::noteToNoteName(0));
        $this->assertEquals('C', Pitch::noteToNoteName(60));
        $this->assertEquals('A', Pitch::noteToNoteName(69));
        $this->assertEquals('A', Pitch::noteToNoteName(69.4));
        $this->assertEquals('Bb', Pitch::noteToNoteName(69.5));
    }
}
