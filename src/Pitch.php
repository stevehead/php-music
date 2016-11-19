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

    public static function noteToNoteName($note)
    {
        $note = round($note);
        switch ($note % 12) {
            case 0: return 'C';
            case 1: return 'C#';
            case 2: return 'D';
            case 3: return 'Eb';
            case 4: return 'E';
            case 5: return 'F';
            case 6: return 'F#';
            case 7: return 'G';
            case 8: return 'G#';
            case 9: return 'A';
            case 10: return 'Bb';
            case 11: return 'B';
        }
    }
}
