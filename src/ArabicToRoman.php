<?php

namespace App;

class ArabicToRoman
{

    private static $romanNumerals = [
        1000 => 'M',
        900 => 'CM',
        500 => 'D',
        400 => 'CD',
        100 => 'C',
        90 => 'XC',
        50 => 'L',
        40 => 'XL',
        10 => 'X',
        9 => 'IX',
        5 => 'V',
        4 => 'IV',
        1 => 'I'
    ];

    private static $cache = [];

    /**
     * Receive an arabic number and return a string with its roman counterpart
     *
     * @param int $arabicNumber Arabic number to be transformed (e.g. 121)
     *
     * @return string The roman number equivalent (e.g. CXXI)
     */
    public static function transform(int $arabicNumber): string
    {

        if (!array_key_exists($arabicNumber, self::$cache)) {
            $romanNumber = '';

            foreach (self::$romanNumerals as $value => $numeral) {
                while ($arabicNumber >= $value) {
                    $romanNumber .= $numeral;
                    $arabicNumber -= $value;
                }
            }

            self::$cache[$arabicNumber] = $romanNumber;
        }

        return self::$cache[$arabicNumber];
    }
}
