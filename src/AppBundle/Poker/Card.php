<?php

namespace AppBundle\Poker;

class Card
{
    /** @var Value */
    private $value;

    /** @var Suite */
    private $suite;

    public function __construct(Value $value, Suite $suite)
    {
        $this->value = $value;
        $this->suite = $suite;
    }

    public function __toString()
    {
        return $this->value->__toString() . $this->suite->__toString();
    }

    public static function random(): Card {
        return new self(Value::random(), Suite::random());
    }
}
