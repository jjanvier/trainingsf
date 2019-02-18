<?php

namespace spec\AppBundle\Entity;

use AppBundle\Entity\PokerHand;
use AppBundle\Poker\Card;
use AppBundle\Poker\Suite;
use AppBundle\Poker\Value;
use PhpSpec\ObjectBehavior;
use Webmozart\Assert\Assert;

class PokerHandSpec extends ObjectBehavior
{
    function it_formats_to_string()
    {
        $hand = new PokerHand(
            'john',
            new Card(new Value('A'), new Suite('♠')),
            new Card(new Value('Q'), new Suite('♥')),
            new Card(new Value('8'), new Suite('♦')),
            new Card(new Value('2'), new Suite('♣')),
            new Card(new Value('2'), new Suite('♦'))
        );

        Assert::same('A♠-Q♥-8♦-2♣-2♦', $hand->__toString());
    }

    function it_does_not_accepts_cheaters_with_twice_the_same_card()
    {
        $card = new Card(new Value('A'), new Suite('♠'));

        $this->beConstructedWith(
            'cheater',
            $card,
            new Card(new Value('Q'), new Suite('♥')),
            new Card(new Value('8'), new Suite('♦')),
            new Card(new Value('2'), new Suite('♣')),
            $card
        );

        $this->shouldThrow(new \Exception('Cheaters will not be tolerated'))->duringInstantiation();
    }
}
