<?php
namespace Stevehead\Music;

class Pitch
{
    // Standard Frequency
    private static $standardFrequency = 440;

    // Frequency in hertz
    private $frequency;

    public function __construct($frequency)
    {
        $this->frequency = $frequency;
    }
}
