<?php

namespace spec\AppBundle\Poker;

use AppBundle\Poker\Suite;
use PhpSpec\Exception\Example\FailureException;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Webmozart\Assert\Assert;

class SuiteSpec extends ObjectBehavior
{
    function it_does_not_create_a_suite_with_invalid_data()
    {
        $this->beConstructedWith(1);
        $this->shouldThrow(\Exception::class)->duringInstantiation();

        $this->beConstructedWith('foo');
        $this->shouldThrow(\Exception::class)->duringInstantiation();

        $this->beConstructedWith('☻');
        $this->shouldThrow(\Exception::class)->duringInstantiation();
    }

    function it_creates_a_random_suite()
    {
        $suite = Suite::random();
        Assert::isInstanceOf($suite, Suite::class);
    }

    function it_formats_to_string()
    {
        $suite = new Suite('♠');
        Assert::same('♠', $suite->__toString());
    }
}
