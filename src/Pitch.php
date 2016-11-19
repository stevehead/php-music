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

    public static function frequencyToNote($frequency)
    {
        $centsOff = 1200 * log($frequency / self::$standardFrequency, 2);
        return 69 + $centsOff / 100;
    }

    public static function noteToFrequency($note)
    {
        $centsOff = 100 * ($note - 69);
        return self::$standardFrequency * pow(2, $centsOff / 1200);
    }
}
