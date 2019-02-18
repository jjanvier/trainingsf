<?php

namespace AppBundle\Poker;

class Suite
{
    private const HEART = '♥';
    private const CLUB = '♣';
    private const DIAMOND = '♦';
    private const SPADE = '♠';

    private static $possibleSuites = [self::HEART, self::CLUB, self::DIAMOND, self::SPADE];

    /** @var string */
    private $data;

    public function __construct(string $data)
    {
        if (!in_array($data, self::$possibleSuites)) {
            throw new \Exception("A suite should be one of: " . implode(", ", self::$possibleSuites));
        }

        $this->data = $data;
    }

    public function __toString()
    {
        return $this->data;
    }

    public static function random(): Suite {
        $randomKey = array_rand(self::$possibleSuites);

        return new self(self::$possibleSuites[$randomKey]);
    }
}
