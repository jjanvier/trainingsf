<?php

namespace spec\AppBundle\Poker;

use AppBundle\Poker\Value;
use PhpSpec\ObjectBehavior;
use Webmozart\Assert\Assert;

class ValueSpec extends ObjectBehavior
{
    function it_does_not_create_a_value_with_invalid_data()
    {
        $this->beConstructedWith(1);
        $this->shouldThrow(\Exception::class)->duringInstantiation();

        $this->beConstructedWith(-1);
        $this->shouldThrow(\Exception::class)->duringInstantiation();

        $this->beConstructedWith('Queen');
        $this->shouldThrow(\Exception::class)->duringInstantiation();

        $this->beConstructedWith([7]);
        $this->shouldThrow(\Exception::class)->duringInstantiation();
    }

    function it_creates_a_random_value()
    {
        $value = Value::random();
        Assert::isInstanceOf($value, Value::class);
    }

    function it_formats_to_string()
    {
        $value = new Value(8);
        Assert::same('8', $value->__toString());
    }
}
