<?php

namespace spec\AppBundle\Poker;

use AppBundle\Poker\Card;
use AppBundle\Poker\Suite;
use AppBundle\Poker\Value;
use PhpSpec\ObjectBehavior;
use Webmozart\Assert\Assert;

class CardSpec extends ObjectBehavior
{
    function it_creates_a_random_card()
    {
        $card = Card::random();
        Assert::isInstanceOf($card, Card::class);
    }

    function it_formats_to_string()
    {
        $card = new Card(new Value('A'), new Suite('♠'));
        Assert::same('A♠', $card->__toString());
    }
}
