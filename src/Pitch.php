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

    public static function noteToFullNoteName($note)
    {
        $note = round($note);
        $noteName = self::noteToNoteName($note);
        $number = floor($note / 12) - 1;
        return $noteName . $number;
    }

    public static function fullNoteNameToNote($fullNoteName)
    {
        preg_match('/([A-G])([b#x]*)(-?\d)/', $fullNoteName, $matches);
        if (!count($matches)) {
            throw new \Exception;
        }

        $offset = 0;
        switch($matches[1]) {
            case 'C': break;
            case 'D': $offset += 2; break;
            case 'E': $offset += 4; break;
            case 'F': $offset += 5; break;
            case 'G': $offset += 7; break;
            case 'A': $offset += 9; break;
            case 'B': $offset += 11; break;
        }

        foreach (str_split($matches[2]) as $accidental) {
            switch ($accidental) {
                case 'b': $offset -= 1; break;
                case '#': $offset += 1; break;
                case 'x': $offset += 2; break;
            }
        }

        return 12 * ($matches[3] + 1) + $offset;
    }
}
