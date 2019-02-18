<?php

namespace AppBundle\Poker;

class Value
{
    private const ACE = 'A';
    private const KING = 'K';
    private const QUEEN = 'Q';
    private const JACK = 'J';

    /** @var int|string */
    private $data;

    private static $possibleValues = [2, 3, 4, 5, 6, 7, 8, 9, 10, self::JACK, self::QUEEN, self::KING, self::ACE];

    public function __construct($data)
    {
        if (!in_array($data, self::$possibleValues)) {
            throw new \Exception("A value should be one of: " . implode(", ", self::$possibleValues));
        }

        $this->data = $data;
    }

    public function __toString()
    {
        return (string)$this->data;
    }

    public static function random(): Value {
        $randomKey = array_rand(self::$possibleValues);

        return new self(self::$possibleValues[$randomKey]);
    }
}
