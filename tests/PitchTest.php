<?php

use Stevehead\Music\Pitch;

class PitchTest extends PHPUnit_Framework_TestCase
{
    public function testFrequencyToNoteMethod()
    {
        $this->assertEquals(81, Pitch::frequencyToNote(880));
        $this->assertEquals(57, Pitch::frequencyToNote(220));
    }
}
