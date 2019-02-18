<?php

namespace spec\AppBundle\Poker;

use AppBundle\Entity\PokerHand;
use PhpSpec\ObjectBehavior;

class RandomHandGeneratorSpec extends ObjectBehavior
{
    function it_generates_a_random_hand()
    {
        $this->__invoke('mary')->shouldReturnAnInstanceOf(PokerHand::class);
    }
}
